<?php

class Address
//    extends User
{
    private $street;
    private $houseNumber;
    private $flatNumber;
    private $postalCode;
    private $country;

    public function __construct($street, $houseNumber, $flatNumber, $postalCode, $country)
    {
        $this->street = $street;
        $this->houseNumber = $houseNumber;
        $this->flatNumber = $flatNumber;
        $this->postalCode = $postalCode;
        $this->country = $country;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street): void
    {
        $this->street = $street;
    }

    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    public function setHouseNumber($houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }

    public function getFlatNumber()
    {
        return $this->flatNumber;
    }

    public function setFlatNumber($flatNumber): void
    {
        $this->flatNumber = $flatNumber;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function setPostalCode($postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country): void
    {
        $this->country = $country;
    }

}