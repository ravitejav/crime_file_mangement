<?php
include '../includes/verify.php';
/**
 * to get data of the criminal
 */
class viewcrimi
{

  function __construct()
  {
    $this->j=0;
  }
  public function datae()
  {
    if (isset($_GET['witid']))
    {
      if(!empty($_GET['witid']))
      {
        $query="SELECT * FROM `witness` WHERE `wid`=".$_GET['witid'];
        $db=new database();
        $db->connect();
        $querye=new queryexc;
        $this->data=$querye->exc($query,$db->con);
        if($this->data[0]==1)
        {
          $this->j=1;
        }else
        {
          $this->j=0;
          echo "<script>alert('There is no witness with id ".$_GET['witid']."  ')</script>";
        }
      }
    }
  }
}
$v=new viewcrimi;
$v->datae();
$c=new checker;
if($c->attempt)
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>View witness</title>
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
      <a href="viewcase.php">View case</a>
      <a href="logout.php">Logout</a>
      </div>
    <?php if($v->j==0){ ?>
    <form class="form-style-7" action="viewwit.php" method="GET">
      <ul>
        <li>
          <label for="witid">witness Id</label>
          <input type="text" name="witid" required="required" maxlength="10">
          <span>Enter the witness id</span>
        </li>
        <li>
          <input type="submit" value="Search">
        </li>
      </ul>
    </form>
    <?php }else { ?>
      <div style="overflow-x:auto">
        <center>
          <table class="view-table" border="3px">
            <tr>
              <td>Witness Id</td><td><?php echo $v->data[1]['wid'];?></td>
            </tr>
            <tr>
              <td>Name</td><td><?php echo $v->data[1]['name']; ?></td>
            </tr>
            <tr>
              <td>Registed by station id</td><td><?php echo $v->data[1]['sid']; ?></td>
            </tr>
            <tr>
              <td>Age</td><td><?php echo $v->data[1]['age']; ?></td>
            </tr>
            <tr>
              <td>Address</td><td><?php echo $v->data[1]['address']; ?></td>
            </tr>
            <tr>
              <td>Identity Number</td><td><?php echo $v->data[1]['identity_no']; ?></td>
            </tr>
            <tr>
              <td>Identity Name</td><td><?php echo $v->data[1]['identity_name']; ?></td>
            </tr>
            <tr>
              <td>Phone number</td><td><?php echo $v->data[1]['phoneno'];?></td>
            </tr>
            <tr>
              <td>Email</td><td><?php echo $v->data[1]['email']; ?></td>
            </tr>
            <tr>
              <td>Gender</td><td><?php if($v->data[1]['sid']=='m'){echo "Male";}else{echo "Female";} ?></td>
            </tr>
            <tr>
              <td>Additional information</td><td><?php echo $v->data[1]['add_data']; ?></td>
            </tr>
          </table>
        </center>
      </div>
    <?php } ?>
  </body>
</html>
<?php
}else
{
  header('location:../');
}
?>
