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
  
  public function waitTillProvisioned($url)  {
    preg_match('/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/',$url,$matches);
    $config = (new ProfitBricks\Client\Configuration())
        ->setHost('https://api.profitbricks.com/cloudapi/v3')
        ->setUsername(getenv('PROFITBRICKS_USERNAME'))
        ->setPassword(getenv('PROFITBRICKS_PASSWORD'));
    $request_api = new ProfitBricks\Client\Api\RequestApi(self::$api_client);
    $counter = 120;
    for ($i = 0; $i < $counter; $i++) {
      $request = $request_api->getStatus($matches[0]);
      sleep(1);
      if ($request->getMetadata()->getStatus() == "DONE") {
        break;
      }
      if ($request->getMetadata()->getStatus() == "FAILED") {
        throw new Exception("The request execution has failed with following message: " + $request->getMetadata()->getMessage());
      }
    }
  }
  
  public function testNothing() {
    // suppress warning
  }
  
  protected static $test_location = 'us/las';
}

?>
