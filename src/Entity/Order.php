<?php


namespace Recruitment\Entity;

use Recruitment\Cart\Cart;
use Recruitment\Cart\Item;

/**
 * Class Order
 * @package Recruitment\Tests\Cart
 */
class Order
{
    /** @var int */
    private $id;

    /** @var Item[] */
    private $items;

    /** @var Cart */
    private $cart;

    /**
     * @param int $id
     * @param Item[] $items
     * @param Cart $cart
     */
    public function __construct(int $id, array $items, Cart $cart)
    {
        $this->id = $id;
        $this->items = $items;
        $this->cart = $cart;
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
     * @return Cart
     */
    public function getCart(): Cart
    {
        return $this->cart;
    }

    /**
     * @param Cart $cart
     */
    public function setCart(Cart $cart): void
    {
        $this->cart = $cart;
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

    public function getDataForView()
    {
        $dataForView = [ 'id' => $this->id ];
        for ($i = 0; $i < count($this->items); $i++) {
            $dataForView['items'][] = [
                'id' => $i + 1,
                'quantity' => $this->items[$i]->getQuantity(),
                'total_price' => $this->items[$i]->getTotalPrice(),
            ];
        }
        $dataForView['total_price'] = $this->getTotalPrice();

        return $dataForView;
    }
}
