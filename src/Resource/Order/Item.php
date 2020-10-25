<?php

namespace DouglasMaia\MercadoPago\Resource\Order;

/**
 * Class Item
 *
 * @package DouglasMaia\MercadoPago\Resource\Order
 */
class Item
{
    /**
     * @var
     */
    protected $name;
    /**
     * @var
     */
    protected $price;
    /**
     * @var
     */
    protected $qty;
    /**
     * @var string
     */
    protected $sku = '';
    /**
     * @var string
     */
    protected $description = '';
    /**
     * @var string
     */
    protected $picture_url = '';
    /**
     * @var string
     */
    protected $category_id = '';
    /**
     * @var
     */
    protected $total;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }


    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }


    /**
     * @param int $qty
     */
    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
    }


    /**
     * @param float $total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getPictureUrl(): string
    {
        return $this->picture_url;
    }

    /**
     * @param string $picture_url
     */
    public function setPictureUrl(string $picture_url): void
    {
        $this->picture_url = $picture_url;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     */
    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        return  [
            'id' => $this->getSku(),
            'title' => $this->getName(),
            'description' => $this->getDescription(),
            'picture_url' => $this->getPictureUrl(),
            'category_id' => $this->getCategoryId(),
            'quantity' => $this->getQty(),
            'unit_price' => $this->getPrice(),
        ];
    }

}