<?php
    // exercise 1
    $searchterm = trim($_POST['searchtime']);

    // exercise 2
    @$db = mysqli('localhost', 'bookorama', 'bookorama123', 'books');

    // exercise 3
    $stmt->bind_result($isbn, $author, $title, $price);
    
    // exercise 4
    $db->close();

    // exercise 5
    $db = new PDO($dsn, $user, $pass);
?>