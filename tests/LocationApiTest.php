<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class LocationApiTest extends BaseTest
{

  private static $location_api;
  private static $testLocation;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$location_api = new Swagger\Client\Api\LocationApi(self::$api_client);
  }

  public function testList() {
    $locations = self::$location_api->findAll();
    $this->assertNotEmpty($locations);
    $this->assertNotEmpty($locations->getItems());
    self::$testLocation = $locations->getItems()[0];
  }

  public function testGet() {
    $location_parts = explode("/", self::$testLocation->getId());
    $location = self::$location_api->findById($location_parts[0], $location_parts[1]);
    $this->assertEquals($location->getId(), self::$testLocation->getId());
  }

}

?>
