<?php
    // variables
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $feedback = trim($_POST['feedback']);

    // check for valid email
    if(preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email) === 0) {
        echo "<p>That is not a valid email address.</p>".
          "<p>Please return to the previous page and try again.</p>";
          exit;
    }

    // open file
    @$fp = fopen("frogfeedback.txt", 'a');

    if($fp) {
        flock($fp, LOCK_EX);
        fputcsv($fp, [$name, $email, $feedback]);

        flock($fp, LOCK_UN);
        fclose($fp);
    } else {
        $error = "Frog feedback could not be saved.";
    }
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
            <p>🐸 Your feedback has been duly noted and promptly ignored 🐸</p>
            <a href="fp_form.php" id="homeButton">Back to Home Page</a>
        </div>
    </body>
</html>