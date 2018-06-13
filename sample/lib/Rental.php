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

    /**
     * レンタル料金を返す
     *
     * @return float
     */
    public function getCharge()
    {
        return $this->getMovie()->getCharge($this->_days_rented);
    }

    /**
     * レンタルポイントを返す
     *
     * @return int
     */
    public function getFrequentRenterPoints()
    {
        return $this->getMovie()->getFrequentRenterPoints($this->_days_rented);
    }
}
