<?php

namespace MyApp\Component\Product\Domain;

use MyApp\Component\Product\Domain\Exception\NameProductNotValidException;
use MyApp\Component\Product\Domain\Exception\PriceProductNotValidException;

class Product
{
    private $id;
    private $name;
    private $price;
    private $description;
    private $owner;

    public function __construct(string $name, float $price, string $description, Owner $owner)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setDescription($description);
        $this->setOwner($owner);
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
            throw new NameProductNotValidException();
        }
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        if ($price <= 0) {
            throw new PriceProductNotValidException();
        }
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
