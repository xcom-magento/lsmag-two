<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\Ecommerce\Entity\Enum\HierarchyLeafType;
use Ls\Omni\Exception\InvalidEnumException;

class ReplHierarchyLeaf
{

    /**
     * @property float $DealPrice
     */
    protected $DealPrice = null;

    /**
     * @property string $Description
     */
    protected $Description = null;

    /**
     * @property string $HierarchyCode
     */
    protected $HierarchyCode = null;

    /**
     * @property string $Id
     */
    protected $Id = null;

    /**
     * @property string $ImageId
     */
    protected $ImageId = null;

    /**
     * @property boolean $IsActive
     */
    protected $IsActive = null;

    /**
     * @property boolean $IsDeleted
     */
    protected $IsDeleted = null;

    /**
     * @property boolean $IsMemberClub
     */
    protected $IsMemberClub = null;

    /**
     * @property string $ItemUOM
     */
    protected $ItemUOM = null;

    /**
     * @property string $MemberValue
     */
    protected $MemberValue = null;

    /**
     * @property string $NodeId
     */
    protected $NodeId = null;

    /**
     * @property float $Prepayment
     */
    protected $Prepayment = null;

    /**
     * @property int $SortOrder
     */
    protected $SortOrder = null;

    /**
     * @property HierarchyLeafType $Type
     */
    protected $Type = null;

    /**
     * @property string $ValidationPeriod
     */
    protected $ValidationPeriod = null;

    /**
     * @property boolean $VendorSourcing
     */
    protected $VendorSourcing = null;

    /**
     * @property string $scope
     */
    protected $scope = null;

    /**
     * @property int $scope_id
     */
    protected $scope_id = null;

    /**
     * @param float $DealPrice
     * @return $this
     */
    public function setDealPrice($DealPrice)
    {
        $this->DealPrice = $DealPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getDealPrice()
    {
        return $this->DealPrice;
    }

    /**
     * @param string $Description
     * @return $this
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $HierarchyCode
     * @return $this
     */
    public function setHierarchyCode($HierarchyCode)
    {
        $this->HierarchyCode = $HierarchyCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getHierarchyCode()
    {
        return $this->HierarchyCode;
    }

    /**
     * @param string $Id
     * @return $this
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param string $ImageId
     * @return $this
     */
    public function setImageId($ImageId)
    {
        $this->ImageId = $ImageId;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageId()
    {
        return $this->ImageId;
    }

    /**
     * @param boolean $IsActive
     * @return $this
     */
    public function setIsActive($IsActive)
    {
        $this->IsActive = $IsActive;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->IsActive;
    }

    /**
     * @param boolean $IsDeleted
     * @return $this
     */
    public function setIsDeleted($IsDeleted)
    {
        $this->IsDeleted = $IsDeleted;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsDeleted()
    {
        return $this->IsDeleted;
    }

    /**
     * @param boolean $IsMemberClub
     * @return $this
     */
    public function setIsMemberClub($IsMemberClub)
    {
        $this->IsMemberClub = $IsMemberClub;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsMemberClub()
    {
        return $this->IsMemberClub;
    }

    /**
     * @param string $ItemUOM
     * @return $this
     */
    public function setItemUOM($ItemUOM)
    {
        $this->ItemUOM = $ItemUOM;
        return $this;
    }

    /**
     * @return string
     */
    public function getItemUOM()
    {
        return $this->ItemUOM;
    }

    /**
     * @param string $MemberValue
     * @return $this
     */
    public function setMemberValue($MemberValue)
    {
        $this->MemberValue = $MemberValue;
        return $this;
    }

    /**
     * @return string
     */
    public function getMemberValue()
    {
        return $this->MemberValue;
    }

    /**
     * @param string $NodeId
     * @return $this
     */
    public function setNodeId($NodeId)
    {
        $this->NodeId = $NodeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getNodeId()
    {
        return $this->NodeId;
    }

    /**
     * @param float $Prepayment
     * @return $this
     */
    public function setPrepayment($Prepayment)
    {
        $this->Prepayment = $Prepayment;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrepayment()
    {
        return $this->Prepayment;
    }

    /**
     * @param int $SortOrder
     * @return $this
     */
    public function setSortOrder($SortOrder)
    {
        $this->SortOrder = $SortOrder;
        return $this;
    }

    /**
     * @return int
     */
    public function getSortOrder()
    {
        return $this->SortOrder;
    }

    /**
     * @param HierarchyLeafType|string $Type
     * @return $this
     * @throws InvalidEnumException
     */
    public function setType($Type)
    {
        if ( ! $Type instanceof HierarchyLeafType ) {
            if ( HierarchyLeafType::isValid( $Type ) )
                $Type = new HierarchyLeafType( $Type );
            elseif ( HierarchyLeafType::isValidKey( $Type ) )
                $Type = new HierarchyLeafType( constant( "HierarchyLeafType::$Type" ) );
            elseif ( ! $Type instanceof HierarchyLeafType )
                throw new InvalidEnumException();
        }
        $this->Type = $Type->getValue();

        return $this;
    }

    /**
     * @return HierarchyLeafType
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param string $ValidationPeriod
     * @return $this
     */
    public function setValidationPeriod($ValidationPeriod)
    {
        $this->ValidationPeriod = $ValidationPeriod;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidationPeriod()
    {
        return $this->ValidationPeriod;
    }

    /**
     * @param boolean $VendorSourcing
     * @return $this
     */
    public function setVendorSourcing($VendorSourcing)
    {
        $this->VendorSourcing = $VendorSourcing;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getVendorSourcing()
    {
        return $this->VendorSourcing;
    }

    /**
     * @param string $scope
     * @return $this
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @param int $scope_id
     * @return $this
     */
    public function setScopeId($scope_id)
    {
        $this->scope_id = $scope_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getScopeId()
    {
        return $this->scope_id;
    }


}

