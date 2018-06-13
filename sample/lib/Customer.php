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

            // ポイント加算
            $frequent_renter_points++;

            // 新作を2日以上借りたらボーナスポイント
            if ($movie->getPriceCode() == $movie::NEW_RELEASE and $rental->getDaysRented() > 1) {
                $frequent_renter_points++;
            }
            $result .= sprintf('%s %s yen ' . "\n", $movie->getTitle(), $rental->getCharge());
            $total_amount += $rental->getCharge();
        }
        // フッタの追加
        $result .= sprintf('Amount owed is %s yen ' . "\n", $total_amount);
        $result .= sprintf('rental point %s ', $frequent_renter_points);
        return $result;
    }
}
