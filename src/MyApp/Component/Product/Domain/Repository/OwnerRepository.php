<?php

namespace MyApp\Component\Product\Domain\Repository;

use MyApp\Component\Product\Domain\Owner;

interface OwnerRepository
{
    public function findAllOrderedByName();
    public function saveOwner(Owner $owner): void;
}
