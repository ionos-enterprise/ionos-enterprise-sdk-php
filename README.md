# PHP SDK

The ProfitBricks Client Library for [PHP](https://secure.php.net/) provides you with access to the ProfitBricks REST API. It is designed for developers who are building applications in PHP.

This guide will walk you through getting setup with the library and performing various actions against the API.

# Table of Contents
* [Concepts](#concepts)
* [Getting Started](#getting-started)
* [Installation](#installation)
* [How to: Create Data Center](#how-to-create-data-center)
* [How to: Delete Data Center](#how-to-delete-data-center)
* [How to: Create Server](#how-to-create-server)
* [How to: List Available Images](#how-to-list-available-images)
* [How to: Create Storage Volume](#how-to-create-storage-volume)
* [How to: Update Cores and Memory](#how-to-update-cores-and-memory)
* [How to: Attach or Detach Storage Volume](#how-to-attach-or-detach-storage-volume)
* [How to: List Servers, Volumes, and Data Centers](#how-to-list-servers-volumes-and-data-centers)
* [Example](#example)
* [Return Types](#return-types)
* [Support](#support)


# Concepts

The PHP SDK wraps the latest version of the ProfitBricks REST API. All API operations are performed over SSL and authenticated using your ProfitBricks portal credentials. The API can be accessed within an instance running in ProfitBricks or directly over the Internet from any application that can send an HTTPS request and receive an HTTPS response.

# Getting Started

Before you begin you will need to have [signed-up](https://www.profitbricks.com/signup) for a ProfitBricks account. The credentials you setup during sign-up will be used to authenticate against the API.

Install the PHP language from: [PHP Installation](http://php.net/manual/en/install.php)

# Installation

You can install the latest stable version using Composer.  Simply add the snippet below to your `composer.json` file:

```
{
    "require": {
        "profitbricks/profitbricks-sdk-php": ">=1.0"
    }
}
```

Add your credentials for connecting to ProfitBricks:

```php
$config = (new Swagger\Client\Configuration())
  ->setHost('https://api.profitbricks.com/rest/v2')
  ->setUsername('pb_username')
  ->setPassword('pb_password');
$api = new Swagger\Client\ApiClient($config);
```

Set depth:

```php
$datacenter_api->findById($testDatacenter->getId(), false, 5);
```

Depth controls the amount of data returned from the REST server ( range 1-5 ). The larger the number the more information is returned from the server. This is especially useful if you are looking for the information in the nested objects.

**Caution**: You will want to ensure you follow security best practices when using credentials within your code or stored in a file.

# How To's

## How To: Create Data Center

ProfitBricks introduces the concept of Data Centers. These are logically separated from one another and allow you to have a self-contained environment for all servers, volumes, networking, snapshots, and so forth. The goal is to give you the same experience as you would have if you were running your own physical data center.

The following code example shows you how to programmatically create a data center:

```php
$datacenter = new \Swagger\Client\Model\Datacenter();

$props = new \Swagger\Client\Model\DatacenterProperties();
$props->setName("test-data-center");
$props->setDescription("example description");
$props->setLocation('us/lasdev');
$datacenter->setProperties($props);

$testDatacenter = $datacenter_api->create($datacenter);
```

## How To: Delete Data Center

You will want to exercise a bit of caution here. Removing a data center will destroy all objects contained within that data center -- servers, volumes, snapshots, and so on.

The code to remove a data center is as follows. This example assumes you want to remove previously data center:

```php
$id = $testDatacenter->getId();
$datacenter_api->delete($id);
```

## How To: Create Server

The server create method has a list of required parameters followed by a hash of optional parameters. The optional parameters are specified within the "options" hash and the variable names match the [REST API](https://devops.profitbricks.com/api/rest/) parameters.

The following example shows you how to create a new server in the data center created above:

```php
$server = new \Swagger\Client\Model\Server();
$props = new \Swagger\Client\Model\ServerProperties();
$props->setName("jclouds-node")->setCores(1)->setRam(1024);
$server->setProperties($props);

$testServer = $server_api->create($testDatacenter->getId(), $server);
```

## How To: List Available Images

A list of disk and ISO images are available from ProfitBricks for immediate use. These can be easily viewed and selected. The following shows you how to get a list of images. This list represents both CDROM images and HDD images.

```php
$images = $image_api->findAll();
```

This will return an [ArrayAccess interface](#ArrayAccess) object

## How To: Create Storage Volume

ProfitBricks allows for the creation of multiple storage volumes that can be attached and detached as needed. It is useful to attach an image when creating a storage volume. The storage size is in gigabytes.

```php
$volume = new Swagger\Client\Model\Volume();
$props = new \Swagger\Client\Model\VolumeProperties();
$props->setName("test-volume")->setSize(3)->setType('HDD')->setImage('image-id')->setImagePassword("testpassword123");
$volume->setProperties($props);

$testVolume = $volume_api->create($testDatacenter->getId(), $volume);
```

## How To: Update Cores and Memory

ProfitBricks allows users to dynamically update cores, memory, and disk independently of each other. This removes the restriction of needing to upgrade to the next size available size to receive an increase in memory. You can now simply increase the instances memory keeping your costs in-line with your resource needs.

Note: The memory parameter value must be a multiple of 256, e.g. 256, 512, 768, 1024, and so forth.

The following code illustrates how you can update cores and memory:

```php
$server = new \Swagger\Client\Model\Server();
$props = new \Swagger\Client\Model\ServerProperties();
$props->setName("new-name")->setCores(2)->setRam(2048);
$server->setProperties($props);

$server_api->partialUpdate($testDatacenter->getId(), $testServer->getId(), $props);
```

## How To: Attach or Detach Storage Volume

ProfitBricks allows for the creation of multiple storage volumes. You can detach and reattach these on the fly. This allows for various scenarios such as re-attaching a failed OS disk to another server for possible recovery or moving a volume to another location and spinning it up.

The following illustrates how you would attach and detach a volume and CDROM to/from a server:

```php
$volume = new Swagger\Client\Model\Volume();
$volume->setId('volume-id');
$attached_volume_api->attachVolume($testDatacenter->getId(), $testServer->getId(), $volume);

$image = new \Swagger\Client\Model\Image();
$image->setId('image-id');
$testCdrom = $attached_cdrom_api->create($testDatacenter->getId(), $testServer->getId(), $image);

$attached_volume_api->delete($testDatacenter->getId(), $testServer->getId(), $testVolume->getId());
$cdrom_api->delete($testDatacenter->getId(), $testServer->getId(), $testCdrom->getId());
```

## How To: List Servers, Volumes, and Data Centers

Go SDK provides standard functions for retrieving a list of volumes, servers, and datacenters.

The following code illustrates how to pull these three list types:

```php
$volumes = $volume_api->findAll($testDatacenter->getId());
$servers = $server_api->findAll($testDatacenter->getId());
$datacenters = $datacenter_api->findAll();
```

## Example

```php
$config = (new Swagger\Client\Configuration())
  ->setHost('https://api.profitbricks.com/rest/v2')
  ->setUsername('pb_username')
  ->setPassword('pb_password');
$api = new Swagger\Client\ApiClient($config);

$datacenter_api = new Swagger\Client\Api\DataCenterApi($api_client);

$datacenter = new \Swagger\Client\Model\Datacenter();

$props = new \Swagger\Client\Model\DatacenterProperties();
$props->setName("test-data-center");
$props->setDescription("example description");
$props->setLocation($test_location);
$datacenter->setProperties($props);

$testDatacenter = $datacenter_api->create($datacenter);

$server_api = new Swagger\Client\Api\ServerApi($api_client);

$server = new \Swagger\Client\Model\Server();
$props = new \Swagger\Client\Model\ServerProperties();
$props->setName("jclouds-node")->setCores(1)->setRam(1024);
$server->setProperties($props);

$testServer = $server_api->create($testDatacenter->getId(), $server);

$volume_api = new Swagger\Client\Api\VolumeApi($api_client);

$volume = new Swagger\Client\Model\Volume();
$props = new \Swagger\Client\Model\VolumeProperties();
$props->setName("test-volume")
  ->setSize(3)
  ->setType('HDD')
  ->setImage('image-id')
  ->setImagePassword("testpassword123")
  ->setSshKeys(array("hQGOEJeFL91EG3+l9TtRbWNjzhDVHeLuL3NWee6bekA="));
$volume->setProperties($props);

$testVolume = $volume_api->create($testDatacenter->getId(), $volume);

$server = new \Swagger\Client\Model\Server();
$props = new \Swagger\Client\Model\ServerProperties();
$props->setName("new-name")->setCores(2)->setRam(1024 * 2);
$server->setProperties($props);

$server_api->partialUpdate($testDatacenter->getId(), $testServer->getId(), $props);

$servers = $server_api->findAll($testDatacenter->getId());
$volumes = $volume_api->findAll($testDatacenter->getId());
$datacenters = $datacenter_api->findAll();

$server_api->delete($testDatacenter->getId(), $testServer->getId());
$datacenter_api->delete($id);
```

# Return Types

# Servers

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The resource&#39;s unique identifier | [optional] 
**type** | **string** | The type of object that has been created | [optional] 
**href** | **string** | URL to the object\u2019s representation (absolute path) | [optional] 
**items** | [**\Swagger\Client\Model\Server[]**](Server.md) | Array of items in that collection | [optional] 

# Server

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The resource&#39;s unique identifier | [optional] 
**type** | **string** | The type of object that has been created | [optional] 
**href** | **string** | URL to the object\u2019s representation (absolute path) | [optional] 
**metadata** | [**\Swagger\Client\Model\DatacenterElementMetadata**](DatacenterElementMetadata.md) | Backend managed resource metadata | [optional] 
**properties** | [**\Swagger\Client\Model\ServerProperties**](ServerProperties.md) | Resource&#39;s properties | 
**entities** | [**\Swagger\Client\Model\ServerEntities**](ServerEntities.md) | Attached children and references. May be included in create calls. Disallowed in update calls | [optional] 


## ArrayAccess interface
*   Interface to provide accessing objects as arrays.

```php
ArrayAccess {
  /* Methods */
  abstract public boolean offsetExists ( mixed $offset )
  abstract public mixed offsetGet ( mixed $offset )
  abstract public void offsetSet ( mixed $offset , mixed $value )
  abstract public void offsetUnset ( mixed $offset )
}
```

# Support
You are welcome to contact us with questions or comments at [ProfitBricks DevOps Central](https://devops.profitbricks.com/). Please report any issues via [GitHub's issue tracker](https://github.com/profitbricks/profitbricks-sdk-php/issues).