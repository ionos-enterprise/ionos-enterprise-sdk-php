# Swagger\Client\DefaultApi

All URIs are relative to *https://localhost*

Method | HTTP request | Description
------------- | ------------- | -------------
[**printInfo**](DefaultApi.md#printInfo) | **GET** / | Display API information


# **printInfo**
> \Swagger\Client\Model\Info printInfo($pretty_print_query_parameter, $depth)

Display API information

Display API information

### Example 
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\DefaultApi();
$pretty_print_query_parameter = true; // bool | Controls whether response is pretty-printed (with indentation and new lines)
$depth = 0; // int | Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children's children are included\n\t- depth=... and so on

try { 
    $result = $api_instance->printInfo($pretty_print_query_parameter, $depth);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->printInfo: ', $e->getMessage(), "\n";
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pretty_print_query_parameter** | **bool**| Controls whether response is pretty-printed (with indentation and new lines) | [optional] [default to true]
 **depth** | **int**| Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\Info**](Info.md)

### Authorization

No authorization required

### HTTP reuqest headers

 - **Content-Type**: */*
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

