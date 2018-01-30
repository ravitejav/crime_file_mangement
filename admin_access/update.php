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

/**
 * update police id class
 */
class updateclass extends checker
{
  public $confirm;
  function updating()
  {
    if($this->loggedin)
    {
      if(isset($_GET['polid']))
      {
        if(!empty($_GET['polid']))
        {
          $query="SELECT * FROM `user` WHERE `id`='".$_GET['polid']."'";
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
            echo "<script>alert('There is no data found for the ".$_GET['polid']."')</script>";
          }
        }
      }
    }
  }
}
$second=new updateclass;
$second->checking();
$second->confirm=false;
$second->updating();
if((!$second->confirm)&&($second->loggedin))
{
?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Update police</title>
      <link rel="stylesheet" href="../style/admin.css">
    </head>
    <body>
      <center><h1>Crime File Management</h1></center>
      <div class="topnav">
        <a class="active" href="home.php">Home</a>
        <a href="working.php">Working Staff</a>
        <a href="addpol.php">Add Police</a>
        <a href="filestatus.php">Case status</a>
        <a href="logout.php">Logout</a>
      </div>
      <form class="" action="update.php" method="GET">
        <div class="row">
          <center>
          <div class="col-25">
           <label for="polid">Police Id :</label>
          </div>
        </center>
          <div class="col-75">
            <input type="text" name="polid" required="required" maxlength="10">
          </div>
        </div>
        <input type="Submit" Value="Search">
      </form>
    </body>
  </html>
<?php
}else
{
  if($second->loggedin)
  {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Update police</title>
          <link rel="stylesheet" href="../style/admin.css">
          <script type="text/javascript" src="../javas/admin.js"></script>
        </head>
        <body>
        <center><h1>Crime File Management</h1></center>
        <div class="topnav">
          <a class="active" href="home.php">Home</a>
          <a href="working.php">Working Staff</a>
          <a href="update.php">Update</a>
          <a href="addpol.php">Add Police</a>
          <a href="filestatus.php">Case status</a>
          <a href="logout.php">Logout</a>
        </div>
        <center>  <h3><font color="red">Updating Information</font></h3>
        </center>
        <div class="container">
     <form class="" action="updatepoliceconfirm.php" method="POST" enctype="multipart/form-data">
       <div class="row">
         <div class="col-25">
          <label for="pid">Ploice Id</label>
         </div>
         <div class="col-75">
           <input type="text" name="pid" id="pid" required="required" placeholder="Police Id" maxlength="10" readonly="readonly" value="'.$second->data[1]['id'].'" onchange="checkid()">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="pid"></label>
         </div>
         <div class="col-75">
           <span id="verify"></span>
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="fname">First Name</label>
         </div>
         <div class="col-75">
           <input type="text" name="fname" required="required" placeholder="Full Name"  readonly="readonly" value="'.$second->data[1]['name'].'" maxlength="80">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="address">Address</label>
         </div>
         <div class="col-75">
           <textarea name="address" required="required" placeholder="Address" maxlength="250" value="'.$second->data[1]['address'].'" ></textarea>
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="phoneno">Phone Number</label>
         </div>
         <div class="col-75">
           <input type="text" name="phoneno" required="required" placeholder="Phone Number" value="'.$second->data[1]['phoneno'].'"  maxlength="10">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="gender">Gender</label>
         </div>
         <div class="col-75">
           <select name="gender">
             <option value="M">Male</option>
             <option value="F">Female</option>
           </select>
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="workid">Working Police Station Id</label>
         </div>
         <div class="col-75">
           <input type="text" name="workid" id="wid" required="required" placeholder="Working Police Station Id" onchange="verifystation()" maxlength="11"  value="'.$second->data[1]['wid'].'">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label></label>
         </div>
         <div class="col-75">
           <span id="stationverify"></span>
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="email">Email Id</label>
         </div>
         <div class="col-75">
           <input type="email" name="email" required="required" placeholder="Email" maxlength="80" value="'.$second->data[1]['email'].'">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="grade">Grade Level</label>
         </div>
         <div class="col-75">
           <input type="text" name="grade" required="required" placeholder="Grade Level" maxlength="10"  value="'.$second->data[1]['gradelevel'].'">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label for="trackrec">Track Record</label>
         </div>
         <div class="col-75">
           <input type="file" name="trackrec" required="required">
         </div>
       </div>
       <div class="row">
         <div class="col-25">
          <label></label>
         </div>
         <div class="col-75">
           <input type="Submit" Value="Update">
         </div>
       </div>
     </form>
   </div>
   </body>
   </html>';
  }else
  {
    header('location:index.php');
  }
}
 ?>
