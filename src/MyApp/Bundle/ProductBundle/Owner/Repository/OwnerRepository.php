<?php

namespace MyApp\Bundle\ProductBundle\Owner\Repository;

use Doctrine\ORM\EntityRepository;
use MyApp\Component\Product\Domain\Exception\OwnerNotExistException;
use MyApp\Component\Product\Domain\Owner;
use \MyApp\Component\Product\Domain\Repository\OwnerRepository as IOwnerRepository;

class OwnerRepository extends EntityRepository implements IOwnerRepository
{
    public function findAllOrderedByName(): array
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT o FROM ProductBundle:Owner o ORDER BY o.name ASC'
            )
            ->getResult();
    }

    public function saveOwner(Owner $owner): void
    {
        $em = $this->getEntityManager();
        $em->persist($owner);
        $em->flush();
    }

    public function findOwnerById(string $id): Owner
    {
        $owner = $this->findOneBy(['id' => $id]);
        if (!$owner) {
            throw new OwnerNotExistException();
        }
        return $owner;
    }
}