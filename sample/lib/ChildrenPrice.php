<?php
require_once 'Price.php';

class ChildrenPrice extends Price
{
    public function getPriceCode()
    {
        return Movie::CHILDRENS;
    }

    public function getCharge($days_rented)
    {
        $return = 1.5;
        if ($days_rented > 3) {
            $return += ($days_rented - 3) * 1.5;
        }

        return $return;
    }
}
