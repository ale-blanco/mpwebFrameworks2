<?php

namespace MyApp\Component\Product\Application\CommandHandlers\Owner;

use MyApp\Component\Product\Domain\Owner;
use MyApp\Component\Product\Domain\Repository\OwnerRepository;

class ListOwners
{
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }

    public function __invoke(): array
    {
        $owners = $this->ownerRepository->findAllOrderedByName();
        return array_map(function (Owner $o) {
            return $o->toArray();
        }, $owners);
    }
}
