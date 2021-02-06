<?php


namespace Recruitment\Cart;

use Recruitment\Cart\Exception\QuantityTooLowException;
use Recruitment\Entity\Product;

class Item
{
    /** @var int */
    private $id;

    /** @var Product */
    private $product;

    /** @var int */
    private $quantity;

    /**
     * Item constructor.
     * @param Product $product
     * @param int $quantity
     */
    public function __construct(Product $product, int $quantity = 1)
    {
        $this->product = $product;

        if ($quantity < $product->getMinimumQuantity()) {
            throw new \InvalidArgumentException('Wartość jest mniejsza niż minimalna wartość dla tego produktu!');
        }
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }
    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @throws QuantityTooLowException
     */
    public function setQuantity(int $quantity): void
    {
        if ($quantity < $this->product->getMinimumQuantity()) {
            throw new QuantityTooLowException('Wartość jest mniejsza niż minimalna wartość dla tego produktu!');
        }

        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getTotalPrice(): int
    {
        return $this->quantity * $this->product->getUnitPrice();
    }
}
