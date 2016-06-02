# Swagger\Client\AttachedVolumesApi

All URIs are relative to *https://localhost*

Method | HTTP request | Description
------------- | ------------- | -------------
[**attachVolume**](AttachedVolumesApi.md#attachVolume) | **POST** /datacenters/{datacenterId}/servers/{serverId}/volumes | Attach a volume
[**delete**](AttachedVolumesApi.md#delete) | **DELETE** /datacenters/{datacenterId}/servers/{serverId}/volumes/{volumeId} | Detach a volume
[**findAll**](AttachedVolumesApi.md#findAll) | **GET** /datacenters/{datacenterId}/servers/{serverId}/volumes | List Attached Volumes
[**findById**](AttachedVolumesApi.md#findById) | **GET** /datacenters/{datacenterId}/servers/{serverId}/volumes/{volumeId} | Retrieve an attached volume


# **attachVolume**
> \Swagger\Client\Model\Volume attachVolume($datacenter_id, $server_id, $volume, $pretty_print_query_parameter, $depth)

Attach a volume

This will attach a pre-existing storage volume to the server. It is also possible to create and attach a volume in one step just by providing a new volume description as payload. 

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\AttachedVolumesApi();
$datacenter_id = "datacenter_id_example"; // string | 
$server_id = "server_id_example"; // string | 
$volume = new \Swagger\Client\Model\Volume(); // \Swagger\Client\Model\Volume | Volume to be attached (created and attached)
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->attachVolume($datacenter_id, $server_id, $volume, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AttachedVolumesApi->attachVolume: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **server_id** | **string**|  | 
 **volume** | [**\Swagger\Client\Model\Volume**](\Swagger\Client\Model\Volume.md)| Volume to be attached (created and attached) | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Volume**](Volume.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: application/json, application/vnd.profitbricks.resource+json
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **delete**
> object delete($datacenter_id, $server_id, $volume_id, $pretty_print_query_parameter, $depth)

Detach a volume

This will detach the volume from the server. This will not delete the volume from your datacenter. You will need to make a separate request to perform a deletion

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\AttachedVolumesApi();
$datacenter_id = "datacenter_id_example"; // string | 
$server_id = "server_id_example"; // string | 
$volume_id = array('key' => "volume_id_example"); // map[string,string] | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->delete($datacenter_id, $server_id, $volume_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AttachedVolumesApi->delete: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **server_id** | **string**|  | 
 **volume_id** | [**map[string,string]**](string.md)|  | 
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
> \Swagger\Client\Model\AttachedVolumes findAll($datacenter_id, $server_id, $pretty_print_query_parameter, $depth)

List Attached Volumes

You can retrieve a list of volumes attached to the server

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\AttachedVolumesApi();
$datacenter_id = "datacenter_id_example"; // string | 
$server_id = "server_id_example"; // string | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->findAll($datacenter_id, $server_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AttachedVolumesApi->findAll: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **server_id** | **string**|  | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\AttachedVolumes**](AttachedVolumes.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: */*
 - **Accept**: application/vnd.profitbricks.collection+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **findById**
> \Swagger\Client\Model\Volume findById($datacenter_id, $server_id, $volume_id, $pretty_print_query_parameter, $depth)

Retrieve an attached volume

This will retrieve the properties of an attached volume.

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\AttachedVolumesApi();
$datacenter_id = "datacenter_id_example"; // string | 
$server_id = "server_id_example"; // string | 
$volume_id = array('key' => "volume_id_example"); // map[string,string] | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->findById($datacenter_id, $server_id, $volume_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AttachedVolumesApi->findById: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **server_id** | **string**|  | 
 **volume_id** | [**map[string,string]**](string.md)|  | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Volume**](Volume.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: */*
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

