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
  private static $testServer_Composite;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::spawnDatacenter();
    self::$server_api = new ProfitBricks\Client\Api\ServerApi(self::$api_client);
    self::$volume_api = new ProfitBricks\Client\Api\VolumeApi(self::$api_client);
    self::$attached_volume_api = new ProfitBricks\Client\Api\AttachedVolumesApi(self::$api_client);
    self::$cdrom_api = new ProfitBricks\Client\Api\AttachedCDROMsApi(self::$api_client);
  }

  public function testCreate() {
    $server = new \ProfitBricks\Client\Model\Server();
    $props = new \ProfitBricks\Client\Model\ServerProperties();
    $props->setName("jclouds-node")->setCores(1)->setRam(1024);
    $server->setProperties($props);

    self::$testServer = self::$server_api->create(self::$testDatacenter->getId(), $server);
  
    $this->waitTillProvisioned(self::$testServer->getRequestId());

    $this->assertEquals(self::$testServer->getProperties()->getName(), "jclouds-node");
  }
  
  public function testCreateComposite() {
    $server_composite = new \ProfitBricks\Client\Model\Server();
    $props = new \ProfitBricks\Client\Model\ServerProperties();
    $props->setName("composite-node")->setCores(1)->setRam(1024)->setCpuFamily('INTEL_XEON');
    $server_composite->setProperties($props);
    
    $entities= new \ProfitBricks\Client\Model\ServerEntities();
    $testImage = self::getTestImage('HDD');
  
    $volume = new ProfitBricks\Client\Model\Volume();
    $v_props = new \ProfitBricks\Client\Model\VolumeProperties();
    $v_props->setName("test-volume")
        ->setSize(3)
        ->setType('HDD')
        ->setImage($testImage->getId())
        ->setImagePassword("testpassword123")
        ->setSshKeys(array("hQGOEJeFL91EG3+l9TtRbWNjzhDVHeLuL3NWee6bekA="));
    $volume->setProperties($v_props);
    $attachedVolumes= new \ProfitBricks\Client\Model\Volumes();
    $attachedVolumes->setItems(array($volume));
    $entities->setVolumes($attachedVolumes);
    $server_composite->setEntities($entities);
    
    self::$testServer_Composite = self::$server_api->create(self::$testDatacenter->getId(), $server_composite);
  
    $this->waitTillProvisioned(self::$testServer_Composite->getRequestId());
  
    $this->assertEquals(sizeof(self::$testServer_Composite->getEntities()->getVolumes()), 1);
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
    $server = new \ProfitBricks\Client\Model\Server();
    $props = new \ProfitBricks\Client\Model\ServerProperties();
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
    $this->assertNotEmpty($volumes->getItems());
  }

  public function testAttachVolume() {
    $volume = new ProfitBricks\Client\Model\Volume();
    $props = new \ProfitBricks\Client\Model\VolumeProperties();
    $props->setName("test-volume")->setSize(3)->setType('HDD')->setLicenceType('LINUX');
    $volume->setProperties($props);

    $testVolume = self::$volume_api->create(self::$testDatacenter->getId(), $volume);
    $this->waitTillProvisioned($testVolume->getRequestId());
    self::$testVolume = self::$volume_api->findById(self::$testDatacenter->getId(), $testVolume->getId());
  
    $this->assertEquals(self::$testVolume->getProperties()->getSize(), 3);
    $volume = new ProfitBricks\Client\Model\Volume();
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

    $image = new \ProfitBricks\Client\Model\Image();
    $image->setId($testImage->getId());

    self::$testCdrom = self::$cdrom_api->create(self::$testDatacenter->getId(), self::$testServer->getId(), $image);
  
    $this->waitTillProvisioned(self::$testCdrom->getRequestId());
    $this->assertEquals(self::$testCdrom->getProperties()->getName(), $testImage->getProperties()->getName());
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
