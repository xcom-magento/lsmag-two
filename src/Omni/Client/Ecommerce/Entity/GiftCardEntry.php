<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

class GiftCardEntry
{
    /**
     * @property float $Amount
     */
    protected $Amount = null;

    /**
     * @property float $AmountInStoreCurrency
     */
    protected $AmountInStoreCurrency = null;

    /**
     * @property string $CurrencyCode
     */
    protected $CurrencyCode = null;

    /**
     * @property float $CurrencyFactor
     */
    protected $CurrencyFactor = null;

    /**
     * @property string $EntryType
     */
    protected $EntryType = null;

    /**
     * @property int $LineNo
     */
    protected $LineNo = null;

    /**
     * @property string $ReceiptNumber
     */
    protected $ReceiptNumber = null;

    /**
     * @property string $RegTime
     */
    protected $RegTime = null;

    /**
     * @property float $RemainingAmountNow
     */
    protected $RemainingAmountNow = null;

    /**
     * @property string $StoreCurrencyCode
     */
    protected $StoreCurrencyCode = null;

    /**
     * @property string $StoreNo
     */
    protected $StoreNo = null;

    /**
     * @property string $TerminalNo
     */
    protected $TerminalNo = null;

    /**
     * @property int $TransactionNo
     */
    protected $TransactionNo = null;

    /**
     * @property boolean $Voided
     */
    protected $Voided = null;

    /**
     * @property string $VoucherNo
     */
    protected $VoucherNo = null;

    /**
     * @property string $VoucherType
     */
    protected $VoucherType = null;

    /**
     * @param float $Amount
     * @return $this
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * @param float $AmountInStoreCurrency
     * @return $this
     */
    public function setAmountInStoreCurrency($AmountInStoreCurrency)
    {
        $this->AmountInStoreCurrency = $AmountInStoreCurrency;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountInStoreCurrency()
    {
        return $this->AmountInStoreCurrency;
    }

    /**
     * @param string $CurrencyCode
     * @return $this
     */
    public function setCurrencyCode($CurrencyCode)
    {
        $this->CurrencyCode = $CurrencyCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->CurrencyCode;
    }

    /**
     * @param float $CurrencyFactor
     * @return $this
     */
    public function setCurrencyFactor($CurrencyFactor)
    {
        $this->CurrencyFactor = $CurrencyFactor;
        return $this;
    }

    /**
     * @return float
     */
    public function getCurrencyFactor()
    {
        return $this->CurrencyFactor;
    }

    /**
     * @param string $EntryType
     * @return $this
     */
    public function setEntryType($EntryType)
    {
        $this->EntryType = $EntryType;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntryType()
    {
        return $this->EntryType;
    }

    /**
     * @param int $LineNo
     * @return $this
     */
    public function setLineNo($LineNo)
    {
        $this->LineNo = $LineNo;
        return $this;
    }

    /**
     * @return int
     */
    public function getLineNo()
    {
        return $this->LineNo;
    }

    /**
     * @param string $ReceiptNumber
     * @return $this
     */
    public function setReceiptNumber($ReceiptNumber)
    {
        $this->ReceiptNumber = $ReceiptNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptNumber()
    {
        return $this->ReceiptNumber;
    }

    /**
     * @param string $RegTime
     * @return $this
     */
    public function setRegTime($RegTime)
    {
        $this->RegTime = $RegTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegTime()
    {
        return $this->RegTime;
    }

    /**
     * @param float $RemainingAmountNow
     * @return $this
     */
    public function setRemainingAmountNow($RemainingAmountNow)
    {
        $this->RemainingAmountNow = $RemainingAmountNow;
        return $this;
    }

    /**
     * @return float
     */
    public function getRemainingAmountNow()
    {
        return $this->RemainingAmountNow;
    }

    /**
     * @param string $StoreCurrencyCode
     * @return $this
     */
    public function setStoreCurrencyCode($StoreCurrencyCode)
    {
        $this->StoreCurrencyCode = $StoreCurrencyCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStoreCurrencyCode()
    {
        return $this->StoreCurrencyCode;
    }

    /**
     * @param string $StoreNo
     * @return $this
     */
    public function setStoreNo($StoreNo)
    {
        $this->StoreNo = $StoreNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getStoreNo()
    {
        return $this->StoreNo;
    }

    /**
     * @param string $TerminalNo
     * @return $this
     */
    public function setTerminalNo($TerminalNo)
    {
        $this->TerminalNo = $TerminalNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getTerminalNo()
    {
        return $this->TerminalNo;
    }

    /**
     * @param int $TransactionNo
     * @return $this
     */
    public function setTransactionNo($TransactionNo)
    {
        $this->TransactionNo = $TransactionNo;
        return $this;
    }

    /**
     * @return int
     */
    public function getTransactionNo()
    {
        return $this->TransactionNo;
    }

    /**
     * @param boolean $Voided
     * @return $this
     */
    public function setVoided($Voided)
    {
        $this->Voided = $Voided;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getVoided()
    {
        return $this->Voided;
    }

    /**
     * @param string $VoucherNo
     * @return $this
     */
    public function setVoucherNo($VoucherNo)
    {
        $this->VoucherNo = $VoucherNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getVoucherNo()
    {
        return $this->VoucherNo;
    }

    /**
     * @param string $VoucherType
     * @return $this
     */
    public function setVoucherType($VoucherType)
    {
        $this->VoucherType = $VoucherType;
        return $this;
    }

    /**
     * @return string
     */
    public function getVoucherType()
    {
        return $this->VoucherType;
    }
}
