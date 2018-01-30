<?php
include '../includes/adminlogin.class.php';

/**
 * to get and check the user LogicException
 */
class checker
{
  public $loggedin;
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
?>
