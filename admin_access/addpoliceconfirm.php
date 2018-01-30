<?php
include '../includes/adminlogin.class.php';
include '../includes/pic.class.php';
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
/**
 * adding police data to the database
 */
class addpolice extends piccheck
{
  function __construct()
  {
    if(isset($_POST['pid']) && isset($_POST['fname']) && isset($_POST['address']) && isset($_POST['phoneno']) && isset($_POST['passcode']) && isset($_POST['gender']) && isset($_POST['workid']) && isset($_POST['email']) && isset($_POST['secpin']) && isset($_POST['grade']))
    {
      if(!empty($_POST['pid']) && !empty($_POST['fname']) && !empty($_POST['address']) && !empty($_POST['phoneno']) && !empty($_POST['passcode']) && !empty($_POST['gender']) && !empty($_POST['workid']) && !empty($_POST['email']) && !empty($_POST['secpin']) && !empty($_POST['grade']))
      {
        $this->j=1;
      }else
      {
        echo "<script>alert(\"Fill all the details\")</script>";
        header('location:addpol.php');
      }
    }else
    {
        header('location:addpol.php');
    }
  }
  public function insertdata()
  {
    if(($this->photocheck("proimg",$_POST['pid'],"../user/profile/","addpol.php"))&&($this->photocheck("sign",$_POST['pid'],"../user/sign/","addpol.php"))&&($this->documentcheck("trackrec",$_POST['pid'],"../user/track/","addpol.php")))
    {
      $query="INSERT INTO `user`(`id`, `name`, `address`, `phoneno`, `password`, `gender`, `wid`, `email`, `securitypin`, `gradelevel`) VALUES ";
      $query=$query."('".$_POST['pid']."','".$_POST['fname']."','".$_POST['address']."','".$_POST['phoneno']."','".md5($_POST['passcode'])."','".$_POST['gender']."',".$_POST['workid'].",'".$_POST['email']."','".$_POST['secpin']."','".$_POST['grade']."')";
      $db=new database;
      $db->connect();
      $q=new queryexc;
      if($q->insertq($db->con,$query))
      {
        echo "<script>alert('Successfully added the police')</script>";
        header("location:home.php");
      }else
      {
        echo "<script>alert('Some failure as happen re-enter trhe data')</script>";
        header('location:addpol.php');
      }
    }else
    {
        echo "<script>alert(\"Please fill the form with appropriate details and suitable type of files\")</script>";
    }
  }
}

$check=new checker;
$check->checking();
if($check->loggedin)
{
  $add=new addpolice;
  if($add->j==1)
  {
    echo "<script>alert('inserting')</script>";
    $add->insertdata();
  }else
  {
    header('location:addpol.php');
  }
}else
{
    header('location:index.php');
}
?>
