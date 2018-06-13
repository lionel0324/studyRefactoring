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
        $movie = $this->getMovie();

        $return = 0;
        switch ($movie->getPriceCode()) {
            case $movie::REGULAR:
                $return += 2;
                if ($this->getDaysRented() > 2) {
                    $return += ($this->getDaysRented() - 2) * 1.5;
                }
                break;
            case $movie::NEW_RELEASE:
                $return += $this->getDaysRented() * 3;

                break;

            case $movie::CHILDRENS:
                $return += 1.5;
                if ($rethisntal->getDaysRented() > 3) {
                    $return += ($this->getDaysRented() - 3) * 1.5;
                }

                break;
        }
        return $return;
    }
}
