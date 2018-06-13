<?php
require_once 'Movie.php';

class Children implements Movie
{
    private $_title;

    public function __construct($title){
        $this->_title  = $title;
    }

    public function getTitle(){
        return $this->_title;
    }

    public function getCharge($days_rented)
    {
        $return = 1.5;
        if ($days_rented > 3) {
            $return += ($days_rented - 3) * 1.5;
        }
        return $return;
    }

    public function getFrequentRenterPoints($days_rented)
    {
        return 0;
    }
}