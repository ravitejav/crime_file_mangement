<?php
include '../includes/verify.php';
$c=new checker;
/**
 * to get data from database
 */
class viewfir
{
  function __construct()
  {
    $this->j=0;
  }
  public function view()
  {
    if (isset($_GET['firid']))
    {
        if (!empty($_GET['firid']))
        {
          $query="SELECT * FROM `fir` WHERE `firno`=".$_GET['firid'];
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
            echo "<script>alert('There is no FIR found with FIR number ".$_GET['firid']."')</script>";
          }
        }
    }
  }
}
if($c->attempt)
{
  $k=new viewfir;
  $k->view();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>View FIR</title>
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
    <?php if($k->j===0){ ?>
    <form class="form-style-7" action="viewfir.php" method="GET">
      <ul>
        <li>
          <label for="firid">FIR Number</label>
          <input type="text" name="firid">
          <span>Please enter the FIR number</span>
        </li>
        <li>
          <input type="submit" value="View FIR">
        </li>
      </ul>
    </form>
    <?php }else { ?>
      <div style="overflow-x:auto">
        <center>
          <table class="view-table" border="3px">
            <tr>
              <td>Station Id</td><td><?php echo $k->data[1]['sid'];?></td>
            </tr>
            <tr>
              <td>Case id</td><td><?php echo $k->data[1]['caseid']; ?></td>
            </tr>
            <tr>
              <td>Type of case</td><td><?php echo $k->data[1]['type']; ?></td>
            </tr>
            <tr>
              <td>FIR Number</td><td><?php echo $k->data[1]['firno']; ?></td>
            </tr>
          </table>
        </center>
      </div>
    <?php  } ?>
  </body>
</html>
<?php
}else
{
  header('location:../');
}
?>
