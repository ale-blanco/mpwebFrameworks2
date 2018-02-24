<?php

namespace MyApp\Component\Product\Application\CommandHandlers;

use MyApp\Component\Product\Application\Commands\Owner\CreateOwnerCommand;
use MyApp\Component\Product\Domain\Owner;
use MyApp\Component\Product\Domain\Repository\OwnerRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CreateOwner
{
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }

    public function __invoke(CreateOwnerCommand $command): void
    {
        if ($command->name() == '') {
            throw new HttpException(400, json_encode(['error' => 'Debe indicar el nombre']));
        }

        $owner = new Owner($command->name());
        $this->ownerRepository->saveOwner($owner);
    }
}
