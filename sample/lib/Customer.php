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
        $total_amount = 0; // 合計金額
        $frequent_renter_points = 0; // レンタルポイント
        $rentals = $this->_rentals;
        $result = sprintf('Rental Record For %s ' . "\n", $this->getName());

        // 金額を計算
        foreach ($rentals as $rental) {
            $movie = $rental->getMovie();

            $this_amount = $this->amountFor($rental);

            // ポイント加算
            $frequent_renter_points++;

            // 新作を2日以上借りたらボーナスポイント
            if ($movie->getPriceCode() == $movie::NEW_RELEASE and $rental->getDaysRented() > 1) {
                $frequent_renter_points++;
            }
            $result .= sprintf('%s %s yen ' . "\n", $movie->getTitle(), $this_amount);
            $total_amount += $this_amount;
        }
        // フッタの追加
        $result .= sprintf('Amount owed is %s yen ' . "\n", $total_amount);
        $result .= sprintf('rental point %s ', $frequent_renter_points);
        return $result;
    }

    private function amountFor(Rental $rental)
    {
        $movie = $rental->getMovie();

        $this_amount = 0;
        switch ($movie->getPriceCode()) {
            case $movie::REGULAR:
                $this_amount += 2;
                if ($rental->getDaysRented() > 2) {
                    $this_amount += ($rental->getDaysRented() - 2) * 1.5;
                }
                break;
            case $movie::NEW_RELEASE:
                $this_amount += $rental->getDaysRented() * 3;

                break;

            case $movie::CHILDRENS:
                $this_amount += 1.5;
                if ($rental->getDaysRented() > 3) {
                    $this_amount += ($rental->getDaysRented() - 3) * 1.5;
                }

                break;
        }
    }
}
