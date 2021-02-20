<?php

declare(strict_types=1);

namespace Recruitment\Entity;

use InvalidArgumentException;
use Recruitment\Entity\Exception\InvalidUnitPriceException;

/**
 * Class Product
 * @package Recruitment\Entity
 */
class Product
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $unitPrice;

    /** @var int */
    private $minimumQuantity = 1;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Product
     */
    public function setId(int $id): Product
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }

    /**
     * @param int $unitPrice
     * @return Product
     */
    public function setUnitPrice(int $unitPrice): Product
    {
        if ($unitPrice < 1) {
            throw new InvalidUnitPriceException();
        }
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinimumQuantity(): int
    {
        return $this->minimumQuantity;
    }

    /**
     * @param int $minimumQuantity
     * @return Product
     * @throws InvalidArgumentException
     */
    public function setMinimumQuantity(int $minimumQuantity): Product
    {
        if ($minimumQuantity < 1) {
            throw new InvalidArgumentException("Ilość jest za mała!");
        }
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }
}
