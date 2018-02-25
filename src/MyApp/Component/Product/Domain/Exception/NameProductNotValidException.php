<?php

namespace MyApp\Component\Product\Domain\Exception;

class NameProductNotValidException extends ValidationException
{
    public function __construct()
    {
        parent::__construct('Name of Product not valid');
    }
}
