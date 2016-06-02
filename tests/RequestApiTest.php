<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class RequestApiTest extends BaseTest
{

  private static $reqiest_api;
  private static $testRequest;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$reqiest_api = new Swagger\Client\Api\RequestApi(self::$api_client);
  }

  public function testList() {
    $requests = self::$reqiest_api->findAll();
    $this->assertNotEmpty($requests);
    $this->assertNotEmpty($requests->getItems());
    self::$testRequest = $requests->getItems()[0];
  }

  public function testGet() {
    $request = self::$reqiest_api->findById(self::$testRequest->getId());
    $this->assertEquals($request->getId(), self::$testRequest->getId());
  }

  public function testGetStatus() {
    $request = self::$reqiest_api->getStatus(self::$testRequest->getId());
    $this->assertEquals($request->getId(), self::$testRequest->getId() . "/status");
  }

}

?>
