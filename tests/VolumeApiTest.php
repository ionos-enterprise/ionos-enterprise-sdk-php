<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class VolumeApiTest extends BaseTest
{

  static $volume_api;
  static $snapshot_api;

  static $testVolume;
  static $testSnapshot;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::spawnDatacenter();
    self::$volume_api = new ProfitBricks\Client\Api\VolumeApi(self::$api_client);
    self::$snapshot_api = new ProfitBricks\Client\Api\SnapshotApi(self::$api_client);
  }

  public function testCreate() {
    $testImage = self::getTestImage('HDD');

    $volume = new ProfitBricks\Client\Model\Volume();
    $props = new \ProfitBricks\Client\Model\VolumeProperties();
    $props->setName("test-volume")
      ->setSize(3)
      ->setType('HDD')
      ->setImage($testImage->getId())
      ->setImagePassword("testpassword123")
      ->setSshKeys(array("hQGOEJeFL91EG3+l9TtRbWNjzhDVHeLuL3NWee6bekA="));
    $volume->setProperties($props);

    self::$testVolume = self::$volume_api->create(self::$testDatacenter->getId(), $volume);

    $testVolume = self::assertPredicate(function() {
      return self::$volume_api->findById(self::$testDatacenter->getId(), self::$testVolume->getId());
    });

    $this->assertEquals($testVolume->getProperties()->getName(), "test-volume");
  }
  
  public function testCreateFailure()  {
    try {
      $testImage = self::getTestImage('HDD');
      $volume = new ProfitBricks\Client\Model\Volume();
      $props = new \ProfitBricks\Client\Model\VolumeProperties();
      $props->setName("test-volume")
          ->setSize(3)
          ->setType('HDD')
          ->setImagePassword("testpassword123");
      $volume->setProperties($props);
      
      self::$testVolume = self::$volume_api->create(self::$testDatacenter->getId(), $volume);
      
      $testVolume = self::assertPredicate(function () {
        return self::$volume_api->findById(self::$testDatacenter->getId(), self::$testVolume->getId());
      });
      
    } catch (ProfitBricks\Client\ApiException $e) {
      $this->assertEquals($e->getCode(), 422);
    }
  }

  public function testGet() {
    $volume = self::$volume_api->findById(self::$testDatacenter->getId(), self::$testVolume->getId());
    $this->assertEquals(self::$testVolume->getId(), $volume->getId());
  }

  public function testList() {
    $volumes = self::$volume_api->findAll(self::$testDatacenter->getId());
    $this->assertNotEmpty($volumes);
    $this->assertNotEmpty($volumes->getItems());
    $volume = $this->find($volumes->getItems(), 
      function($i) { return $i->getId() == self::$testVolume->getId(); }
      );
    $this->assertTrue(!empty($volume));
  }

  public function testUpdate() {
    $props = new \ProfitBricks\Client\Model\VolumeProperties();
    $props->setName("new-name")->setSize(3);

    self::$volume_api->partialUpdate(self::$testDatacenter->getId(), self::$testVolume->getId(), $props);

    self::assertPredicate(function() {
      $volume = self::$volume_api->findById(self::$testDatacenter->getId(), self::$testVolume->getId());
      if ($volume->getMetadata()->getState() == 'AVAILABLE') {
        return $volume;
      }
    });

    self::assertDatacenterAvailable(self::$testDatacenter->getId());

    $updatedVolume = self::$volume_api->findById(self::$testDatacenter->getId(), self::$testVolume->getId());

    $this->assertEquals($updatedVolume->getProperties()->getName(), "new-name");
  }

  public function testCreateSnapshot() {
    self::$testSnapshot = self::$volume_api->createSnapshot(self::$testDatacenter->getId(), self::$testVolume->getId());
    $snapshot = self::assertPredicate(function () { 
      return self::$snapshot_api->findById(self::$testSnapshot->getId());
    });
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
