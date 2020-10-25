<?php

namespace DouglasMaia\MercadoPago;

use DouglasMaia\MercadoPago\Resource\Order\Order;
use DouglasMaia\MercadoPago\Resource\Customer\Customer;
use DouglasMaia\MercadoPago\Resource\Payment\Payment;

/**
 * Class MercadoPago
 *
 * @package DouglasMaia\MercadoPago
 */

class MercadoPago
{

    const ENDPOINT = 'https://api.mercadopago.com/v1/payments';

    /**
     * @return Customer
     */
    public function customer()
    {
        return new Customer();
    }

    /**
     * @return Order
     */
    public function order()
    {
        return new Order();
    }

    /**
     * @return Payment
     */
    public function payment()
    {
        return new Payment();
    }
}