<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');

class SnapshotApiTest extends BaseTest
{

  static $volume_api;
  static $snapshot_api;

  static $testVolume;
  static $testSnapshot;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::spawnDatacenter();
    self::$volume_api = new Swagger\Client\Api\VolumeApi(self::$api_client);
    self::$snapshot_api = new Swagger\Client\Api\SnapshotApi(self::$api_client);
  }

  public function testCreateVolume() {
    $volume = new Swagger\Client\Model\Volume();
    $props = new \Swagger\Client\Model\VolumeProperties();
    $props->setName("test-volume")->setSize(3)->setType('HDD')->setLicenceType('LINUX');
    $volume->setProperties($props);

    self::$testVolume = self::$volume_api->create(self::$testDatacenter->getId(), $volume);

    $testVolume = self::assertPredicate(function() {
      $volume = self::$volume_api->findById(self::$testDatacenter->getId(), self::$testVolume->getId());
      if ($volume->getMetadata()->getState() == 'AVAILABLE') {
        return $volume;
      }
    });

    $this->assertEquals($testVolume->getProperties()->getName(), "test-volume");
  }

  public function testCreateSnapshot() {
    self::$testSnapshot = self::$volume_api->createSnapshot(self::$testDatacenter->getId(), self::$testVolume->getId());
    $snapshot = self::assertPredicate(function () { 
      $snapshot = self::$snapshot_api->findById(self::$testSnapshot->getId());
      if ($snapshot->getMetadata()->getState() == 'AVAILABLE') {
        return $snapshot;
      }
    });
    $this->assertNotEmpty($snapshot);
  }

  public function testGet() {
    $snapshot = self::$snapshot_api->findById(self::$testSnapshot->getId());
    $this->assertEquals(self::$testSnapshot->getId(), $snapshot->getId());
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
    $props = new \Swagger\Client\Model\SnapshotProperties();
    $props->setName("new-name");

    self::$snapshot_api->partialUpdate(self::$testSnapshot->getId(), $props);

    self::assertPredicate(function() {
      $snapshot = self::$snapshot_api->findById(self::$testSnapshot->getId());
      if ($snapshot->getMetadata()->getState() == 'AVAILABLE') {
        return $snapshot;
      }
    });

    $updatedSnapshot = self::$snapshot_api->findById(self::$testSnapshot->getId());

    $this->assertEquals($updatedSnapshot->getProperties()->getName(), "new-name");
  }

  public function testRemove() {
    self::$volume_api->delete(self::$testDatacenter->getId(), self::$testVolume->getId());
    $this->assertTrue(
      self::assertPredicate(
        function () { self::$volume_api->findById(self::$testDatacenter->getId(), self::$testVolume->getId()); }, null, true
      )
    );
    self::$testVolume = null;
    self::$snapshot_api->delete(self::$testSnapshot->getId());
    $this->assertTrue(
      self::assertPredicate(
        function () { self::$snapshot_api->findById(self::$testSnapshot->getId()); }, null, true
      )
    );
    self::$testSnapshot = null;
  }

  public static function tearDownAfterClass() {
    self::removeDatacenter();
    if (isset(self::$testSnapshot)) {
      self::$snapshot_api->delete(self::$testSnapshot->getId());
    }
  }
}

?>
