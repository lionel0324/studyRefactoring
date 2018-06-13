<?php

class Customer
{
    private $_name;

    /** Rental[] */
    private $_rentals;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function addRental(Rental $rental)
    {
        $this->_rentals[] = $rental;
    }

    public function getName()
    {
        return $this->_name;
    }

    /**
     * 合計金額と獲得ポイントをテキストで返す
     *
     * @return string
     */
    public function statement()
    {
        $result = sprintf('Rental Record For %s ' . "\n", $this->getName());

        // 金額を計算
        foreach ($this->_rentals as $rental) {
            $movie = $rental->getMovie();

            $result .= sprintf('%s %s yen ' . "\n", $movie->getTitle(), $rental->getCharge());
        }
        // フッタの追加
        $result .= sprintf('Amount owed is %s yen ' . "\n", $this->getTotalCharge());
        $result .= sprintf('rental point %s ', $this->getTotalFrequentRenterPoints());
        return $result;
    }

    /**
     * 合計金額を返す
     *
     * @return float
     */
    private function getTotalCharge()
    {
        $result = 0;
        foreach ($this->_rentals as $rental) {
            $result += $rental->getCharge();
        }
        return $result;
    }

    /**
     * 合計ポイントを返す
     *
     * @return float
     */
    private function getTotalFrequentRenterPoints()
    {
        $result = 0;
        foreach ($this->_rentals as $rental) {
            $result += $rental->getFrequentRenterPoints();
        }
        return $result;

    }
}
