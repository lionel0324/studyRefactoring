<?php

abstract class Price
{
    abstract public function getPriceCode();

    abstract public function getCharge($days_rented);

    public function getFrequentRenterPoints($days_rented)
    {
        return 1;
    }
}
