<?php
require_once 'Movie.php';

class Regular implements Movie
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
        $return = 2;
        if ($days_rented > 2) {
            $return += ($days_rented - 2) * 1.5;
        }
        return $return;
    }

    public function getFrequentRenterPoints($days_rented)
    {
        return 0;
    }
}