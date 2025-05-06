<?php
  // create short variable names
  $frogcolor = $_POST['frogcolor'];
  $frogarm = $_POST['frogarm'];
  $frogleg = $_POST['frogleg'];
  $frogname = $_POST['frogname'];
  $saved = false;

  // handle saving
  if(isset($_POST['savefrog'])) {
    $outputstring = $frogcolor."\t".$frogarm."\t".$frogleg."\t"."$frogname"."\t";

    // open file for appending
    @$fp = fopen("frogs.txt", 'ab');

    if($fp) {
      flock($fp, LOCK_EX);
      fwrite($fp, $outputstring, strlen($outputstring));
      flock($fp, LOCK_UN);
      fclose($fp);
      $saved = true;
    } else {
      $error = "Frog could not be saved.";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Frog Parts - Frog Created</title>
    <link href="fp_styles.css" rel="stylesheet" />
  </head>
  <body>
      <a href="fp_form.html" class="back-link">← Back to Frog Builder</a>

      <div class="result-container">
      <h1>Frog Parts</h1>
      <h2>Your frog</h2>
      <h3><?php echo $frogname;?></h3>
      <?php
      // display frog
      echo '<img src="fp_images.php?frogcolor='.urlencode($frogcolor).'&frogarm='.urlencode($frogarm).
      '&frogleg='.urlencode($frogleg).'&frogname='.urlencode($frogname).'" alt="Your frog" />';
      ?>
    </div>

    <form action="fp_buildfrog.php" method="post">
      <input type="hidden" name="frogcolor" value="<?php echo htmlspecialchars($frogcolor); ?>">
      <input type="hidden" name="frogarm" value="<?php echo htmlspecialchars($frogarm); ?>">
      <input type="hidden" name="frogleg" value="<?php echo htmlspecialchars($frogleg); ?>">
      <input type="hidden" name="frogname" value="<?php echo htmlspecialchars($frogname); ?>">

      <?php if($saved): ?>
        <button disabled style="background-color: #bbb;">Frog Saved</button>
      <?php else: ?>
        <input type="submit" name="savefrog" value="Save Frog" />
      <?php endif; ?>
    </form>
  </body>
</html>