<?php

declare(strict_types=1);

namespace Recruitment\Cart;

use Exception;
use OutOfBoundsException;
use Recruitment\Cart\Exception\QuantityTooLowException;
use Recruitment\Entity\Order;
use Recruitment\Entity\Product;

/**
 * Class Cart
 * @package Recruitment\Cart
 */
class Cart
{
    /** @var int */
    private $id;

    /** @var Item[] */
    private $items = [];

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
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @param Product $product
     * @param int $quantity
     * @return $this
     * @throws QuantityTooLowException
     */
    public function addProduct(Product $product, int $quantity = 1): Cart
    {
        $productExist = false;
        foreach ($this->items as $item) {
            if ($item->getProduct() === $product) {
                $item->setQuantity($item->getQuantity() + $quantity);
                $productExist = true;
            }
        }

        if (false === $productExist) {
            $this->items[] = new Item($product, $quantity);
        }

        return $this;
    }

    /**
     * @param int $key
     * @return Item
     */
    public function getItem(int $key): Item
    {
        if (array_key_exists($key, $this->items)) {
            return $this->items[$key];
        } else {
            throw new OutOfBoundsException();
        }
    }

    /**
     * @param int $id
     * @return Order
     */
    public function checkout(int $id): Order
    {
        $order = new Order($id, $this->items, $this);
        $this->items = [];

        return $order;
    }

    /**
     * @return int
     */
    public function getTotalPrice(): int
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item->getTotalPrice();
        }

        return $totalPrice;
    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function removeProduct(Product $product): void
    {
        foreach ($this->items as $key => $item) {
            if (($item->getProduct() === $product)) {
                unset($this->items[$key]);
            }
        }
        $this->items = array_values($this->items);
    }

    /**
     * @param Product $product
     * @param int $quantity
     * @throws QuantityTooLowException
     */
    public function setQuantity(Product $product, int $quantity): void
    {
        $productExisted = false;
        foreach ($this->items as $item) {
            if ($item->getProduct() === $product) {
                $item->setQuantity($quantity);
                $productExisted = true;
            }
        }

        if (false === $productExisted) {
            $this->items[] = new Item($product, $quantity);
        }
    }
}
