<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class LanApiTest extends BaseTest
{

  private static $server_api;
  private static $lan_api;
  private static $nic_api;

  private static $testServer;
  private static $testLan;
  private static $testLanComposite;
  private static $testNic;
  private static $badId  = '00000000-0000-0000-0000-000000000000';
  
  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::spawnDatacenter();
    self::$server_api = new ProfitBricks\Client\Api\ServerApi(self::$api_client);
    self::$lan_api = new ProfitBricks\Client\Api\LanApi(self::$api_client);
    self::$nic_api = new ProfitBricks\Client\Api\NetworkInterfacesApi(self::$api_client);
  }

  public function testCreate() {
    $lan = new \ProfitBricks\Client\Model\Lan();
    $props = new \ProfitBricks\Client\Model\LanProperties();
    $props->setName("PHP SDK Test ");
    $lan->setProperties($props);

    self::$testLan = self::$lan_api->create(self::$testDatacenter->getId(), $lan);
  
    $this->waitTillProvisioned(self::$testLan->getRequestId());

    $this->assertEquals(self::$testLan->getProperties()->getName(), "PHP SDK Test ");
  }

  public function testCreateFailure() {
    $lan = new \ProfitBricks\Client\Model\Lan();
    $props = new \ProfitBricks\Client\Model\LanProperties();
 
    try{
    self::$testLan = self::$lan_api->create(self::$testDatacenter->getId(), $lan);  
    } catch (ProfitBricks\Client\ApiException $e) {
      $this->assertEquals($e->getCode(), 422);
    }
  }
  
  public function testCreateComposite() {
    //create server to attach an nic to it.
    $server = new \ProfitBricks\Client\Model\Server();
    $props = new \ProfitBricks\Client\Model\ServerProperties();
    $props->setName("PHP SDK Test ")->setCores(1)->setRam(1024);
    $server->setProperties($props);
  
    self::$testServer = self::$server_api->create(self::$testDatacenter->getId(), $server);
    $this->waitTillProvisioned(self::$testServer->getRequestId());
  
    $nic = new \ProfitBricks\Client\Model\Nic();
    $props = new \ProfitBricks\Client\Model\NicProperties();
    $props->setName("PHP SDK Test ")->setLan(1);
    $nic->setProperties($props);
  
    self::$testNic = self::$nic_api->create(self::$testDatacenter->getId(), self::$testServer->getId(), $nic);
  
    $this->waitTillProvisioned(self::$testNic->getRequestId());
  
    $lanNics=new \ProfitBricks\Client\Model\Nics();
    $nicToAdd=new \ProfitBricks\Client\Model\Nic();
    $nicToAdd->setId(self::$testNic->getId());
    $lanNics->setItems(array($nicToAdd));
    $lan_composite = new \ProfitBricks\Client\Model\Lan();
    $props = new \ProfitBricks\Client\Model\LanProperties();
    $entities= new \ProfitBricks\Client\Model\LanEntities();
  
    $props->setName("PHP SDK Test");
    $entities->setNics($lanNics);
    
    $lan_composite->setProperties($props);
    $lan_composite->setEntities($entities);
    
    self::$testLanComposite = self::$lan_api->create(self::$testDatacenter->getId(), $lan_composite);
    sleep(10);
    $this->waitTillProvisioned(self::$testLanComposite->getRequestId());
    
    $this->assertEquals(self::$testLanComposite->getProperties()->getName(), "PHP SDK Test");
    $this->assertEquals(sizeof(self::$testLanComposite->getEntities()->getNics()), 1);
  }

  public function testGet() {
    $lan = self::$lan_api->findById(self::$testDatacenter->getId(), self::$testLan->getId());
    $this->assertEquals($lan->getId(), self::$testLan->getId());
  }

  public function testGetFailure() {
    try {
      $lan = self::$lan_api->findById("us", self::$badId);
    } catch (ProfitBricks\Client\ApiException $e) {
      $this->assertEquals($e->getCode(), 404);
    }
  }

  public function testList() {
    $lans = self::$lan_api->findAll(self::$testDatacenter->getId());
    $this->assertNotEmpty($lans);
    $this->assertNotEmpty($lans->getItems());
    $lan = $this->find($lans->getItems(), 
      function($i) { return $i->getId() == self::$testLan->getId(); }
      );
    $this->assertTrue(!empty($lan));
  }

  public function testUpdate() {
    $lan = new \ProfitBricks\Client\Model\Lan();
    $props = new \ProfitBricks\Client\Model\LanProperties();
    $props->setName("PHP SDK Test RENAME")->setPublic(false);
    $lan->setProperties($props);

    $updateResponse=self::$lan_api->partialUpdate(self::$testDatacenter->getId(), self::$testLan->getId(), $props);
    $this->waitTillProvisioned($updateResponse->getRequestId());

    self::assertDatacenterAvailable(self::$testDatacenter->getId());

    $updatedLan = self::$lan_api->findById(self::$testDatacenter->getId(), self::$testLan->getId());
    $this->assertEquals($updatedLan->getProperties()->getName(), "PHP SDK Test RENAME");
  }

  public function testRemove() {
    self::$lan_api->delete(self::$testDatacenter->getId(), self::$testLan->getId());
    $this->assertTrue(
      self::assertPredicate(
        function () { self::$lan_api->findById(self::$testDatacenter->getId(), self::$testLan->getId()); }, null, true
      )
    );
    self::$testLan = null;
  }

  public static function tearDownAfterClass() {
    self::removeDatacenter();
  }
}

?>
