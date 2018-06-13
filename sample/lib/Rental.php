<?php

class Rental
{
    private $_movie;

    /** int レンタル日数*/
    private $_days_rented;

    public function __construct(Movie $movie, $days_rented)
    {
        $this->_movie = $movie;
        $this->_days_rented = $days_rented;
    }

    public function getDaysRented()
    {
        return $this->_days_rented;
    }

    public function getMovie()
    {
        return $this->_movie;
    }
}
