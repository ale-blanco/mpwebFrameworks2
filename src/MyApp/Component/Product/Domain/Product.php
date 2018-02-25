<?php

namespace MyApp\Component\Product\Domain;

class Product
{
    private $id;
    private $name;
    private $price;
    private $description;
    private $owner;

    public function __construct(string $name, float $price, string $description, Owner $owner)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->owner = $owner;
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

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'description' => $this->getDescription(),
            'ownerId' => $this->getOwner()->getId()
        ];
    }
}
