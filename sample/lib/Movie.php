<?php

class Movie
{
    const REGULAR = 0;
    const NEW_RELEASE = 1;
    const CHILDRENS = 2;

    private $_title;
    private $_price_code;

    public function __construct($title, $price_code)
    {
        $this->_title = $title;
        $this->_price_code = $price_code;
    }

    public function getPriceCode()
    {
        return $this->_price_code;
    }

    public function setPriceCode($price_code)
    {
        $this->_price_code = $price_code;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * レンタル料金を返す
     *
     * @return float
     */
    public function getCharge($days_rented)
    {
        $return = 0;
        switch ($this->getPriceCode()) {
            case self::REGULAR:
                $return += 2;
                if ($days_rented > 2) {
                    $return += ($days_rented - 2) * 1.5;
                }
                break;
            case self::NEW_RELEASE:
                $return += $days_rented * 3;

                break;

            case self::CHILDRENS:
                $return += 1.5;
                if ($days_rented > 3) {
                    $return += ($days_rented - 3) * 1.5;
                }

                break;
        }
        return $return;
    }

    /**
     * レンタルポイントを返す
     *
     * @return int
     */
    public function getFrequentRenterPoints($days_rented)
    {
        $is_new_release = $this->getPriceCode() == self::NEW_RELEASE;

        if ($is_new_release and $days_rented > 1) {
            return 2;
        } else {
            return 1;
        }
    }
}
