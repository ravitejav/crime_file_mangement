<?php
include '../includes/verify.php';
$c=new checker;
/**
 * updateing class
 */
class caseupdate
{
  function __construct()
  {
    if (isset($_GET['casestatus'])  && isset($_GET['caseid']) && isset($_GET['type']) && isset($_GET['crime']) && isset($_GET['wit']) )
    {
      if(!empty($_GET['caseid']) && !empty($_GET['type']) && !empty($_GET['casestatus']) && !empty($_GET['crime']) && !empty($_GET['wit']))
      {
        $query="UPDATE `".$_GET['type']."` SET `status`='".$_GET['casestatus']."' WHERE `cid`=".$_GET['caseid'];
        $db=new database();
        $db->connect();
        $querye=new queryexc;
        if($querye->qexc($query,$db->con))
        {
          if($_GET['crime']!='xyz')
          {
            $incrime=rtrim($_GET['crime'],',');
            $incrime=explode(',',$_GET['crime']);
            for ($i=0; $i < count($incrime) ; $i++)
            {
              $q="INSERT INTO `case_crime` VALUES ('".$_GET['caseid']."',".$incrime[$i].",'".$_GET['type']."')";
              $db=new database();
              $db->connect();
              $querye=new queryexc;
              if(!$querye->qexc($q,$db->con))
              {
                echo "<script>alert('Criminals are not added')</script>";
                break;
              }
            }
          }
          if($_GET['wit']!='xyz')
          {
            $incrime=rtrim($_GET['wit'],',');
            $incrime=explode(',',$_GET['wit']);
            for ($i=0; $i < count($incrime) ; $i++)
            {
              $q="INSERT INTO `case_wit` VALUES ('".$_GET['caseid']."',".$incrime[$i].",'".$_GET['type']."')";
              $db=new database();
              $db->connect();
              $querye=new queryexc;
              if(!$querye->qexc($q,$db->con))
              {
                echo "<script>alert('witnesses are not added')</script>";
                break;
              }
            }
          }
          header('location:index.php');
        }else
        {
          echo "<script>alert('Please try again not updated the status')</script>";
        }
      }else
      {
          header('location:index.php');
      }
    }
  }
}
new caseupdate;

class updateclass
{
  public function __construct()
  {
        $this->confirm=false;
  }
  function updating()
  {
      if(isset($_GET['caseid']) && isset($_GET['type']))
      {
        if(!empty($_GET['caseid']) && !empty($_GET['type']))
        {
          $this->type=$_GET['type'];
          $this->caseid=$_GET['caseid'];
          $query="SELECT * FROM `".$_GET['type']."` WHERE `cid`=".$_GET['caseid'];
          $db=new database();
          $db->connect();
          $querye=new queryexc;
          $this->data=$querye->exc($query,$db->con);
          if($this->data[0]==1)
          {
            $this->confirm=true;
          }else
          {
            $this->confirm=false;
            echo "<script>alert('There is no case with case id ".$_GET['caseid']." under ".$_GET['type']."')</script>";
          }
        }
      }
  }
}
$up=new updateclass;
$up->updating();
if($c->attempt)
{
  if(!$up->confirm)
  {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Case update</title>
    <link rel="stylesheet" href="../style/user.css">
    <script type="text/javascript" src="../javas/user.js"></script>
  </head>
  <body>
    <center><h1>Crime File Management</h1></center>
    <div class="topnav">
      <a class="active" href="index.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Add Case</button>
        <div class="dropdown-content">
          <a href="missing.php">Missing Person</a>
          <a href="murder.php">Murder</a>
          <a href="land.php">Land problem</a>
          <a href="object.php">Missing Objects</a>
          <a href="other.php">Other Problems</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">FIR</button>
        <div class="dropdown-content">
          <a href="viewfir.php">View FIR</a>
          <a href="addfir.php">Add FIR</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Post Morten</button>
        <div class="dropdown-content">
          <a href="viewpost.php">View Post Morten Reoprt</a>
          <a href="addpost.php">Add Post Morten Reoprt</a>
        </div>
      </div>
      <a href="status.php">Case status</a>
      <a href="addcrimi.php">Add Criminal</a>
      <a href="addwit.php">Add witness</a>
      <a href="viewcrimi.php">View criminal</a>
      <a href="viewwit.php">View Witness</a>
      <a href="viewcase.php">View case</a>
      <a href="logout.php">Logout</a>
      </div>
    <form class="form-style-7" action="caseupdate.php" method="GET">
      <ul>
        <li>
          <label for="caseid">Case Id</label>
          <input type="text" name="caseid" maxlength="10" required="required">
          <span>Enter the case id here</span>
        </li>
        <li>
          <label for="type">Type Of Case</label>
          <select name="type">
                <option value="device">Device missing</option>
                <option value="land">Land problem</option>
                <option value="missing">Missing person</option>
                <option value="murder">Murder</option>
                <option value="otherprob">Other problems</option>
          </select>
        </li>
        <li>
          <input type="submit" value="Search">
        </li>
      </ul>
    </form>
  </body>
</html>
<?php
  }else
  {
      ?>
      <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Case update</title>
          <link rel="stylesheet" href="../style/user.css">
          <script type="text/javascript" src="../javas/user.js"></script>
        </head>
        <body>
          <center><h1>Crime File Management</h1></center>
          <div class="topnav">
            <a class="active" href="index.php">Home</a>
            <div class="dropdown">
              <button class="dropbtn">Add Case</button>
              <div class="dropdown-content">
                <a href="missing.php">Missing Person</a>
                <a href="murder.php">Murder</a>
                <a href="land.php">Land problem</a>
                <a href="object.php">Missing Objects</a>
                <a href="other.php">Other Problems</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">FIR</button>
              <div class="dropdown-content">
                <a href="viewfir.php">View FIR</a>
                <a href="addfir.php">Add FIR</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Post Morten</button>
              <div class="dropdown-content">
                <a href="viewpost.php">View Post Morten Reoprt</a>
                <a href="addpost.php">Add Post Morten Reoprt</a>
              </div>
            </div>
            <a href="status.php">Case status</a>
            <a href="addcrimi.php">Add Criminal</a>
            <a href="addwit.php">Add witness</a>
            <a href="viewcrimi.php">View criminal</a>
            <a href="viewwit.php">View Witness</a>
            <a href="viewcase.php">View case</a>
            <a href="logout.php">Logout</a>
            <div class="mention">
              Welcome, <?php echo $c->data[1]['name'];?><br>
              <?php echo $c->data[1]['gradelevel']; ?>
            </div>
          </div>
          <form class="form-style-7" action="caseupdate.php" method="GET">
            <ul>
              <li>
                <input type="text" name="casestatus" value="<?php echo $up->data[1]['status']; ?>" >
                <span>Enter the Status of case here</span>
              </li>
              <li>
                <input type="text" name="crime" required="required">
                <span>enter criminal's id only(seprate id's with comma), (if not enter xyz)</span>
              </li>
              <li>
                <input type="text" name="wit" required="required">
                <span>enter witness's id only(seprate id's with comma), (if not enter xyz)</span>
              </li>
              <li>
                <input type="text" name="caseid" value="<?php echo $up->caseid;?>" readonly="readonly">
                <span>Don't edit case id</span>
              </li>
              <li>
                <input type="text" name="type" value="<?php echo $up->type;?>" readonly="readonly">
                <span>Don't edit type of the cases</span>
              </li>
              <li>
                <input type="submit" value="Update">
              </li>
            </ul>
          </form>
        </body>
      </html>
      <?php
  }
}else
{
  header('location:../');
}
?>
