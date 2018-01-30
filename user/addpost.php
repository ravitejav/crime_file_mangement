<?php
include '../includes/verify.php';
$c=new checker;
/**
 * to adding the postmorten data to database
 */
class addpostm
{

  function __construct()
  {
    if(isset($_POST['caseid']) && isset($_POST['type']) && isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['dod']) && isset($_POST['hosp']) && isset($_POST['doctor']) && isset($_POST['descri']))
    {
      if(!empty($_POST['caseid']) && !empty($_POST['type']) && !empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['dod']) && !empty($_POST['hosp']) && !empty($_POST['doctor']) && !empty($_POST['descri']))
      {
        $q="INSERT INTO `postm` VALUES ('',".$_POST['caseid'].",'".$_POST['type']."','".$_POST['name']."','".$_POST['gender']."','".$_POST['dod']."','".$_POST['hosp']."','".$_POST['doctor']."','".$_POST['descri']."')";
        $db=new database();
        $db->connect();
        $querye=new queryexc;
        if($querye->qexc($q,$db->con))
        {
          header('location:index.php');
        }else
        {
          echo "<script>alert('Please try again not added to database')</script>";
        }
      }else
      {
        echo "<script>alert('fill all the details')</script>";
      }
    }
  }
}
new addpostm;
if($c->attempt)
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Postmorten</title>
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
    <form class="form-style-7" action="addpost.php" method="POST">
      <ul>
        <li>
          <label for="caseid">Case Id</label>
          <input type="text" name="caseid" id="caseid" required="required">
          <span>Enter the case id here</span>
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
            <label for="name">Name</label>
            <input type="text" name="name"  required="required">
            <span>Enter the name here</span>
        </li>
        <li>
          <label for="gender">Gender</label>
          <select name="gender">
            <option value="m">Male</option>
            <option value="f">Fsemale</option>
          </select>
        </li>
        <li>
          <label for="dod">Date of death</label>
          <input type="text" name="dod"  required="required">
          <span>Enter the date of death</span>
        </li>
        <li>
          <label for="hosp">Hospital</label>
          <input type="text" name="hosp"  required="required">
          <span>Enter the hospital name here</span>
        </li>
        <li>
          <label for="doctor">Doctor name</label>
          <input type="text" name="doctor"  required="required">
          <span>Enter the doctor name</span>
        </li>
        <li>
          <label for="descri">Descripation</label>
          <textarea name="descri" rows="8" cols="80"  required="required"></textarea>
          <span>Enter the descripation of case</span>
        </li>
        <li>
          <input type="submit" value="Add report">
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
