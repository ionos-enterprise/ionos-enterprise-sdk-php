<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');

class ImageApiTest extends BaseTest
{

  static $image_api;

  static $testImage;

  private static $badId  = '00000000-0000-0000-0000-000000000000';

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$image_api = new ProfitBricks\Client\Api\ImageApi(self::$api_client);
  }

  public function testList() {
    $images = self::$image_api->findAll();
    $this->assertNotEmpty($images);
    $this->assertNotEmpty($images->getItems());
    self::$testImage = $images->getItems()[0];
    $this->assertTrue(!empty(self::$testImage));
  }

  public function testGet() {
    $image = self::$image_api->findById(self::$testImage->getId());
    $this->assertEquals(self::$testImage->getId(), $image->getId());
  }

  public function testGetFailure() {
    try {  
      $image = self::$image_api->findById(self::$badId);
    } catch (ProfitBricks\Client\ApiException $e) {
      $this->assertEquals($e->getCode(), 404);
    }
  }

}

?>
