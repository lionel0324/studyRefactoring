<?php
require_once 'Price.php';

class NewReleasePrice extends Price
{
    public function getPriceCode()
    {
        return Movie::NEW_RELEASE;
    }

    public function getCharge($days_rented)
    {
        return $days_rented * 3;
    }

    public function getFrequentRenterPoints($days_rented)
    {
        return ($days_rented > 1) ? 2 : 1;
    }
}
