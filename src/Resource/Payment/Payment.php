<?php

namespace DouglasMaia\MercadoPago\Resource\Payment;

use DouglasMaia\MercadoPago\MercadoPago;
use DouglasMaia\MercadoPago\Resource\Customer\Customer;
use DouglasMaia\MercadoPago\Resource\MercadoPagoResource;
use DouglasMaia\MercadoPago\Resource\Order\Order;

/**
 * Class Payment
 *
 * @package DouglasMaia\MercadoPago\Resource\Payment
 */
class Payment
{
    /**
     * @var
     */
    protected $customer;
    /**
     * @var
     */
    protected $order;

    /**
     * @return CreditCard
     */
    public function creditCard()
    {
        return new CreditCard();
    }

    /**
     * @return Billet
     */
    public function billet()
    {
        return new Billet();
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @param Order $order
     */
    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

}