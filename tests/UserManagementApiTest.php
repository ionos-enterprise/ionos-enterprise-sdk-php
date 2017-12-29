<?php

require_once('autoload.php');
require_once('tests/BaseTest.php');


class UserManagementApiTest extends BaseTest
{
    static $datacenter_api;
    static $ipblocks_api;
    static $volume_api;
    static $snapshot_api;
    static $user_management_api;
    static $image_api;

    static $testDatacenter;
    static $testImage;
    static $testVolume;
    static $testGroup;
    static $testShare;
    static $testUser;
    static $testSnapshot;
    static $testIPBlock;
    private static $badId  = '00000000-0000-0000-0000-000000000000';

    public static function setUpBeforeClass() {
      parent::setUpBeforeClass();
      // self::spawnDatacenter();
      self::$datacenter_api = new ProfitBricks\Client\Api\DataCenterApi(self::$api_client);
      self::$ipblocks_api = new ProfitBricks\Client\Api\IPBlocksApi(self::$api_client);
      self::$volume_api = new ProfitBricks\Client\Api\VolumeApi(self::$api_client);
      self::$snapshot_api = new ProfitBricks\Client\Api\SnapshotApi(self::$api_client);
      self::$user_management_api = new ProfitBricks\Client\Api\UserManagementApi(self::$api_client);
      self::$image_api = new ProfitBricks\Client\Api\ImageApi(self::$api_client);

      //Create a datacenter resource
      $datacenter = new \ProfitBricks\Client\Model\Datacenter();      
      $props = new \ProfitBricks\Client\Model\DatacenterProperties();
      $props->setName("PHP SDK Test");
      $props->setDescription("PHP SDK Test description");
      $props->setLocation(self::$test_location);      
      $datacenter->setProperties($props);  
      self::$testDatacenter = self::$datacenter_api->create($datacenter);

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

    public function testCreateIpBlock() {
      $block = new \ProfitBricks\Client\Model\IpBlock();
      $props = new \ProfitBricks\Client\Model\IpBlockProperties();
      $props->setSize(2)->setLocation("us/las");
      $block->setProperties($props);
  
      self::$testIPBlock = self::$ipblocks_api->create($block);
  
      
    $result = self::assertPredicate(function() {
      $block = self::$ipblocks_api->findById(self::$testIPBlock->getId());
      if ($block->getMetadata()->getState() == 'AVAILABLE') {
        return $block;
      }
    });
  
      $this->assertEquals($result->getProperties()->getSize(), 2);
    }

    public function testGroupCreateFailure() {
      $group = new \ProfitBricks\Client\Model\GroupItem();
      
      $props = new \ProfitBricks\Client\Model\GroupItemProperty();
      $props->setCreateDataCenter(true);
      
      $group->setProperties($props);
  
      try{
        $group = self::$user_management_api->createGroup($group);
      } catch (ProfitBricks\Client\ApiException $e) {
        $this->assertEquals($e->getCode(), 422);
      }
    }

    public function testGroupCreate() {
      $group = new \ProfitBricks\Client\Model\GroupItem();
      
      $props = new \ProfitBricks\Client\Model\GroupItemProperty();
      $props->setName("PHP SDK Test");
      
      $group->setProperties($props);
      self::$testGroup = self::$user_management_api->createGroupWithHttpInfo($group)[0];
      
      $this->assertEquals($group->getProperties()->getName(), self::$testGroup->getProperties()->getName());
    }

    public function testGroupList() {
      $groups = self::$user_management_api->findAllGroups();
      $this->assertNotEmpty($groups);
      $this->assertNotEmpty($groups->getItems());
      $group = $this->find($groups->getItems(),
        function($i) { return $i->getId() == self::$testGroup->getId(); }
        );
      $this->assertTrue(!empty($group));
    }

    public function testGroupGet() {
      $group = self::$user_management_api->findGroupById(self::$testGroup->getId());
      $this->assertEquals($group->getId(), self::$testGroup->getId());
    }

    public function testGroupUpdate() {
      $group = new \ProfitBricks\Client\Model\GroupItem();
      
      $props = new \ProfitBricks\Client\Model\GroupItemProperty();
      $props->setName("PHP SDK Test - RENAME");
      $props->setCreateDataCenter(false);
      
      $group->setProperties($props);
      $updateGroup = self::$user_management_api->updateGroupWithHttpInfo(self::$testGroup->getId(), $group)[0];
      $this->assertEquals($updateGroup->getProperties()->getName(), $group->getProperties()->getName());
      $this->assertEquals($updateGroup->getProperties()->getCreateDataCenter(), $group->getProperties()->getCreateDataCenter());
    }
    
    public function testGetGroupFailure()  {
      try {
        $datacenter = self::$user_management_api->findGroupById(self::$badId);
      } catch (ProfitBricks\Client\ApiException $e) {
        $this->assertEquals($e->getCode(), 404);
      }
    }

    public function testShareCreate() {
      $share = new \ProfitBricks\Client\Model\Share();
      
      $props = new \ProfitBricks\Client\Model\ShareProperties();
      $props->setEditPrivilege(true)->setSharePrivilege(true);
            
      $share->setProperties($props);
      self::$testShare = self::$user_management_api->addShareWithHttpInfo(self::$testGroup->getId(), self::$testDatacenter->getId(), $share)[0];
      
      $this->assertEquals($share->getProperties()->getEditPrivilege(), self::$testShare->getProperties()->getEditPrivilege());
      $this->assertEquals($share->getProperties()->getSharePrivilege(), self::$testShare->getProperties()->getSharePrivilege());
    }

    public function testShareCreateFailure() {
      $share = new \ProfitBricks\Client\Model\Share();
      
      $props = new \ProfitBricks\Client\Model\ShareProperties();
      $props->setEditPrivilege(true)->setSharePrivilege(true);
            
      $share->setProperties($props);
      try{
        $share = self::$user_management_api->addShareWithHttpInfo(self::$testGroup->getId(), self::$badId, $share)[0];
      } catch (ProfitBricks\Client\ApiException $e) {
        $this->assertEquals($e->getCode(), 404);
      }
    }

    public function testShareList() {
      $groupId = self::$testGroup->getId();
      $shares = self::$user_management_api->findAllShares($groupId);
      $this->assertNotEmpty($shares);
      $this->assertNotEmpty($shares->getItems());
      $share = $this->find($shares->getItems(),
        function($i) { return $i->getId() == self::$testShare->getId(); }
        );
      $this->assertTrue(!empty($share));
    }

    public function testShareGet() {
      $group = self::$user_management_api->findShareById(self::$testGroup->getId(), self::$testDatacenter->getId());
      $this->assertEquals($group->getId(), self::$testShare->getId());
    }

    public function testGetShareFailure()  {
      try {
        $datacenter = self::$user_management_api->findShareById(self::$testGroup->getId(), self::$badId);
      } catch (ProfitBricks\Client\ApiException $e) {
        $this->assertEquals($e->getCode(), 404);
      }
    }

    public function testShareUpdate() {
      $share = new \ProfitBricks\Client\Model\Share();
      
      $props = new \ProfitBricks\Client\Model\ShareProperties();
      $props->setEditPrivilege(false)->setSharePrivilege(true);
            
      $share->setProperties($props);
      self::$testShare = self::$user_management_api->updateShareWithHttpInfo(self::$testGroup->getId(), self::$testDatacenter->getId(), $share)[0];
      
      $this->assertEquals($share->getProperties()->getEditPrivilege(), self::$testShare->getProperties()->getEditPrivilege());
      $this->assertEquals($share->getProperties()->getSharePrivilege(), self::$testShare->getProperties()->getSharePrivilege());
    }

    public function testUserCreate() {
      $user = new \ProfitBricks\Client\Model\User();
     
      $props = new \ProfitBricks\Client\Model\UserProperties();
      $props->setFirstname("John");
      $props->setLastname("Doe");
      $props->setEmail("no-reply".time() ."@example.com");
      $props->setAdministrator(true);
      $props->setPassword("secretpassword123");
      $props->setForceSecAuth(false);
           
      $user->setProperties($props);
     
      self::$testUser = self::$user_management_api->createUserWithHttpInfo($user)[0];
    
      $this->assertEquals($user->getProperties()->getFirstname(), self::$testUser->getProperties()->getFirstname());
      $this->assertEquals($user->getProperties()->getLastname(), self::$testUser->getProperties()->getLastname());
      $this->assertEquals($user->getProperties()->getEmail(), self::$testUser->getProperties()->getEmail());
      $this->assertEquals($user->getProperties()->getAdministrator(), self::$testUser->getProperties()->getAdministrator());
      $this->assertEquals($user->getProperties()->getForceSecAuth(), self::$testUser->getProperties()->getForceSecAuth());
    }

    public function testUserCreateFailure() {
      $user = new \ProfitBricks\Client\Model\User();
     
      $props = new \ProfitBricks\Client\Model\UserProperties();
      $props->setFirstname("John");
      $props->setLastname("Doe");    
      $props->setAdministrator(true);
      $props->setPassword("secretpassword123");
      $props->setForceSecAuth(false);
           
      $user->setProperties($props);
     
      try {
        self::$testUser = self::$user_management_api->createUserWithHttpInfo($user)[0];
      } catch (ProfitBricks\Client\ApiException $e) {
        $this->assertEquals($e->getCode(), 422);
      }
    }

    public function testUserList() {
      $users = self::$user_management_api->findAllUsers();
      $this->assertNotEmpty($users);
      $this->assertNotEmpty($users->getItems());
      $user = $this->find($users->getItems(),
        function($i) { return $i->getId() == self::$testUser->getId(); }
        );
      $this->assertTrue(!empty($user));
    }

    public function testUserGet() {
      $user = self::$user_management_api->findUserById(self::$testUser->getId());
      $this->assertEquals($user->getId(), self::$testUser->getId());
    }

    public function testUserGetFailure() {
     try {
        $user = self::$user_management_api->findUserById(self::$badId);
      } catch (ProfitBricks\Client\ApiException $e) {
        $this->assertEquals($e->getCode(), 404);
      }
    }

    public function testUserUpdate() {
      $user = new \ProfitBricks\Client\Model\User();
     
      $props = new \ProfitBricks\Client\Model\UserProperties();
      $props->setFirstname("John");
      $props->setLastname("Doe");
      $props->setEmail("no-reply".time() ."@example.com");
      $props->setAdministrator(false);
      $props->setForceSecAuth(false);
           
      $user->setProperties($props);
     
      self::$testUser = self::$user_management_api->updateUserWithHttpInfo(self::$testUser->getId(), $user)[0];
    
      $this->assertEquals($user->getProperties()->getFirstname(), self::$testUser->getProperties()->getFirstname());
      $this->assertEquals($user->getProperties()->getLastname(), self::$testUser->getProperties()->getLastname());
      $this->assertEquals($user->getProperties()->getEmail(), self::$testUser->getProperties()->getEmail());
      $this->assertEquals($user->getProperties()->getAdministrator(), self::$testUser->getProperties()->getAdministrator());
      $this->assertEquals($user->getProperties()->getForceSecAuth(), self::$testUser->getProperties()->getForceSecAuth());
    }

    public function testAddUserToGroup() {
    
      $result = self::$user_management_api->addUserToGroupWithHttpInfo(self::$testGroup->getId(), self::$testUser->getId());
      $this->assertEquals($result[1],202);
    }

    public function testUsersInGroupList() {
      $groupId = self::$testGroup->getId();
      $users = self::$user_management_api->findUsersInGroupWithHttpInfo($groupId);
      $this->assertNotEmpty($users);
      $this->assertNotEmpty($users[0]->getItems());      
    }

    public function testRemoveUserFromGroup() {
      
        $result = self::$user_management_api->removeUserFromGroupWithHttpInfo(self::$testGroup->getId(), self::$testUser->getId());
        $this->assertEquals($result[1],202);
    }

    public function testListResources(){
      $resources = self::$user_management_api->findAllGroups();
      $this->assertGreaterThan(0,count($resources->getItems()));
    }

    public function testListResourcesFailure(){
      try {
        $resources = self::$user_management_api->findAllResourcesByType('unknown');
      } catch (ProfitBricks\Client\ApiException $e) {
        $this->assertEquals($e->getCode(), 404);
      }
    }

    public function testGetResourceFailure(){
      try {
        $resource = self::$user_management_api->findResourceById("datacenter", self::$badId);
      } catch (ProfitBricks\Client\ApiException $e) {
        $this->assertEquals($e->getCode(), 404);
      }
    }

    public function testListDatacenterResources(){
      $resources = self::$user_management_api->findAllResourcesByType("datacenter");
      $this->assertGreaterThan(0,count($resources->getItems()));
    }

    public function testGetDatacenterResources(){
      $resource = self::$user_management_api->findResourceById("datacenter", self::$testDatacenter->getId());
      $this->assertEquals($resource->getType(),"datacenter");
    }

    //Unable to test in production at the moment. Images must be uploaded
    // public function testListImageResources(){
    //   $resources = self::$user_management_api->findAllResourcesByType("image");
    //   $this->assertGreaterThan(0,count($resources->getItems()));
    // }
    //Unable to test in production at the moment. Images must be uploaded
    // public function testGetImageResources(){
    //   $resource = self::$user_management_api->findResourceById("image", self::$testImage->getId());
    //   $this->assertEquals($resource->getType(),"image");
    // }

    public function testListIPBlockResources(){
      $resources = self::$user_management_api->findAllResourcesByType("ipblock");
      $this->assertGreaterThan(0,count($resources->getItems()));
    }

    public function testGetIPBlockResources(){
      $resource = self::$user_management_api->findResourceById("ipblock", self::$testIPBlock->getId());
      $this->assertEquals($resource->getType(),"ipblock");
    }

    public function testListSnapshotResources(){
      $resources = self::$user_management_api->findAllResourcesByType("snapshot");
      $this->assertGreaterThan(0,count($resources->getItems()));
    }

    public function testGetSnapshotResources(){
      $resource = self::$user_management_api->findResourceById("snapshot", self::$testSnapshot->getId());
      $this->assertEquals($resource->getType(),"snapshot");
    }

    //the remove tests are the last

    public function testUserRemove() {
      $id = self::$testUser->getId();
      self::$user_management_api->deleteUser($id);
      $this->assertTrue(
        self::assertPredicate(
          function($id) { self::$user_management_api->findUserById($id); },
          array($id), true
          )
        );
      self::$testUser = null;
    }

    public function testShareRemove() {
      $id = self::$testGroup->getId();
      $resourceId = self::$testDatacenter->getId();
      self::$user_management_api->deleteShare($id, $resourceId);
      $this->assertTrue(
        self::assertPredicate(
          function($id, $resourceId) { self::$user_management_api->findShareById($id, $resourceId); },
          array($id,$resourceId), true
          )
        );
      self::$testShare = null;
    }

    public function testGroupRemove() {
      $id = self::$testGroup->getId();
      self::$user_management_api->deleteGroup($id);
      $this->assertTrue(
        self::assertPredicate(
          function($id) { self::$user_management_api->findGroupById($id); },
          array($id), true
          )
        );
      self::$testGroup = null;
    }

    public static function tearDownAfterClass() {        
      
      if (!empty(self::$testDatacenter)) {
        self::$datacenter_api->delete(self::$testDatacenter->getId());
      }
      
      if (!empty(self::$testIPBlock)) {
          self::$ipblocks_api->delete(self::$testIPBlock->getId());
      }

      if (isset(self::$testSnapshot)) {
        self::$snapshot_api->delete(self::$testSnapshot->getId());
      }

      if (!empty(self::$testGroup)) {
        self::$user_management_api->deleteGroup(self::$testGroup->getId());
      }
                
    }
  }    
?>