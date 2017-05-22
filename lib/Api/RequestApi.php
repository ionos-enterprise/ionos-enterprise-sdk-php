<?php
/**
 * RequestApi
 * PHP version 5
 *
 * @category Class
 * @package  ProfitBricks\Client

 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 
 */
/**
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */


namespace ProfitBricks\Client\Api;

use \ProfitBricks\Client\Configuration;
use \ProfitBricks\Client\ApiClient;
use \ProfitBricks\Client\ApiException;
use \ProfitBricks\Client\ObjectSerializer;

/**
 * RequestApi Class Doc Comment
 *
 * @category Class
 * @package  ProfitBricks\Client
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 */
class RequestApi
{

    /**
     * API Client
     * @var \ProfitBricks\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     * @param \ProfitBricks\Client\ApiClient|null $apiClient The api client to use
     */
    function __construct($apiClient = null)
    {
        if ($apiClient == null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://localhost');
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     * @return \ProfitBricks\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     * @param \ProfitBricks\Client\ApiClient $apiClient set the API client
     * @return RequestApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }


    /**
     * findAll
     *
     * List Requests
     *
     * @param bool $pretty_print_query_parameter Controls whether response is pretty-printed (with indentation and new lines) (optional, default to true)
     * @param int $depth Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on (optional, default to 0)
     * @return \ProfitBricks\Client\Model\Requests
     * @throws \ProfitBricks\Client\ApiException on non-2xx response
     */
    public function findAll($pretty_print_query_parameter = null, $depth = null)
    {
        list($response, $statusCode, $httpHeader) = $this->findAllWithHttpInfo ($pretty_print_query_parameter, $depth);
        return $response;
    }


    /**
     * findAllWithHttpInfo
     *
     * List Requests
     *
     * @param bool $pretty_print_query_parameter Controls whether response is pretty-printed (with indentation and new lines) (optional, default to true)
     * @param int $depth Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on (optional, default to 0)
     * @return Array of \ProfitBricks\Client\Model\Requests, HTTP status code, HTTP response headers (array of strings)
     * @throws \ProfitBricks\Client\ApiException on non-2xx response
     */
    public function findAllWithHttpInfo($pretty_print_query_parameter = null, $depth = null)
    {


        // parse inputs
        $resourcePath = "/requests";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/vnd.profitbricks.collection+json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('*/*'));

        // query params

        if ($pretty_print_query_parameter !== null) {
            $queryParams['Pretty print query parameter'] = $this->apiClient->getSerializer()->toQueryValue($pretty_print_query_parameter);
        }// query params

        if ($depth !== null) {
            $queryParams['depth'] = $this->apiClient->getSerializer()->toQueryValue($depth);
        }


        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);




        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }

        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }

        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\ProfitBricks\Client\Model\Requests'
            );

            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\ProfitBricks\Client\ObjectSerializer::deserialize($response, '\ProfitBricks\Client\Model\Requests', $httpHeader), $statusCode, $httpHeader);

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                $data = \ProfitBricks\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\ProfitBricks\Client\Model\Requests', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            default:
                $data = \ProfitBricks\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\ProfitBricks\Client\Model\Error', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }

            throw $e;
        }
    }

    /**
     * findById
     *
     * Retrieve a Request
     *
     * @param string $request_id  (required)
     * @param bool $pretty_print_query_parameter Controls whether response is pretty-printed (with indentation and new lines) (optional, default to true)
     * @param int $depth Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on (optional, default to 0)
     * @return \ProfitBricks\Client\Model\Request
     * @throws \ProfitBricks\Client\ApiException on non-2xx response
     */
    public function findById($request_id, $pretty_print_query_parameter = null, $depth = null)
    {
        list($response, $statusCode, $httpHeader) = $this->findByIdWithHttpInfo ($request_id, $pretty_print_query_parameter, $depth);
        return $response;
    }


    /**
     * findByIdWithHttpInfo
     *
     * Retrieve a Request
     *
     * @param string $request_id  (required)
     * @param bool $pretty_print_query_parameter Controls whether response is pretty-printed (with indentation and new lines) (optional, default to true)
     * @param int $depth Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on (optional, default to 0)
     * @return Array of \ProfitBricks\Client\Model\Request, HTTP status code, HTTP response headers (array of strings)
     * @throws \ProfitBricks\Client\ApiException on non-2xx response
     */
    public function findByIdWithHttpInfo($request_id, $pretty_print_query_parameter = null, $depth = null)
    {

        // verify the required parameter 'request_id' is set
        if ($request_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $request_id when calling findById');
        }

        // parse inputs
        $resourcePath = "/requests/{requestId}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('*/*'));

        // query params

        if ($pretty_print_query_parameter !== null) {
            $queryParams['Pretty print query parameter'] = $this->apiClient->getSerializer()->toQueryValue($pretty_print_query_parameter);
        }// query params

        if ($depth !== null) {
            $queryParams['depth'] = $this->apiClient->getSerializer()->toQueryValue($depth);
        }

        // path params

        if ($request_id !== null) {
            $resourcePath = str_replace(
                "{" . "requestId" . "}",
                $this->apiClient->getSerializer()->toPathValue($request_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);




        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }

        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }

        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\ProfitBricks\Client\Model\Request'
            );

            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\ProfitBricks\Client\ObjectSerializer::deserialize($response, '\ProfitBricks\Client\Model\Request', $httpHeader), $statusCode, $httpHeader);

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                $data = \ProfitBricks\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\ProfitBricks\Client\Model\Request', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            default:
                $data = \ProfitBricks\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\ProfitBricks\Client\Model\Error', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }

            throw $e;
        }
    }

    /**
     * getStatus
     *
     * Retrieve Request Status
     *
     * @param string $request_id  (required)
     * @param bool $pretty_print_query_parameter Controls whether response is pretty-printed (with indentation and new lines) (optional, default to true)
     * @param int $depth Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on (optional, default to 0)
     * @return \ProfitBricks\Client\Model\RequestStatus
     * @throws \ProfitBricks\Client\ApiException on non-2xx response
     */
    public function getStatus($request_id, $pretty_print_query_parameter = null, $depth = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getStatusWithHttpInfo ($request_id, $pretty_print_query_parameter, $depth);
        return $response;
    }


    /**
     * getStatusWithHttpInfo
     *
     * Retrieve Request Status
     *
     * @param string $request_id  (required)
     * @param bool $pretty_print_query_parameter Controls whether response is pretty-printed (with indentation and new lines) (optional, default to true)
     * @param int $depth Controls the details depth of response objects. \nEg. GET /datacenters/[ID]\n\t- depth=0: only direct properties are included. Children (servers etc.) are not included\n\t- depth=1: direct properties and children references are included\n\t- depth=2: direct properties and children properties are included\n\t- depth=3: direct properties and children properties and children&#39;s children are included\n\t- depth=... and so on (optional, default to 0)
     * @return Array of \ProfitBricks\Client\Model\RequestStatus, HTTP status code, HTTP response headers (array of strings)
     * @throws \ProfitBricks\Client\ApiException on non-2xx response
     */
    public function getStatusWithHttpInfo($request_id, $pretty_print_query_parameter = null, $depth = null)
    {

        // verify the required parameter 'request_id' is set
        if ($request_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $request_id when calling getStatus');
        }

        // parse inputs
        $resourcePath = "/requests/{requestId}/status";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('*/*'));

        // query params

        if ($pretty_print_query_parameter !== null) {
            $queryParams['Pretty print query parameter'] = $this->apiClient->getSerializer()->toQueryValue($pretty_print_query_parameter);
        }// query params

        if ($depth !== null) {
            $queryParams['depth'] = $this->apiClient->getSerializer()->toQueryValue($depth);
        }

        // path params

        if ($request_id !== null) {
            $resourcePath = str_replace(
                "{" . "requestId" . "}",
                $this->apiClient->getSerializer()->toPathValue($request_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);




        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }

        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }

        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\ProfitBricks\Client\Model\RequestStatus'
            );

            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\ProfitBricks\Client\ObjectSerializer::deserialize($response, '\ProfitBricks\Client\Model\RequestStatus', $httpHeader), $statusCode, $httpHeader);

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                $data = \ProfitBricks\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\ProfitBricks\Client\Model\RequestStatus', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            default:
                $data = \ProfitBricks\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\ProfitBricks\Client\Model\Error', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }

            throw $e;
        }
    }

}
