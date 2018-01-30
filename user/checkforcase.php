<?php
include '../includes/verify.php';
$c=new checker;

class check
{
  public function checkforcase()
  {
    if(isset($_POST['caseid']) && $_POST['type'])
    {
      if (!empty($_POST['caseid']) && !empty($_POST['type']))
      {
        $q="SELECT * FROM `".$_POST['type']."` WHERE `cid`='".$_POST['caseid']."'";
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

if($c->attempt)
{
  $ver=new check;
  $ver->checkforcase();
}else
{
  header('location:index.php');
}
?>
