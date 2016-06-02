<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class NicApiTest extends BaseTest
{

  private static $server_api;
  private static $nic_api;

  private static $testServer;
  private static $testNic;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::spawnDatacenter();
    self::$server_api = new Swagger\Client\Api\ServerApi(self::$api_client);
    self::$nic_api = new Swagger\Client\Api\NetworkInterfacesApi(self::$api_client);
  }

  public function testCreateServer() {
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

  public function testCreateNic() {
    $nic = new \Swagger\Client\Model\Nic();
    $props = new \Swagger\Client\Model\NicProperties();
    $props->setName("jclouds-nic")->setLan(1);
    $nic->setProperties($props);

    self::$testNic = self::$nic_api->create(self::$testDatacenter->getId(), self::$testServer->getId(), $nic);

    $result = self::assertPredicate(function() {
      $nic = self::$nic_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId());
      if ($nic->getMetadata()->getState() == 'AVAILABLE') {
        return $nic;
      }
    });

    $this->assertEquals($result->getProperties()->getName(), "jclouds-nic");
  }

  public function testGet() {
    $nic = self::$nic_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId());
    $this->assertEquals($nic->getId(), self::$testNic->getId());
  }

  public function testList() {
    $nics = self::$nic_api->findAll(self::$testDatacenter->getId(), self::$testServer->getId());
    $this->assertNotEmpty($nics);
    $this->assertNotEmpty($nics->getItems());
    $nic = $this->find($nics->getItems(), 
      function($i) { return $i->getId() == self::$testNic->getId(); }
      );
    $this->assertTrue(!empty($nic));
  }

  public function testUpdate() {
    $nic = new \Swagger\Client\Model\Nic();
    $props = new \Swagger\Client\Model\NicProperties();
    $props->setName("new-name");
    $nic->setProperties($props);

    self::$nic_api->partialUpdate(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId(), $props);
    $result = self::assertPredicate(function() {
      $nic = self::$nic_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId());
      if ($nic->getMetadata()->getState() == 'AVAILABLE') {
        return $nic;
      }
    });

    self::assertDatacenterAvailable(self::$testDatacenter->getId());

    $updatedNic = self::$nic_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId());
    $this->assertEquals($updatedNic->getProperties()->getName(), "new-name");
  }

  public function testRemove() {
    self::$nic_api->delete(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId());
    $this->assertTrue(
      self::assertPredicate(
        function () { self::$nic_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId()); }, null, true
      )
    );
    self::$testNic = null;
  }

  public static function tearDownAfterClass() {
    self::removeDatacenter();
  }
}

?>
