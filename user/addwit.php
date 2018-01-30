<?php
include '../includes/verify.php';
$c=new checker;
/**
 * to add data of criminal
 */
class addcr
{

  function __construct()
  {
    if (isset($_POST['name']) && isset($_POST['sid']) && isset($_POST['age']) && isset($_POST['address']) && isset($_POST['idno']) &&  isset($_POST['idname']) &&  isset($_POST['phoneno']) &&  isset($_POST['email']) && isset($_POST['gen']) && isset($_POST['adddata']))
    {
      if(!empty($_POST['name']) && !empty($_POST['sid']) && !empty($_POST['age']) && !empty($_POST['address']) && !empty($_POST['idno']) &&  !empty($_POST['idname']) &&  !empty($_POST['phoneno']) &&  !empty($_POST['email']) && !empty($_POST['gen']) && !empty($_POST['adddata']))
      {
        $q="INSERT INTO `witness` VALUES ('','".$_POST['name']."',".$_POST['sid'].",".$_POST['age'].",'".$_POST['address']."','".$_POST['idno']."','".$_POST['idname']."','".$_POST['phoneno']."','".$_POST['email']."','".$_POST['gen']."','".$_POST['adddata']."')";
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
new addcr;
if($c->attempt)
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add witness</title>
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
      <a href="addcrimi.php">Add criminal</a>
      <a href="caseupdate.php">Case Update</a>
      <a href="viewcrimi.php">View criminal</a>
      <a href="viewwit.php">View Witness</a>
      <a href="viewcase.php">View case</a>
      <a href="logout.php">Logout</a>
      </div>
    <form class="form-style-7" action="addwit.php" method="POST">
      <ul>
        <li>
          <label for="name">Name</label>
          <input type="text" name="name" required="required" maxlength="80">
          <span>Enter the name of witness</span>
        </li>
        <li>
          <label for="sid">Station Id</label>
          <input type="text" name="sid" required="required"  maxlength="5">
          <span>Enter the Station Id registering</span>
        </li>
        <li>
          <label for="age">Age</label>
          <input type="text" name="age" required="required"  maxlength="5">
          <span>Enter the age of witness</span>
        </li>
        <li>
          <label for="address">Address</label>
          <input type="text" name="address" required="required"  maxlength="250">
          <span>Enter the address</span>
        </li>
        <li>
          <label for="idno">Identity number</label>
          <input type="text" name="idno" required="required"  maxlength="30">
          <span>Enter the Identity number</span>
        </li>
        <li>
          <label for="idname">Identity Name</label>
          <input type="text" name="idname" required="required"  maxlength="30">
          <span>Enter the type of Identity</span>
        </li>
        <li>
          <label for="phoneno">Phone Number</label>
          <input type="text" name="phoneno" required="required"  maxlength="10">
          <span>Enter the phone number of witness</span>
        </li>
        <li>
          <label for="email">Email Id</label>
          <input type="text" name="email" required="required"  maxlength="250">
          <span>Mention the email address</span>
        </li>
        <li>
          <label for="gen">gender</label>
          <select name="gen">
            <option value="m">Male</option>
            <option value="f">Female</option>
          </select>
        </li>
        <li>
          <label for="adddata">Additional Data</label>
          <input type="text" name="adddata" required="required"  maxlength="500">
          <span>Enter the additional data about him</span>
        </li>
        <li>
          <input type="submit" value="Add Criminal">
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
