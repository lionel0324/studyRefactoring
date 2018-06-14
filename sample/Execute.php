<?php

require './lib/Movie.php';
require './lib/Rental.php';
require './lib/Customer.php';
require './lib/ChildrenPrice.php';
require './lib/NewReleasePrice.php';
require './lib/RegularPrice.php';

$customer = new Customer('RentalUser');

$movie1 = new Movie('Hoge', 0);
$rental1 = new Rental($movie1, 6);

$movie2 = new Movie('Foo', 1);
$rental2 = new Rental($movie2, 3);

$customer->addRental($rental1);
$customer->addRental($rental2);

$return = $customer->statement();

// 結果を表示
echo ($return);
