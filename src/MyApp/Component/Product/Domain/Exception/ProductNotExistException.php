<?php

namespace MyApp\Component\Product\Domain\Exception;

class ProductNotExistException extends ValidationException
{
    public function __construct()
    {
        parent::__construct('Product not Exist');
    }
}
