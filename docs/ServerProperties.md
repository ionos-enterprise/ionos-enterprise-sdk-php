# ServerProperties

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A name of that resource | [optional] 
**cores** | **int** | The total number of cores for the server | 
**ram** | **int** | The amount of memory for the server in MB, e.g. 2048. Size must be specified in multiples of 256 MB with a minimum of 256 MB; however, if you set ramHotPlug to TRUE then you must use a minimum of 1024 MB | 
**availability_zone** | **string** | The availability zone in which the server should exist | [optional] 
**vm_state** | **string** | Status of the virtual Machine | [optional] 
**boot_cdrom** | [**\Swagger\Client\Model\ResourceReference**](ResourceReference.md) | Reference to a CD-ROM used for booting. If not &#39;null&#39; then bootVolume has to be &#39;null&#39; | [optional] 
**boot_volume** | [**\Swagger\Client\Model\ResourceReference**](ResourceReference.md) | Reference to a Volume used for booting. If not &#39;null&#39; then bootCdrom has to be &#39;null&#39; | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


