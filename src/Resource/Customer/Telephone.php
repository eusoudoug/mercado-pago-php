<?php

namespace DouglasMaia\MercadoPago\Resource\Customer;

/**
 * Class Telephone
 *
 * @package  DouglasMaia\MercadoPago\Resource\Customer
 */
class Telephone
{
    /**
     * @var
     */
    protected $ddi;
    /**
     * @var
     */
    protected $ddd;
    /**
     * @var
     */
    protected $telephone;

    /**
     * @return string
     */
    public function getDdi(): string
    {
        return $this->ddi;
    }

    /**
     * @param string $ddi
     */
    public function setDdi(string $ddi): void
    {
        $this->ddi = $ddi;
    }

    /**
     * @return string
     */
    public function getDdd(): string
    {
        return $this->ddd;
    }

    /**
     * @param string $ddd
     */
    public function setDdd(string $ddd): void
    {
        $this->ddd = $ddd;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

}