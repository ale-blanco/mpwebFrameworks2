<?php

namespace MyApp\Component\Product\Domain;

class Owner
{
    private $id;
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
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
