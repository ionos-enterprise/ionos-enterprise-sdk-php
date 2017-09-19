<?php
/**
 * ResourceLimits
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
 * ResourceLimits Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     ProfitBricks\Client
 * @author      http://github.com/ProfitBricks-api/ProfitBricks-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/ProfitBricks-api/ProfitBricks-codegen
 */
class ResourceLimits implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    static $ProfitBricksTypes = array(
        'coresPerContract' => 'int',
        'ramPerContract' => 'int',
        'hddLimitPerContract' => 'int',
        'ssdLimitPerContract' => 'int'
    );

    static function ProfitBricksTypes() {
        return self::$ProfitBricksTypes;
    }

    /**
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[]
      */
    static $attributeMap = array(
        'coresPerContract' => 'coresPerContract',
        'ramPerContract' => 'ramPerContract',
        'hddLimitPerContract' => 'hddLimitPerContract',
        'ssdLimitPerContract' => 'ssdLimitPerContract'
    );

    static function attributeMap() {
        return self::$attributeMap;
    }

    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'coresPerContract' => 'setCoresPerContract',
        'ramPerContract' => 'setRamPerContract',
        'hddLimitPerContract' => 'setHddLimitPerContract',
        'ssdLimitPerContract' => 'setSsdLimitPerContract'
    );

    static function setters() {
        return self::$setters;
    }

    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'coresPerContract' => 'getCoresPerContract',
        'ramPerContract' => 'getRamPerContract',
        'hddLimitPerContract' => 'getHddLimitPerContract',
        'ssdLimitPerContract' => 'getSsdLimitPerContract'
    );

    static function getters() {
        return self::$getters;
    }

    /**
      * $coresPerContract Maximum number of CPU cores per contract.
      * @var int
      */
    protected $coresPerContract;

    /**
      * ramPerContract Maximum amount of RAM per contract.
      * @var int
      */
    protected $ramPerContract;

    /**
      * $hddLimitPerContract Maximum number of HDD volumes per contract.
      * @var int
      */
    protected $hddLimitPerContract;

    /**
      * $ssdLimitPerContract Maximum number of SSD volumes per contract.
      * @var int
      */
    protected $ssdLimitPerContract;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {

        if ($data != null) {
            $this->coresPerContract = $data["coresPerContract"];
            $this->ramPerContract = $data["ramPerContract"];
            $this->hddLimitPerContract = $data["hddLimitPerContract"];
            $this->ssdLimitPerContract = $data["ssdLimitPerContract"];
        }
    }


    /**
     * Gets coresPerContract
     * @return int
     */
    public function getCoresPerContract()
    {
        return $this->coresPerContract;
    }

    /**
     * Sets coresPerContract
     * @param int $type Maximum number of CPU cores per contract.
     * @return $this
     */
    public function setCoresPerContract($coresPerContract)
    {
        $this->coresPerContract = $coresPerContract;
        return $this;
    }


    /**
     * Gets ramPerContract
     * @return int
     */
    public function getRamPerContract()
    {
        return $this->ramPerContract;
    }

    /**
     * Sets ramPerContract
     * @param int $ramPerContract Maximum amount of RAM per contract.
     * @return $this
     */
    public function setRamPerContract($ramPerContract)
    {

        $this->ramPerContract = $ramPerContract;
        return $this;
    }


    /**
     * Gets hddLimitPerContract
     * @return int
     */
    public function getHddLimitPerContract()
    {
        return $this->hddLimitPerContract;
    }

    /**
     * Sets hddLimitPerContract
     * @param int $hddLimitPerContract Maximum number of HDD volumes per contract.
     * @return $this
     */
    public function setHddLimitPerContract($hddLimitPerContract)
    {

        $this->hddLimitPerContract = $hddLimitPerContract;
        return $this;
    }


    /**
     * Gets ssdLimitPerContract
     * @return int
     */
    public function getSsdLimitPerContract()
    {
        return $this->ssdLimitPerContract;
    }

    /**
     * Sets ssdLimitPerContract
     * @param int $ssdLimitPerContract Maximum number of SSD volumes per contract.
     * @return $this
     */
    public function setSsdLimitPerContract($ssdLimitPerContract)
    {

        $this->ssdLimitPerContract = $ssdLimitPerContract;
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
