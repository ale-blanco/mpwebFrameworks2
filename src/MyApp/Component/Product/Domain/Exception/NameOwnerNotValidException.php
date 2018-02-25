<?php

namespace MyApp\Component\Product\Domain\Exception;

class NameOwnerNotValidException extends ValidationException
{
    public function __construct()
    {
        parent::__construct('Name of Owner not valid');
    }
}
