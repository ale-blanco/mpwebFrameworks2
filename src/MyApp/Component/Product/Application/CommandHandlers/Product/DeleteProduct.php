<?php

namespace MyApp\Component\Product\Application\CommandHandlers\Product;

use MyApp\Component\Product\Application\Commands\Product\DeleteProductCommand;
use MyApp\Component\Product\Domain\Repository\ProductRepository;

class DeleteProduct
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function __invoke(DeleteProductCommand $command)
    {
        $this->productRepository->delete($command->productId());
    }
}
