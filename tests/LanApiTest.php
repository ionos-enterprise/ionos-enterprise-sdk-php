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
    $props->setName("jclouds-lan");
    $lan->setProperties($props);

    self::$testLan = self::$lan_api->create(self::$testDatacenter->getId(), $lan);

    $result = self::assertPredicate(function() {
      $lan = self::$lan_api->findById(self::$testDatacenter->getId(), self::$testLan->getId());
      if ($lan->getMetadata()->getState() == 'AVAILABLE') {
        return $lan;
      }
    });

    $this->assertEquals($result->getProperties()->getName(), "jclouds-lan");
  }
  
  public function testCreateComposite() {
    //create server to attach an nic to it.
    $server = new \ProfitBricks\Client\Model\Server();
    $props = new \ProfitBricks\Client\Model\ServerProperties();
    $props->setName("lan-node")->setCores(1)->setRam(1024);
    $server->setProperties($props);
  
    self::$testServer = self::$server_api->create(self::$testDatacenter->getId(), $server);
    $result = self::assertPredicate(function() {
      $server = self::$server_api->findById(self::$testDatacenter->getId(), self::$testServer->getId());
      if ($server->getMetadata()->getState() == 'AVAILABLE') {
        return $server;
      }
    });
  
    $nic = new \ProfitBricks\Client\Model\Nic();
    $props = new \ProfitBricks\Client\Model\NicProperties();
    $props->setName("jclouds-nic")->setLan(1);
    $nic->setProperties($props);
  
    self::$testNic = self::$nic_api->create(self::$testDatacenter->getId(), $result->getId(), $nic);
  
    $niceResult = self::assertPredicate(function() {
      $nic = self::$nic_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId());
      if ($nic->getMetadata()->getState() == 'AVAILABLE') {
        return $nic;
      }
    });
  
    $lanNics=new \ProfitBricks\Client\Model\Nics();
    $nicToAdd=new \ProfitBricks\Client\Model\Nic();
    $nicToAdd->setId(self::$testNic->getId());
    $lanNics->setItems(array($nicToAdd));
    $lan_composite = new \ProfitBricks\Client\Model\Lan();
    $props = new \ProfitBricks\Client\Model\LanProperties();
    $entities= new \ProfitBricks\Client\Model\LanEntities();
  
    $props->setName("composite-lan");
    $entities->setNics($lanNics);
    
    $lan_composite->setProperties($props);
    $lan_composite->setEntities($entities);
    
    self::$testLanComposite = self::$lan_api->create(self::$testDatacenter->getId(), $lan_composite);
    sleep(10);
    $composite_result = self::assertPredicate(function() {
      $lan_composite = self::$lan_api->findById(self::$testDatacenter->getId(), self::$testLanComposite->getId());
      if ($lan_composite->getMetadata()->getState() == 'AVAILABLE') {
        return $lan_composite;
      }
    });
    
    $this->assertEquals($composite_result->getProperties()->getName(), "composite-lan");
    $this->assertEquals(sizeof($composite_result->getEntities()->getNics()), 1);
  }

  public function testGet() {
    $lan = self::$lan_api->findById(self::$testDatacenter->getId(), self::$testLan->getId());
    $this->assertEquals($lan->getId(), self::$testLan->getId());
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
    $props->setName("new-name")->setPublic(false);
    $lan->setProperties($props);

    self::$lan_api->partialUpdate(self::$testDatacenter->getId(), self::$testLan->getId(), $props);
    $result = self::assertPredicate(function() {
      $lan = self::$lan_api->findById(self::$testDatacenter->getId(), self::$testLan->getId());
      if ($lan->getMetadata()->getState() == 'AVAILABLE') {
        return $lan;
      }
    });

    self::assertDatacenterAvailable(self::$testDatacenter->getId());

    $updatedLan = self::$lan_api->findById(self::$testDatacenter->getId(), self::$testLan->getId());
    $this->assertEquals($updatedLan->getProperties()->getName(), "new-name");
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
