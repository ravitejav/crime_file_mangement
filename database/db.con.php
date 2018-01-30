<?php
session_start();
/**
 *
 */
class database
{

  function __construct()
  {
    $this->user='root';
    $this->password='';
    $this->dbname='crime';
    $this->host='localhost';
  }
  public function connect()
  {
    $this->connect_db();
  }
  private function connect_db()
  {
    if($this->con=mysqli_connect($this->host,$this->user,$this->password,$this->dbname))
    {
      if($this->dbcon=mysqli_select_db($this->con,$this->dbname))
      {

      }else
      {
        $_SESSION['logic']='Databse is not avalible now, try again later';
        header('location:./Error.php');
      }
    }else
    {
        $_SESSION['logic']='Establishment of connection to databse is not possible now, try again later';
        header('location:./Error.php');
    }
  }
}
?>
