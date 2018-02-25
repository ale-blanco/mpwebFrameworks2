<?php

namespace MyApp\Component\Product\Application\CommandHandlers\Product;

use MyApp\Component\Product\Application\Commands\Product\UpdateProductCommand;
use MyApp\Component\Product\Domain\Repository\ProductRepository;

class UpdateProduct
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function __invoke(UpdateProductCommand $command)
    {
        $product = $this->productRepository->findProduct($command->productId());
        $product->setName($command->name());
        $product->setDescription($command->description());
        $product->setPrice($command->price());
        $this->productRepository->save($product);
    }
}
