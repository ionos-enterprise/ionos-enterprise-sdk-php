<?php
/**
 * ResourceMetadata
 *
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


namespace ProfitBricks\Client\Model;

use \ArrayAccess;
/**
 * ResourceMetadata Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     ProfitBricks\Client
 * @author      http://github.com/ProfitBricks-api/ProfitBricks-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/ProfitBricks-api/ProfitBricks-codegen
 */
class ResourceMetadata implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    static $ProfitBricksTypes = array(
        'createdDate' => 'string',
        'createdBy' => 'string',
        'etag' => 'string',
        'lastModifiedDate' => 'string',
        'lastModifiedBy' => 'string',
        'state' => 'string'
    );

    static function ProfitBricksTypes() {
        return self::$ProfitBricksTypes;
    }

    /**
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[]
      */
    static $attributeMap = array(
      'createdDate' => 'createdDate',
      'createdBy' => 'createdBy',
      'etag' => 'etag',
      'lastModifiedDate' => 'lastModifiedDate',
      'lastModifiedBy' => 'lastModifiedBy',
      'state' => 'state'
    );

    static function attributeMap() {
        return self::$attributeMap;
    }

    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
      'createdDate' => 'setCreatedDate',
      'createdBy' => 'setCreatedBy',
      'etag' => 'setEtag',
      'lastModifiedDate' => 'setLastModifiedDate',
      'lastModifiedBy' => 'setLastModifiedBy',
      'state' => 'setState'
    );

    static function setters() {
        return self::$setters;
    }

    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
      'createdDate' => 'getCreatedDate',
      'createdBy' => 'getCreatedBy',
      'etag' => 'getEtag',
      'lastModifiedDate' => 'getLastModifiedDate',
      'lastModifiedBy' => 'getLastModifiedBy',
      'state' => 'getState'
    );

    static function getters() {
        return self::$getters;
    }


    /**
      * $createdDate A time and date stamp indicating when the resource was created.
      * @var string
      */
    protected $createdDate;

    /**
      * $createdBy The user who created the resource.
      * @var string
      */
    protected $createdBy;

    /**
      * $etag ETag.
      * @var string
      */
    protected $etag;

    /**
      * $lastModifiedDate A time and date stamp indicating when the resource was last modified.
      * @var string
      */
    protected $lastModifiedDate;

    /**
      * $lastModifiedBy The user who last modified the resource.
      * @var string
      */
    protected $lastModifiedBy;

    /**
      * $state The current state of the resource. [ AVAILABLE, BUSY, INACTIVE ]
      * @var string
      */
    protected $state;


    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {

        if ($data != null) {
            $this->createdDate = $data["createdDate"];
            $this->createdBy = $data["createdBy"];
            $this->etag = $data["etag"];
            $this->lastModifiedDate = $data["lastModifiedDate"];
            $this->lastModifiedBy = $data["lastModifiedBy"];
            $this->state = $data["state"];
        }
    }

    /**
     * Gets createdDate
     * @return string
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Sets createdDate
     * @param string $createdDate A time and date stamp indicating when the resource was created.
     * @return $this
     */
    public function setCreatedDate($createdDate)
    {

        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * Gets createdBy
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets createdBy
     * @param string $createdBy The user who created the resource.
     * @return $this
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Gets etag
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Sets etag
     * @param string $etag ETag.
     * @return $this
     */
    public function setEtag($etag)
    {

        $this->etag = $etag;
        return $this;
    }

     /**
      * Gets lastModifiedDate
      * @return string
      */
     public function getLastModifiedDate()
     {
         return $this->lastModifiedDate;
     }

     /**
      * Sets lastModifiedDate
      * @param string $lastModifiedDate A time and date stamp indicating when the resource was last modified.
      * @return $this
      */
     public function setLastModifiedDate($lastModifiedDate)
     {

         $this->lastModifiedDate = $lastModifiedDate;
         return $this;
     }


     /**
      * Gets lastModifiedBy
      * @return string
      */
     public function getLastModifiedBy()
     {
         return $this->lastModifiedBy;
     }

     /**
      * Sets lastModifiedBy
      * @param string $lastModifiedBy The user who last modified the resource.
      * @return $this
      */
     public function setLastModifiedBy($lastModifiedBy)
     {

         $this->lastModifiedBy = $lastModifiedBy;
         return $this;
     }


     /**
      * Gets state
      * @return string
      */
     public function getState()
     {
         return $this->state;
     }

     /**
      * Sets state
      * @param string $state The current state of the resource. [ AVAILABLE, BUSY, INACTIVE ]
      * @return $this
      */
     public function setState($state)
     {

         $this->state = $state;
         return $this;
     }


     /**
      * Returns true if offset exists. False otherwise.
      * @param  integer $offset Offset
      * @return boolean
      */


    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(\ProfitBricks\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(\ProfitBricks\Client\ObjectSerializer::sanitizeForSerialization($this));
        }
    }
}
