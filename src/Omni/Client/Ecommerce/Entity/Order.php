<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\Ecommerce\Entity\Enum\OrderType;
use Ls\Omni\Client\Ecommerce\Entity\Enum\ShippingStatus;
use Ls\Omni\Exception\InvalidEnumException;

class Order extends Entity
{
    /**
     * @property ArrayOfOrderDiscountLine $OrderDiscountLines
     */
    protected $OrderDiscountLines = null;

    /**
     * @property ArrayOfOrderLine $OrderLines
     */
    protected $OrderLines = null;

    /**
     * @property ArrayOfOrderPayment $OrderPayments
     */
    protected $OrderPayments = null;

    /**
     * @property string $CardId
     */
    protected $CardId = null;

    /**
     * @property string $CollectLocation
     */
    protected $CollectLocation = null;

    /**
     * @property Address $ContactAddress
     */
    protected $ContactAddress = null;

    /**
     * @property string $ContactId
     */
    protected $ContactId = null;

    /**
     * @property string $ContactName
     */
    protected $ContactName = null;

    /**
     * @property string $Currency
     */
    protected $Currency = null;

    /**
     * @property string $CustomerId
     */
    protected $CustomerId = null;

    /**
     * @property string $DayPhoneNumber
     */
    protected $DayPhoneNumber = null;

    /**
     * @property string $Email
     */
    protected $Email = null;

    /**
     * @property OrderType $OrderType
     */
    protected $OrderType = null;

    /**
     * @property float $PointAmount
     */
    protected $PointAmount = null;

    /**
     * @property float $PointBalance
     */
    protected $PointBalance = null;

    /**
     * @property float $PointCashAmountNeeded
     */
    protected $PointCashAmountNeeded = null;

    /**
     * @property float $PointsRewarded
     */
    protected $PointsRewarded = null;

    /**
     * @property float $PointsUsedInOrder
     */
    protected $PointsUsedInOrder = null;

    /**
     * @property string $ReceiptNo
     */
    protected $ReceiptNo = null;

    /**
     * @property string $RequestedDeliveryDate
     */
    protected $RequestedDeliveryDate = null;

    /**
     * @property Address $ShipToAddress
     */
    protected $ShipToAddress = null;

    /**
     * @property string $ShipToEmail
     */
    protected $ShipToEmail = null;

    /**
     * @property string $ShipToName
     */
    protected $ShipToName = null;

    /**
     * @property string $ShippingAgentCode
     */
    protected $ShippingAgentCode = null;

    /**
     * @property string $ShippingAgentServiceCode
     */
    protected $ShippingAgentServiceCode = null;

    /**
     * @property ShippingStatus $ShippingStatus
     */
    protected $ShippingStatus = null;

    /**
     * @property string $StoreId
     */
    protected $StoreId = null;

    /**
     * @property float $TotalAmount
     */
    protected $TotalAmount = null;

    /**
     * @property float $TotalDiscount
     */
    protected $TotalDiscount = null;

    /**
     * @property float $TotalNetAmount
     */
    protected $TotalNetAmount = null;

    /**
     * @param ArrayOfOrderDiscountLine $OrderDiscountLines
     * @return $this
     */
    public function setOrderDiscountLines($OrderDiscountLines)
    {
        $this->OrderDiscountLines = $OrderDiscountLines;
        return $this;
    }

    /**
     * @return ArrayOfOrderDiscountLine
     */
    public function getOrderDiscountLines()
    {
        return $this->OrderDiscountLines;
    }

    /**
     * @param ArrayOfOrderLine $OrderLines
     * @return $this
     */
    public function setOrderLines($OrderLines)
    {
        $this->OrderLines = $OrderLines;
        return $this;
    }

    /**
     * @return ArrayOfOrderLine
     */
    public function getOrderLines()
    {
        return $this->OrderLines;
    }

    /**
     * @param ArrayOfOrderPayment $OrderPayments
     * @return $this
     */
    public function setOrderPayments($OrderPayments)
    {
        $this->OrderPayments = $OrderPayments;
        return $this;
    }

    /**
     * @return ArrayOfOrderPayment
     */
    public function getOrderPayments()
    {
        return $this->OrderPayments;
    }

    /**
     * @param string $CardId
     * @return $this
     */
    public function setCardId($CardId)
    {
        $this->CardId = $CardId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardId()
    {
        return $this->CardId;
    }

    /**
     * @param string $CollectLocation
     * @return $this
     */
    public function setCollectLocation($CollectLocation)
    {
        $this->CollectLocation = $CollectLocation;
        return $this;
    }

    /**
     * @return string
     */
    public function getCollectLocation()
    {
        return $this->CollectLocation;
    }

    /**
     * @param Address $ContactAddress
     * @return $this
     */
    public function setContactAddress($ContactAddress)
    {
        $this->ContactAddress = $ContactAddress;
        return $this;
    }

    /**
     * @return Address
     */
    public function getContactAddress()
    {
        return $this->ContactAddress;
    }

    /**
     * @param string $ContactId
     * @return $this
     */
    public function setContactId($ContactId)
    {
        $this->ContactId = $ContactId;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactId()
    {
        return $this->ContactId;
    }

    /**
     * @param string $ContactName
     * @return $this
     */
    public function setContactName($ContactName)
    {
        $this->ContactName = $ContactName;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactName()
    {
        return $this->ContactName;
    }

    /**
     * @param string $Currency
     * @return $this
     */
    public function setCurrency($Currency)
    {
        $this->Currency = $Currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->Currency;
    }

    /**
     * @param string $CustomerId
     * @return $this
     */
    public function setCustomerId($CustomerId)
    {
        $this->CustomerId = $CustomerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->CustomerId;
    }

    /**
     * @param string $DayPhoneNumber
     * @return $this
     */
    public function setDayPhoneNumber($DayPhoneNumber)
    {
        $this->DayPhoneNumber = $DayPhoneNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getDayPhoneNumber()
    {
        return $this->DayPhoneNumber;
    }

    /**
     * @param string $Email
     * @return $this
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param OrderType|string $OrderType
     * @return $this
     * @throws InvalidEnumException
     */
    public function setOrderType($OrderType)
    {
        if ( ! $OrderType instanceof OrderType ) {
            if ( OrderType::isValid( $OrderType ) )
                $OrderType = new OrderType( $OrderType );
            elseif ( OrderType::isValidKey( $OrderType ) )
                $OrderType = new OrderType( constant( "OrderType::$OrderType" ) );
            elseif ( ! $OrderType instanceof OrderType )
                throw new InvalidEnumException();
        }
        $this->OrderType = $OrderType->getValue();

        return $this;
    }

    /**
     * @return OrderType
     */
    public function getOrderType()
    {
        return $this->OrderType;
    }

    /**
     * @param float $PointAmount
     * @return $this
     */
    public function setPointAmount($PointAmount)
    {
        $this->PointAmount = $PointAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getPointAmount()
    {
        return $this->PointAmount;
    }

    /**
     * @param float $PointBalance
     * @return $this
     */
    public function setPointBalance($PointBalance)
    {
        $this->PointBalance = $PointBalance;
        return $this;
    }

    /**
     * @return float
     */
    public function getPointBalance()
    {
        return $this->PointBalance;
    }

    /**
     * @param float $PointCashAmountNeeded
     * @return $this
     */
    public function setPointCashAmountNeeded($PointCashAmountNeeded)
    {
        $this->PointCashAmountNeeded = $PointCashAmountNeeded;
        return $this;
    }

    /**
     * @return float
     */
    public function getPointCashAmountNeeded()
    {
        return $this->PointCashAmountNeeded;
    }

    /**
     * @param float $PointsRewarded
     * @return $this
     */
    public function setPointsRewarded($PointsRewarded)
    {
        $this->PointsRewarded = $PointsRewarded;
        return $this;
    }

    /**
     * @return float
     */
    public function getPointsRewarded()
    {
        return $this->PointsRewarded;
    }

    /**
     * @param float $PointsUsedInOrder
     * @return $this
     */
    public function setPointsUsedInOrder($PointsUsedInOrder)
    {
        $this->PointsUsedInOrder = $PointsUsedInOrder;
        return $this;
    }

    /**
     * @return float
     */
    public function getPointsUsedInOrder()
    {
        return $this->PointsUsedInOrder;
    }

    /**
     * @param string $ReceiptNo
     * @return $this
     */
    public function setReceiptNo($ReceiptNo)
    {
        $this->ReceiptNo = $ReceiptNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptNo()
    {
        return $this->ReceiptNo;
    }

    /**
     * @param string $RequestedDeliveryDate
     * @return $this
     */
    public function setRequestedDeliveryDate($RequestedDeliveryDate)
    {
        $this->RequestedDeliveryDate = $RequestedDeliveryDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequestedDeliveryDate()
    {
        return $this->RequestedDeliveryDate;
    }

    /**
     * @param Address $ShipToAddress
     * @return $this
     */
    public function setShipToAddress($ShipToAddress)
    {
        $this->ShipToAddress = $ShipToAddress;
        return $this;
    }

    /**
     * @return Address
     */
    public function getShipToAddress()
    {
        return $this->ShipToAddress;
    }

    /**
     * @param string $ShipToEmail
     * @return $this
     */
    public function setShipToEmail($ShipToEmail)
    {
        $this->ShipToEmail = $ShipToEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipToEmail()
    {
        return $this->ShipToEmail;
    }

    /**
     * @param string $ShipToName
     * @return $this
     */
    public function setShipToName($ShipToName)
    {
        $this->ShipToName = $ShipToName;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipToName()
    {
        return $this->ShipToName;
    }

    /**
     * @param string $ShippingAgentCode
     * @return $this
     */
    public function setShippingAgentCode($ShippingAgentCode)
    {
        $this->ShippingAgentCode = $ShippingAgentCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAgentCode()
    {
        return $this->ShippingAgentCode;
    }

    /**
     * @param string $ShippingAgentServiceCode
     * @return $this
     */
    public function setShippingAgentServiceCode($ShippingAgentServiceCode)
    {
        $this->ShippingAgentServiceCode = $ShippingAgentServiceCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAgentServiceCode()
    {
        return $this->ShippingAgentServiceCode;
    }

    /**
     * @param ShippingStatus|string $ShippingStatus
     * @return $this
     * @throws InvalidEnumException
     */
    public function setShippingStatus($ShippingStatus)
    {
        if ( ! $ShippingStatus instanceof ShippingStatus ) {
            if ( ShippingStatus::isValid( $ShippingStatus ) )
                $ShippingStatus = new ShippingStatus( $ShippingStatus );
            elseif ( ShippingStatus::isValidKey( $ShippingStatus ) )
                $ShippingStatus = new ShippingStatus( constant( "ShippingStatus::$ShippingStatus" ) );
            elseif ( ! $ShippingStatus instanceof ShippingStatus )
                throw new InvalidEnumException();
        }
        $this->ShippingStatus = $ShippingStatus->getValue();

        return $this;
    }

    /**
     * @return ShippingStatus
     */
    public function getShippingStatus()
    {
        return $this->ShippingStatus;
    }

    /**
     * @param string $StoreId
     * @return $this
     */
    public function setStoreId($StoreId)
    {
        $this->StoreId = $StoreId;
        return $this;
    }

    /**
     * @return string
     */
    public function getStoreId()
    {
        return $this->StoreId;
    }

    /**
     * @param float $TotalAmount
     * @return $this
     */
    public function setTotalAmount($TotalAmount)
    {
        $this->TotalAmount = $TotalAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalAmount()
    {
        return $this->TotalAmount;
    }

    /**
     * @param float $TotalDiscount
     * @return $this
     */
    public function setTotalDiscount($TotalDiscount)
    {
        $this->TotalDiscount = $TotalDiscount;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalDiscount()
    {
        return $this->TotalDiscount;
    }

    /**
     * @param float $TotalNetAmount
     * @return $this
     */
    public function setTotalNetAmount($TotalNetAmount)
    {
        $this->TotalNetAmount = $TotalNetAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalNetAmount()
    {
        return $this->TotalNetAmount;
    }
}

