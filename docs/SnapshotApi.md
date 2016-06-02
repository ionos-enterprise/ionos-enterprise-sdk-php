# Swagger\Client\SnapshotApi

All URIs are relative to *https://localhost*

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](SnapshotApi.md#delete) | **DELETE** /snapshots/{snapshotId} | Delete a Snapshot
[**findAll**](SnapshotApi.md#findAll) | **GET** /snapshots | List Snapshots 
[**findById**](SnapshotApi.md#findById) | **GET** /snapshots/{snapshotId} | Retrieve a Snapshot
[**partialUpdate**](SnapshotApi.md#partialUpdate) | **PATCH** /snapshots/{snapshotId} | Partially modify a Snapshot
[**update**](SnapshotApi.md#update) | **PUT** /snapshots/{snapshotId} | Modify a Snapshot


# **delete**
> object delete($snapshot_id, $pretty_print_query_parameter, $depth)

Delete a Snapshot

Deletes the specified Snapshot.

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\SnapshotApi();
$snapshot_id = array('key' => "snapshot_id_example"); // map[string,string] | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->delete($snapshot_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotApi->delete: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **snapshot_id** | [**map[string,string]**](string.md)|  | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

**object**

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: */*
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **findAll**
> \Swagger\Client\Model\Snapshots findAll($pretty_print_query_parameter, $depth)

List Snapshots 

Retrieve a list of snapshots within the datacenter

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\SnapshotApi();
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->findAll($pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotApi->findAll: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Snapshots**](Snapshots.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: */*
 - **Accept**: application/vnd.profitbricks.collection+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **findById**
> \Swagger\Client\Model\Snapshot findById($snapshot_id, $pretty_print_query_parameter, $depth)

Retrieve a Snapshot

Retrieves the attributes of a given Snapshot.

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\SnapshotApi();
$snapshot_id = array('key' => "snapshot_id_example"); // map[string,string] | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->findById($snapshot_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotApi->findById: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **snapshot_id** | [**map[string,string]**](string.md)|  | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Snapshot**](Snapshot.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: */*
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **partialUpdate**
> \Swagger\Client\Model\Snapshot partialUpdate($snapshot_id, $snapshot, $pretty_print_query_parameter, $depth)

Partially modify a Snapshot

You can use update attributes of a resource

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\SnapshotApi();
$snapshot_id = array('key' => "snapshot_id_example"); // map[string,string] | 
$snapshot = new \Swagger\Client\Model\SnapshotProperties(); // \Swagger\Client\Model\SnapshotProperties | Modified Snapshot
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->partialUpdate($snapshot_id, $snapshot, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotApi->partialUpdate: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **snapshot_id** | [**map[string,string]**](string.md)|  | 
 **snapshot** | [**\Swagger\Client\Model\SnapshotProperties**](\Swagger\Client\Model\SnapshotProperties.md)| Modified Snapshot | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Snapshot**](Snapshot.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: application/vnd.profitbricks.partial-properties+json, application/json
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **update**
> \Swagger\Client\Model\Snapshot update($snapshot_id, $snapshot, $pretty_print_query_parameter, $depth)

Modify a Snapshot

You can use update attributes of a resource

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\SnapshotApi();
$snapshot_id = array('key' => "snapshot_id_example"); // map[string,string] | 
$snapshot = new \Swagger\Client\Model\Snapshot(); // \Swagger\Client\Model\Snapshot | Modified Snapshot
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->update($snapshot_id, $snapshot, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotApi->update: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **snapshot_id** | [**map[string,string]**](string.md)|  | 
 **snapshot** | [**\Swagger\Client\Model\Snapshot**](\Swagger\Client\Model\Snapshot.md)| Modified Snapshot | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Snapshot**](Snapshot.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: application/json, application/vnd.profitbricks.resource+json
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

