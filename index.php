<?php
  include 'database/db.con.php';
  $connect=new database();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Crime Management</title>
  </head>
  <link rel="stylesheet" href="style/home.css">
  <style>
    body
    {
      background-image: radial-gradient(yellow,orange);
      background-color: #ffffff ;
    }
  </style>
  <script>
    function myFunction()
    {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else
      {
        x.type = "password";
      }
    }
  </script>
  <body>
    <h1><center>Crime File Management</center></h1>
    <br>
    <br>
    <div class="login-form">
      <center>
        <table>
          <span class="name-login">LOG IN</span>
            <form class="" action="check.php" method="POST">
              <p><input type="email" name="user_name" placeholder="Email" value="" required="required"></p>
              <p><input type="password" name="passvalue" placeholder="Password" value="" required="required" id="myInput"></p>
              <input type="checkbox" onclick="myFunction()" align="left">Show Password<br>
              <input class="login-button" type="submit" value="LOGIN">
            </form>
        </table>
      </center>
    </div>
  </body>
</html>
