# SnapshotProperties

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A name of that resource | [optional] 
**description** | **string** | Human readable description | [optional] 
**location** | **string** | Location of that image/snapshot.  | [optional] 
**size** | **double** | The size of the image in GB | [optional] 
**cpu_hot_plug** | **bool** | Is capable of CPU hot plug (no reboot required) | [optional] [default to false]
**cpu_hot_unplug** | **bool** | Is capable of CPU hot unplug (no reboot required) | [optional] [default to false]
**ram_hot_plug** | **bool** | Is capable of memory hot plug (no reboot required) | [optional] [default to false]
**ram_hot_unplug** | **bool** | Is capable of memory hot unplug (no reboot required) | [optional] [default to false]
**nic_hot_plug** | **bool** | Is capable of nic hot plug (no reboot required) | [optional] [default to false]
**nic_hot_unplug** | **bool** | Is capable of nic hot unplug (no reboot required) | [optional] [default to false]
**disc_virtio_hot_plug** | **bool** | Is capable of Virt-IO drive hot plug (no reboot required) | [optional] [default to false]
**disc_virtio_hot_unplug** | **bool** | Is capable of Virt-IO drive hot unplug (no reboot required) | [optional] [default to false]
**disc_scsi_hot_plug** | **bool** | Is capable of SCSI drive hot plug (no reboot required) | [optional] [default to false]
**disc_scsi_hot_unplug** | **bool** | Is capable of SCSI drive hot unplug (no reboot required) | [optional] [default to false]
**licence_type** | **string** | OS type of this Snapshot | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


