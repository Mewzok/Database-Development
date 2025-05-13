<?php
    // variables
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $feedback = trim($_POST['feedback']);

    $subject = "Feedback from website";

    $mailcontent = "Customer name: ".str_replace("\r\n", "", $name)."\n".
                    "Customer email: ".str_replace("\r\n", "", $email)."\n".
                    "Customer comments:\n".str_replace("\r\n", "", $feedback)."\n";
    
    $fromaddress = "From: webserver@example.com";

    // check for valid email
    if(preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email) === 0) {
        echo "<p>That is not a valid email address.</p>".
          "<p>Please return to the previous page and try again.</p>";
          exit;
    }

    // default address
    $toaddress = 'feedback@example.com';

    // change destination email based on feedback content
    if(preg_match('/shop|customer service|retail/', $feedback)) {
        $toaddress = 'retail@example.com';
    } else if(preg_match('/deliver|fulfill/', $feedback)) {
        $toaddress = 'fulfillment@example.com';
    } else if(preg_match('/bill|account/', $feedback)) {
        $toaddress = 'accounts@example.com';
    }
    if(preg_match('/bigcustomer\.com/', $email)) {
        $toaddress = 'frog@example.com';
    }

    // send mail
    mail($toaddress, $subject, $mailcontent, $fromaddress);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Frog Parts - Frog Feedback Submitted</title>
        <link href="fp_styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="process-feedback-div">
            <h1>Frog Feedback Submitted</h1>
            <p>Your feedback has been promptly noted and duly ignored.</p>
            <p><?php echo nl2br(htmlspecialchars($feedback)); ?> </p>
        </div>
    </body>
</html>