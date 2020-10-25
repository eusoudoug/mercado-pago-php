<?php

namespace DouglasMaia\MercadoPago\Resource\Order;

use DateTime;

/**
 * Class Order
 *
 * @package DouglasMaia\MercadoPago\Resource\Order
 */
class Order
{
    /**
     * @var
     */
    protected $identification;
    /**
     * @var
     */
    protected $createdAt;
    /**
     * @var array
     */
    protected $items = [];
    /**
     * @var
     */
    protected $total;

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item $items
     */
    public function setItem(Item $items): void
    {
        $this->items[] = $items;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return mixed
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @param mixed $identification
     */
    public function setIdentification($identification): void
    {
        $this->identification = $identification;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt->format('c');
    }

}