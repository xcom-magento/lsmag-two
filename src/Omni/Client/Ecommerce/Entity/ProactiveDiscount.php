<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\Ecommerce\Entity\Enum\ProactiveDiscountType;
use Ls\Omni\Exception\InvalidEnumException;

class ProactiveDiscount
{
    /**
     * @property ArrayOfstring $BenefitItemIds
     */
    protected $BenefitItemIds = null;

    /**
     * @property ArrayOfstring $ItemIds
     */
    protected $ItemIds = null;

    /**
     * @property string $Description
     */
    protected $Description = null;

    /**
     * @property string $Id
     */
    protected $Id = null;

    /**
     * @property string $ItemId
     */
    protected $ItemId = null;

    /**
     * @property string $LoyaltySchemeCode
     */
    protected $LoyaltySchemeCode = null;

    /**
     * @property float $MinimumQuantity
     */
    protected $MinimumQuantity = null;

    /**
     * @property float $Percentage
     */
    protected $Percentage = null;

    /**
     * @property string $PopUpLine1
     */
    protected $PopUpLine1 = null;

    /**
     * @property string $PopUpLine2
     */
    protected $PopUpLine2 = null;

    /**
     * @property float $Price
     */
    protected $Price = null;

    /**
     * @property float $PriceWithDiscount
     */
    protected $PriceWithDiscount = null;

    /**
     * @property int $Priority
     */
    protected $Priority = null;

    /**
     * @property ProactiveDiscountType $Type
     */
    protected $Type = null;

    /**
     * @property string $UnitOfMeasureId
     */
    protected $UnitOfMeasureId = null;

    /**
     * @property string $VariantId
     */
    protected $VariantId = null;

    /**
     * @param ArrayOfstring $BenefitItemIds
     * @return $this
     */
    public function setBenefitItemIds($BenefitItemIds)
    {
        $this->BenefitItemIds = $BenefitItemIds;
        return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getBenefitItemIds()
    {
        return $this->BenefitItemIds;
    }

    /**
     * @param ArrayOfstring $ItemIds
     * @return $this
     */
    public function setItemIds($ItemIds)
    {
        $this->ItemIds = $ItemIds;
        return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getItemIds()
    {
        return $this->ItemIds;
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
     * @param string $ItemId
     * @return $this
     */
    public function setItemId($ItemId)
    {
        $this->ItemId = $ItemId;
        return $this;
    }

    /**
     * @return string
     */
    public function getItemId()
    {
        return $this->ItemId;
    }

    /**
     * @param string $LoyaltySchemeCode
     * @return $this
     */
    public function setLoyaltySchemeCode($LoyaltySchemeCode)
    {
        $this->LoyaltySchemeCode = $LoyaltySchemeCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getLoyaltySchemeCode()
    {
        return $this->LoyaltySchemeCode;
    }

    /**
     * @param float $MinimumQuantity
     * @return $this
     */
    public function setMinimumQuantity($MinimumQuantity)
    {
        $this->MinimumQuantity = $MinimumQuantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinimumQuantity()
    {
        return $this->MinimumQuantity;
    }

    /**
     * @param float $Percentage
     * @return $this
     */
    public function setPercentage($Percentage)
    {
        $this->Percentage = $Percentage;
        return $this;
    }

    /**
     * @return float
     */
    public function getPercentage()
    {
        return $this->Percentage;
    }

    /**
     * @param string $PopUpLine1
     * @return $this
     */
    public function setPopUpLine1($PopUpLine1)
    {
        $this->PopUpLine1 = $PopUpLine1;
        return $this;
    }

    /**
     * @return string
     */
    public function getPopUpLine1()
    {
        return $this->PopUpLine1;
    }

    /**
     * @param string $PopUpLine2
     * @return $this
     */
    public function setPopUpLine2($PopUpLine2)
    {
        $this->PopUpLine2 = $PopUpLine2;
        return $this;
    }

    /**
     * @return string
     */
    public function getPopUpLine2()
    {
        return $this->PopUpLine2;
    }

    /**
     * @param float $Price
     * @return $this
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * @param float $PriceWithDiscount
     * @return $this
     */
    public function setPriceWithDiscount($PriceWithDiscount)
    {
        $this->PriceWithDiscount = $PriceWithDiscount;
        return $this;
    }

    /**
     * @return float
     */
    public function getPriceWithDiscount()
    {
        return $this->PriceWithDiscount;
    }

    /**
     * @param int $Priority
     * @return $this
     */
    public function setPriority($Priority)
    {
        $this->Priority = $Priority;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->Priority;
    }

    /**
     * @param ProactiveDiscountType|string $Type
     * @return $this
     * @throws InvalidEnumException
     */
    public function setType($Type)
    {
        if ( ! $Type instanceof ProactiveDiscountType ) {
            if ( ProactiveDiscountType::isValid( $Type ) )
                $Type = new ProactiveDiscountType( $Type );
            elseif ( ProactiveDiscountType::isValidKey( $Type ) )
                $Type = new ProactiveDiscountType( constant( "ProactiveDiscountType::$Type" ) );
            elseif ( ! $Type instanceof ProactiveDiscountType )
                throw new InvalidEnumException();
        }
        $this->Type = $Type->getValue();

        return $this;
    }

    /**
     * @return ProactiveDiscountType
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param string $UnitOfMeasureId
     * @return $this
     */
    public function setUnitOfMeasureId($UnitOfMeasureId)
    {
        $this->UnitOfMeasureId = $UnitOfMeasureId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnitOfMeasureId()
    {
        return $this->UnitOfMeasureId;
    }

    /**
     * @param string $VariantId
     * @return $this
     */
    public function setVariantId($VariantId)
    {
        $this->VariantId = $VariantId;
        return $this;
    }

    /**
     * @return string
     */
    public function getVariantId()
    {
        return $this->VariantId;
    }
}

