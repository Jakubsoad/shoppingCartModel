<?php


namespace Recruitment\Entity\Exception;

/**
 * Class InvalidUnitPriceException
 * @package Recruitment\Entity\Exception
 */
class InvalidUnitPriceException extends \InvalidArgumentException
{
    protected $message = 'Cena musi być większa niż 0 groszy!';
}
