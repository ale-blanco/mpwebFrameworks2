<?php

namespace MyApp\Component\Product\Application\CommandHandlers\Owner;

use MyApp\Component\Product\Application\Commands\Owner\CreateOwnerCommand;
use MyApp\Component\Product\Domain\Owner;
use MyApp\Component\Product\Domain\Repository\OwnerRepository;

class CreateOwner
{
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }

    public function __invoke(CreateOwnerCommand $command): void
    {
        $owner = new Owner($command->name());
        $this->ownerRepository->saveOwner($owner);
    }
}
