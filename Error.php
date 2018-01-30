<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Error Occured</title>
  </head>
  <style>
    body
    {
        background-color: #ffff90;
    }
  </style>
  <link rel="stylesheet" href="style/error.css">
  <body>
    <center><h1>Crime File Management</h1></center>
    <?php
      if(isset($_SESSION['logic']))
      {
    ?>
    <div class="midclass">
    <?php
        echo "<center>".$_SESSION['logic']."</center></div>";
        unset($_SESSION['logic']);
      }
      else
      {
          echo "<div class=\"midclass\"><center>Some error is happened drop an email to us</center></div>";
      }

     ?>
    </div>
  </body>
</html>
