<?php
/**
 * ServerEntities
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
 * ServerEntities Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     ProfitBricks\Client
 * @author      http://github.com/ProfitBricks-api/ProfitBricks-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/ProfitBricks-api/ProfitBricks-codegen
 */
class ServerEntities implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $ProfitBricksTypes = array(
        'cdroms' => '\ProfitBricks\Client\Model\Cdroms',
        'volumes' => '\ProfitBricks\Client\Model\AttachedVolumes',
        'nics' => '\ProfitBricks\Client\Model\Nics'
    );
  
    static function ProfitBricksTypes() {
        return self::$ProfitBricksTypes;
    }

    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'cdroms' => 'cdroms',
        'volumes' => 'volumes',
        'nics' => 'nics'
    );
  
    static function attributeMap() {
        return self::$attributeMap;
    }

    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'cdroms' => 'setCdroms',
        'volumes' => 'setVolumes',
        'nics' => 'setNics'
    );
  
    static function setters() {
        return self::$setters;
    }

    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'cdroms' => 'getCdroms',
        'volumes' => 'getVolumes',
        'nics' => 'getNics'
    );
  
    static function getters() {
        return self::$getters;
    }

    
    /**
      * $cdroms Collection of CD-ROMs attached to that server
      * @var \ProfitBricks\Client\Model\Cdroms
      */
    protected $cdroms;
    
    /**
      * $volumes Collection of volumes attached to that server
      * @var \ProfitBricks\Client\Model\AttachedVolumes
      */
    protected $volumes;
    
    /**
      * $nics Collection of nics of that server
      * @var \ProfitBricks\Client\Model\Nics
      */
    protected $nics;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        
        if ($data != null) {
            $this->cdroms = $data["cdroms"];
            $this->volumes = $data["volumes"];
            $this->nics = $data["nics"];
        }
    }
    
    /**
     * Gets cdroms
     * @return \ProfitBricks\Client\Model\Cdroms
     */
    public function getCdroms()
    {
        return $this->cdroms;
    }
  
    /**
     * Sets cdroms
     * @param \ProfitBricks\Client\Model\Cdroms $cdroms Collection of CD-ROMs attached to that server
     * @return $this
     */
    public function setCdroms($cdroms)
    {
        
        $this->cdroms = $cdroms;
        return $this;
    }
    
    /**
     * Gets volumes
     * @return \ProfitBricks\Client\Model\AttachedVolumes
     */
    public function getVolumes()
    {
        return $this->volumes;
    }
  
    /**
     * Sets volumes
     * @param \ProfitBricks\Client\Model\AttachedVolumes $volumes Collection of volumes attached to that server
     * @return $this
     */
    public function setVolumes($volumes)
    {
        
        $this->volumes = $volumes;
        return $this;
    }
    
    /**
     * Gets nics
     * @return \ProfitBricks\Client\Model\Nics
     */
    public function getNics()
    {
        return $this->nics;
    }
  
    /**
     * Sets nics
     * @param \ProfitBricks\Client\Model\Nics $nics Collection of nics of that server
     * @return $this
     */
    public function setNics($nics)
    {
        
        $this->nics = $nics;
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
