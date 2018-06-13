<?php

interface Movie
{
    public function __construct($title);

    public function getTitle();

    public function getCharge($days_rented);

    public function getFrequentRenterPoints($days_rented);
}
