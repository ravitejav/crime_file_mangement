<?php
include 'includes/check.class.php';
include 'database/db.con.php';
include 'includes/query_exe.class.php';
/**
 * seurity verification
 */
class secver
{

  function __construct()
  {
    if(isset($_POST['t1']) && isset($_POST['t2']) && isset($_POST['t3']) && isset($_POST['t4']))
    {
      $t1=$_POST['t1'];$t2=$_POST['t2'];$t3=$_POST['t3'];$t4=$_POST['t4'];
      if(!empty($t1) && !empty($t2) && !empty($t3) && !empty($t4))
      {
        $this->sec=$t1.$t2.$t3.$t4;
        $logincheck=new login();
        $this->pin=$logincheck->pinsec();
      }else
      {
          header('location:index.php');
      }
    }else
    {
        header('location:index.php');
    }
  }
  public function verify()
  {
    if($this->sec!=$this->pin)
    {
      header('location:index.php');
    }else
    {
      header('location:user/');
    }
  }
}
$ver=new secver();
$ver->verify();
?>
