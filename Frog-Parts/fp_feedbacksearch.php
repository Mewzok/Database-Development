<?php
    $results = [];

    if($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['search'])) {
        $searchKey = trim($_POST['search']);

        if(!file_exists("frogfeedback.txt")) {
            die("Unable to open feedback file or file does not exist.");
        }

        $fp = @fopen("frogfeedback.txt", "r");

        if($fp) {
            while(($line = fgets($fp)) !== false) {
                if(preg_match("/$searchKey/i", $line)) {
                    $results[] = htmlspecialchars($line);
                }
            }
            fclose($fp);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Frog Parts - Feedback Search</title>
        <link href="fp_styles.css" rel="stylesheet" />
    </head>
    <body class="feedback-search-body">
        <form action="" method="post">
            <div class="feedback-search-div">
                <p><strong>Enter search term:</strong><br />
                <input type="text" name="search" size="40" /></p>
                <p><input type="submit" value="Search" /></p>
            </div>
        </form>

        <?php if(!empty($results)): ?>
            <div class="search-results-div">
                <h2>Search Results:</h2>
                <p><?php echo implode("", $results); ?> </p>
            </div>
        <?php elseif($_SERVER["REQUEST_METHOD"] === "POST"): ?>
            <p id="searchNotFound">No matches found.</p>
        <?php endif; ?>
    </body>
</html>