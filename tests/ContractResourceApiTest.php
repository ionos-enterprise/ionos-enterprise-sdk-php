<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class ContractResourceApiTest extends BaseTest
{
    static $contract_resource_api;

    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();
        self::$contract_resource_api = new ProfitBricks\Client\Api\ContractResourcesApi(self::$api_client);
    }

    public function testGetAllContractResources(){
        $resources = self::$contract_resource_api->findAll();
        $this->assertGreaterThan(0,count($resources));
    }

}
?>