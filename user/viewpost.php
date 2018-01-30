<?php
include '../includes/verify.php';
$c=new checker;
/**
 * adding data of postmorten into database
 */
class addpost
{
  function __construct()
  {
    $this->j=0;
    $this->k=0;
  }
  public function add()
  {
    if (isset($_GET['postid']))
    {
      if(!empty($_GET['postid']))
      {
        $query="SELECT * FROM `postm` WHERE `postid`=".$_GET['postid'];
        $db=new database();
        $db->connect();
        $querye=new queryexc;
        $this->data=$querye->exc($query,$db->con);
        if($this->data[0]==1)
        {
          $this->j=1;
          $this->k=1;
        }else
        {
          $this->j=0;
          echo "<script>alert('There is no postmorten report with id ".$_GET['postid']."  ')</script>";
        }
      }
    }
  }
}
$a=new addpost;
$a->add();
if($c->attempt)
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>View post morten report</title>
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
    <?php if($a->j==0){ ?>
    <form class="form-style-7" action="viewpost.php" method="GET">
      <ul>
        <li>
          <input type="text" name="postid" required="required">
          <span>Enter the post morten id</span>
        </li>
        <li>
          <input type="submit" value="View the file">
        </li>
      </ul>
    </form>
    <?php } ?>
    <?php if($a->k==1){ ?>
      <div style="overflow-x:auto">
        <center>
          <table class="view-table" border="3px">
            <tr>
              <td>postmorten Id</td><td><?php echo $a->data[1]['postid'];?></td>
            </tr>
            <tr>
              <td>Case id</td><td><?php echo $a->data[1]['cid']; ?></td>
            </tr>
            <tr>
              <td>Type of case</td><td><?php echo $a->data[1]['type']; ?></td>
            </tr>
            <tr>
              <td>Date of Death</td><td><?php echo $a->data[1]['dod']; ?></td>
            </tr>
            <tr>
              <td>Hospital</td><td><?php echo $a->data[1]['hosp']; ?></td>
            </tr>
            <tr>
              <td>Doctor Name</td><td><?php echo $a->data[1]['doctor']; ?></td>
            </tr>
            <tr>
              <td>Descripation of case</td><td><?php echo $a->data[1]['descri']; ?></td>
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
