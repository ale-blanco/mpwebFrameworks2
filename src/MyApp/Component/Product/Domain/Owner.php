<?php

namespace MyApp\Component\Product\Domain;

use MyApp\Component\Product\Domain\Exception\NameOwnerNotValidException;

class Owner
{
    private $id;
    private $name;

    public function __construct($name)
    {
        $this->setName($name);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if ($name == '') {
            throw new NameOwnerNotValidException();
        }
        $this->name = $name;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName()
        ];
    }
}
