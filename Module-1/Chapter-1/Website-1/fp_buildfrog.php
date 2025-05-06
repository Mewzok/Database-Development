<?php
  // create short variable names
  $frogcolor = $_POST['frogcolor'];
  $frogarm = $_POST['frogarm'];
  $frogleg = $_POST['frogleg'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Frog Parts - Frog Created</title>
    <link href="fp_styles.css" rel="stylesheet" />
  </head>
  <body>
      <div class="result-container">
      <h1>Frog Parts</h1>
      <h2>Your frog</h2> 
      <?php
      // display frog base
      echo '<img src="fp_images.php?frogcolor='.urlencode($frogcolor).'&frogarm='.urlencode($frogarm).'&frogleg='.urlencode($frogleg).'" alt="Your frog" />';
      ?>
    </div>
  </body>
</html>
