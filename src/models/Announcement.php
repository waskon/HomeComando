<?php

class Announcement
{
    private $title;
    private $description;
    private $image;
    private $price;
    private $size;

    /**
     * @param $title
     * @param $description
     * @param $image
     * @param $price
     * @param $size
     */
    public function __construct($title, $description, $image, $price, $size)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
        $this->size = $size;
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


}