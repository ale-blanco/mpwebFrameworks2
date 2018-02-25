<?php

namespace MyApp\Component\Product\Domain\Exception;

class OwnerNotExistException extends ValidationException
{
    public function __construct()
    {
        parent::__construct('Owner not exist');
    }
}
