<?php

require './lib/movie/Children.php';
require './lib/movie/NewRelease.php';
require './lib/movie/Regular.php';
require './lib/Rental.php';
require './lib/Customer.php';

$customer = new Customer('RentalUser');

$movie1 = new NewRelease('Hoge');
$rental1 = new Rental($movie1, 6);

$movie2 = new Regular('Foo');
$rental2 = new Rental($movie2, 3);

$customer->addRental($rental1);
$customer->addRental($rental2);

$return = $customer->statement();

// 結果を表示
echo ($return);
