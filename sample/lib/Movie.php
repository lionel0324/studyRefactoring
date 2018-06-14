<?php

class Movie
{
    const REGULAR = 0;
    const NEW_RELEASE = 1;
    const CHILDRENS = 2;

    private $_title;
    private $_price;

    public function __construct($title, $price_code)
    {
        $this->_title = $title;
        $this->setPriceCode($price_code);
    }

    public function getPriceCode()
    {
        return $this->_price->getPriceCode();
    }

    public function setPriceCode($price_code)
    {
        switch ($price_code) {
            case self::REGULAR:
                $this->_price = new RegularPrice();
                break;
            case self::NEW_RELEASE:
                $this->_price = new NewReleasePrice();
                break;
            case self::CHILDRENS:
                $this->_price = new ChildrenPrice();
                break;
        }
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getCharge($days_rented)
    {
        return $this->_price->getCharge($days_rented);
    }

    public function getFrequentRenterPoints($days_rented)
    {
        return $this->_price->getFrequentRenterPoints($days_rented);
    }
}
