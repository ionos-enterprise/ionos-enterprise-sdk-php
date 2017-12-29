<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class NicApiTest extends BaseTest
{

  private static $server_api;
  private static $nic_api;

  private static $testServer;
  private static $testNic;
  private static $badId  = '00000000-0000-0000-0000-000000000000';

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::spawnDatacenter();
    self::$server_api = new ProfitBricks\Client\Api\ServerApi(self::$api_client);
    self::$nic_api = new ProfitBricks\Client\Api\NetworkInterfacesApi(self::$api_client);
  }

  public function testCreateServer() {
    $server = new \ProfitBricks\Client\Model\Server();
    $props = new \ProfitBricks\Client\Model\ServerProperties();
    $props->setName("PHP SDK Test")->setCores(1)->setRam(1024);
    $server->setProperties($props);

    self::$testServer = self::$server_api->create(self::$testDatacenter->getId(), $server);
  
    $this->waitTillProvisioned(self::$testServer->getRequestId());

    $this->assertEquals(self::$testServer->getProperties()->getName(), "PHP SDK Test");
  }

  public function testCreateNic() {
    $nic = new \ProfitBricks\Client\Model\Nic();
    $props = new \ProfitBricks\Client\Model\NicProperties();
    $props->setName("PHP SDK Test")->setLan(1);
    $nic->setProperties($props);

    self::$testNic = self::$nic_api->create(self::$testDatacenter->getId(), self::$testServer->getId(), $nic);
  
    $this->waitTillProvisioned(self::$testNic->getRequestId());

    $this->assertEquals(self::$testNic->getProperties()->getName(), "PHP SDK Test");
  }

  public function testCreateNicFailure() {
    $nic = new \ProfitBricks\Client\Model\Nic();
    $props = new \ProfitBricks\Client\Model\NicProperties();
    $props->setName("PHP SDK Test");
    $nic->setProperties($props);

    try {
      self::$testNic = self::$nic_api->create(self::$testDatacenter->getId(), self::$testServer->getId(), $nic);
    } catch (ProfitBricks\Client\ApiException $e) {
      $this->assertEquals($e->getCode(), 422);
    }
  }

  public function testGet() {
    $nic = self::$nic_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId());
    $this->assertEquals($nic->getId(), self::$testNic->getId());
  }

  public function testGetFailure() {
    try {
      $nic = self::$nic_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$badId);
    } catch (ProfitBricks\Client\ApiException $e) {
      $this->assertEquals($e->getCode(), 404);
    }
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
    $nic = new \ProfitBricks\Client\Model\Nic();
    $props = new \ProfitBricks\Client\Model\NicProperties();
    $props->setName("PHP SDK Test RENAME");
    $nic->setProperties($props);

    $updateResponse=self::$nic_api->partialUpdate(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId(), $props);
    $this->waitTillProvisioned($updateResponse->getRequestId());

    self::assertDatacenterAvailable(self::$testDatacenter->getId());

    $updatedNic = self::$nic_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId());
    $this->assertEquals($updatedNic->getProperties()->getName(), "PHP SDK Test RENAME");
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
