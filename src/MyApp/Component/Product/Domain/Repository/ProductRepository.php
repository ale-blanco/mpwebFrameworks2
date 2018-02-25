<?php

namespace MyApp\Component\Product\Domain\Repository;

use MyApp\Component\Product\Domain\Product;

interface ProductRepository
{
    public function save(Product $product): void;
    public function delete(string $productId): void;
    public function findAllProducts(): array;
    public function findProduct(string $productId): Product;
}
