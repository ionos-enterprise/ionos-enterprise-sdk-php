<?php
/**
 * DatacenterEntities
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
 * DatacenterEntities Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     ProfitBricks\Client
 * @author      http://github.com/ProfitBricks-api/ProfitBricks-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/ProfitBricks-api/ProfitBricks-codegen
 */
class DatacenterEntities implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $ProfitBricksTypes = array(
        'servers' => '\ProfitBricks\Client\Model\Servers',
        'volumes' => '\ProfitBricks\Client\Model\Volumes',
        'loadbalancers' => '\ProfitBricks\Client\Model\Loadbalancers',
        'lans' => '\ProfitBricks\Client\Model\Lans'
    );
  
    static function ProfitBricksTypes() {
        return self::$ProfitBricksTypes;
    }

    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'servers' => 'servers',
        'volumes' => 'volumes',
        'loadbalancers' => 'loadbalancers',
        'lans' => 'lans'
    );
  
    static function attributeMap() {
        return self::$attributeMap;
    }

    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'servers' => 'setServers',
        'volumes' => 'setVolumes',
        'loadbalancers' => 'setLoadbalancers',
        'lans' => 'setLans'
    );
  
    static function setters() {
        return self::$setters;
    }

    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'servers' => 'getServers',
        'volumes' => 'getVolumes',
        'loadbalancers' => 'getLoadbalancers',
        'lans' => 'getLans'
    );
  
    static function getters() {
        return self::$getters;
    }

    
    /**
      * $servers Collection of servers defined in that datacenter
      * @var \ProfitBricks\Client\Model\Servers
      */
    protected $servers;
    
    /**
      * $volumes Collection of volumes defined in that datacenter
      * @var \ProfitBricks\Client\Model\Volumes
      */
    protected $volumes;
    
    /**
      * $loadbalancers Collection of loadbalancers defined in that datacenter
      * @var \ProfitBricks\Client\Model\Loadbalancers
      */
    protected $loadbalancers;
    
    /**
      * $lans Collection of lans defined in that datacenter
      * @var \ProfitBricks\Client\Model\Lans
      */
    protected $lans;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        
        if ($data != null) {
            $this->servers = $data["servers"];
            $this->volumes = $data["volumes"];
            $this->loadbalancers = $data["loadbalancers"];
            $this->lans = $data["lans"];
        }
    }
    
    /**
     * Gets servers
     * @return \ProfitBricks\Client\Model\Servers
     */
    public function getServers()
    {
        return $this->servers;
    }
  
    /**
     * Sets servers
     * @param \ProfitBricks\Client\Model\Servers $servers Collection of servers defined in that datacenter
     * @return $this
     */
    public function setServers($servers)
    {
        
        $this->servers = $servers;
        return $this;
    }
    
    /**
     * Gets volumes
     * @return \ProfitBricks\Client\Model\Volumes
     */
    public function getVolumes()
    {
        return $this->volumes;
    }
  
    /**
     * Sets volumes
     * @param \ProfitBricks\Client\Model\Volumes $volumes Collection of volumes defined in that datacenter
     * @return $this
     */
    public function setVolumes($volumes)
    {
        
        $this->volumes = $volumes;
        return $this;
    }
    
    /**
     * Gets loadbalancers
     * @return \ProfitBricks\Client\Model\Loadbalancers
     */
    public function getLoadbalancers()
    {
        return $this->loadbalancers;
    }
  
    /**
     * Sets loadbalancers
     * @param \ProfitBricks\Client\Model\Loadbalancers $loadbalancers Collection of loadbalancers defined in that datacenter
     * @return $this
     */
    public function setLoadbalancers($loadbalancers)
    {
        
        $this->loadbalancers = $loadbalancers;
        return $this;
    }
    
    /**
     * Gets lans
     * @return \ProfitBricks\Client\Model\Lans
     */
    public function getLans()
    {
        return $this->lans;
    }
  
    /**
     * Sets lans
     * @param \ProfitBricks\Client\Model\Lans $lans Collection of lans defined in that datacenter
     * @return $this
     */
    public function setLans($lans)
    {
        
        $this->lans = $lans;
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
