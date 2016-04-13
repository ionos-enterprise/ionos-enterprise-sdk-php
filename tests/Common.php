<?php

require_once('autoload.php');

trait CommonTestMethods {

  protected static $datacenter_api;
  protected static $testDatacenter;

  static function spawnDatacenter() {
    self::$datacenter_api = new Swagger\Client\Api\DataCenterApi(self::$api_client);

    $datacenter = new \Swagger\Client\Model\Datacenter();

    $props = new \Swagger\Client\Model\DatacenterProperties();
    $props->setName("test-data-center");
    $props->setDescription("example description");
    $props->setLocation(self::$test_location);
    
    $datacenter->setProperties($props);

    self::$testDatacenter = self::$datacenter_api->create($datacenter);
  }

  static function removeDatacenter() {
    if (!empty(self::$testDatacenter)) {
      self::$datacenter_api->delete(self::$testDatacenter->getId());
    }
  }

  static function assertPredicate($predicate, $params = null, $not_found_value = false) {
    if (!isset($params)) {
      $params = array();
    }

    $value = null;
    for ($i = 0; $i <= 300; $i++) {
      try {
        $value = $predicate(...$params);
      } catch (Swagger\Client\ApiException $e) {
        if ($e->getCode() == 404) {
          if ($not_found_value) {
            return $not_found_value;
          }
        } else {
          throw $e;
        }
      }
      if (!empty($value))
        return $value;
      sleep(3);
    }
  }

  static function assertDatacenterAvailable($datacenter_id) {
    return self::assertPredicate(
      function($datacenter_id) {
        $datacenter = self::$datacenter_api->findById(self::$testDatacenter->getId());
        if ($datacenter->getMetadata()->getState() == 'AVAILABLE') {
          return $datacenter;
        }
      },
      array($datacenter_id), false
    );
  }

  static function assertServerRunning($datacenter_id, $server_id) {
    return self::assertPredicate(
      function($datacenter_id, $server_id) {
        $server = self::$server_api->findById($datacenter_id, $server_id);
        if ($server->getProperties()->getVmState() == 'RUNNING') {
          return $server;
        }
      },
      array($datacenter_id, $server_id), false
    );
  }

  static function getTestImage($type) {
    $image_api = new Swagger\Client\Api\ImageApi(self::$api_client);
    $images = $image_api->findAll(null, 5);
    $minImage = null;

    foreach ($images->getItems() as $image) {
      if (
        $image->getMetadata()->getState() == 'AVAILABLE' &&
        $image->getProperties()->getPublic() &&
        $image->getProperties()->getImageType() == $type &&
        $image->getProperties()->getLocation() == self::$test_location &&
        $image->getProperties()->getLicenceType() == 'LINUX' &&
        ($minImage == null || $minImage->getProperties()->getSize() > $image->getProperties()->getSize())
        ) {
        $minImage = $image;
      }
    }

    return $minImage;
  }

}

?>