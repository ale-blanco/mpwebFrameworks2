<?php

namespace MyApp\Component\Product\Application\Commands\Product;

class UpdateProductCommand
{
    private $productId;
    private $name;
    private $price;
    private $description;

    public function __construct(string $productId, string $name, float $price, string $description)
    {

        $this->productId = $productId;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function productId(): string
    {
        return $this->productId;
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
}
