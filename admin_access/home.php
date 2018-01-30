<?php
include '../includes/adminlogin.class.php';
/**
 * to get and check the user LogicException
 */
class checker
{
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
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin | Home Page</title>
  </head>
  <link rel="stylesheet" href="../style/admin.css">
  <body>
    <div class="full-page">
      <div class="top-name">
        <center><h1>Crime File Management</h1><center>
          <hr>
      </div>
      <div class="vertical-menu">
        <a href="addpol.php">Add Police</a>
        <a href="update.php">Update Police</a>
        <a href="working.php">Station staff</a>
        <a href="filestatus.php">Case status</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </body>
</html>
