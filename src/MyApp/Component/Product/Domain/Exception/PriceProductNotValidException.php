<?php

namespace MyApp\Component\Product\Domain\Exception;

class PriceProductNotValidException extends ValidationException
{
    public function __construct()
    {
        parent::__construct('Price of product not valid');
    }
}
