<?php
require_once 'Movie.php';

class NewRelease implements Movie
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
        return $days_rented * 3;;
    }

    public function getFrequentRenterPoints($days_rented)
    {
        if ($days_rented > 1) {
            return 2;
        } else {
            return 1;
        }
    }
}