<?php

use DouglasMaia\MercadoPago\MercadoPago;
use DouglasMaia\MercadoPago\Resource\Customer\Address;
use DouglasMaia\MercadoPago\Resource\Customer\Telephone;
use DouglasMaia\MercadoPago\Resource\Order\Item;
use DouglasMaia\MercadoPago\Resource\Payment\CreditCard;

require_once __DIR__ . '/../vendor/autoload.php';

$mercadoPago = new MercadoPago();

$customer = $mercadoPago->customer();

$customer->setName('Douglas Maia');
$customer->setEmail('test@test.com');
$customer->setDocumentNumber('06866578612');
$customer->setDocumentType('CPF');
$customer->setBirthDate(new DateTime('1989-02-02'));
$customer->setIpAddress('192.168.0.1');

// Telephone
$telephone = new Telephone();
$telephone->setTelephone('948773055');
$telephone->setDdd('011');
$customer->setTelephone($telephone);

//Address
$address = new Address();
$address->setStreet('Rua Glicerio');
$address->setNumber('301');
$address->setComplement('Ap 900');
$address->setNeighborhood('Liberdade');
$address->setCity('São Paulo');
$address->setState('SP');
$address->setZipcode('01514000');
$customer->setBillingAddress($address);
$customer->setShippingAddress($address);

// Order
$order = $mercadoPago->order();
$order->setIdentification('M1029923232');
$order->setCreatedAt(new DateTime('NOW'));

// Items
$item = new Item();
$item->setName('Teste');
$item->setQty(2);
$item->setPrice(10.00);
$item->setSku('12121M');

$item2 = new Item();
$item2->setName('Teste 2');
$item2->setQty(2);
$item2->setPrice(13.00);
$item2->setSku('12121J');

$order->setItem($item);
$order->setItem($item2);
$order->setTotal(46.00);

// Credit Card
$creditCard = new CreditCard();
$creditCard->setNumber('4345553343443434');
$creditCard->setHolder('Nome do cliente');
$creditCard->setSecurityCode('123');
$creditCard->setToken('YOUR_FRONTEND_TOKEN');
$creditCard->setBrand('visa');
$creditCard->setExpirationDate('12/2028');
$creditCard->setInstallments(1);

print_r($creditCard->execute($customer, $order, 'YOUR_ACCESS_TOKEN')); // TODO