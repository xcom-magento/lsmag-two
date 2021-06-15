<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\Ecommerce\Entity\Enum\KOTStatus;
use Ls\Omni\Exception\InvalidEnumException;

class OrderHospStatus
{

    /**
     * @property boolean $Confirmed
     */
    protected $Confirmed = null;

    /**
     * @property int $EstimatedTime
     */
    protected $EstimatedTime = null;

    /**
     * @property string $KotNo
     */
    protected $KotNo = null;

    /**
     * @property float $ProductionTime
     */
    protected $ProductionTime = null;

    /**
     * @property string $ReceiptNo
     */
    protected $ReceiptNo = null;

    /**
     * @property KOTStatus $Status
     */
    protected $Status = null;

    /**
     * @param boolean $Confirmed
     * @return $this
     */
    public function setConfirmed($Confirmed)
    {
        $this->Confirmed = $Confirmed;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getConfirmed()
    {
        return $this->Confirmed;
    }

    /**
     * @param int $EstimatedTime
     * @return $this
     */
    public function setEstimatedTime($EstimatedTime)
    {
        $this->EstimatedTime = $EstimatedTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getEstimatedTime()
    {
        return $this->EstimatedTime;
    }

    /**
     * @param string $KotNo
     * @return $this
     */
    public function setKotNo($KotNo)
    {
        $this->KotNo = $KotNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getKotNo()
    {
        return $this->KotNo;
    }

    /**
     * @param float $ProductionTime
     * @return $this
     */
    public function setProductionTime($ProductionTime)
    {
        $this->ProductionTime = $ProductionTime;
        return $this;
    }

    /**
     * @return float
     */
    public function getProductionTime()
    {
        return $this->ProductionTime;
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
     * @param KOTStatus|string $Status
     * @return $this
     * @throws InvalidEnumException
     */
    public function setStatus($Status)
    {
        if ( ! $Status instanceof KOTStatus ) {
            if ( KOTStatus::isValid( $Status ) )
                $Status = new KOTStatus( $Status );
            elseif ( KOTStatus::isValidKey( $Status ) )
                $Status = new KOTStatus( constant( "KOTStatus::$Status" ) );
            elseif ( ! $Status instanceof KOTStatus )
                throw new InvalidEnumException();
        }
        $this->Status = $Status->getValue();

        return $this;
    }

    /**
     * @return KOTStatus
     */
    public function getStatus()
    {
        return $this->Status;
    }


}

