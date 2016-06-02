# NicProperties

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A name of that resource | [optional] 
**mac** | **string** | The MAC address of the NIC | [optional] 
**ips** | **string[]** | Collection of IP addresses assigned to a nic. Explicitly assigned public IPs need to come from reserved IP blocks, Passing value null or empty array will assign an IP address automatically. | [optional] 
**dhcp** | **bool** | Indicates if the nic will reserve an IP using DHCP | [optional] [default to false]
**lan** | **int** | The LAN ID the NIC will sit on. If the LAN ID does not exist it will be implicitly created | 
**firewall_active** | **bool** | Once you add a firewall rule this will reflect a true value. Can also be used to temporarily disable a firewall without losing defined rules. | [optional] [default to false]

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


