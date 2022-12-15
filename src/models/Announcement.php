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

    /**
     * @param $title
     * @param $description
     * @param $image
     * @param $price
     * @param $size
     * @param $number
     * @param $propertyType
     * @param $purpose
     */
    public function __construct($title, $description, $image, $price, $size, $phoneNumber, $propertyType, $purpose)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
        $this->size = $size;
        $this->phoneNumber = $phoneNumber;
        $this->propertyType = $propertyType;
        $this->purpose = $purpose;
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

    public function setPhoneNumber() : string
    {
        return $this->phoneNumber;
    }

    public function getPropertyType() : string
    {
        return $this->phoneNumber;
    }

    public function setPropertyType() : string
    {
        return $this->phoneNumber;
    }

    public function getPurpose() : string
    {
        return $this->phoneNumber;
    }

    public function setPurpose() : string
    {
        return $this->phoneNumber;
    }


}