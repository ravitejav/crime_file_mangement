<?php
include '../includes/query_exe.class.php';
include '../database/db.con.php';
/**
 * to check the admin as loged in or not
 */
class adminlog
{
  public function checkforlogin()
  {
    if(isset($_SESSION['adminname']) && isset($_SESSION['adminpass']))
    {
      $admin=$_SESSION['adminname'];
      $pass=$_SESSION['adminpass'];
      if(!empty($admin) && !empty($pass))
      {
        $this->query="SELECT `id` FROM `admin` WHERE `username`='".$admin."' AND `password`='".$pass."'";
      }else
      {
          header('location:index.php');
      }
    }else
    {
        header('location:index.php');
    }
  }
  public function querycheck()
  {
    $q=new queryexc;
    $db=new database;
    $db->connect();
    $this->data=$q->exc($this->query,$db->con);
    if($this->data[0])
    {
      if($this->data[1]['id']===$_SESSION['adminid'])
        return 1;
      else
        return 0;
    }else
      return 0;
  }
}

 ?>
