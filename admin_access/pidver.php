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

class pidverify extends queryexc
{
  public function checkforpid()
  {
    if(isset($_POST['pid']))
    {
      if (!empty($_POST['pid']))
      {
        $q="SELECT * FROM `user` WHERE `id`='".$_POST['pid']."'";
        $db=new database;
        $db->connect();
        $query=new queryexc;
        $data=$query->exc($q,$db->con);
        if ($data[0]===0)
          echo "correct";
        else
          echo "error";
      }else
      {
          echo "error";
      }
    }else {
      echo "error";
    }
  }
}

if($check->loggedin)
{  $ver=new pidverify;
  $ver->checkforpid();
}else
{
  header('location:index.php');
}
?>
