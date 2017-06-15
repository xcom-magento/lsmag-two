<?php

namespace Ls\Replication\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Ls\Replication\Api\Data\ImageLinkInterface;

class ImageLink extends AbstractModel implements ImageLinkInterface, IdentityInterface
{

    const CACHE_TAG = 'lsr_replication_image_link';

    protected $_cacheTag = 'lsr_replication_image_link';

    protected $_eventPrefix = 'lsr_replication_image_link';

    protected $Del = null;

    protected $DisplayOrder = null;

    protected $ImageId = null;

    protected $KeyValue = null;

    protected $TableName = null;

    public function _construct()
    {
        $this->_init( 'Ls\Replication\Model\ResourceModel\ImageLink' );
    }

    public function getIdentities()
    {
        return [ self::CACHE_TAG . '_' . $this->getId() ];
    }

    public function setDel($Del)
    {
        $this->Del = $Del;
        return $this;
    }

    public function getDel()
    {
        return $this->Del;
    }

    public function setDisplayOrder($DisplayOrder)
    {
        $this->DisplayOrder = $DisplayOrder;
        return $this;
    }

    public function getDisplayOrder()
    {
        return $this->DisplayOrder;
    }

    public function setImageId($ImageId)
    {
        $this->ImageId = $ImageId;
        return $this;
    }

    public function getImageId()
    {
        return $this->ImageId;
    }

    public function setKeyValue($KeyValue)
    {
        $this->KeyValue = $KeyValue;
        return $this;
    }

    public function getKeyValue()
    {
        return $this->KeyValue;
    }

    public function setTableName($TableName)
    {
        $this->TableName = $TableName;
        return $this;
    }

    public function getTableName()
    {
        return $this->TableName;
    }


}
