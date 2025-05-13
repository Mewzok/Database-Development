<!DOCTYPE html>
<html lang="en">
  <head>
    <!--
      Frog Parts home/form page
      Author: Jonathan Kinney
      Date Created:  05/1/2025
      Date Modified: 05/13/2025

      Filename: fp_form.html
    -->
    <meta charset="utf-8" />
    <meta name="keywords" content="frog, parts, frogparts" />
    <title>Frog Parts - Build Form</title>
    <link href="fp_styles.css" rel="stylesheet" />
  </head>
  <body>
    <!-- put all saved frog names in an array to check for already taken name ----------->
     <?php
        $frogList = [];
        if(file_exists("frogs.txt") && ($fp = fopen("frogs.txt", "r")) !== false) {
          while(($curLine = fgetcsv($fp)) !== false) {
            if(count($curLine) >= 4) {
              $frogList[] = $curLine;
            }
          }
          fclose($fp);
        }
     ?>
    <!-- end of array of names creation -------------------------------------------------->

    <div>
    <form id="frogForm" action="fp_buildfrog.php" method="post">
    <table style="border: 0px;">
    <tr id="heading">
      <td>Part</td>
      <td>Type</td>
    </tr>
    <tr>
      <td>Frog Color</td>
      <td><select name="frogcolor" id="frogcolor">
        <option value="green">Green</option>
        <option value="red">Red</option>
        <option value="blue">Blue</option>
      </select>
    </td>
    </tr>
    <tr>
      <td>Frog Arm</td>
      <td><select name="frogarm" id="frogarm">
      <option value="armfrog">Frog</option>
      <option value="armcrab">Crab</option>
      <option value="armdog">Dog</option>
     </select>
    </td>
    </tr>
    <tr>
      <td>Frog Leg</td>
      <td><select name="frogleg" id="frogleg">
      <option value="legfrog">Frog</option>
      <option value="legcrab">Crab</option>
      <option value="legdog">Dog</option>
     </select></td>
    </tr>
    <tr>
      <td>Frog Name</td>
      <td><input type="text" name="frogname" id="frogname"/></td>
    </tr>
    <tr>
     <td colspan="2"><input type="submit" value="Build Frog" /></td>
    </tr>
    <tr>
      <td colspan="2">OR</td>
     </tr>
    </table>
    </form>

    <!-- handle loading ------------------------------------------------------------->
     <?php if(count($frogList) > 0) usort($frogList, 'compareName'); ?>
    <form id="loadForm">
    <table>
      <!-- load dropdown -->
      <tr>
        <td colspan="2">
          <select name="loadfrogname" id="loadDropdown" 
            <?php if(count($frogList) === 0) echo 'disabled'; ?>>
            <option value="">-- Select Frog --</option>
            <?php foreach ($frogList as $frog): ?>
              <option value="<?php echo htmlspecialchars(json_encode($frog)); ?>">
                <?php echo htmlspecialchars($frog[3]); ?>
            </option>
            <?php endforeach; ?>
          </select>
        </td>
      </tr>
      <!-- load button -->
      <tr>
        <td colspan="2">
          <input id="loadButton" type="submit" name="loadFrog" value="Load Frog" <?php 
            if(count($frogList) === 0) echo 'disabled' ?> />
        </td>
      </tr>
    </table>
    </form>
    </div>
    <!-- load button ----------------------------------------------------------->
    <script>
      const loadDropdown = document.getElementById("loadDropdown");
      const loadForm = document.getElementById("loadForm");
      const frogForm = document.getElementById("frogForm");
      const loadedInput = document.createElement("input");

      loadForm.addEventListener("submit", function(e) {
        e.preventDefault();

        const selected = loadDropdown.value;
        if(!selected) return;

        const frog = JSON.parse(selected);

        document.querySelector('select[name="frogcolor"]').value = frog[0];
        document.querySelector('select[name="frogarm"]').value = frog[1];
        document.querySelector('select[name="frogleg"]').value = frog[2];
        document.querySelector('input[name="frogname"]').value = frog[3];


        loadedInput.type = "hidden";
        loadedInput.name = "loaded";
        loadedInput.value = "true";
        frogForm.appendChild(loadedInput);
        frogForm.submit();
      });
    </script>
    <!-- load button -------------------------------------------------->
    <!-- check for duplicate name ------------------------------------->
      <script>
        document.querySelector('form[action="fp_buildfrog.php"]').addEventListener('submit', function(e) {
          const existingNames = <?php echo json_encode(array_column($frogList, 3)); ?>;
          const nameInput = document.querySelector('input[name="frogname"]');
          const enteredName = nameInput.value.trim();

          if(existingNames.includes(enteredName)) {
            e.preventDefault();
            alert("Frog name already taken.");
            nameInput.style.border = "2px solid red";
          }
        })
      </script>
    <!-- end of check for duplicate name ------------------------------>
     <a href="fp_feedbackform.html" class="frog-feedback-button">🐸 Frog Feedback</a>
  </body>
</html>

<?php 
  function compareName($x, $y) {
    if($x[3] == $y[3]) {
      return 0;
    } else if($x[3] < $y[3]) {
      return -1;
    } else {
      return 1;
    }
  }
?>