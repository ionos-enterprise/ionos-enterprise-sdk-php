<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');

class SnapshotApiTest extends BaseTest
{

  static $volume_api;
  static $snapshot_api;

  static $testVolume;
  static $testSnapshot;

  private static $badId  = '00000000-0000-0000-0000-000000000000';

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::spawnDatacenter();
    self::$volume_api = new ProfitBricks\Client\Api\VolumeApi(self::$api_client);
    self::$snapshot_api = new ProfitBricks\Client\Api\SnapshotApi(self::$api_client);
  }

  public function testCreateVolume() {
    $testImage = self::getTestImage('HDD');

    $volume = new ProfitBricks\Client\Model\Volume();
    $props = new \ProfitBricks\Client\Model\VolumeProperties();
    $props->setName("PHP SDK Test")
      ->setSize(3)
      ->setType('HDD')
      ->setImage($testImage->getId())
      ->setImagePassword("testpassword123")
      ->setSshKeys(array("hQGOEJeFL91EG3+l9TtRbWNjzhDVHeLuL3NWee6bekA="));
    $volume->setProperties($props);

    self::$testVolume = self::$volume_api->create(self::$testDatacenter->getId(), $volume);
  
    $this->waitTillProvisioned(self::$testVolume->getRequestId());
    $testVolume = self::$volume_api->findById(self::$testDatacenter->getId(), self::$testVolume->getId());
    $this->assertEquals($testVolume->getProperties()->getName(), "PHP SDK Test");
  }

  public function testCreateSnapshot() {
    self::$testSnapshot = self::$volume_api->createSnapshot(self::$testDatacenter->getId(), self::$testVolume->getId());
    $this->waitTillProvisioned(self::$testSnapshot->getRequestId());
    $snapshot = self::$snapshot_api->findById(self::$testSnapshot->getId());
   
    $this->assertNotEmpty($snapshot);
  }

  public function testRestoreSnapshot() {
    self::$volume_api->restoreSnapshot(self::$testDatacenter->getId(), self::$testVolume->getId(), self::$testSnapshot->getId());
    $this->assertTrue(
      self::assertPredicate(function() {
        $volume = self::$volume_api->findById(self::$testDatacenter->getId(), self::$testVolume->getId());
        return $volume->getMetadata()->getState() == 'AVAILABLE';
      })
    );
    $this->assertTrue(
      self::assertPredicate(function() {
        $snapshot = self::$snapshot_api->findById(self::$testSnapshot->getId());
        return $snapshot->getMetadata()->getState() == 'AVAILABLE';
      })
    );
  }

  public function testCreateSnapshotFailure() {
    
    try {
      self::$testSnapshot = self::$volume_api->createSnapshot(self::$testDatacenter->getId(), self::$testVolume->getId());
    } catch (ProfitBricks\Client\ApiException $e) {
      $this->assertEquals($e->getCode(), 422);
    }
  }

  public function testGet() {
    //wait for a little bit to make sure it's ready
    sleep(15);
    $snapshot = self::$snapshot_api->findById(self::$testSnapshot->getId());
    $this->assertEquals(self::$testSnapshot->getId(), $snapshot->getId());
  }

  public function testGetFailure() {
    try {
      $snapshot = self::$snapshot_api->findById(self::$badId);
    } catch (ProfitBricks\Client\ApiException $e) {
      $this->assertEquals($e->getCode(), 404);
    }
  }

  public function testList() {
    $snapshots = self::$snapshot_api->findAll();
    $this->assertNotEmpty($snapshots);
    $this->assertNotEmpty($snapshots->getItems());
    $volume = $this->find($snapshots->getItems(), 
      function($i) { return $i->getId() == self::$testSnapshot->getId(); }
      );
    $this->assertTrue(!empty($volume));
  }

  public function testUpdate() {
    $props = new \ProfitBricks\Client\Model\SnapshotProperties();
    $props->setName("PHP SDK Test - RENAME");

    $updateResponse=self::$snapshot_api->partialUpdate(self::$testSnapshot->getId(), $props);
  
    $this->waitTillProvisioned($updateResponse->getRequestId());

    $updatedSnapshot = self::$snapshot_api->findById(self::$testSnapshot->getId());

    $this->assertEquals($updatedSnapshot->getProperties()->getName(), "PHP SDK Test - RENAME");
  }

  public function testRemove() {
    self::$volume_api->delete(self::$testDatacenter->getId(), self::$testVolume->getId());
    $this->assertTrue(
      self::assertPredicate(
        function () { self::$volume_api->findById(self::$testDatacenter->getId(), self::$testVolume->getId()); }, null, true
      )
    );
    self::$testVolume = null;
  }

  public static function tearDownAfterClass() {
    self::removeDatacenter();
    if (isset(self::$testSnapshot)) {
      self::$snapshot_api->delete(self::$testSnapshot->getId());
    }
  }
}

?>
