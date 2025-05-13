<?php
    // exercise 1
    $products = ['gum', 'spam', 'eggs'];
    foreach($products as $product) {
        echo $product.' ';
    }

    echo "<br>";

    // exercise 2
    $numbers = range(1, 10);
    foreach($numbers as $number) {
        echo $number.' ';
    }

    echo "<br>";

    // exercise 3
    $products[0] = 'Fuses';
    foreach($products as $product) {
        echo $product.' ';
    }

    echo "<br>";

    // exercise 4
    $products = array('Tires', 'Oil', 'Spark Plugs');
    sort($products);
    foreach($products as $product) {
        echo $product.' ';
    }

    echo "<br>";

    // exercise 5
    $numbers = range(1, 10);
    $numbers = array_reverse($numbers);
    foreach($numbers as $number) {
        echo $number.' ';
    }
?>