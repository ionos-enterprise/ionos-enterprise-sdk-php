<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class IpBlocksApiTest extends BaseTest
{

  private static $ipblocks_api;

  private static $testIpBlock;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$ipblocks_api = new Swagger\Client\Api\IPBlocksApi(self::$api_client);
  }

  public function testCreate() {
    $block = new \Swagger\Client\Model\IpBlock();
    $props = new \Swagger\Client\Model\IpBlockProperties();
    $props->setSize(2)->setLocation("us/las");
    $block->setProperties($props);

    self::$testIpBlock = self::$ipblocks_api->create($block);

    $result = self::assertPredicate(function() {
      $block = self::$ipblocks_api->findById(self::$testIpBlock->getId());
      if ($block->getMetadata()->getState() == 'AVAILABLE') {
        return $block;
      }
    });

    $this->assertEquals($result->getProperties()->getSize(), 2);
  }

  public function testGet() {
    $block = self::$ipblocks_api->findById(self::$testIpBlock->getId());
    $this->assertEquals($block->getId(), self::$testIpBlock->getId());
  }

  public function testList() {
    $ipblocks = self::$ipblocks_api->findAll();
    $this->assertNotEmpty($ipblocks);
    $this->assertNotEmpty($ipblocks->getItems());
    $block = $this->find($ipblocks->getItems(), 
      function($i) { return $i->getId() == self::$testIpBlock->getId(); }
      );
    $this->assertTrue(!empty($block));
  }

  public function testRemove() {
    self::$ipblocks_api->delete(self::$testIpBlock->getId());
    $this->assertTrue(
      self::assertPredicate(
        function () { self::$ipblocks_api->findById(self::$testIpBlock->getId()); }, null, true
      )
    );
    self::$testIpBlock = null;
  }

}

?>
