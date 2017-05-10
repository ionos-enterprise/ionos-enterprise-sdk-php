<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');

class DataCenterApiTest extends BaseTest
{

  static $datacenter_api;
  static $testDatacenter;
  static $testDatacenterComposite;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$datacenter_api = new ProfitBricks\Client\Api\DataCenterApi(self::$api_client);
  }

  public function testCreate() {
    $datacenter = new \ProfitBricks\Client\Model\Datacenter();
    
    $props = new \ProfitBricks\Client\Model\DatacenterProperties();
    $props->setName("test-data-center");
    $props->setDescription("example description");
    $props->setLocation(self::$test_location);
    
    $datacenter->setProperties($props);

    self::$testDatacenter = self::$datacenter_api->create($datacenter);
    $this->assertEquals($datacenter->getProperties()->getName(), self::$testDatacenter->getProperties()->getName());
  }
  
  public function testCreateComposite() {
    $datacenter_composite = new \ProfitBricks\Client\Model\Datacenter();
    
    $props = new \ProfitBricks\Client\Model\DatacenterProperties();
    $props->setName("test-data-center");
    $props->setDescription("example description");
    $props->setLocation(self::$test_location);
  
    $servers=new \ProfitBricks\Client\Model\Servers();
    $server = new \ProfitBricks\Client\Model\Server();
    $server_props = new \ProfitBricks\Client\Model\ServerProperties();
    $server_props->setName("composite-node")->setCores(1)->setRam(1024);
    $server->setProperties($server_props);
    $servers->setItems(array($server));
    
    $entities= new \ProfitBricks\Client\Model\DatacenterEntities();
    $entities->setServers($servers);
  
    $datacenter_composite->setProperties($props);
    $datacenter_composite->setEntities($entities);
    
    self::$testDatacenterComposite = self::$datacenter_api->create($datacenter_composite);
    $this->assertEquals(sizeof($datacenter_composite->getEntities()->getServers()), 1);
  }

  public function testGet() {
    $datacenter = self::$datacenter_api->findById(self::$testDatacenter->getId());
    $this->assertEquals($datacenter->getId(), self::$testDatacenter->getId());
  }
  
  public function testGetFailure()  {
    try {
      $datacenter = self::$datacenter_api->findById("bad id");
    } catch (ProfitBricks\Client\ApiException $e) {
      $this->assertEquals($e->getCode(), 404);
    }
  }

  public function testList() {
    $datacenters = self::$datacenter_api->findAll();
    $this->assertNotEmpty($datacenters);
    $this->assertNotEmpty($datacenters->getItems());
    $datacenter = $this->find($datacenters->getItems(),
      function($i) { return $i->getId() == self::$testDatacenter->getId(); }
      );
    $this->assertTrue(!empty($datacenter));
  }

  public function testUpdate() {
    $datacenter = new \ProfitBricks\Client\Model\Datacenter();
    $props = new \ProfitBricks\Client\Model\DatacenterProperties();
    $props->setName("new-name");
    $datacenter->setProperties($props);

    $updatedDatacenter = self::$datacenter_api->update(self::$testDatacenter->getId(), $datacenter);
    $this->assertEquals($updatedDatacenter->getProperties()->getName(), "new-name");
  }

  public function testRemove() {
    $id = self::$testDatacenter->getId();
    self::$datacenter_api->delete($id);
    $this->assertTrue(
      self::assertPredicate(
        function($id) { self::$datacenter_api->findById($id); },
        array($id), true
        )
      );
    self::$testDatacenter = null;
  }

  public static function tearDownAfterClass() {
    if (!empty(self::$testDatacenter)) {
      self::$datacenter_api->delete(self::$testDatacenter->getId());
    }
    if (!empty(self::$testDatacenterComposite)) {
      self::$datacenter_api->delete(self::$testDatacenterComposite->getId());
    }
  }
}

?>
