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
    if(isset($_POST['wid']))
    {
      if (!empty($_POST['wid']))
      {
        $q="SELECT * FROM `station` WHERE `poid`='".$_POST['wid']."'";
        $db=new database;
        $db->connect();
        $query=new queryexc;
        $data=$query->exc($q,$db->con);
        if ($data[0]===0)
          echo "error";
        else
          echo $data[1]['address'];
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
