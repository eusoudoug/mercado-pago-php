<?php

namespace DouglasMaia\MercadoPago\Resource\Customer;

use DateTime;

/**
 * Class Customer
 *
 * @package DouglasMaia\MercadoPago\Resource\Customer
 */
class Customer
{
    /**
     * @var
     */
    protected $name;
    /**
     * @var
     */
    protected $documentType;
    /**
     * @var
     */
    protected $documentNumber;
    /**
     * @var
     */
    protected $email;
    /**
     * @var
     */
    protected $telephone;
    /**
     * @var
     */
    protected $birthDate;
    /**
     * @var
     */
    protected $ipAddress;
    /**
     * @var
     */
    protected $billingAddress;
    /**
     * @var
     */
    protected $shippingAddress;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        $arrayName = explode(' ', $this->name);

        return reset($arrayName);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        $arrayName = explode(' ', $this->name);

        return end($arrayName);
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * @param mixed $documentType
     */
    public function setDocumentType($documentType): void
    {
        $this->documentType = $documentType;
    }

    /**
     * @return mixed
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @param mixed $documentNumber
     */
    public function setDocumentNumber($documentNumber): void
    {
        $this->documentNumber = $documentNumber;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('E-mail inválido');
        }

        $this->email = $email;
    }

    /**
     * @return Telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone(Telephone $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate(DateTime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param mixed $ipAddress
     */
    public function setIpAddress($ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param mixed $billingAddress
     */
    public function setBillingAddress(Address $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return Address
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param mixed $shippingAddress
     */
    public function setShippingAddress(Address $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }
}