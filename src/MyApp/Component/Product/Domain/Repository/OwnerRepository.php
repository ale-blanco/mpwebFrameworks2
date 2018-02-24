<?php

namespace MyApp\Component\Product\Domain\Repository;

use MyApp\Component\Product\Domain\Owner;

interface OwnerRepository
{
    public function findAllOrderedByName(): array;
    public function saveOwner(Owner $owner): void;
}
