# Swagger\Client\NetworkInterfacesApi

All URIs are relative to *https://localhost*

Method | HTTP request | Description
------------- | ------------- | -------------
[**create**](NetworkInterfacesApi.md#create) | **POST** /datacenters/{datacenterId}/servers/{serverId}/nics | Create a Nic
[**delete**](NetworkInterfacesApi.md#delete) | **DELETE** /datacenters/{datacenterId}/servers/{serverId}/nics/{nicId} | Delete a Nic
[**findAll**](NetworkInterfacesApi.md#findAll) | **GET** /datacenters/{datacenterId}/servers/{serverId}/nics | List Nics 
[**findById**](NetworkInterfacesApi.md#findById) | **GET** /datacenters/{datacenterId}/servers/{serverId}/nics/{nicId} | Retrieve a Nic
[**partialUpdate**](NetworkInterfacesApi.md#partialUpdate) | **PATCH** /datacenters/{datacenterId}/servers/{serverId}/nics/{nicId} | Partially modify a Nic
[**update**](NetworkInterfacesApi.md#update) | **PUT** /datacenters/{datacenterId}/servers/{serverId}/nics/{nicId} | Modify a Nic


# **create**
> \Swagger\Client\Model\Nic create($datacenter_id, $server_id, $nic, $pretty_print_query_parameter, $depth)

Create a Nic

Adds a NIC to the target server

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\NetworkInterfacesApi();
$datacenter_id = "datacenter_id_example"; // string | 
$server_id = "server_id_example"; // string | 
$nic = new \Swagger\Client\Model\Nic(); // \Swagger\Client\Model\Nic | Nic to be created
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->create($datacenter_id, $server_id, $nic, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkInterfacesApi->create: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **server_id** | **string**|  | 
 **nic** | [**\Swagger\Client\Model\Nic**](\Swagger\Client\Model\Nic.md)| Nic to be created | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Nic**](Nic.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: application/json, application/vnd.profitbricks.resource+json
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **delete**
> object delete($datacenter_id, $server_id, $nic_id, $pretty_print_query_parameter, $depth)

Delete a Nic

Deletes the specified NIC.

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\NetworkInterfacesApi();
$datacenter_id = "datacenter_id_example"; // string | 
$server_id = "server_id_example"; // string | 
$nic_id = array('key' => "nic_id_example"); // map[string,string] | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->delete($datacenter_id, $server_id, $nic_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkInterfacesApi->delete: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **server_id** | **string**|  | 
 **nic_id** | [**map[string,string]**](string.md)|  | 
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
> \Swagger\Client\Model\Nics findAll($datacenter_id, $server_id, $pretty_print_query_parameter, $depth)

List Nics 

Retrieves a list of NICs.

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\NetworkInterfacesApi();
$datacenter_id = "datacenter_id_example"; // string | 
$server_id = "server_id_example"; // string | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->findAll($datacenter_id, $server_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkInterfacesApi->findAll: ', $e->getMessage(), "\n";
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

[**\Swagger\Client\Model\Nics**](Nics.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: */*
 - **Accept**: application/vnd.profitbricks.collection+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **findById**
> \Swagger\Client\Model\Nic findById($datacenter_id, $server_id, $nic_id, $pretty_print_query_parameter, $depth)

Retrieve a Nic

Retrieves the attributes of a given NIC

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\NetworkInterfacesApi();
$datacenter_id = "datacenter_id_example"; // string | 
$server_id = "server_id_example"; // string | 
$nic_id = array('key' => "nic_id_example"); // map[string,string] | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->findById($datacenter_id, $server_id, $nic_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkInterfacesApi->findById: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **server_id** | **string**|  | 
 **nic_id** | [**map[string,string]**](string.md)|  | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Nic**](Nic.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: */*
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **partialUpdate**
> \Swagger\Client\Model\Nic partialUpdate($datacenter_id, $server_id, $nic_id, $nic, $pretty_print_query_parameter, $depth)

Partially modify a Nic

You can use update attributes of a Nic

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\NetworkInterfacesApi();
$datacenter_id = "datacenter_id_example"; // string | 
$server_id = "server_id_example"; // string | 
$nic_id = array('key' => "nic_id_example"); // map[string,string] | 
$nic = new \Swagger\Client\Model\NicProperties(); // \Swagger\Client\Model\NicProperties | Modified properties of Nic
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->partialUpdate($datacenter_id, $server_id, $nic_id, $nic, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkInterfacesApi->partialUpdate: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **server_id** | **string**|  | 
 **nic_id** | [**map[string,string]**](string.md)|  | 
 **nic** | [**\Swagger\Client\Model\NicProperties**](\Swagger\Client\Model\NicProperties.md)| Modified properties of Nic | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Nic**](Nic.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: application/vnd.profitbricks.partial-properties+json, application/json
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **update**
> \Swagger\Client\Model\Nic update($datacenter_id, $server_id, $nic_id, $nic, $pretty_print_query_parameter, $depth)

Modify a Nic

You can use update attributes of a Nic

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\NetworkInterfacesApi();
$datacenter_id = "datacenter_id_example"; // string | 
$server_id = "server_id_example"; // string | 
$nic_id = array('key' => "nic_id_example"); // map[string,string] | 
$nic = new \Swagger\Client\Model\Nic(); // \Swagger\Client\Model\Nic | Modified Nic
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->update($datacenter_id, $server_id, $nic_id, $nic, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkInterfacesApi->update: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **server_id** | **string**|  | 
 **nic_id** | [**map[string,string]**](string.md)|  | 
 **nic** | [**\Swagger\Client\Model\Nic**](\Swagger\Client\Model\Nic.md)| Modified Nic | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Nic**](Nic.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: application/json, application/vnd.profitbricks.resource+json
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

