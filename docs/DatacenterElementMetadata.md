# DatacenterElementMetadata

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**created_date** | [**\DateTime**](\DateTime.md) | The last time the resource was created | [optional] 
**created_by** | **string** | The user who created the resource. | [optional] 
**etag** | **string** | Resource&#39;s Entity Tag as defined in http://www.w3.org/Protocols/rfc2616/rfc2616-sec3.html#sec3.11 . Entity Tag is also added as an &#39;ETag response header to requests which don&#39;t use &#39;depth&#39; parameter.  | [optional] 
**last_modified_date** | [**\DateTime**](\DateTime.md) | The last time the resource has been modified | [optional] 
**last_modified_by** | **string** | The user who last modified the resource. | [optional] 
**state** | **string** | State of the resource. *AVAILABLE* There are no pending modification requests for this item; *BUSY* There is at least one modification request pending and all following requests will be queued; *INACTIVE* Resource has been de-provisioned. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


