<?php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--
      Frog Parts home/form page
      Author: Jonathan Kinney
      Date Created:  05/1/2025
      Date Modified: 05/08/2025

      Filename: fp_form.html
    -->
    <meta charset="utf-8" />
    <meta name="keywords" content="frog, parts, frogparts" />
    <title>Frog Parts - Build Form</title>
    <link href="fp_styles.css" rel="stylesheet" />
  </head>
  <body>
    <!-- put all saved frog names in an array to check for already taken name -->
    <script>
        const allFrogNames = <?php
          $names = [];
          if (file_exists("frogs.txt") && ($fp = fopen("frogs.txt", "r")) !== false) {
            while (($tempFrogArray = fgetcsv($fp)) !== false) {
              if (isset($tempFrogArray[3])) {
                $names[] = trim($tempFrogArray[3]);
              }
            }
            fclose($fp);
          }
          echo json_encode($names);
        ?>;
      </script>
    <div>
    <form action="fp_buildfrog.php" method="post">
    <table style="border: 0px;">
    <tr id="heading">
      <td>Part</td>
      <td>Type</td>
    </tr>
    <tr>
      <td>Frog Color</td>
      <td><select name="frogcolor">
        <option value="green">Green</option>
        <option value="red">Red</option>
        <option value="blue">Blue</option>
      </select>
    </td>
    </tr>
    <tr>
      <td>Frog Arm</td>
      <td><select name="frogarm">
      <option value="armfrog">Frog</option>
      <option value="armcrab">Crab</option>
      <option value="armdog">Dog</option>
     </select>
    </td>
    </tr>
    <tr>
      <td>Frog Leg</td>
      <td><select name="frogleg">
      <option value="legfrog">Frog</option>
      <option value="legcrab">Crab</option>
      <option value="legdog">Dog</option>
     </select></td>
    </tr>
    <tr>
      <td>Frog Name</td>
      <td><input type="text" name="frogname" /></td>
    </tr>
    <tr>
     <td colspan="2"><input type="submit" value="Build Frog" /></td>
    </tr>
    <tr>
      <td colspan="2">OR</td>
     </tr>
    </table>
    </form>
    <form>
      <table>
      <tr>
        <?php 
          // load saved frogs to dropdown
          @$fp = fopen("frogs.txt", 'rb');
          $hasSavedFrogs = false;
          $frogsLoaded = '';

          if($fp) {
            flock($fp, LOCK_SH);

            while (($parts = fgetcsv($fp)) !== false) {
              if(count($parts) >= 4) {
                list($color, $arm, $leg, $name) = $parts;
                $frogsLoaded .= "<option value=\"{$name}\">{$name}</option>\n";
                $hasSavedFrogs = true;
              }
            }
            flock($fp, LOCK_UN);
            fclose($fp);
          }
        ?>
        <td id="loaddropdown" colspan="2"><select name="loadfrogname" <?php
          if(!$hasSavedFrogs) echo 'disabled'; ?>>
          <?php if($hasSavedFrogs) {
            echo $frogsLoaded;
          } else {
            echo '<option>No saved frogs.</option>';
          }
          ?>
        </select></td>
      </tr>
      <tr>
        <td id="loadbutton" colspan="2"><input type="submit" value="Load Frog" <?php 
        if(!$hasSavedFrogs) echo 'disabled' ?> />
        </td>
      </tr>
    </table>
    </form>
    </div>
      <!-- check for already taken name -->
      <script>
        document.querySelector('form[action="fp_buildfrog.php"]').addEventListener('submit', function(e) {
          const nameInput = document.querySelector('input[name="frogname"]');
          const enteredName = nameInput.value.trim();

          if(allFrogNames.includes(enteredName)) {
            e.preventDefault(); // stops submit
            alert('Frog name "' + enteredName + '" is taken.');
            nameInput.style.border = '2px solid red';
          } else if(enteredName === '') {
            e.preventDefault(); // stops submit
            alert('Frog needs a name.');
            nameInput.style.border = '2px solid red';
          } else {
            nameInput.style.border = '';
          }
        });
      </script>
  </body>
</html>