<?php
include '../includes/adminlogchecker.class.php';
include '../includes/pic.class.php';
$ver=new checker;
$ver->checking();
/**
 * updating the class
 */
class updatecon
{
    public function checkdata()
    {
      if(isset($_POST['address']) && isset($_POST['phoneno']) && isset($_POST['gender']) && isset($_POST['workid']) && isset($_POST['email']) && isset($_POST['grade']))
      {
          if(!empty($_POST['address']) && !empty($_POST['phoneno']) && !empty($_POST['gender']) && !empty($_POST['workid']) && !empty($_POST['email']) && !empty($_POST['grade']))
          {
            $this->noempty=true;
          }else
          {
            header('location:update.php');
          }
      }else
      {
          header('location:update.php');
      }
    }
    public function update()
    {
      if($this->noempty)
      {
        $up="UPDATE `user` SET `address`='".$_POST['address']."' ,`phoneno`='".$_POST['phoneno']."',`gender`='".$_POST['gender']."',`wid`=".$_POST['workid'].",`email`='".$_POST['email']."' ,`gradelevel`='".$_POST['grade']."'";
        $db=new database;
        $db->connect();
        if(mysqli_query($db->con,$up))
        {
          echo "<script>alert('Updated Succesfully')</script>";
          header('location:home.php');
        }else
        {
            echo "<script>alert('Not able to update try again later')</script>";
        }
      }else
      {
          header("location:update.php");
      }
    }
}
if($ver->loggedin)
{
  $update=new updatecon;
  $update->checkdata();
  $update->update();
  $pic=new piccheck;
  $pic->documentcheck();
}else
{
    header('location:index.php');
}

?>
