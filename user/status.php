<?php
include '../includes/verify.php';
$c=new checker;
class updateclass
{
  public function __construct()
  {
        $this->confirm=false;
  }
  function updating()
  {
      if(isset($_GET['caseid']) && isset($_GET['type']))
      {
        if(!empty($_GET['caseid']) && !empty($_GET['type']))
        {
          $query="SELECT * FROM `".$_GET['type']."` WHERE `cid`=".$_GET['caseid'];
          $db=new database();
          $db->connect();
          $querye=new queryexc;
          $this->data=$querye->exc($query,$db->con);
          if($this->data[0]==1)
          {
            $this->confirm=true;
          }else
          {
            $this->confirm=false;
            echo "<script>alert('There is no case with case id ".$_GET['caseid']." under ".$_GET['type']."')</script>";
          }
        }
      }
  }
}
$up=new updateclass;
$up->updating();
if($c->attempt)
{
  if(!$up->confirm)
  {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Case status</title>
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
      <a href="addcrimi.php">Add Criminal</a>
      <a href="addwit.php">Add witness</a>
      <a href="caseupdate.php">Case Update</a>
      <a href="viewcrimi.php">View criminal</a>
      <a href="viewwit.php">View Witness</a>
      <a href="viewcase.php">View case</a>
      <a href="logout.php">Logout</a>
      </div>
    <form class="form-style-7" action="status.php" method="GET">
      <ul>
        <li>
          <label for="caseid">Case Id</label>
          <input type="text" name="caseid" maxlength="10" required="required">
          <span>Enter the case id here</span>
        </li>
        <li>
          <label for="type">Type Of Case</label>
          <select name="type">
                <option value="device">Device missing</option>
                <option value="land">Land problem</option>
                <option value="missing">Missing person</option>
                <option value="murder">Murder</option>
                <option value="otherprob">Other problems</option>
          </select>
        </li>
        <li>
          <input type="submit" value="Search">
        </li>
      </ul>
    </form>
  </body>
</html>
<?php
  }else
  {
    $query="SELECT * FROM `".$_GET['type']."` WHERE `cid`=".$_GET['caseid'];
    $db=new database();
    $db->connect();
    $querye=new queryexc;
    $data=$querye->exc($query,$db->con);
    ?>
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Home page</title>
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
          <a href="addcrimi.php">Add Criminal</a>
          <a href="addwit.php">Add witness</a>
          <a href="caseupdate.php">Case Update</a>
          <a href="viewcrimi.php">View criminal</a>
          <a href="viewwit.php">View Witness</a>
          <a href="viewcase.php">View case</a>
          <a href="logout.php">Logout</a>
          <div class="mention">
            Welcome, <?php echo $c->data[1]['name'];?><br>
            <?php echo $c->data[1]['gradelevel']; ?>
          </div>
        </div>
        <div style="overflow-x:auto">
          <center>
            <table class="view-table" border="3px">
              <tr>
                <td>Type of case</td><td><?php echo $_GET['type'];?></td>
              </tr>
              <tr>
                <td>Case id</td><td><?php echo $data[1]['cid']; ?></td>
              </tr>
              <tr>
                <td>Status</td><td><?php echo $data[1]['status']; ?></td>
              </tr>
            </table>
          </center>
        </div>
      </body>
    </html>
  <?php
  }
}else
{
  header('location:../');
}
?>
