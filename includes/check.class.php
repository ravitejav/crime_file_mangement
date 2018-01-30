<?php
class login
{
  public function checkforlogin()
  {
    if(isset($_POST['passvalue']) && isset($_POST['user_name']))
    {
      $username=$_POST['user_name'];
      $pass=$_POST['passvalue'];
      if(!empty($username) && !empty($pass))
      {
        $hashpass=md5($pass);
        $this->q="SELECT `securitypin` FROM `user` WHERE `email`='".$username."' AND `password`='".$hashpass."'";
        $_SESSION['name']=$username;
        $_SESSION['passvalue']=$pass;
      }else
      {
        header('location:../crime');
      }
    }else
    {
        header('location:../crime');
    }
  }
  public function execandcheck()
  {
    $data=new database();
    $exec=new queryexc();
    $data->connect();
    $arraylogindata=$exec->exc($this->q,$data->con);
    if ($arraylogindata[0]!=1)
    {
      header('location:../crime');
    }
  }
  public function checker()
  {
    $hashpass=md5($_SESSION['passvalue']);
    $q="SELECT `securitypin` FROM `user` WHERE `email`='".$_SESSION['name']."' AND `password`='".$hashpass."'";
    $data=new database();
    $exec=new queryexc();
    $data->connect();
    $this->pindata=$exec->exc($q,$data->con);
  }
  public function pinsec()
  {
    $this->checker();
    return ($this->pindata[1]['securitypin']);
  }

}
?>
