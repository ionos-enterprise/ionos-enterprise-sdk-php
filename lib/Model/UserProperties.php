<?php
/**
 * DatacenterProperties
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
 * DatacenterProperties Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     ProfitBricks\Client
 * @author      http://github.com/ProfitBricks-api/ProfitBricks-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/ProfitBricks-api/ProfitBricks-codegen
 */
class UserProperties implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    static $ProfitBricksTypes = array(
        'firstname' => 'string',
        'lastname' => 'string',
        'email' => 'string',
        'administrator' => 'boolean',
        'forceSecAuth' => 'boolean',
        'secAuthActive' => 'boolean'
    );

    static function ProfitBricksTypes() {
        return self::$ProfitBricksTypes;
    }

    /**
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[]
      */
    static $attributeMap = array(
      'firstname' => 'firstname',
      'lastname' => 'lastname',
      'email' => 'email',
      'administrator' => 'administrator',
      'forceSecAuth' => 'forceSecAuth',
      'secAuthActive' => 'secAuthActive'
    );

    static function attributeMap() {
        return self::$attributeMap;
    }

    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
      'firstname' => 'setFirstname',
      'lastname' => 'setLastname',
      'email' => 'setEmail',
      'administrator' => 'setAdministrator',
      'forceSecAuth' => 'setForceSecAuth',
      'secAuthActive' => 'setSecAuthActive'
    );

    static function setters() {
        return self::$setters;
    }

    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
      'firstname' => 'getFirstname',
      'lastname' => 'getLastname',
      'email' => 'getEmail',
      'administrator' => 'getAdministrator',
      'forceSecAuth' => 'getForceSecAuth',
      'secAuthActive' => 'getSecAuthActive'
    );

    static function getters() {
        return self::$getters;
    }


    /**
      * $name A name of that resource
      * @var string
      */
    protected $firstname;
    protected $lastname;
    protected $email;

    /**
      * $description A description for the datacenter, e.g. staging, production
      * @var string
      */
    protected $administrator;

    /**
      * $location The physical location where the datacenter will be created. This will be where all of your servers live. Property cannot be modified after datacenter creation (disallowed in update requests)
      * @var string
      */
    protected $forceSecAuth;

    /**
      * $version The version of that Data Center. Gets incremented with every change
      * @var int
      */
    protected $secAuthActive;


    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {

        if ($data != null) {
            $this->firstname = $data["firstname"];
            $this->lastname = $data["lastname"];
            $this->email = $data["email"];
            $this->administrator = $data["administrator"];
            $this->forceSecAuth = $data["forceSecAuth"];
            $this->secAuthActive = $data["secAuthActive"];
        }
    }

    /**
     * Gets name
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Sets name
     * @param string $name A name of that resource
     * @return $this
     */
    public function setFirstname($firstname)
    {

        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Gets description
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Sets description
     * @param string $description A description for the datacenter, e.g. staging, production
     * @return $this
     */
    public function setLastname($lastname)
    {

        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Gets location
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets location
     * @param string $location The physical location where the datacenter will be created. This will be where all of your servers live. Property cannot be modified after datacenter creation (disallowed in update requests)
     * @return $this
     */
    public function setEmail($email)
    {

        $this->email = $email;
        return $this;
    }

    /**
     * Gets version
     * @return int
     */
    public function getForceSecAuth()
    {
        return $this->forceSecAuth;
    }

    /**
     * Sets version
     * @param int $version The version of that Data Center. Gets incremented with every change
     * @return $this
     */
    public function setForceSecAuth($forceSecAuth)
    {

        $this->forceSecAuth = $forceSecAuth;
        return $this;
    }


    /**
     * Gets version
     * @return int
     */
    public function getSecAuthActive()
    {
        return $this->secAuthActive;
    }

    /**
     * Sets version
     * @param int $version The version of that Data Center. Gets incremented with every change
     * @return $this
     */
    public function setSecAuthActive($secAuthActive)
    {

        $this->secAuthActive = $secAuthActive;
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
