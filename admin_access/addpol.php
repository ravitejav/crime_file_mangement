<?php
include '../includes/adminlogin.class.php';
/**
 * to get and check the user LogicException
 */
class checker
{
    public function checking()
    {
      $adminlogin=new adminlog;
      $adminlogin->checkforlogin();
      if($adminlogin->querycheck())
      {
        $this->loggedin=true;
      }
    }
}
$check=new checker;
$check->checking();
if($check->loggedin)
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link rel="stylesheet" href="../style/admin.css">
  <script type="text/javascript" src="../javas/admin.js"></script>
  <body>
    <center><h1>Crime File Management</h1></center>
    <div class="topnav">
      <a class="active" href="home.php">Home</a>
      <a href="update.php">Update</a>
      <a href="working.php">Working Staff</a>
      <a href="filestatus.php">Case status</a>
      <a href="logout.php">Logout</a>
    </div>
    <div class="container">
     <form class="" action="addpoliceconfirm.php" method="POST" enctype="multipart/form-data">
       <div class="row">
         <div class="col-25">
          <label for="pid">Ploice Id</label>
         </div>
         <div class="col-75">
           <input type="text" name="pid" id="pid" required="required" placeholder="Police Id" maxlength="10" onchange="checkid()">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="pid"></label>
         </div>
         <div class="col-75">
           <span id="verify"></span>
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="fname">First Name</label>
         </div>
         <div class="col-75">
           <input type="text" name="fname" required="required" placeholder="Full Name" maxlength="80">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="address">Address</label>
         </div>
         <div class="col-75">
           <textarea name="address" required="required" placeholder="Address" maxlength="250" ></textarea>
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="phoneno">Phone Number</label>
         </div>
         <div class="col-75">
           <input type="text" name="phoneno" required="required" placeholder="Phone Number" maxlength="10">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="passcode">Password</label>
         </div>
         <div class="col-75">
           <input type="password" id="pass" name="passcode" required="required" placeholder="Password">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label></label>
         </div>
         <div class="col-75">
           <input type="checkbox" onclick="showpass()">Show Password
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="gender">Gender</label>
         </div>
         <div class="col-75">
           <select name="gender">
             <option value="M">Male</option>
             <option value="F">Female</option>
           </select>
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="workid">Working Police Station Id</label>
         </div>
         <div class="col-75">
           <input type="text" name="workid" id="wid" required="required" placeholder="Working Police Station Id" onchange="verifystation()" maxlength="11">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label></label>
         </div>
         <div class="col-75">
           <span id="stationverify"></span>
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="email">Email Id</label>
         </div>
         <div class="col-75">
           <input type="email" name="email" required="required" placeholder="Email" maxlength="80">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="secpin">Security Pin</label>
         </div>
         <div class="col-75">
           <input type="password" name="secpin" required="required" placeholder="Security Pin" maxlength="4">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="grade">Grade Level</label>
         </div>
         <div class="col-75">
           <input type="text" name="grade" required="required" placeholder="Grade Level" maxlength="10">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="trackrec">Track Record</label>
         </div>
         <div class="col-75">
           <input type="file" name="trackrec" required="required">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="proimage">Profile Image</label>
         </div>
         <div class="col-75">
           <input type="file" name="proimg" accept="image/*" required="required">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="sign">Signature</label>
         </div>
         <div class="col-75">
           <input type="file" name="sign" accept="image/*" required="required">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label></label>
         </div>
         <div class="col-75">
           <input type="Submit" Value="ADD">
         </div>
       </div>
     </form>
   </div>
  </body>
</html>
<?php
}else {
  header('location:index.php');
}
?>
