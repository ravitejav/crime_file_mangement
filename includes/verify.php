<?php
include '../database/db.con.php';
include '../includes/query_exe.class.php';
/**
 * to verify the user as logged in or not
 */
class checker
{

  function __construct()
  {
    if(isset($_SESSION['passvalue']) && isset($_SESSION['name']))
    {
      $username=$_SESSION['name'];
      $pass=$_SESSION['passvalue'];
      if(!empty($username) && !empty($pass))
      {
        $hashpass=md5($pass);
        $this->q="SELECT `id`,`name`,`gradelevel` FROM `user` WHERE `email`='".$username."' AND `password`='".$hashpass."'";
        $this->query=new queryexc;
        $this->db=new database;
        $this->db->connect();
        $this->data=$this->query->exc($this->q,$this->db->con);
        if ($this->data[0]==1)
        {
          $this->attempt=true;
        }else
        {
          header('location:../');
        }
      }else
      {
        header('location:../');
      }
    }else
    {
        header('location:../');
    }
  }
}
?>
