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
      if(isset($_GET['statid']))
      {
        if(!empty($_GET['statid']))
        {
          $query="SELECT * FROM `station` WHERE `poid`=".$_GET['statid'];
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
            echo "<script>alert('There is no police station with id ".$_GET['statid']."')</script>";
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
      <title>Working Employees</title>
      <link rel="stylesheet" href="../style/admin.css">
    </head>
    <body>
      <center><h1>Crime File Management</h1></center>
      <div class="topnav">
        <a class="active" href="home.php">Home</a>
        <a href="filestatus.php">Case status</a>
        <a href="update.php">Update</a>
        <a href="addpol.php">Add Police</a>
        <a href="logout.php">Logout</a>
      </div>
      <div class="main-class">
        <form action="working.php" method="GET">
          <div class="row">
            <center>
            <div class="col-25">
             <label for="statid">Police Station Id :</label>
            </div>
          </center>
            <div class="col-75">
              <input type="text" name="statid" required="required" maxlength="10">
            </div>
          </div>
          <input type="Submit" Value="Search">
        </form>
      </div>
    </body>
  </html>
<?php
  }else
  {
    $q="SELECT * FROM `user` WHERE `wid`=".$up->data[1]['poid'];
    $db=new database();
    $db->connect();
    $querye=new queryexc;
    $data=$querye->exc($q,$db->con);
    ?>
     <!DOCTYPE html>
     <html>
       <head>
         <meta charset="utf-8">
         <title>Working list</title>
         <link rel="stylesheet" href="../style/admin.css">
       </head>
       <body>
         <center><h1>Crime File Management</h1></center>
         <div class="topnav">
           <a class="active" href="home.php">Home</a>
           <a href="update.php">Update</a>
           <a href="addpol.php">Add Police</a>
           <a href="working.php">Working</a>
           <a href="filestatus.php">Case status</a>
           <a href="logout.php">Logout</a>
         </div>
         <?php for ($i=1; $i <= $data[0]; $i+=3)      {?>
         <div class="row-work">
            <?php for ($j=$i; $j < $i+3 && $j<=$data[0]; $j++) {?>
              <div class="column">
                <img src="../user/profile/<?php echo $data[$j]['id'];?>.jpg" alt="<?php echo $data[$j]['name'];?> not uploaded" style="width:100%">
                <div class="container1">
                  <h2><?php echo $data[$j]['name'];?></h2>
                  <p class="title"><?php echo $data[$j]['gradelevel'];?></p>
                  <p>contact : <?php echo $data[$j]['phoneno'];?></p>
                </div>
              </div>
            <?php } ?>
         </div>
        <?php } ?>
       </body>
     </html>
    <?php
  }
}else
{
  header('location:index.php');
}

?>
