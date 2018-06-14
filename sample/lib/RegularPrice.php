<?php
require_once 'Price.php';

class RegularPrice extends Price
{
    public function getPriceCode()
    {
        return Movie::REGULAR;
    }

    public function getCharge($days_rented)
    {
        $return = 2;
        if ($days_rented > 2) {
            $return += ($days_rented - 2) * 1.5;
        }

        return $return;
    }
}
