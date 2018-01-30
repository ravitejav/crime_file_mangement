<?php
include '../includes/verify.php';
$c=new checker;
/**
 * add data to the data with FIR No
 */
class addfir
{
  function __construct()
  {
    if(isset($_POST['sid']) && isset($_POST['cid']) && isset($_POST['fir']) && isset($_POST['type']))
    {
      if(!empty($_POST['sid']) && !empty($_POST['cid']) && !empty($_POST['fir']) && !empty($_POST['type']))
      {
        $q="INSERT INTO `fir` VALUES (".$_POST['sid'].",".$_POST['fir'].",'".$_POST['cid']."','".$_POST['type']."')";
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
new addfir();
if($c->attempt)
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add FIR</title>
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
    <form class="form-style-7" action="addfir.php" method="POST">
      <ul>
        <li>
          <label for="sid">Station Id</label>
          <input type="text" name="sid" id="pid" required="required" onchange="checkid()">
          <span>Enter the exsisting station id</span>
        </li>
        <li>
          <label for="fir">FIR Number</label>
          <input type="text" name="fir"  required="required">
          <span>FIR number</span>
        </li>
        <li>
          <label for="cid">Case Id</label>
          <input type="text" name="cid" id="caseid" required="required">
          <span>Enter the case id</span>
        </li>
        <li>
          <label for="type">Case Type</label>
          <select name="type" id="type" onchange="checkforcase()">
                <option value="device">Device missing</option>
                <option value="land">Land problem</option>
                <option value="missing">Missing person</option>
                <option value="murder">Murder</option>
                <option value="otherprob">Other problems</option>
          </select>
        </li>
        <li>
          <input type="submit" value="Add FIR">
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
