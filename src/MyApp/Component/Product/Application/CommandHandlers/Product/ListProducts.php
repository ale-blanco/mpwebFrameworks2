<?php

namespace MyApp\Component\Product\Application\CommandHandlers\Product;

use MyApp\Component\Product\Domain\Product;
use MyApp\Component\Product\Domain\Repository\ProductRepository;

class ListProducts
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function __invoke(): array
    {
        $products = $this->productRepository->findAllProducts();
        return array_map(function (Product $p) {
            return $p->toArray();
        }, $products);
    }
}
