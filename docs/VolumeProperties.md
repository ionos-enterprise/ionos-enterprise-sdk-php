# VolumeProperties

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A name of that resource | [optional] 
**type** | **string** | Hardware type of the volume. Default is HDD | [optional] 
**size** | **double** | The size of the volume in GB | 
**image** | **string** | Image or snapshot ID to be used as template for this volume | [optional] 
**image_password** | **string** | Initial password to be set for installed OS. Works with Profitbricks public images only. Not modifiable, forbidden in update requests | [optional] 
**ssh_keys** | **string[]** | Array of SSH keys | [optional] 
**bus** | **string** | The bus type of the volume. Default is VIRTIO | [optional] 
**licence_type** | **string** | OS type of this volume | [optional] 
**cpu_hot_plug** | **bool** | Is capable of CPU hot plug (no reboot required) | [optional] 
**cpu_hot_unplug** | **bool** | Is capable of CPU hot unplug (no reboot required) | [optional] 
**ram_hot_plug** | **bool** | Is capable of memory hot plug (no reboot required) | [optional] 
**ram_hot_unplug** | **bool** | Is capable of memory hot unplug (no reboot required) | [optional] 
**nic_hot_plug** | **bool** | Is capable of nic hot plug (no reboot required) | [optional] 
**nic_hot_unplug** | **bool** | Is capable of nic hot unplug (no reboot required) | [optional] 
**disc_virtio_hot_plug** | **bool** | Is capable of Virt-IO drive hot plug (no reboot required) | [optional] 
**disc_virtio_hot_unplug** | **bool** | Is capable of Virt-IO drive hot unplug (no reboot required) | [optional] 
**disc_scsi_hot_plug** | **bool** | Is capable of SCSI drive hot plug (no reboot required) | [optional] 
**disc_scsi_hot_unplug** | **bool** | Is capable of SCSI drive hot unplug (no reboot required) | [optional] 
**device_number** | **int** | The LUN ID of the storage volume. Null for volumes not mounted to any VM | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


