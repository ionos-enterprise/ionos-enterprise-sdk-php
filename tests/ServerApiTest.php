<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class ServerApiTest extends BaseTest
{

  private static $server_api;
  private static $volume_api;
  private static $attached_volume_api;
  private static $cdrom_api;

  private static $testCdrom;
  private static $testVolume;
  private static $testServer;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::spawnDatacenter();
    self::$server_api = new Swagger\Client\Api\ServerApi(self::$api_client);
    self::$volume_api = new Swagger\Client\Api\VolumeApi(self::$api_client);
    self::$attached_volume_api = new Swagger\Client\Api\AttachedVolumesApi(self::$api_client);
    self::$cdrom_api = new Swagger\Client\Api\AttachedCDROMsApi(self::$api_client);
  }

  public function testCreate() {
    $server = new \Swagger\Client\Model\Server();
    $props = new \Swagger\Client\Model\ServerProperties();
    $props->setName("jclouds-node")->setCores(1)->setRam(1024);
    $server->setProperties($props);

    self::$testServer = self::$server_api->create(self::$testDatacenter->getId(), $server);

    $result = self::assertPredicate(function() {
      $server = self::$server_api->findById(self::$testDatacenter->getId(), self::$testServer->getId());
      if ($server->getMetadata()->getState() == 'AVAILABLE') {
        return $server;
      }
    });

    $this->assertEquals($result->getProperties()->getName(), "jclouds-node");
  }

  public function testGet() {
    $server = self::$server_api->findById(self::$testDatacenter->getId(), self::$testServer->getId());
    $this->assertEquals($server->getId(), self::$testServer->getId());
  }

  public function testList() {
    $servers = self::$server_api->findAll(self::$testDatacenter->getId());
    $this->assertNotEmpty($servers);
    $this->assertNotEmpty($servers->getItems());
    $server = $this->find($servers->getItems(), 
      function($i) { return $i->getId() == self::$testServer->getId(); }
      );
    $this->assertTrue(!empty($server));
  }

  public function testUpdate() {
    $server = new \Swagger\Client\Model\Server();
    $props = new \Swagger\Client\Model\ServerProperties();
    $props->setName("new-name")->setCores(2)->setRam(1024 * 2);
    $server->setProperties($props);

    self::$server_api->partialUpdate(self::$testDatacenter->getId(), self::$testServer->getId(), $props);
    $result = self::assertPredicate(function() {
      $server = self::$server_api->findById(self::$testDatacenter->getId(), self::$testServer->getId());
      if ($server->getMetadata()->getState() == 'AVAILABLE') {
        return $server;
      }
    });
    self::assertDatacenterAvailable(self::$testDatacenter->getId());
    self::assertServerRunning(self::$testDatacenter->getId(), self::$testServer->getId());

    $updatedServer = self::$server_api->findById(self::$testDatacenter->getId(), self::$testServer->getId());
    $this->assertEquals($updatedServer->getProperties()->getName(), "new-name");
  }

  public function testStopServer() {
    self::$server_api->stop(self::$testDatacenter->getId(), self::$testServer->getId());
    self::assertPredicate(function() {
      $server = self::$server_api->findById(self::$testDatacenter->getId(), self::$testServer->getId());
      if ($server->getProperties()->getVmState() == 'SHUTOFF') {
        return $server;
      }
    });
  }

  public function testStartServer() {
    self::$server_api->start(self::$testDatacenter->getId(), self::$testServer->getId());
    self::assertServerRunning(self::$testDatacenter->getId(), self::$testServer->getId());
  }

  public function testRebootServer() {
    self::$server_api->reboot(self::$testDatacenter->getId(), self::$testServer->getId());
    self::assertServerRunning(self::$testDatacenter->getId(), self::$testServer->getId());
  }

  public function testListVolumes() {
    $volumes = self::$volume_api->findAll(self::$testDatacenter->getId(), self::$testServer->getId());
    $this->assertNotEmpty($volumes);
    $this->assertEmpty($volumes->getItems());
  }

  public function testAttachVolume() {
    $volume = new Swagger\Client\Model\Volume();
    $props = new \Swagger\Client\Model\VolumeProperties();
    $props->setName("test-volume")->setSize(3)->setType('HDD')->setLicenceType('LINUX');
    $volume->setProperties($props);

    $testVolume = self::$volume_api->create(self::$testDatacenter->getId(), $volume);

    self::$testVolume = self::assertPredicate(function($testVolume) {
      $volume = self::$volume_api->findById(self::$testDatacenter->getId(), $testVolume->getId());
      if ($volume->getMetadata()->getState() == 'AVAILABLE') {
        return $volume;
      }
    }, array($testVolume));

    $this->assertEquals(self::$testVolume->getProperties()->getSize(), 3);

    $volume = new Swagger\Client\Model\Volume();
    $volume->setId(self::$testVolume->getId());
    self::$attached_volume_api->attachVolume(self::$testDatacenter->getId(), self::$testServer->getId(), $volume);

    self::assertPredicate(function($testVolume) {
      return self::$attached_volume_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testVolume->getId());
    }, array($testVolume));
  }

  public function testGetVolume() {
    $testVolume = self::$attached_volume_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testVolume->getId());
    $this->assertNotEmpty($testVolume);
  }

  public function testDetachVolume() {
    self::$attached_volume_api->delete(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testVolume->getId());    
    self::assertPredicate(function() {
      self::$attached_volume_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testVolume->getId());
    }, null, true);
  }

  public function testListCdroms() {
    $cdroms = self::$cdrom_api->findAll(self::$testDatacenter->getId(), self::$testServer->getId());
    $this->assertNotEmpty($cdroms);
    $this->assertEmpty($cdroms->getItems());
  }

  public function testAttachCdrom() {

    $testImage = self::getTestImage('CDROM');

    $image = new \Swagger\Client\Model\Image();
    $image->setId($testImage->getId());

    self::$testCdrom = self::$cdrom_api->create(self::$testDatacenter->getId(), self::$testServer->getId(), $image);

    $result = self::assertPredicate(function() {
      $cdrom = self::$cdrom_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testCdrom->getId());
      if ($cdrom->getMetadata()->getState() == 'AVAILABLE') {
        return $cdrom;
      }
    });
    $this->assertEquals($result->getProperties()->getName(), $testImage->getProperties()->getName());
  }

  public function testRetrieveAttachedCdrom() {
    $cdrom = self::$cdrom_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testCdrom->getId());
    $this->assertNotEmpty($cdrom->getId());
  }

  public function testDetachCdrom() {
    self::$cdrom_api->delete(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testCdrom->getId());
    $this->assertTrue(
      self::assertPredicate(
        function () { self::$cdrom_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testCdrom->getId()); }, null, true
      )
    );
    self::$testCdrom = null;
  }

  public function testRemove() {
    self::$server_api->delete(self::$testDatacenter->getId(), self::$testServer->getId());
    $this->assertTrue(
      self::assertPredicate(
        function () { self::$server_api->findById(self::$testDatacenter->getId(), self::$testServer->getId()); }, null, true
      )
    );
    self::$testServer = null;
  }

  public static function tearDownAfterClass() {
    self::removeDatacenter();
  }
}

?>
