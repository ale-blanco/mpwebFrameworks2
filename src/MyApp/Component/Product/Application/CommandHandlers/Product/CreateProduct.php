<?php

namespace MyApp\Component\Product\Application\CommandHandlers\Product;

use MyApp\Component\Product\Application\Commands\Product\CreateProductCommand;
use MyApp\Component\Product\Domain\Product;
use MyApp\Component\Product\Domain\Repository\OwnerRepository;
use MyApp\Component\Product\Domain\Repository\ProductRepository;

class CreateProduct
{
    private $ownerRepository;
    private $productRepository;

    public function __construct(OwnerRepository $ownerRepository, ProductRepository $productRepository)
    {
        $this->ownerRepository = $ownerRepository;
        $this->productRepository = $productRepository;
    }

    public function __invoke(CreateProductCommand $command)
    {
        $owner = $this->ownerRepository->findOwnerById($command->ownerId());
        $product = new Product($command->name(), $command->price(), $command->description(), $owner);
        $this->productRepository->save($product);
    }
}
