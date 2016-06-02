<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class LanApiTest extends BaseTest
{

  private static $server_api;
  private static $lan_api;

  private static $testServer;
  private static $testLan;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::spawnDatacenter();
    self::$server_api = new Swagger\Client\Api\ServerApi(self::$api_client);
    self::$lan_api = new Swagger\Client\Api\LanApi(self::$api_client);
  }

  public function testCreate() {
    $lan = new \Swagger\Client\Model\Lan();
    $props = new \Swagger\Client\Model\LanProperties();
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
    $lan = new \Swagger\Client\Model\Lan();
    $props = new \Swagger\Client\Model\LanProperties();
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
