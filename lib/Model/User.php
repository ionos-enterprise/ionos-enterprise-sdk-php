<?php
/**
 * User
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
 * User Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     ProfitBricks\Client
 * @author      http://github.com/ProfitBricks-api/ProfitBricks-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/ProfitBricks-api/ProfitBricks-codegen
 */
class User implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    static $ProfitBricksTypes = array(
        'id' => 'string',
        'type' => 'string',
        'href' => 'string',
        'metadata' => '\ProfitBricks\Client\Model\UserMetadata',
        'properties' => '\ProfitBricks\Client\Model\UserProperties',
        'entities' => '\ProfitBricks\Client\Model\UserEntities'
    );

    static function ProfitBricksTypes() {
        return self::$ProfitBricksTypes;
    }

    /**
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[]
      */
    static $attributeMap = array(
        'id' => 'id',
        'type' => 'type',
        'href' => 'href',
        'metadata' => 'metadata',
        'properties' => 'properties',
        'entities' => 'entities'
    );

    static function attributeMap() {
        return self::$attributeMap;
    }

    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'id' => 'setId',
        'type' => 'setType',
        'href' => 'setHref',
        'metadata' => 'setMetadata',
        'properties' => 'setProperties',
        'entities' => 'setEntities'
    );

    static function setters() {
        return self::$setters;
    }

    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'id' => 'getId',
        'type' => 'getType',
        'href' => 'getHref',
        'metadata' => 'getMetadata',
        'properties' => 'getProperties',
        'entities' => 'getEntities'
    );

    static function getters() {
        return self::$getters;
    }


    /**
      * $id The resource's unique identifier
      * @var string
      */
    protected $id;

    /**
      * $type The type of object that has been created
      * @var string
      */
    protected $type;

    /**
      * $href URL to the object\u2019s representation (absolute path)
      * @var string
      */
    protected $href;

    /**
      * $metadata A collection containing metadata for the user.
      * @var \ProfitBricks\Client\Model\UserMetadata
      */
    protected $metadata;

    /**
      * $properties A collection containing the user's properties.
      * @var \ProfitBricks\Client\Model\UserProperties
      */
    protected $properties;

    /**
      * $entities A collection containing resources the user owns, and groups the user is a member of.
      * @var \ProfitBricks\Client\Model\UserEntities
      */
    protected $entities;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {

        if ($data != null) {
            $this->id = $data["id"];
            $this->type = $data["type"];
            $this->href = $data["href"];
            $this->metadata = $data["metadata"];
            $this->properties = $data["properties"];
            $this->entities = $data["entities"];
        }
    }

    /**
     * Gets id
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets id
     * @param string $id The resource's unique identifier
     * @return $this
     */
    public function setId($id)
    {

        $this->id = $id;
        return $this;
    }

    /**
     * Gets type
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets type
     * @param string $type The type of object that has been created
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Gets href
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Sets href
     * @param string $href URL to the object\u2019s representation (absolute path)
     * @return $this
     */
    public function setHref($href)
    {

        $this->href = $href;
        return $this;
    }


    /**
     * Gets metadata
     * @return \ProfitBricks\Client\Model\UserMetadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Sets metadata
     * @param \ProfitBricks\Client\Model\UserMetadata $metadata A collection containing metadata for the user.
     * @return $this
     */
    public function setMetadata($metadata)
    {

        $this->metadata = $metadata;
        return $this;
    }


    /**
     * Gets properties
     * @return \ProfitBricks\Client\Model\UserProperties
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Sets properties
     * @param \ProfitBricks\Client\Model\UserProperties $properties A collection containing the user's properties.
     * @return $this
     */
    public function setProperties($properties)
    {

        $this->properties = $properties;
        return $this;
    }


    /**
     * Gets entities
     * @return \ProfitBricks\Client\Model\UserEntities
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * Sets entities
     * @param \ProfitBricks\Client\Model\UserEntities $entities A collection containing resources the user owns, and groups the user is a member of.
     * @return $this
     */
    public function setEntities($entities)
    {

        $this->entities = $entities;
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
