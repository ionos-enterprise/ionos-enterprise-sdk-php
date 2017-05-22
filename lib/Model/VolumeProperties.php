<?php
/**
 * VolumeProperties
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
 * VolumeProperties Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     ProfitBricks\Client
 * @author      http://github.com/ProfitBricks-api/ProfitBricks-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/ProfitBricks-api/ProfitBricks-codegen
 */
class VolumeProperties implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    static $ProfitBricksTypes = array(
        'name' => 'string',
        'type' => 'string',
        'size' => 'double',
        'image' => 'string',
        'image_password' => 'string',
        'ssh_keys' => 'string[]',
        'bus' => 'string',
        'licence_type' => 'string',
        'cpu_hot_plug' => 'bool',
        'cpu_hot_unplug' => 'bool',
        'ram_hot_plug' => 'bool',
        'ram_hot_unplug' => 'bool',
        'nic_hot_plug' => 'bool',
        'nic_hot_unplug' => 'bool',
        'disc_virtio_hot_plug' => 'bool',
        'disc_virtio_hot_unplug' => 'bool',
        'disc_scsi_hot_plug' => 'bool',
        'disc_scsi_hot_unplug' => 'bool',
        'device_number' => 'int'
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
        'type' => 'type',
        'size' => 'size',
        'availability_zone' => 'availabilityZone',
        'image' => 'image',
        'image_password' => 'imagePassword',
        'ssh_keys' => 'sshKeys',
        'bus' => 'bus',
        'licence_type' => 'licenceType',
        'cpu_hot_plug' => 'cpuHotPlug',
        'cpu_hot_unplug' => 'cpuHotUnplug',
        'ram_hot_plug' => 'ramHotPlug',
        'ram_hot_unplug' => 'ramHotUnplug',
        'nic_hot_plug' => 'nicHotPlug',
        'nic_hot_unplug' => 'nicHotUnplug',
        'disc_virtio_hot_plug' => 'discVirtioHotPlug',
        'disc_virtio_hot_unplug' => 'discVirtioHotUnplug',
        'disc_scsi_hot_plug' => 'discScsiHotPlug',
        'disc_scsi_hot_unplug' => 'discScsiHotUnplug',
        'device_number' => 'deviceNumber'
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
        'type' => 'setType',
        'size' => 'setSize',
        'availability_zone' => 'setAvailabilityZone',
        'image' => 'setImage',
        'image_password' => 'setImagePassword',
        'ssh_keys' => 'setSshKeys',
        'bus' => 'setBus',
        'licence_type' => 'setLicenceType',
        'cpu_hot_plug' => 'setCpuHotPlug',
        'cpu_hot_unplug' => 'setCpuHotUnplug',
        'ram_hot_plug' => 'setRamHotPlug',
        'ram_hot_unplug' => 'setRamHotUnplug',
        'nic_hot_plug' => 'setNicHotPlug',
        'nic_hot_unplug' => 'setNicHotUnplug',
        'disc_virtio_hot_plug' => 'setDiscVirtioHotPlug',
        'disc_virtio_hot_unplug' => 'setDiscVirtioHotUnplug',
        'disc_scsi_hot_plug' => 'setDiscScsiHotPlug',
        'disc_scsi_hot_unplug' => 'setDiscScsiHotUnplug',
        'device_number' => 'setDeviceNumber'
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
        'type' => 'getType',
        'size' => 'getSize',
        'availability_zone' => 'getAvailabilityZone',
        'image' => 'getImage',
        'image_password' => 'getImagePassword',
        'ssh_keys' => 'getSshKeys',
        'bus' => 'getBus',
        'licence_type' => 'getLicenceType',
        'cpu_hot_plug' => 'getCpuHotPlug',
        'cpu_hot_unplug' => 'getCpuHotUnplug',
        'ram_hot_plug' => 'getRamHotPlug',
        'ram_hot_unplug' => 'getRamHotUnplug',
        'nic_hot_plug' => 'getNicHotPlug',
        'nic_hot_unplug' => 'getNicHotUnplug',
        'disc_virtio_hot_plug' => 'getDiscVirtioHotPlug',
        'disc_virtio_hot_unplug' => 'getDiscVirtioHotUnplug',
        'disc_scsi_hot_plug' => 'getDiscScsiHotPlug',
        'disc_scsi_hot_unplug' => 'getDiscScsiHotUnplug',
        'device_number' => 'getDeviceNumber'
    );

    static function getters() {
        return self::$getters;
    }


    /**
      * $name A name of that resource
      * @var string
      */
    protected $name;

    /**
      * $type Hardware type of the volume. Default is HDD
      * @var string
      */
    protected $type;

    /**
      * $size The size of the volume in GB
      * @var double
      */
    protected $size;

    /**
      * $image Image or snapshot ID to be used as template for this volume
      * @var string
      */
    protected $image;

    /**
      * $image_password Initial password to be set for installed OS. Works with Profitbricks public images only. Not modifiable, forbidden in update requests
      * @var string
      */
    protected $image_password;

    /**
      * $ssh_keys Array of SSH keys
      * @var string[]
      */
    protected $ssh_keys;

    /**
      * $bus The bus type of the volume. Default is VIRTIO
      * @var string
      */
    protected $bus;

    /**
      * $licence_type OS type of this volume
      * @var string
      */
    protected $licence_type;

    /**
      * $cpu_hot_plug Is capable of CPU hot plug (no reboot required)
      * @var bool
      */
    protected $cpu_hot_plug;

    /**
      * $cpu_hot_unplug Is capable of CPU hot unplug (no reboot required)
      * @var bool
      */
    protected $cpu_hot_unplug;

    /**
      * $ram_hot_plug Is capable of memory hot plug (no reboot required)
      * @var bool
      */
    protected $ram_hot_plug;

    /**
      * $ram_hot_unplug Is capable of memory hot unplug (no reboot required)
      * @var bool
      */
    protected $ram_hot_unplug;

    /**
      * $nic_hot_plug Is capable of nic hot plug (no reboot required)
      * @var bool
      */
    protected $nic_hot_plug;

    /**
      * $nic_hot_unplug Is capable of nic hot unplug (no reboot required)
      * @var bool
      */
    protected $nic_hot_unplug;

    /**
      * $disc_virtio_hot_plug Is capable of Virt-IO drive hot plug (no reboot required)
      * @var bool
      */
    protected $disc_virtio_hot_plug;

    /**
      * $disc_virtio_hot_unplug Is capable of Virt-IO drive hot unplug (no reboot required)
      * @var bool
      */
    protected $disc_virtio_hot_unplug;

    /**
      * $disc_scsi_hot_plug Is capable of SCSI drive hot plug (no reboot required)
      * @var bool
      */
    protected $disc_scsi_hot_plug;

    /**
      * $disc_scsi_hot_unplug Is capable of SCSI drive hot unplug (no reboot required)
      * @var bool
      */
    protected $disc_scsi_hot_unplug;

    /**
      * $device_number The LUN ID of the storage volume. Null for volumes not mounted to any VM
      * @var int
      */
    protected $device_number;


    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {

        if ($data != null) {
            $this->name = $data["name"];
            $this->type = $data["type"];
            $this->size = $data["size"];
            $this->image = $data["image"];
            $this->image_password = $data["image_password"];
            $this->ssh_keys = $data["ssh_keys"];
            $this->bus = $data["bus"];
            $this->licence_type = $data["licence_type"];
            $this->cpu_hot_plug = $data["cpu_hot_plug"];
            $this->cpu_hot_unplug = $data["cpu_hot_unplug"];
            $this->ram_hot_plug = $data["ram_hot_plug"];
            $this->ram_hot_unplug = $data["ram_hot_unplug"];
            $this->nic_hot_plug = $data["nic_hot_plug"];
            $this->nic_hot_unplug = $data["nic_hot_unplug"];
            $this->disc_virtio_hot_plug = $data["disc_virtio_hot_plug"];
            $this->disc_virtio_hot_unplug = $data["disc_virtio_hot_unplug"];
            $this->disc_scsi_hot_plug = $data["disc_scsi_hot_plug"];
            $this->disc_scsi_hot_unplug = $data["disc_scsi_hot_unplug"];
            $this->device_number = $data["device_number"];
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
     * @param string $name A name of that resource
     * @return $this
     */
    public function setName($name)
    {

        $this->name = $name;
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
     * @param string $type Hardware type of the volume. Default is HDD
     * @return $this
     */
    public function setType($type)
    {
        $allowed_values = array("HDD", "SSD");
        if (!in_array($type, $allowed_values)) {
            throw new \InvalidArgumentException("Invalid value for 'type', must be one of 'HDD', 'SSD'");
        }
        $this->type = $type;
        return $this;
    }

    /**
     * Gets size
     * @return double
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Sets size
     * @param double $size The size of the volume in GB
     * @return $this
     */
    public function setSize($size)
    {

        $this->size = $size;
        return $this;
    }

    /**
     * Gets image
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets image
     * @param string $image Image or snapshot ID to be used as template for this volume
     * @return $this
     */
    public function setImage($image)
    {

        $this->image = $image;
        return $this;
    }

    /**
     * Gets image_password
     * @return string
     */
    public function getImagePassword()
    {
        return $this->image_password;
    }

    /**
     * Sets image_password
     * @param string $image_password Initial password to be set for installed OS. Works with Profitbricks public images only. Not modifiable, forbidden in update requests
     * @return $this
     */
    public function setImagePassword($image_password)
    {

        $this->image_password = $image_password;
        return $this;
    }

    /**
     * Gets availability_zone
     * @return string
     */
    public function getAvailabilityZone()
    {
        return $this->availability_zone;
    }

    /**
     * Sets availability_zone
     * @param string $availability_zone With the new storage volume parameter, availabilityZone, it is possible to direct a storage volume to be created in one of three zones per data center
     * @return $this
     */
    public function setAvailabilityZone($availability_zone)
    {

        $this->availability_zone = $availability_zone;
        return $this;
    }

    /**
     * Gets ssh_keys
     * @return string[]
     */
    public function getSshKeys()
    {
        return $this->ssh_keys;
    }

    /**
     * Sets ssh_keys
     * @param string[] $ssh_keys Array of SSH keys
     * @return $this
     */
    public function setSshKeys($ssh_keys)
    {

        $this->ssh_keys = $ssh_keys;
        return $this;
    }

    /**
     * Gets bus
     * @return string
     */
    public function getBus()
    {
        return $this->bus;
    }

    /**
     * Sets bus
     * @param string $bus The bus type of the volume. Default is VIRTIO
     * @return $this
     */
    public function setBus($bus)
    {
        $allowed_values = array("VIRTIO", "IDE");
        if (!in_array($bus, $allowed_values)) {
            throw new \InvalidArgumentException("Invalid value for 'bus', must be one of 'VIRTIO', 'IDE'");
        }
        $this->bus = $bus;
        return $this;
    }

    /**
     * Gets licence_type
     * @return string
     */
    public function getLicenceType()
    {
        return $this->licence_type;
    }

    /**
     * Sets licence_type
     * @param string $licence_type OS type of this volume
     * @return $this
     */
    public function setLicenceType($licence_type)
    {
        $allowed_values = array("UNKNOWN", "WINDOWS", "LINUX", "OTHER");
        if (!in_array($licence_type, $allowed_values)) {
            throw new \InvalidArgumentException("Invalid value for 'licence_type', must be one of 'UNKNOWN', 'WINDOWS', 'LINUX', 'OTHER'");
        }
        $this->licence_type = $licence_type;
        return $this;
    }

    /**
     * Gets cpu_hot_plug
     * @return bool
     */
    public function getCpuHotPlug()
    {
        return $this->cpu_hot_plug;
    }

    /**
     * Sets cpu_hot_plug
     * @param bool $cpu_hot_plug Is capable of CPU hot plug (no reboot required)
     * @return $this
     */
    public function setCpuHotPlug($cpu_hot_plug)
    {

        $this->cpu_hot_plug = $cpu_hot_plug;
        return $this;
    }

    /**
     * Gets cpu_hot_unplug
     * @return bool
     */
    public function getCpuHotUnplug()
    {
        return $this->cpu_hot_unplug;
    }

    /**
     * Sets cpu_hot_unplug
     * @param bool $cpu_hot_unplug Is capable of CPU hot unplug (no reboot required)
     * @return $this
     */
    public function setCpuHotUnplug($cpu_hot_unplug)
    {

        $this->cpu_hot_unplug = $cpu_hot_unplug;
        return $this;
    }

    /**
     * Gets ram_hot_plug
     * @return bool
     */
    public function getRamHotPlug()
    {
        return $this->ram_hot_plug;
    }

    /**
     * Sets ram_hot_plug
     * @param bool $ram_hot_plug Is capable of memory hot plug (no reboot required)
     * @return $this
     */
    public function setRamHotPlug($ram_hot_plug)
    {

        $this->ram_hot_plug = $ram_hot_plug;
        return $this;
    }

    /**
     * Gets ram_hot_unplug
     * @return bool
     */
    public function getRamHotUnplug()
    {
        return $this->ram_hot_unplug;
    }

    /**
     * Sets ram_hot_unplug
     * @param bool $ram_hot_unplug Is capable of memory hot unplug (no reboot required)
     * @return $this
     */
    public function setRamHotUnplug($ram_hot_unplug)
    {

        $this->ram_hot_unplug = $ram_hot_unplug;
        return $this;
    }

    /**
     * Gets nic_hot_plug
     * @return bool
     */
    public function getNicHotPlug()
    {
        return $this->nic_hot_plug;
    }

    /**
     * Sets nic_hot_plug
     * @param bool $nic_hot_plug Is capable of nic hot plug (no reboot required)
     * @return $this
     */
    public function setNicHotPlug($nic_hot_plug)
    {

        $this->nic_hot_plug = $nic_hot_plug;
        return $this;
    }

    /**
     * Gets nic_hot_unplug
     * @return bool
     */
    public function getNicHotUnplug()
    {
        return $this->nic_hot_unplug;
    }

    /**
     * Sets nic_hot_unplug
     * @param bool $nic_hot_unplug Is capable of nic hot unplug (no reboot required)
     * @return $this
     */
    public function setNicHotUnplug($nic_hot_unplug)
    {

        $this->nic_hot_unplug = $nic_hot_unplug;
        return $this;
    }

    /**
     * Gets disc_virtio_hot_plug
     * @return bool
     */
    public function getDiscVirtioHotPlug()
    {
        return $this->disc_virtio_hot_plug;
    }

    /**
     * Sets disc_virtio_hot_plug
     * @param bool $disc_virtio_hot_plug Is capable of Virt-IO drive hot plug (no reboot required)
     * @return $this
     */
    public function setDiscVirtioHotPlug($disc_virtio_hot_plug)
    {

        $this->disc_virtio_hot_plug = $disc_virtio_hot_plug;
        return $this;
    }

    /**
     * Gets disc_virtio_hot_unplug
     * @return bool
     */
    public function getDiscVirtioHotUnplug()
    {
        return $this->disc_virtio_hot_unplug;
    }

    /**
     * Sets disc_virtio_hot_unplug
     * @param bool $disc_virtio_hot_unplug Is capable of Virt-IO drive hot unplug (no reboot required)
     * @return $this
     */
    public function setDiscVirtioHotUnplug($disc_virtio_hot_unplug)
    {

        $this->disc_virtio_hot_unplug = $disc_virtio_hot_unplug;
        return $this;
    }

    /**
     * Gets disc_scsi_hot_plug
     * @return bool
     */
    public function getDiscScsiHotPlug()
    {
        return $this->disc_scsi_hot_plug;
    }

    /**
     * Sets disc_scsi_hot_plug
     * @param bool $disc_scsi_hot_plug Is capable of SCSI drive hot plug (no reboot required)
     * @return $this
     */
    public function setDiscScsiHotPlug($disc_scsi_hot_plug)
    {

        $this->disc_scsi_hot_plug = $disc_scsi_hot_plug;
        return $this;
    }

    /**
     * Gets disc_scsi_hot_unplug
     * @return bool
     */
    public function getDiscScsiHotUnplug()
    {
        return $this->disc_scsi_hot_unplug;
    }

    /**
     * Sets disc_scsi_hot_unplug
     * @param bool $disc_scsi_hot_unplug Is capable of SCSI drive hot unplug (no reboot required)
     * @return $this
     */
    public function setDiscScsiHotUnplug($disc_scsi_hot_unplug)
    {

        $this->disc_scsi_hot_unplug = $disc_scsi_hot_unplug;
        return $this;
    }

    /**
     * Gets device_number
     * @return int
     */
    public function getDeviceNumber()
    {
        return $this->device_number;
    }

    /**
     * Sets device_number
     * @param int $device_number The LUN ID of the storage volume. Null for volumes not mounted to any VM
     * @return $this
     */
    public function setDeviceNumber($device_number)
    {

        $this->device_number = $device_number;
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
