<?php

declare(strict_types=1);

namespace Recruitment\Entity\Exception;

use Exception;

/**
 * Class InvalidUnitPriceException
 * @package Recruitment\Entity\Exception
 */
class InvalidUnitPriceException extends Exception
{
    protected $message = 'Cena musi być większa niż 0 groszy!';
}
