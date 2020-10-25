<?php

namespace DouglasMaia\MercadoPago\Resource\Payment;

use DouglasMaia\MercadoPago\MercadoPago;
use DouglasMaia\MercadoPago\Resource\Customer\Customer;
use DouglasMaia\MercadoPago\Resource\Order\Order;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

/**
 * Class CreditCard
 *
 * Checkout Transparent Mercado Pago
 * Documentation: https://www.mercadopago.com.br/developers/pt/reference/payments/_payments/post/
 *
 * @package DouglasMaia\MercadoPago\Resource\Payment
 */
class CreditCard
{
    /**
     *
     */
    const BINARY_MODE = true;
    /**
     *
     */
    const NOTIFICATION_URL = 'https://www.suaurl.com/notificacoes/';

    /**
     * @var
     */
    protected $number;
    /**
     * @var
     */
    protected $holder;
    /**
     * @var
     */
    protected $expirationDate;
    /**
     * @var
     */
    protected $securityCode;
    /**
     * @var
     */
    protected $brand;
    /**
     * @var
     */
    protected $token;
    /**
     * @var
     */
    protected $installments;

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getHolder()
    {
        return $this->holder;
    }


    /**
     * @param string $holder
     */
    public function setHolder(string $holder): void
    {
        $this->holder = $holder;
    }

    /**
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param string $expirationDate
     */
    public function setExpirationDate(string $expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return string
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * @param string $securityCode
     */
    public function setSecurityCode(string $securityCode): void
    {
        $this->securityCode = $securityCode;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @return int
     */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * @param int $installments
     */
    public function setInstallments(int $installments): void
    {
        $this->installments = $installments;
    }


    /**
     * @param  Customer $customer
     * @param  Order    $order
     * @param  $accessToken
     * @return string
     */
    public function execute(Customer $customer, Order $order, $accessToken)
    {
        $client = new Client();
        try {
            $result = $client->request(
                'POST', MercadoPago::ENDPOINT, [
                'headers' => [
                    "Authorization" =>  "Bearer $accessToken"
                ],
                RequestOptions::JSON => [
                    'token' => $this->token,
                    'installments' => $this->getInstallments(),
                    'transaction_amount' => $order->getTotal(),
                    'description' => '',
                    'payment_method_id' => $this->getBrand(),
                    'payer' => [
                        'email' => $customer->getEmail(),
                        'identification' => [
                            'number' => $customer->getDocumentNumber(),
                            'type' => $customer->getDocumentType()
                        ],
                    ],
                    'notification_url' => self::NOTIFICATION_URL,
                    'sponsor_id' => null, // Não há referência desse parametro na documentação
                    'binary_mode' => self::BINARY_MODE,
                    'external_reference' => $order->getIdentification(),
                    'statement_descriptor' => 'MercadoPago',
                    'additional_info' => [
                        'items' => [
                            $order->getItems()
                        ],
                        'payer' => [
                            'first_name' => $customer->getFirstName(),
                            'last_name' => $customer->getLastName(),
                            'address' => [
                                'zip_code' => $customer->getBillingAddress()->getZipcode(),
                                'street_name' => $customer->getBillingAddress()->getStreet(),
                                'street_number' => $customer->getBillingAddress()->getNumber(),
                            ],
                            'registration_date' => $order->getCreatedAt(),
                            'phone' => [
                                'area_code' => $customer->getTelephone()->getDdd(),
                                'number' => $customer->getTelephone()->getTelephone()
                            ]
                        ],
                        'shipments' => [
                            'receiver_address' => [
                                'street_name' => $customer->getShippingAddress()->getStreet(),
                                'street_number' => $customer->getShippingAddress()->getNumber(),
                                'zip_code' => $customer->getShippingAddress()->getZipcode(),
                                'city_name' => $customer->getShippingAddress()->getCity(),
                                'state_name' => $customer->getShippingAddress()->getState(),
                            ]
                        ]
                    ],
                ]
                ]
            );

            return $result->getBody()->getContents();

        } catch (GuzzleException $exception) {
            return $exception->getMessage();
        }

    }

}