<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class IpBlocksApiTest extends BaseTest
{

  private static $ipblocks_api;

  private static $testIpBlock;

  private static $badId  = '00000000-0000-0000-0000-000000000000';
  
  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$ipblocks_api = new ProfitBricks\Client\Api\IPBlocksApi(self::$api_client);
  }

  public function testCreate() {
    $block = new \ProfitBricks\Client\Model\IpBlock();
    $props = new \ProfitBricks\Client\Model\IpBlockProperties();
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

  public function testCreateFailure() {
    $block = new \ProfitBricks\Client\Model\IpBlock();
    $props = new \ProfitBricks\Client\Model\IpBlockProperties();
    $props->setSize(2);
    $block->setProperties($props);
    
    try {
      self::$testIpBlock = self::$ipblocks_api->create($block);
    } catch (ProfitBricks\Client\ApiException $e) {
      $this->assertEquals($e->getCode(), 422);
    }
  }

  public function testGet() {
    $block = self::$ipblocks_api->findById(self::$testIpBlock->getId());
    $this->assertEquals($block->getId(), self::$testIpBlock->getId());
  }

  public function testGetFailure() {
    try {
      $block = self::$ipblocks_api->findById(self::$badId);
    } catch (ProfitBricks\Client\ApiException $e) {
      $this->assertEquals($e->getCode(), 404);
    }
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
