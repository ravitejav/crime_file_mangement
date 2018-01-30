<?php
include 'database/db.con.php';
include 'includes/query_exe.class.php';
include 'includes/check.class.php';
$logincheck=new login();
$logincheck->checkforlogin();
$logincheck->execandcheck();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Security Check Up</title>
  </head>
  <script>
    function check()
    {
      var letter=document.sec.t1.value.length+1;
      if(letter<=1)
        document.sec.t1.focus();
      else
        document.sec.t2.focus();
    }
    function check1()
    {
      var letter=document.sec.t1.value.length+1;
      if(letter<=1)
        document.sec.t2.focus();
      else
        document.sec.t3.focus();
    }
    function check2()
    {
      var letter=document.sec.t1.value.length+1;
      if(letter<=1)
        document.sec.t3.focus();
      else
        document.sec.t4.focus();
    }
    function check3()
    {
      document.forms["sec"].submit;
    }
  </script>
  <link href="style/home.css" rel="stylesheet">
  <body>
    <center>
      <div class="login-form">
        <form class="" name="sec" action="dope.php" method="POST">
          <table padding-top="50px">
            <tr>
              <th><input type="text" name="t1" id="t1" onkeyup="check()" required="required" maxlength="1"></th>
              <th><input type="text" name="t2" id="t2" onkeyup="check1()" required="required" maxlength="1"></th>
              <th><input type="text" name="t3" id="t3" onkeyup="check2()" required="required" maxlength="1"></th>
              <th><input type="text" name="t4" required="required" maxlength="1"></th>
            </tr>
          </table>
          <input class="login-button" type="submit" value="CHECK" />
        </form>
        Please fill this it only for the security purpose
      </div>
    </center>
  </body>
</html>
