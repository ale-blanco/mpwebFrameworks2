<?php

namespace MyApp\Component\Product\Application\Commands\Product;

class CreateProductCommand
{
    private $name;
    private $price;
    private $description;
    private $ownerId;

    public function __construct(string $name, float $price, string $description, string $ownerId)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->ownerId = $ownerId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function ownerId(): string
    {
        return $this->ownerId;
    }
}
