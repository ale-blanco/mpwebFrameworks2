<?php

namespace MyApp\Component\Product\Domain\Repository;

use MyApp\Component\Product\Domain\Product;

interface ProductRepository
{
    public function save(Product $product): void;
}
