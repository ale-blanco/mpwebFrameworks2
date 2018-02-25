<?php

namespace MyApp\Component\Product\Application\Commands\Product;

class DeleteProductCommand
{
    private $productId;

    public function __construct(string $productId)
    {
        $this->productId = $productId;
    }

    public function productId(): string
    {
        return $this->productId;
    }
}
