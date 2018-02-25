<?php

namespace MyApp\Bundle\ProductBundle\Product\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use MyApp\Component\Product\Domain\Exception\ProductNotExistException;
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

    public function delete(string $productId): void
    {
        $em = $this->getEntityManager();
        $product = $em->getReference('ProductBundle:Product', $productId);
        $em->remove($product);
        $em->flush();
    }

    public function findAllProducts(): array
    {
        return $this->findAll(Query::HYDRATE_ARRAY);
    }

    public function findProduct(string $productId): Product
    {
        $product = $this->findOneBy(['id' => $productId]);
        if (!$product) {
            throw new ProductNotExistException();
        }
        return $product;
    }
}
