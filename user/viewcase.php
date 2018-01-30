<?php
include '../includes/verify.php';
$c=new checker;
/**
 * view builder
 */
class viewdetails
{
  function __construct()
  {
    $this->j=0;
  }
  public function build()
  {
    if(isset($_GET['caseid']) && isset($_GET['type']))
    {
      if(!empty($_GET['caseid']) && !empty($_GET['type']))
      {
        $q="SELECT * FROM `".$_GET['type']."` WHERE `cid`=".$_GET['caseid'];
        $db=new database();
        $db->connect();
        @$querye=new queryexc;
        @$this->data=$querye->exc($q,$db->con);
        if($this->data[0]==1)
        {
            @$q1="SELECT * FROM `station` WHERE `poid`=".$this->data[1]['sid'];
            @$querye1=new queryexc;
            @$this->data1=$querye1->exc($q1,$db->con);
            @$q2="SELECT * FROM `case_crime` WHERE `caseid`='".$this->data[1]['cid']."' AND `type`='".$_GET['type']."'";
            @$querye2=new queryexc;
            @$this->data2=$querye2->exc($q2,$db->con);
            for ($i=0; $i < $this->data2[0]; $i++)
            {
              @$qe="SELECT * FROM `criminal` WHERE `id`=".$this->data2[$i+1]['criminalid'];
              @$querye3=new queryexc;
              @$this->data3=$querye3->exc($qe,$db->con);
            }
            @$q3="SELECT * FROM `case_wit` WHERE `caseid`='".$this->data[1]['cid']."' AND `type`='".$_GET['type']."'";
            @$querye4=new queryexc;
            @$this->data4=$querye4->exc($q3,$db->con);
            for ($i=0; $i < $this->data2[0]; $i++)
            {
              @$qe="SELECT * FROM `witness` WHERE `wid`=".$this->data4[$i+1]['witid'];
              @$querye5=new queryexc;
              @$this->data5=$querye5->exc($qe,$db->con);
            }
            $this->j=1;
        }
      }
    }
  }
}
$a=new viewdetails;
$a->build();
if($c->attempt)
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>View case</title>
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
      <a href="caseupdate.php">Case Update</a>
      <a href="viewcrimi.php">View criminal</a>
      <a href="viewwit.php">View Witness</a>
      <a href="viewcase.php">View case</a>
      <a href="logout.php">Logout</a>
      </div>
      <?php if ($a->j==0): ?>
      <form class="form-style-7" action="viewcase.php" method="GET">
        <ul>
          <li>
            <label for="caseid">Case id</label>
            <input type="text" name="caseid" required="required" maxlength="10">
            <span>Case Id which is already present</span>
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
            <input type="submit" name="" value="View details">
          </li>
        </ul>
      </form>
      <?php endif; ?>
      <?php if ($a->j==1): ?>
        <div style="overflow-x:auto">
          <center>
            <table class="view-table" border="3px">
              <tr>
                <td>
                  Case Informaation
                </td>
              </tr>
              <tr>
                <td>Case Id</td><td><?php echo $a->data[1]['cid'];?></td>
              </tr>
              <tr>
                <td>Name</td><td><?php echo $a->data[1]['name']; ?></td>
              </tr>
              <tr>
                <td>Registed by station id</td><td><?php echo $a->data[1]['sid']; ?></td>
              </tr>
              <tr>
                <td>Address</td><td><?php echo $a->data[1]['address']; ?></td>
              </tr>
              <tr>
                <td>Identity Number</td><td><?php echo $a->data[1]['identity_no']; ?></td>
              </tr>
              <tr>
                <td>Phone number</td><td><?php echo $a->data[1]['phoneno'];?></td>
              </tr>
              <tr>
                <td>Gender</td><td><?php if($a->data[1]['sid']=='m'){echo "Male";}else{echo "Female";} ?></td>
              </tr>
              <tr>
                <td>Additional information</td><td><?php echo $a->data[1]['add_data']; ?></td>
              </tr>
              <tr>
                <td>Stauts </td><td><?php echo $a->data[1]['status']; ?></td>
              </tr>
            </table>
          </center>
        </div>
        <div style="overflow-x:auto">
          <center>
            <table class="view-table" border="3px">
              <tr>
                <td>
                  police station Information
                </td>
              </tr>
              <tr>
                <td>Police station Id</td><td><?php echo $a->data1[1]['poid'];?></td>
              </tr>
              <tr>
                <td>Address</td><td><?php echo $a->data1[1]['address']; ?></td>
              </tr>
            </table>
          </center>
        </div>
        <?php if ($a->data2[0]>0): ?>
          <div style="overflow-x:auto">
            <center>
              <table class="view-table" border="3px">
                <tr>
                  <td>
                    Criminals
                  </td>
                </tr>
                <?php for ($i=0; $i < $a->data2[0] ; $i++)
                {
                  echo "<tr><td><a href=\"viewcrimi.php?criid=".$a->data3[1]['id']."\">".$a->data3[1]['name']."</a></td></tr>";
                }
                ?>
              </table>
            </center>
          </div>
        <?php endif; ?>
        <?php if ($a->data2[0]>0): ?>
          <div style="overflow-x:auto">
            <center>
              <table class="view-table" border="3px">
                <tr>
                  <td>
                    Criminals
                  </td>
                </tr>
                <?php for ($i=0; $i < $a->data2[0] ; $i++)
                {
                  echo "<tr><td><a href=\"viewcrimi.php?criid=".$a->data3[1]['id']."\">".$a->data3[1]['name']."</a></td></tr>";
                }
                ?>
              </table>
            </center>
          </div>
        <?php endif; ?>
        <?php if ($a->data4[0]>0): ?>
          <div style="overflow-x:auto">
            <center>
              <table class="view-table" border="3px">
                <tr>
                  <td>
                    witness
                  </td>
                </tr>
                <?php for ($i=0; $i < $a->data4[0] ; $i++)
                {
                  echo "<tr><td><a href=\"viewwit.php?witid=".$a->data5[1]['wid']."\">".$a->data5[1]['name']."</a></td></tr>";
                }
                ?>
              </table>
            </center>
          </div>
        <?php endif; ?>
      <?php endif; ?>
  </body>
</html>
<?php
}else
{
  header('location:../');
}
?>
