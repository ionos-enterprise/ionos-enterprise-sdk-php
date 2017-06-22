<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');

class FirewallApiTest extends BaseTest
{

  private static $firewall_api;
  private static $server_api;
  private static $nic_api;

  private static $testServer;
  private static $testNic;
  private static $testRule;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::spawnDatacenter();
    self::$firewall_api = new ProfitBricks\Client\Api\FirewallRuleApi(self::$api_client);
    self::$server_api = new ProfitBricks\Client\Api\ServerApi(self::$api_client);
    self::$nic_api = new ProfitBricks\Client\Api\NetworkInterfacesApi(self::$api_client);
  }

  public function testCreateServer() {
    $server = new \ProfitBricks\Client\Model\Server();
    $props = new \ProfitBricks\Client\Model\ServerProperties();
    $props->setName("jclouds-node")->setCores(1)->setRam(1024);
    $server->setProperties($props);

    self::$testServer = self::$server_api->create(self::$testDatacenter->getId(), $server);
    
    $this->waitTillProvisioned(self::$testServer->getRequestId());

    $this->assertEquals(self::$testServer->getProperties()->getName(), "jclouds-node");
  }

  public function testCreateNic() {
    $nic = new \ProfitBricks\Client\Model\Nic();
    $props = new \ProfitBricks\Client\Model\NicProperties();
    $props->setName("jclouds-nic")->setLan(1);
    $nic->setProperties($props);

    self::$testNic = self::$nic_api->create(self::$testDatacenter->getId(), self::$testServer->getId(), $nic);
  
    $this->waitTillProvisioned(self::$testNic->getRequestId());

    $this->assertEquals(self::$testNic->getProperties()->getName(), "jclouds-nic");
  }

  public function testCreateFirewallRule() {
    $rule = new \ProfitBricks\Client\Model\FirewallRule();
    $props = new \ProfitBricks\Client\Model\FirewallruleProperties();
    $props->setName("jclouds-firewall")->setProtocol("TCP")->setPortRangeStart(1)->setPortRangeEnd(600);
    $rule->setProperties($props);

    self::$testRule = self::$firewall_api->create(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId(), $rule);
  
    $this->waitTillProvisioned(self::$testRule->getRequestId());

    $result = self::assertPredicate(function() {
      $rule = self::$firewall_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId(), self::$testRule->getId());
      if ($rule->getMetadata()->getState() == 'AVAILABLE') {
        return $rule;
      }
    });

    $this->assertEquals($result->getProperties()->getName(), "jclouds-firewall");
  }

  public function testGet() {
    $rule = self::$firewall_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId(), self::$testRule->getId());
    $this->assertEquals($rule->getId(), self::$testRule->getId());
  }

  public function testList() {
    $rules = self::$firewall_api->findAll(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId());
    $this->assertNotEmpty($rules);
    $this->assertNotEmpty($rules->getItems());
    $rule = $this->find($rules->getItems(), 
      function($i) { return $i->getId() == self::$testRule->getId(); }
      );
    $this->assertTrue(!empty($rule));
  }

  public function testUpdate() {
    $rule = new \ProfitBricks\Client\Model\FirewallRule();
    $props = new \ProfitBricks\Client\Model\FirewallruleProperties();
    $props->setName("new-name");
    $rule->setProperties($props);
  
    $updateResponse=self::$firewall_api->partialUpdate(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId(), self::$testRule->getId(), $props);
    $this->waitTillProvisioned($updateResponse->getRequestId());

    self::assertDatacenterAvailable(self::$testDatacenter->getId());

    $updatedRule = self::$firewall_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId(), self::$testRule->getId());
    $this->assertEquals($updatedRule->getProperties()->getName(), "new-name");
  }

  public function testRemove() {
    self::$firewall_api->delete(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId(), self::$testRule->getId());
    $this->assertTrue(
      self::assertPredicate(
        function () { self::$firewall_api->findById(self::$testDatacenter->getId(), self::$testServer->getId(), self::$testNic->getId(), self::$testRule->getId()); }, null, true
      )
    );
    self::$testRule = null;
  }

  public static function tearDownAfterClass() {
    self::removeDatacenter();
  }
}

?>
