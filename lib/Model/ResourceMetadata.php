<?php
/**
 * Datacenters
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
 * Datacenters Class Doc Comment
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
      * $id The resource's unique identifier
      * @var string
      */
    protected $createdDate;

    /**
      * $type The type of object that has been created
      * @var string
      */
    protected $createdBy;

    /**
      * $href URL to the object\u2019s representation (absolute path)
      * @var string
      */
    protected $etag;
    protected $lastModifiedDate;
    protected $lastModifiedBy;
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
     * Gets id
     * @return string
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Sets id
     * @param string $id The resource's unique identifier
     * @return $this
     */
    public function setCreatedDate($createdDate)
    {

        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * Gets type
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets type
     * @param string $type The type of object that has been created
     * @return $this
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Gets href
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Sets href
     * @param string $href URL to the object\u2019s representation (absolute path)
     * @return $this
     */
    public function setEtag($etag)
    {

        $this->etag = $etag;
        return $this;
    }


    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */


     /**
      * Gets href
      * @return string
      */
     public function getLastModifiedDate()
     {
         return $this->lastModifiedDate;
     }

     /**
      * Sets href
      * @param string $href URL to the object\u2019s representation (absolute path)
      * @return $this
      */
     public function setLastModifiedDate($lastModifiedDate)
     {

         $this->lastModifiedDate = $lastModifiedDate;
         return $this;
     }


     /**
      * Gets href
      * @return string
      */
     public function getLastModifiedBy()
     {
         return $this->lastModifiedBy;
     }

     /**
      * Sets href
      * @param string $href URL to the object\u2019s representation (absolute path)
      * @return $this
      */
     public function setLastModifiedBy($lastModifiedBy)
     {

         $this->lastModifiedBy = $lastModifiedBy;
         return $this;
     }


     /**
      * Gets href
      * @return string
      */
     public function getState()
     {
         return $this->state;
     }

     /**
      * Sets href
      * @param string $href URL to the object\u2019s representation (absolute path)
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
