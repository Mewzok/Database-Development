<?php 
    // exercise 1
    $total = 1.51;
    printf ("Total amount of order is %.2f", $total);

    echo "<br>";

    // exercise 2
    $subject = "UPPERCASE";
    $subject = strtolower($subject);
    echo $subject;

    echo "<br>";

    // exercise 3
    $email = "example@email.com";
    $email_array = explode('@', $email); // ??? this is already done
    echo $email_array[0]." + ".$email_array[1];

    echo "<br>";

    // exercise 4
    $test = "Hello world";
    echo strpos($test, "o");

    echo "<br>";

    // exercise 5
    $pattern = '/http:\/\//';
    $text = "http://example.com";

    if(preg_match($pattern, $text)) {
        echo "Match found.";
    } else {
        echo "Match not found.";
    }
?>