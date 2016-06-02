<?php

require_once('autoload.php');
require_once('tests/Common.php');

class BaseTest extends \PHPUnit_Framework_TestCase
{
  use CommonTestMethods;

  protected static $api_client;

  public static function setUpBeforeClass() {
    $params = json_decode(file_get_contents("config.json"), true);
    $config = (new Swagger\Client\Configuration())
      ->setHost($params['host'])
      ->setUsername($params['username'])
      ->setPassword($params['password']);
    self::$api_client = new Swagger\Client\ApiClient($config);
  }

  protected function find($list, $predicate) {
    foreach ($list as $item) {
      if ($predicate($item))
        return $item;
    }
    return null;
  }

  public function testNothing() {
    // suppress warning
  }

  protected static $test_location = 'us/las';

}

?>
