<?php
  $color = $_POST['frogcolor'] ?? '';
  $arm = $_POST['frogarm'] ?? '';
  $leg = $_POST['frogleg'] ?? '';
  $name = trim($_POST['frogname']) ?? '';
  $saved = isset($_POST['savefrog']);
  $isLoaded = isset($_POST['loaded']);

  // cancel if no name
  if($name === '') {
    die("Frog has no name.");
  }

  // handle saving
  if($saved) {
    // open file for appending
    @$fp = fopen("frogs.txt", 'a');

    if($fp) {
      flock($fp, LOCK_EX);
      fputcsv($fp, [$color, $arm, $leg, $name]);

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
      <a href="fp_form.php" class="back-link">← Back to Frog Builder</a>

      <div class="result-container">
      <h1>Frog Parts</h1>
      <h2>Your frog</h2>
      <h3><?php echo $name;?></h3>
      <?php
      // display frog
      echo '<img src="fp_images.php?frogcolor='.urlencode($color).'&frogarm='.urlencode($arm).
      '&frogleg='.urlencode($leg).'&frogname='.urlencode($name).'" alt="Your frog" />';
      ?>

    <form id="buildform" action="fp_buildfrog.php" method="post">
      <input type="hidden" name="frogcolor" value="<?php echo htmlspecialchars($color); ?>">
      <input type="hidden" name="frogarm" value="<?php echo htmlspecialchars($arm); ?>">
      <input type="hidden" name="frogleg" value="<?php echo htmlspecialchars($leg); ?>">
      <input type="hidden" name="frogname" value="<?php echo htmlspecialchars($name); ?>">

      <?php
      if($saved) {
        echo "<button disabled style=\"background-color: #bbb;\">Frog Saved</button>";
      } else if(!$isLoaded) {
        echo "<input type=\"submit\" name=\"savefrog\" value=\"Save Frog\" />";
      }
      ?>
    </form>
    </div>
  </body>
</html>