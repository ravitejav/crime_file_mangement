<?php
include '../includes/verify.php';
class pidverify extends queryexc
{
  public function checkforpid()
  {
    if(isset($_POST['pid']))
    {
      if (!empty($_POST['pid']))
      {
        $q="SELECT * FROM `station` WHERE `poid`='".$_POST['pid']."'";
        $db=new database;
        $db->connect();
        $query=new queryexc;
        $data=$query->exc($q,$db->con);
        if ($data[0]===1)
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
$s=new pidverify;
$s->checkforpid();
?>
