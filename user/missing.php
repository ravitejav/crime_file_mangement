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
    if(isset($_POST['missname']) && isset($_POST['sid']) && isset($_POST['missage']) && isset($_POST['missaddress']) && isset($_POST['missplace']) && isset($_POST['missidno']) && isset($_POST['missidname']) && isset($_POST['lastseen']) && isset($_POST['missphoneno']) && isset($_POST['frino']) && isset($_POST['regname']) && isset($_POST['regphoneno']) && isset($_POST['regadd']) && isset($_POST['addata']) && isset($_POST['status']))
    {
      if(!empty($_POST['missname']) && !empty($_POST['sid']) && !empty($_POST['missage']) && !empty($_POST['missaddress']) && !empty($_POST['missplace']) && !empty($_POST['missidno']) && !empty($_POST['missidname']) && !empty($_POST['lastseen']) && !empty($_POST['missphoneno']) && !empty($_POST['frino']) && !empty($_POST['regname']) && !empty($_POST['regphoneno']) && !empty($_POST['regadd']) && !empty($_POST['addata']) && !empty($_POST['status']))
      {
        $q="INSERT INTO `missing` VALUES ('".$_POST['missname']."',".$_POST['sid'].",".$_POST['missage'].",'".$_POST['missaddress']."','".$_POST['missplace']."','".$_POST['missidno']."','".$_POST['missidname']."','".$_POST['lastseen']."','".$_POST['missphoneno']."','".$_POST['frino']."','','".$_POST['regname']."','".$_POST['regphoneno']."','".$_POST['regadd']."','".$_POST['addata']."','".$_POST['status']."')";
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
    <title>Missing problem</title>
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
    <form class="form-style-7" action="missing.php" method="POST">
      <ul>
        <li>
          <label for="missname">Name</label>
          <input type="text" name="missname" required="required" maxlength="80">
          <span>Missing persons name</span>
        </li>
        <li>
          <label for="sid">Station Id</label>
          <input type="text" name="sid" required="required" maxlength="10">
          <span>Station id of registering</span>
        </li>
        <li>
          <label for="missage">Age</label>
          <input type="text" name="missage" required="required" maxlength="10">
          <span>Missing persons age</span>
        </li>
        <li>
          <label for="missaddress">Address</label>
          <input type="text" name="missaddress" required="required" maxlength="250">
          <span>Missing person address</span>
        </li>
        <li>
          <label for="missplace">Missied place</label>
          <input type="text" name="missplace" required="required" maxlength="250">
          <span>Where he missed</span>
        </li>
        <li>
          <label for="missidno">Identity number</label>
          <input type="text" name="missidno" required="required" maxlength="30">
          <span>Missing persons identity number</span>
        </li>
        <li>
          <label for="missidname">Identity Name</label>
          <input type="text" name="missidname" required="required" maxlength="30">
          <span>Missing persons identity type</span>
        </li>
        <li>
          <label for="lastseen">Last seen</label>
          <input type="text" name="lastseen" required="required" maxlength="250">
          <span>Missing persons last seen</span>
        </li>
        <li>
          <label for="missphoneno">Phone Number</label>
          <input type="text" name="missphoneno" required="required" maxlength="10">
          <span>Missing persons phone number</span>
        </li>
        <li>
          <label for="frino">Freinds Numbers</label>
          <input type="text" name="frino" required="required" maxlength="54">
          <span>Separate phone numbers with comma</span>
        </li>
        <li>
          <label for="regname">Register Name</label>
          <input type="text" name="regname" required="required" maxlength="80">
          <span>Case registers name</span>
        </li>
        <li>
          <label for="regphoneno">Registers phone number</label>
          <input type="text" name="regphoneno" required="required" maxlength="10">
          <span>registers persons name</span>
        </li>
        <li>
          <label for="regadd">Registers Address</label>
          <input type="text" name="regadd" required="required" maxlength="250">
          <span>Registers addresss</span>
        </li>
        <li>
          <label for="addata">Additional data</label>
          <input type="text" name="addata" required="required" maxlength="500">
          <span>Missing persons name</span>
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
