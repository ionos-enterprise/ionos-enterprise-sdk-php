# Swagger\Client\LanApi

All URIs are relative to *https://localhost*

Method | HTTP request | Description
------------- | ------------- | -------------
[**attachNic**](LanApi.md#attachNic) | **POST** /datacenters/{datacenterId}/lans/{lanId}/nics | Attach a nic
[**create**](LanApi.md#create) | **POST** /datacenters/{datacenterId}/lans | Create a Lan
[**delete**](LanApi.md#delete) | **DELETE** /datacenters/{datacenterId}/lans/{lanId} | Delete a Lan.
[**findAll**](LanApi.md#findAll) | **GET** /datacenters/{datacenterId}/lans | List Lans
[**findById**](LanApi.md#findById) | **GET** /datacenters/{datacenterId}/lans/{lanId} | Retrieve a Lan
[**getMember**](LanApi.md#getMember) | **GET** /datacenters/{datacenterId}/lans/{lanId}/nics/{nicId} | Retrieve a nic attached to lan
[**listNics**](LanApi.md#listNics) | **GET** /datacenters/{datacenterId}/lans/{lanId}/nics | List Lan Members 
[**partialUpdate**](LanApi.md#partialUpdate) | **PATCH** /datacenters/{datacenterId}/lans/{lanId} | Partially modify a Lan
[**update**](LanApi.md#update) | **PUT** /datacenters/{datacenterId}/lans/{lanId} | Modify a Lan


# **attachNic**
> \Swagger\Client\Model\Nic attachNic($datacenter_id, $lan_id, $nic, $pretty_print_query_parameter, $depth)

Attach a nic

This will attach a pre-existing nic to a lan. 

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\LanApi();
$datacenter_id = "datacenter_id_example"; // string | 
$lan_id = "lan_id_example"; // string | 
$nic = new \Swagger\Client\Model\Nic(); // \Swagger\Client\Model\Nic | Nic to be attached
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->attachNic($datacenter_id, $lan_id, $nic, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LanApi->attachNic: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **lan_id** | **string**|  | 
 **nic** | [**\Swagger\Client\Model\Nic**](\Swagger\Client\Model\Nic.md)| Nic to be attached | 
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

# **create**
> \Swagger\Client\Model\Lan create($datacenter_id, $lan, $pretty_print_query_parameter, $depth)

Create a Lan

Creates a LAN within the datacenter

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\LanApi();
$datacenter_id = "datacenter_id_example"; // string | 
$lan = new \Swagger\Client\Model\Lan(); // \Swagger\Client\Model\Lan | Lan to be created
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->create($datacenter_id, $lan, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LanApi->create: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **lan** | [**\Swagger\Client\Model\Lan**](\Swagger\Client\Model\Lan.md)| Lan to be created | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Lan**](Lan.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: application/json, application/vnd.profitbricks.resource+json
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **delete**
> object delete($datacenter_id, $lan_id, $pretty_print_query_parameter, $depth)

Delete a Lan.

Removes the specific Lan

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\LanApi();
$datacenter_id = "datacenter_id_example"; // string | 
$lan_id = array('key' => "lan_id_example"); // map[string,string] | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->delete($datacenter_id, $lan_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LanApi->delete: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **lan_id** | [**map[string,string]**](string.md)|  | 
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
> \Swagger\Client\Model\Lans findAll($datacenter_id, $pretty_print_query_parameter, $depth)

List Lans

Retrieve a list of LANs within the datacenter

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\LanApi();
$datacenter_id = "datacenter_id_example"; // string | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->findAll($datacenter_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LanApi->findAll: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Lans**](Lans.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: */*
 - **Accept**: application/vnd.profitbricks.collection+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **findById**
> \Swagger\Client\Model\Lan findById($datacenter_id, $lan_id, $pretty_print_query_parameter, $depth)

Retrieve a Lan

Retrieves the attributes of a given LAN

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\LanApi();
$datacenter_id = "datacenter_id_example"; // string | 
$lan_id = array('key' => "lan_id_example"); // map[string,string] | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->findById($datacenter_id, $lan_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LanApi->findById: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **lan_id** | [**map[string,string]**](string.md)|  | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Lan**](Lan.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: */*
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **getMember**
> \Swagger\Client\Model\Nic getMember($datacenter_id, $lan_id, $nic_id, $pretty_print_query_parameter, $depth)

Retrieve a nic attached to lan

This will retrieve the properties of an attached nic.

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\LanApi();
$datacenter_id = "datacenter_id_example"; // string | 
$lan_id = "lan_id_example"; // string | 
$nic_id = "nic_id_example"; // string | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->getMember($datacenter_id, $lan_id, $nic_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LanApi->getMember: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **lan_id** | **string**|  | 
 **nic_id** | **string**|  | 
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

# **listNics**
> \Swagger\Client\Model\LanNics listNics($datacenter_id, $lan_id, $pretty_print_query_parameter, $depth)

List Lan Members 

You can retrieve a list of nics attached to a lan

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\LanApi();
$datacenter_id = "datacenter_id_example"; // string | 
$lan_id = "lan_id_example"; // string | 
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->listNics($datacenter_id, $lan_id, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LanApi->listNics: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **lan_id** | **string**|  | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\LanNics**](LanNics.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: */*
 - **Accept**: application/vnd.profitbricks.collection+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **partialUpdate**
> \Swagger\Client\Model\Lan partialUpdate($datacenter_id, $lan_id, $lan, $pretty_print_query_parameter, $depth)

Partially modify a Lan

You can use update attributes of a resource

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\LanApi();
$datacenter_id = "datacenter_id_example"; // string | 
$lan_id = array('key' => "lan_id_example"); // map[string,string] | 
$lan = new \Swagger\Client\Model\LanProperties(); // \Swagger\Client\Model\LanProperties | Modified Lan
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->partialUpdate($datacenter_id, $lan_id, $lan, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LanApi->partialUpdate: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **lan_id** | [**map[string,string]**](string.md)|  | 
 **lan** | [**\Swagger\Client\Model\LanProperties**](\Swagger\Client\Model\LanProperties.md)| Modified Lan | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Lan**](Lan.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: application/vnd.profitbricks.partial-properties+json, application/json
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

# **update**
> \Swagger\Client\Model\Lan update($datacenter_id, $lan_id, $lan, $pretty_print_query_parameter, $depth)

Modify a Lan

You can use update attributes of a resource

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
Swagger\Client\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Swagger\Client\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Swagger\Client\Api\LanApi();
$datacenter_id = "datacenter_id_example"; // string | 
$lan_id = array('key' => "lan_id_example"); // map[string,string] | 
$lan = new \Swagger\Client\Model\Lan(); // \Swagger\Client\Model\Lan | Modified Lan
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->update($datacenter_id, $lan_id, $lan, $pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LanApi->update: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **datacenter_id** | **string**|  | 
 **lan_id** | [**map[string,string]**](string.md)|  | 
 **lan** | [**\Swagger\Client\Model\Lan**](\Swagger\Client\Model\Lan.md)| Modified Lan | 
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Lan**](Lan.md)

### Authorization

[basicAuth](../README.md#basicAuth)

### HTTP reuqest headers

 - **Content-Type**: application/json, application/vnd.profitbricks.resource+json
 - **Accept**: application/vnd.profitbricks.resource+json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

