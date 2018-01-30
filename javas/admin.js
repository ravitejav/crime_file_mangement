function checkid()
{
  var id=document.getElementById('pid').value;
  if(id!="")
  {
    var req = new XMLHttpRequest();
    var url="pidver.php";
    var variable="pid="+id;
    req.open("POST",url,true);
    req.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    req.onreadystatechange=function(){
      if(req.readyState==4 && req.status==200)
      {
        var returndata=req.responseText;
        if(returndata=="error")
          document.getElementById('verify').innerHTML="Id is used to others";
        else if(returndata=="correct")
          document.getElementById('verify').innerHTML="Id is available";
        else
          alert("Something went wrong try again,Try again later");
      }
    }
    req.send(variable);
  }else
  {
      document.getElementById("verify").innerHTML="Please fill the id field";
  }
}
function showpass()
{
    var type=document.getElementById('pass').type;
    if(type=="password")
      document.getElementById('pass').type="text";
    else
      document.getElementById('pass').type="password";
}
function verifystation()
{
  var id=document.getElementById('wid').value;
  var req = new XMLHttpRequest();
  var url="stationver.php";
  var variable="wid="+id;
  req.open("POST",url,true);
  req.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  req.onreadystatechange=function(){
    if(req.readyState==4 && req.status==200)
    {
      var returndata=req.responseText;
      if(returndata=="error")
        document.getElementById('stationverify').innerHTML="Station doesn't exsists";
      else
        document.getElementById('stationverify').innerHTML=returndata;
    }
  }
  req.send(variable);
}
