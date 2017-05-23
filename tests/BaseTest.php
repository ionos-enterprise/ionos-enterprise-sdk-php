<?php

require_once('autoload.php');
require_once('tests/Common.php');

class BaseTest extends \PHPUnit_Framework_TestCase
{
  use CommonTestMethods;

  protected static $api_client;
  
  public static function setUpBeforeClass() {
    $config = (new ProfitBricks\Client\Configuration())
        ->setHost('https://api.profitbricks.com/cloudapi/v3')
        ->setUsername(getenv('PROFITBRICKS_USERNAME'))
        ->setPassword(getenv('PROFITBRICKS_PASSWORD'));
    self::$api_client = new ProfitBricks\Client\ApiClient($config);
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
