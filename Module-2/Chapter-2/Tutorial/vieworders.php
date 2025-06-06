<?php
  // create short variable name
  $document_root = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bob's Auto Parts - Customer Orders</title>
  </head>
  <body>
    <h1>Bob's Auto Parts</h1>
    <h2>Customer Orders</h2> 
    <?php
      //@$fp = fopen("$document_root/../orders/orders.txt", 'rb');
      @$fp = fopen("orders.txt", 'rb'); // temporarily make file actually work
      flock($fp, LOCK_SH); // lock file for reading

      if (!$fp) {
        echo "<p><strong>No orders pending.<br />
              Please try again later.</strong></p>";
        exit;
      }

      // while loop for chars
      /*
      while (!feof($fp)) {
        $char = fgetc($fp);
        if (!feof($fp))
          echo ($char=="\n" ? "<br />" : $char);
      } */

      while (!feof($fp)) {
         $order= fgets($fp);
         echo htmlspecialchars($order)."<br />";
      }

      flock($fp, LOCK_UN); // release read lock
      fclose($fp); 
    ?>
  </body>
</html>