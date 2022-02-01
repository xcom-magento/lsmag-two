<?php
/**
 * THIS IS AN AUTOGENERATED FILE
 * DO NOT MODIFY
 * @codingStandardsIgnoreFile
 */


namespace Ls\Omni\Client\Ecommerce\Entity;

use Ls\Omni\Client\Ecommerce\Entity\Enum\Gender;
use Ls\Omni\Client\Ecommerce\Entity\Enum\MaritalStatus;
use Ls\Omni\Client\Ecommerce\Entity\Enum\SendEmail;
use Ls\Omni\Exception\InvalidEnumException;

class MemberContact extends Entity
{

    /**
     * @property ArrayOfAddress $Addresses
     */
    protected $Addresses = null;

    /**
     * @property ArrayOfCard $Cards
     */
    protected $Cards = null;

    /**
     * @property ArrayOfNotification $Notifications
     */
    protected $Notifications = null;

    /**
     * @property ArrayOfOneList $OneLists
     */
    protected $OneLists = null;

    /**
     * @property ArrayOfProfile $Profiles
     */
    protected $Profiles = null;

    /**
     * @property ArrayOfPublishedOffer $PublishedOffers
     */
    protected $PublishedOffers = null;

    /**
     * @property ArrayOfSalesEntry $SalesEntries
     */
    protected $SalesEntries = null;

    /**
     * @property Account $Account
     */
    protected $Account = null;

    /**
     * @property string $AlternateId
     */
    protected $AlternateId = null;

    /**
     * @property string $AuthenticationId
     */
    protected $AuthenticationId = null;

    /**
     * @property string $Authenticator
     */
    protected $Authenticator = null;

    /**
     * @property string $BirthDay
     */
    protected $BirthDay = null;

    /**
     * @property string $Email
     */
    protected $Email = null;

    /**
     * @property OmniEnvironment $Environment
     */
    protected $Environment = null;

    /**
     * @property string $FirstName
     */
    protected $FirstName = null;

    /**
     * @property Gender $Gender
     */
    protected $Gender = null;

    /**
     * @property string $Initials
     */
    protected $Initials = null;

    /**
     * @property string $LastName
     */
    protected $LastName = null;

    /**
     * @property Device $LoggedOnToDevice
     */
    protected $LoggedOnToDevice = null;

    /**
     * @property MaritalStatus $MaritalStatus
     */
    protected $MaritalStatus = null;

    /**
     * @property string $MiddleName
     */
    protected $MiddleName = null;

    /**
     * @property string $Name
     */
    protected $Name = null;

    /**
     * @property string $Password
     */
    protected $Password = null;

    /**
     * @property SendEmail $SendReceiptByEMail
     */
    protected $SendReceiptByEMail = null;

    /**
     * @property string $UserName
     */
    protected $UserName = null;

    /**
     * @param ArrayOfAddress $Addresses
     * @return $this
     */
    public function setAddresses($Addresses)
    {
        $this->Addresses = $Addresses;
        return $this;
    }

    /**
     * @return ArrayOfAddress
     */
    public function getAddresses()
    {
        return $this->Addresses;
    }

    /**
     * @param ArrayOfCard $Cards
     * @return $this
     */
    public function setCards($Cards)
    {
        $this->Cards = $Cards;
        return $this;
    }

    /**
     * @return ArrayOfCard
     */
    public function getCards()
    {
        return $this->Cards;
    }

    /**
     * @param ArrayOfNotification $Notifications
     * @return $this
     */
    public function setNotifications($Notifications)
    {
        $this->Notifications = $Notifications;
        return $this;
    }

    /**
     * @return ArrayOfNotification
     */
    public function getNotifications()
    {
        return $this->Notifications;
    }

    /**
     * @param ArrayOfOneList $OneLists
     * @return $this
     */
    public function setOneLists($OneLists)
    {
        $this->OneLists = $OneLists;
        return $this;
    }

    /**
     * @return ArrayOfOneList
     */
    public function getOneLists()
    {
        return $this->OneLists;
    }

    /**
     * @param ArrayOfProfile $Profiles
     * @return $this
     */
    public function setProfiles($Profiles)
    {
        $this->Profiles = $Profiles;
        return $this;
    }

    /**
     * @return ArrayOfProfile
     */
    public function getProfiles()
    {
        return $this->Profiles;
    }

    /**
     * @param ArrayOfPublishedOffer $PublishedOffers
     * @return $this
     */
    public function setPublishedOffers($PublishedOffers)
    {
        $this->PublishedOffers = $PublishedOffers;
        return $this;
    }

    /**
     * @return ArrayOfPublishedOffer
     */
    public function getPublishedOffers()
    {
        return $this->PublishedOffers;
    }

    /**
     * @param ArrayOfSalesEntry $SalesEntries
     * @return $this
     */
    public function setSalesEntries($SalesEntries)
    {
        $this->SalesEntries = $SalesEntries;
        return $this;
    }

    /**
     * @return ArrayOfSalesEntry
     */
    public function getSalesEntries()
    {
        return $this->SalesEntries;
    }

    /**
     * @param Account $Account
     * @return $this
     */
    public function setAccount($Account)
    {
        $this->Account = $Account;
        return $this;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->Account;
    }

    /**
     * @param string $AlternateId
     * @return $this
     */
    public function setAlternateId($AlternateId)
    {
        $this->AlternateId = $AlternateId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlternateId()
    {
        return $this->AlternateId;
    }

    /**
     * @param string $AuthenticationId
     * @return $this
     */
    public function setAuthenticationId($AuthenticationId)
    {
        $this->AuthenticationId = $AuthenticationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthenticationId()
    {
        return $this->AuthenticationId;
    }

    /**
     * @param string $Authenticator
     * @return $this
     */
    public function setAuthenticator($Authenticator)
    {
        $this->Authenticator = $Authenticator;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthenticator()
    {
        return $this->Authenticator;
    }

    /**
     * @param string $BirthDay
     * @return $this
     */
    public function setBirthDay($BirthDay)
    {
        $this->BirthDay = $BirthDay;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthDay()
    {
        return $this->BirthDay;
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
     * @param OmniEnvironment $Environment
     * @return $this
     */
    public function setEnvironment($Environment)
    {
        $this->Environment = $Environment;
        return $this;
    }

    /**
     * @return OmniEnvironment
     */
    public function getEnvironment()
    {
        return $this->Environment;
    }

    /**
     * @param string $FirstName
     * @return $this
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @param Gender|string $Gender
     * @return $this
     * @throws InvalidEnumException
     */
    public function setGender($Gender)
    {
        if ( ! $Gender instanceof Gender ) {
            if ( Gender::isValid( $Gender ) )
                $Gender = new Gender( $Gender );
            elseif ( Gender::isValidKey( $Gender ) )
                $Gender = new Gender( constant( "Gender::$Gender" ) );
            elseif ( ! $Gender instanceof Gender )
                throw new InvalidEnumException();
        }
        $this->Gender = $Gender->getValue();

        return $this;
    }

    /**
     * @return Gender
     */
    public function getGender()
    {
        return $this->Gender;
    }

    /**
     * @param string $Initials
     * @return $this
     */
    public function setInitials($Initials)
    {
        $this->Initials = $Initials;
        return $this;
    }

    /**
     * @return string
     */
    public function getInitials()
    {
        return $this->Initials;
    }

    /**
     * @param string $LastName
     * @return $this
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @param Device $LoggedOnToDevice
     * @return $this
     */
    public function setLoggedOnToDevice($LoggedOnToDevice)
    {
        $this->LoggedOnToDevice = $LoggedOnToDevice;
        return $this;
    }

    /**
     * @return Device
     */
    public function getLoggedOnToDevice()
    {
        return $this->LoggedOnToDevice;
    }

    /**
     * @param MaritalStatus|string $MaritalStatus
     * @return $this
     * @throws InvalidEnumException
     */
    public function setMaritalStatus($MaritalStatus)
    {
        if ( ! $MaritalStatus instanceof MaritalStatus ) {
            if ( MaritalStatus::isValid( $MaritalStatus ) )
                $MaritalStatus = new MaritalStatus( $MaritalStatus );
            elseif ( MaritalStatus::isValidKey( $MaritalStatus ) )
                $MaritalStatus = new MaritalStatus( constant( "MaritalStatus::$MaritalStatus" ) );
            elseif ( ! $MaritalStatus instanceof MaritalStatus )
                throw new InvalidEnumException();
        }
        $this->MaritalStatus = $MaritalStatus->getValue();

        return $this;
    }

    /**
     * @return MaritalStatus
     */
    public function getMaritalStatus()
    {
        return $this->MaritalStatus;
    }

    /**
     * @param string $MiddleName
     * @return $this
     */
    public function setMiddleName($MiddleName)
    {
        $this->MiddleName = $MiddleName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->MiddleName;
    }

    /**
     * @param string $Name
     * @return $this
     */
    public function setName($Name)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Password
     * @return $this
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param SendEmail|string $SendReceiptByEMail
     * @return $this
     * @throws InvalidEnumException
     */
    public function setSendReceiptByEMail($SendReceiptByEMail)
    {
        if ( ! $SendReceiptByEMail instanceof SendEmail ) {
            if ( SendEmail::isValid( $SendReceiptByEMail ) )
                $SendReceiptByEMail = new SendEmail( $SendReceiptByEMail );
            elseif ( SendEmail::isValidKey( $SendReceiptByEMail ) )
                $SendReceiptByEMail = new SendEmail( constant( "SendEmail::$SendReceiptByEMail" ) );
            elseif ( ! $SendReceiptByEMail instanceof SendEmail )
                throw new InvalidEnumException();
        }
        $this->SendReceiptByEMail = $SendReceiptByEMail->getValue();

        return $this;
    }

    /**
     * @return SendEmail
     */
    public function getSendReceiptByEMail()
    {
        return $this->SendReceiptByEMail;
    }

    /**
     * @param string $UserName
     * @return $this
     */
    public function setUserName($UserName)
    {
        $this->UserName = $UserName;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->UserName;
    }


}

