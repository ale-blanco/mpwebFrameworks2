<?php

namespace MyApp\Component\Product\Domain\Exception;

class ValidationException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
