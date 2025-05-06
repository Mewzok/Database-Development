<?php
  // create short variable names
  $frogclr = $_POST['frogcolor'];
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
    /* 
      display frog base
      check arm
      display arm
      check leg
      display leg
      change color
    */

    // display frog base
    echo '<img src="fp_images.php?frogarm='.urlencode($frogarm).'&frogleg='.urlencode($frogleg).'" alt="Your frog" />';
 /*
    switch($frogarm) {
      case "armfrog" :
        echo '<img src="resources/armfrog.png"';
        break;
      case "armcrab" :
        echo '<img src="resources/armcrab.png"';
        break;
      case "armdog" :
        echo '<img src="resources/armdog.png"';
        break;
    } 

    // calculate total number of items selected
      $totalqty = 0;
      $totalqty = $tireqty + $oilqty + $sparkqty;

      // warn user of no items selected
      // display number of items selected
      if($totalqty == 0) {
        echo '<p style="color:red">';
        echo "You did not order anything on the previous page!<br />";
        echo '</p>';
        exit;
      } else {
        echo "<p>Order processed at ".date('H:i, jS F Y')."</p>";
        echo '<p>Your order is as follows: </p>';
        if($tireqty > 0)
          echo htmlspecialchars($tireqty).' tires<br />';
        if($oilqty > 0)
          echo htmlspecialchars($oilqty).' bottles of oil<br />';
        if($sparkqty > 0)
          echo htmlspecialchars($sparkqty).' spark plugs<br />';
      }

      // determine tire discount
      if($tireqty < 10) {
        $discount = 0;
      } else if(($tireqty >= 10) && ($tireqty <= 49)) {
        $discount = 5;
      } else if(($tireqty >= 50) && ($tireqty <= 99)) {
        $discount = 10;
      } else if($tireqty >= 100) {
        $discount = 15;
      }

      // determine customer status
      switch($find) {
        case "a" :
          echo "<p>Regular customer.</p>";
          break;
        case "b" :
          echo "<p>Customer referred by TV advert.</p>";
          break;
        case "c" :
          echo "<p>Customer referred by phone directory.</p>";
          break;
        case "d" :
          echo "<p>Customer referred by word of mouth.</p>";
          break;
        default :
          echo "<p>We do not know how this customer found us.</p>";
          break;
      }

      // display total number of items ordered
      echo "<p>Items ordered: ".$totalqty."<br />";
      $totalamount = 0.00;

      // prices for each item
      define('TIREPRICE', 100);
      define('OILPRICE', 10);
      define('SPARKPRICE', 4);

      // determine tire price before discount
      $tiretotal = $tireqty * TIREPRICE;

      // apply tire discount if applicable
      if($discount > 0) {
        $tiretotal -= $tiretotal * ($discount / 100);
        echo "Tire discount: ".$discount."%<br />";
      }

      // calculate total amount
      $totalamount = $tiretotal + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;

      // display total amount
      echo "Subtotal: $".number_format($totalamount,2)."<br />";

      // calculate and display total after tax
      $taxrate = 0.10; // local sales tax is 10%
      $totalamount = $totalamount * (1 + $taxrate);
      echo "Total including tax: $".number_format($totalamount,2)."</p>";

      // test isset and empty
      /*
      echo 'isset($tireqty): '.isset($tireqty).'<br />';
      echo 'isset($nothere): '.isset($nothere).'<br />';
      echo 'empty($tireqty): '.empty($tireqty).'<br />';
      echo 'empty($nothere): '.empty($nothere).'<br />';
      */
    ?>
  </body>
</html>
