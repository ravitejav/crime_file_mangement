<?php
include '../includes/adminlogin.class.php';

/**
 * to get and check the user LogicException
 */
class checker
{
  public $loggedin;
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
class updateclass extends checker
{
  public $confirm=false;
  function updating()
  {
    if($this->loggedin)
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
}
$up=new updateclass;
$up->checking();
$up->updating();
if($check->loggedin)
{
  if(!$up->confirm)
  {
?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Case status</title>
      <link rel="stylesheet" href="../style/admin.css">
    </head>
    <body>
      <center><h1>Crime file Mangement</h1></center>
      <div class="topnav">
        <a class="active" href="home.php">Home</a>
        <a href="addpol.php">Add Police</a>
        <a href="update.php">Update</a>
        <a href="working.php">Working Staff</a>
        <a href="logout.php">Logout</a>
      </div>
      <div class="container">
        <form class="" action="filestatus.php" method="GET">
          <div class="row">
            <div class="col-25">
              Case Ids
            </div>
            <div class="col-75">
              <input type="text" name="caseid" placeholder="Case Id"><br />
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              Type:
            </div>
            <div class="col-75">
              <select name="type">
                    <option value="device">Device missing</option>
                    <option value="land">Land problem</option>
                    <option value="missing">Missing person</option>
                    <option value="murder">Murder</option>
                    <option value="otherprob">Other problems</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
             <label></label>
            </div>
            <div class="col-75">
              <input type="Submit" Value="Search">
            </div>
          </div>
        </form>
      </div>
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
        <title>Case status</title>
        <link rel="stylesheet" href="../style/admin.css">
      </head>
      <body>
        <center><h1>Crime file Mangement</h1></center>
        <div class="topnav">
          <a class="active" href="home.php">Home</a>
          <a href="addpol.php">Add Police</a>
          <a href="update.php">Update</a>
          <a href="working.php">Working Staff</a>
          <a href="logout.php">Logout</a>
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
  header('location:index.php');
}


?>
