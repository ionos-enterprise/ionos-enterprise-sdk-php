<?php
/**
 * GroupItemProperty
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
 * GroupItemProperty Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     ProfitBricks\Client
 * @author      http://github.com/ProfitBricks-api/ProfitBricks-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/ProfitBricks-api/ProfitBricks-codegen
 */
class GroupItemProperty implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    static $ProfitBricksTypes = array(
        'name' => 'string',
        'createDataCenter' => 'boolean',
        'createSnapshot' => 'boolean',
        'reserveIp' => 'boolean',
        'accessActivityLog' => 'boolean'
    );

    static function ProfitBricksTypes() {
        return self::$ProfitBricksTypes;
    }

    /**
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[]
      */
    static $attributeMap = array(
        'name' => 'name',
        'createDataCenter' => 'createDataCenter',
        'createSnapshot' => 'createSnapshot',
        'reserveIp' => 'reserveIp',
        'accessActivityLog' => 'accessActivityLog'
    );

    static function attributeMap() {
        return self::$attributeMap;
    }

    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'name' => 'setName',
        'createDataCenter' => 'setCreateDataCenter',
        'createSnapshot' => 'setCreateSnapshot',
        'reserveIp' => 'setReserveIp',
        'accessActivityLog' => 'setAccessActivityLog'
    );

    static function setters() {
        return self::$setters;
    }

    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'name' => 'getName',
        'createDataCenter' => 'getCreateDataCenter',
        'createSnapshot' => 'getCreateSnapshot',
        'reserveIp' => 'getReserveIp',
        'accessActivityLog' => 'getAccessActivityLog'
    );

    static function getters() {
        return self::$getters;
    }


    /**
      * $name Group name.
      * @var string
      */
    protected $name;

    /**
      * $createDataCenter The group has permission to create virtual data centers.
      * @var boolean
      */
    protected $createDataCenter;

    /**
      * $createSnapshot The group has permission to create snapshots.
      * @var boolean
      */
    protected $createSnapshot;

    /**
      * $reserveIp The group has permission to reserve IP addresses.
      * @var boolean
      */
    protected $reserveIp;

    /**
      * $accessActivityLog The group has permission to access the activity log.
      * @var boolean
      */
    protected $accessActivityLog;


    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {

        if ($data != null) {
            $this->name = $data["name"];
            $this->createDataCenter = $data["createDataCenter"];
            $this->createSnapshot = $data["createSnapshot"];
            $this->reserveIp = $data["reserveIp"];
            $this->accessActivityLog = $data["accessActivityLog"];
        }
    }

    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets name
     * @param string $name Group name.
     * @return $this
     */
    public function setName($name)
    {

        $this->name = $name;
        return $this;
    }


    /**
     * Gets createDataCenter
     * @return boolean
     */
    public function getCreateDataCenter()
    {
        return $this->createDataCenter;
    }

    /**
     * Sets createDataCenter
     * @param boolean $createDataCenter The group has permission to create virtual data centers.
     * @return $this
     */
    public function setCreateDataCenter($createDataCenter)
    {
        $this->createDataCenter = $createDataCenter;
        return $this;
    }


    /**
     * Gets createSnapshot
     * @return boolean
     */
    public function getCreateSnapshot()
    {
        return $this->createSnapshot;
    }

    /**
     * Sets createSnapshot
     * @param boolean $createSnapshot The group has permission to create snapshots.
     * @return $this
     */
    public function setCreateSnapshot($createSnapshot)
    {
        $this->createSnapshot = $createSnapshot;
        return $this;
    }


    /**
     * Gets reserveIp
     * @return boolean
     */
    public function getReserveIp()
    {
        return $this->reserveIp;
    }

    /**
     * Sets reserveIp
     * @param boolean $reserveIp The group has permission to reserve IP addresses.
     * @return $this
     */
    public function setReserveIp($reserveIp)
    {

        $this->reserveIp = $reserveIp;
        return $this;
    }

    /**
     * Gets accessActivityLog
     * @return boolean
     */
    public function getAccessActivityLog()
    {
        return $this->accessActivityLog;
    }

    /**
     * Sets accessActivityLog
     * @param boolean $accessActivityLog The group has permission to access the activity log.
     * @return $this
     */
    public function setAccessActivityLog($accessActivityLog)
    {

        $this->accessActivityLog = $accessActivityLog;
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
