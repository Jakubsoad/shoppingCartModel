<?php

declare(strict_types=1);

namespace Recruitment\Cart\Exception;

use Exception;

/**
 * Class QuantityTooLowException
 * @package Recruitment\Cart\Exception
 */
class QuantityTooLowException extends Exception
{
    protected $message = 'Ilość jest za mała!';
}
