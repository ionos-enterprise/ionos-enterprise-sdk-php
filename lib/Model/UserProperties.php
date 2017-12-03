<?php
/**
 * UserProperties
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
 * UserProperties Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     ProfitBricks\Client
 * @author      http://github.com/ProfitBricks-api/ProfitBricks-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link         https://github.com/ProfitBricks-api/ProfitBricks-codegen
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
        'password' => 'string',
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
      'password' => 'password',
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
      'password' => 'setPassword',
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
      'password' => 'getPassword',
      'administrator' => 'getAdministrator',
      'forceSecAuth' => 'getForceSecAuth',
      'secAuthActive' => 'getSecAuthActive'
    );

    static function getters() {
        return self::$getters;
    }

    /**
      * $firstname The first name of the user.
      * @var string
      */
    protected $firstname;

    /**
      * $lastname The last name of the user.
      * @var string
      */
    protected $lastname;

    /**
      * $email The e-mail address of the user.
      * @var string
      */
    protected $email;

    /**
      * $password The password of the user.
      * @var string
      */
      protected $password;

    /**
      * $administrator Indicates if the user has administrative rights.
      * @var boolean
      */
    protected $administrator;

    /**
      * $administrator Indicates if secure (two-factor) authentication was enabled for the user.
      * @var boolean
      */
    protected $forceSecAuth;

    /**
      * $forceSecAuth Indicates if secure (two-factor) authentication is enabled for the user.
      * @var boolean
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
            $this->password = $data["password"];
            $this->administrator = $data["administrator"];
            $this->forceSecAuth = $data["forceSecAuth"];
            $this->secAuthActive = $data["secAuthActive"];
        }
    }

    /**
     * Gets firstname
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Sets firstname
     * @param string $firstname The first name of the user.
     * @return $this
     */
    public function setFirstname($firstname)
    {

        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Gets lastname
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Sets lastname
     * @param string $lastname The last name of the user.
     * @return $this
     */
    public function setLastname($lastname)
    {

        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Gets email
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets email
     * @param string $email The email address of the user.
     * @return $this
     */
    public function setEmail($email)
    {

        $this->email = $email;
        return $this;
    }

    /**
     * Gets password
     * @return string
     */
    public function GetPassword()
    {
        return $this->password;
    }

    /**
     * Sets password
     * @return string
     */
    public function setPassword($password)
    {
        return $this->password = $password;
        return $this;
    }

    /**
     * Gets administrator
     * @return boolean
     */
    public function getAdministrator()
    {
        return $this->administrator;
    }

    /**
     * Sets administrator
     * @param boolean $administrator Indicates if the user has administrative rights.
     * @return $this
     */
    public function setAdministrator($administrator)
    {

        $this->administrator = $administrator;
        return $this;
    }

    /**
     * Gets forceSecAuth
     * @return boolean
     */
    public function getForceSecAuth()
    {
        return $this->forceSecAuth;
    }

    /**
     * Sets forceSecAuth
     * @param boolean $forceSecAuth Indicates if secure (two-factor) authentication was enabled for the user.
     * @return $this
     */
    public function setForceSecAuth($forceSecAuth)
    {

        $this->forceSecAuth = $forceSecAuth;
        return $this;
    }

    /**
     * Gets secAuthActive
     * @return boolean
     */
    public function getSecAuthActive()
    {
        return $this->secAuthActive;
    }

    /**
     * Sets secAuthActive
     * @param boolean $secAuthActive Indicates if secure (two-factor) authentication is enabled for the user.
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
