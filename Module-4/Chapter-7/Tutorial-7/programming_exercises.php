<?php
    // exercise 1
    $message = "Message";
    $code = 0;

    //throw new Exception($message, $code);

    // exercise 2
    try {
        $fp = new SplFileObject("notrealfile.txt");
    } catch(Exception $e) {
        echo "<p><strong>Error when attempting to read file.</strong></p>";
    } finally {
        echo 'Always runs!';

        echo "<br /><br />";
    }

    // exercise 3
    try {
        $fp = new SplFileObject("notrealfile.txt");
    }
    catch(Exception $e) {
        echo $e;

        echo "<br /><br />";

        // exercise 4
        echo "Classpath: ".$e->getFile();

        echo "<br /><br />";

        // exercise 5
        echo "Backtrace: ".print_r($e->getTrace());
    }
?>