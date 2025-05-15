<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
            Frog Parts feedback page
            Author: Jonathan Kinney
            Date Created:  05/13/2025
            Date Modified: 05/13/2025

            Filename: fp_feedbackform.html
        -->
        <meta charset="utf-8"; />
        <title>Frog Parts - Feedback</title>
        <link href="fp_styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php include('fp_header.php'); ?>
        <div class="feedback-div">
            <h1>🐸 Frog Feedback 🐸</h1>

            <form action="fp_processfeedback.php" method="post">

            <p><strong>Your name:</strong><br />
            <input type="text" name="name" size="40" /></p>

            <p><strong>Your email address:</strong><br />
            <input type="text" name="email" size="40" /></p>

            <p><strong>Your feedback:</strong><br />
            <textarea name="feedback" rows="8" cols="40"></textarea></p>

            <p><input type="submit" value="Send Feedback" /></p>
            </form>
        </div>
        <?php include('fp_footer.php'); ?>
    </body>
</html>