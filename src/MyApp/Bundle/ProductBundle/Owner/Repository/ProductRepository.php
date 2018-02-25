<?php

namespace MyApp\Bundle\ProductBundle\Owner\Repository;

use Doctrine\ORM\EntityRepository;
use MyApp\Component\Product\Domain\Product;
use \MyApp\Component\Product\Domain\Repository\ProductRepository as IProductRepository;

class ProductRepository extends EntityRepository implements IProductRepository
{
    public function save(Product $product): void
    {
        $em = $this->getEntityManager();
        $em->persist($product);
        $em->flush();
    }
}
