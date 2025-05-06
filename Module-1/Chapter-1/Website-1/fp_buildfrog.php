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
  </head>
  <body>
    <h1>Frog Parts</h1>
    <h2>Frog Created</h2> 
    <?php
    // display frog base
    echo '<img src="fp_images.php?frogcolor='.urlencode($frogcolor).'&frogarm='.urlencode($frogarm).'&frogleg='.urlencode($frogleg).'" alt="Your frog" />';
    ?>
  </body>
</html>
