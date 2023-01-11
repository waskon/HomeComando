<?php

class Announcement
{
    private $title;
    private $description;
    private $image;
    private $price;
    private $size;
    private $phoneNumber;
    private $propertyType;
    private $purpose;
    private $locationId;

    public function __construct($title, $description, $image, $price, $size, $phoneNumber, $propertyType, $purpose, $locationId)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
        $this->size = $size;
        $this->phoneNumber = $phoneNumber;
        $this->propertyType = $propertyType;
        $this->purpose = $purpose;
        $this->locationId = $locationId;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription() : string
    {
        return $this->description;
    }


    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getImage() : string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getPrice() : float
    {
        return $this->price;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function getSize() : float
    {
        return $this->size;
    }

    public function setSize(float $size)
    {
        $this->size = $size;
    }

    public function getPhoneNumber() : string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPropertyType() : string
    {
        return $this->propertyType;
    }

    public function setPropertyType(string $propertyType)
    {
        $this->propertyType = $propertyType;
    }

    public function getPurpose() : string
    {
        return $this->purpose;
    }

    public function setPurpose(string $purpose)
    {
        $this->purpose = $purpose;
    }

    public function getLocationId() : int
    {
        return $this->locationId;
    }

    public function setLocationId(int $locationId)
    {
        $this->locationId = $locationId;
    }


}