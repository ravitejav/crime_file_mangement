<?php
include '../includes/verify.php';
$c=new checker;
/**
 * to add data on to databas eof the missing persons
 */
class addmiss
{
  function __construct()
  {
    if(isset($_POST['missname']) && isset($_POST['sid']) && isset($_POST['missage']) && isset($_POST['missaddress']) && isset($_POST['missplace']) && isset($_POST['missidno']) && isset($_POST['missidname']) && isset($_POST['missphoneno']) && isset($_POST['landaddress']) && isset($_POST['regname']) && isset($_POST['regphoneno']) && isset($_POST['regadd']) && isset($_POST['addata']) && isset($_POST['status']))
    {
      if(!empty($_POST['missname']) && !empty($_POST['sid']) && !empty($_POST['missage']) && !empty($_POST['missaddress']) && !empty($_POST['missplace']) && !empty($_POST['missidno']) && !empty($_POST['missidname']) && !empty($_POST['missphoneno']) && !empty($_POST['landaddress']) && !empty($_POST['regname']) && !empty($_POST['regphoneno']) && !empty($_POST['regadd']) && !empty($_POST['addata']) && !empty($_POST['status']))
      {
        $q="INSERT INTO `land` VALUES ('".$_POST['missname']."',".$_POST['sid'].",".$_POST['missage'].",'".$_POST['missaddress']."','".$_POST['missplace']."','".$_POST['missidno']."','".$_POST['missidname']."','".$_POST['missphoneno']."','".$_POST['landaddress']."','','".$_POST['regname']."','".$_POST['regphoneno']."','".$_POST['regadd']."','".$_POST['addata']."','".$_POST['status']."')";
        $db=new database();
        $db->connect();
        $querye=new queryexc;
        if($querye->qexc($q,$db->con))
        {
          header('location:index.php');
        }else
        {
          echo "<script>alert('Please try again,data is not added to database')</script>";
        }
      }
    }
  }
}
new addmiss;
if($c->attempt)
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Land problem</title>
    <link rel="stylesheet" href="../style/user.css">
    <script type="text/javascript" src="../javas/user.js"></script>
  </head>
  <body>
    <center><h1>Crime File Management</h1></center>
    <div class="topnav">
      <a class="active" href="index.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Add Case</button>
        <div class="dropdown-content">
          <a href="missing.php">Missing Person</a>
          <a href="murder.php">Murder</a>
          <a href="land.php">Land problem</a>
          <a href="object.php">Missing Objects</a>
          <a href="other.php">Other Problems</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">FIR</button>
        <div class="dropdown-content">
          <a href="viewfir.php">View FIR</a>
          <a href="addfir.php">Add FIR</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Post Morten</button>
        <div class="dropdown-content">
          <a href="viewpost.php">View Post Morten Reoprt</a>
          <a href="addpost.php">Add Post Morten Reoprt</a>
        </div>
      </div>
      <a href="status.php">Case status</a>
      <a href="addcrimi.php">Add Criminal</a>
      <a href="addwit.php">Add witness</a>
      <a href="caseupdate.php">Case Update</a>
      <a href="viewcrimi.php">View criminal</a>
      <a href="viewwit.php">View Witness</a>
      <a href="viewcase.php">View case</a>
      <a href="logout.php">Logout</a>
    </div>
    <form class="form-style-7" action="land.php" method="POST">
      <ul>
        <li>
          <label for="missname">Name</label>
          <input type="text" name="missname" required="required" maxlength="80">
          <span>Name of the person registering</span>
        </li>
        <li>
          <label for="sid">Station Id</label>
          <input type="text" name="sid" required="required" maxlength="10">
          <span>Station id of registering</span>
        </li>
        <li>
          <label for="missage">Age</label>
          <input type="text" name="missage" required="required" maxlength="10">
          <span>Age fo the person registering case</span>
        </li>
        <li>
          <label for="missaddress">Address</label>
          <input type="text" name="missaddress" required="required" maxlength="250">
          <span>registering person address</span>
        </li>
        <li>
          <label for="missplace">Criminal location</label>
          <input type="text" name="missplace" required="required" maxlength="250">
          <span>Where the criminal is present</span>
        </li>
        <li>
          <label for="missidno">Identity number</label>
          <input type="text" name="missidno" required="required" maxlength="30">
          <span>registering persons identity number</span>
        </li>
        <li>
          <label for="missidname">Identity Name</label>
          <input type="text" name="missidname" required="required" maxlength="30">
          <span>registering persons identity type</span>
        </li>
        <li>
          <label for="missphoneno">Phone Number</label>
          <input type="text" name="missphoneno" required="required" maxlength="10">
          <span>registering persons phone number</span>
        </li>
        <li>
          <label for="landaddress">Land address</label>
          <input type="text" name="landaddress" required="required" maxlength="54">
          <span>Land address of that has been occupied</span>
        </li>
        <li>
          <label for="regname">Criminals person's Name</label>
          <input type="text" name="regname" required="required" maxlength="80">
          <span>Doubt persons name</span>
        </li>
        <li>
          <label for="regphoneno">Criminal's person's phone number</label>
          <input type="text" name="regphoneno" required="required" maxlength="10">
          <span>Doubt person's phone number</span>
        </li>
        <li>
          <label for="regadd">Criminal person's Address</label>
          <input type="text" name="regadd" required="required" maxlength="250">
          <span>Criminal addresss</span>
        </li>
        <li>
          <label for="addata">Additional data</label>
          <input type="text" name="addata" required="required" maxlength="500">
          <span>additional data for case</span>
        </li>
        <li>
          <label for="status">Status</label>
          <input type="text" name="status" required="required" maxlength="150">
          <span>Status of case</span>
        </li>
        <li>
          <input type="submit" value="Add case">
        </li>
      </ul>
    </form>
  </body>
</html>
<?php
}else
{
  header('location:../');
}
?>
