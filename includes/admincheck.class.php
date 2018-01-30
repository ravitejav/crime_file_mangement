<?php
class admincheck
{
  public $name,$password,$ver;
  function __construct()
  {
    if(isset($_POST['adminname']) && isset($_POST['passcode']))
    {
      $admin=$_POST['adminname'];
      $pass=$_POST['passcode'];
      if(!empty($admin) && !empty($pass))
      {
        $this->name=$admin;
        $this->password=md5($pass);
        $this->ver=1;
      }else
      {
        $this->ver=2;
      }
    }else
    {
      $this->ver=0;
    }
  }
  public function check()
  {
    $q="SELECT `id` FROM `admin` WHERE `username`='".$this->name."' AND `password`='".$this->password."'";
    $query=new queryexc;
    $db=new database;
    $db->connect();
    $this->data=$query->exc($q,$db->con);
  }
  public function verify()
  {
    $this->check();
    if($this->data[0]===1)
    {
      $_SESSION['adminname']=$this->name;
      $_SESSION['adminpass']=$this->password;
      $_SESSION['adminid']=$this->data[1]['id'];
      header('location:home.php');
    }
  }
}
?>
