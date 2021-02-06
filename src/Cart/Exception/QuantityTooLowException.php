<?php


namespace Recruitment\Cart\Exception;

use Exception;

class QuantityTooLowException extends Exception
{
    protected $message = 'Ilość jest za mała!';
}
