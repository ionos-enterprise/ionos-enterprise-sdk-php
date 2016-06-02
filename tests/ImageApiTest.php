<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');

class ImageApiTest extends BaseTest
{

  static $image_api;

  static $testImage;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$image_api = new Swagger\Client\Api\ImageApi(self::$api_client);
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

}

?>
