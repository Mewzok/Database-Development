<?php
    // exercise 1
    require('reusable.php');

    // exercise 2
    function compute($num) {
        return $num * 1;
    }

    echo compute(42);

    echo "<br />";

    // exercise 3
    function my_function() {
        echo "function called.";
    }

    my_function();

    echo "<br />";

    // exercise 4
    function table($data) {
        echo 'table created.';
    }

    table([0, 1, 2]);

    echo "<br />";

    // exercise 5
    function test_return() {
        echo "This statement will be executed";
        return;
        echo "This statement will never be executed";
    }

    test_return();
?>