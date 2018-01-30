function adjust_textarea(h)
{
  h.style.height="20px";
  h.style.height=(h.scrollHeight)+"px";
}
function checkforcase()
{
  var id=document.getElementById('caseid').value;
  var type=document.getElementById('type').value;
  if(id!="")
  {
    var req = new XMLHttpRequest();
    var url="checkforcase.php";
    var variable="caseid="+id+"&type="+type;
    req.open("POST",url,true);
    req.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    req.onreadystatechange=function(){
      if(req.readyState==4 && req.status==200)
      {
        var returndata=req.responseText;
        if(returndata=="error")
          alert('There no case with id '+id+' under '+type);
        else if(returndata=="correct")
          document.getElementById('error')="dope";
        else
          alert("Something went wrong try again,Try again later");
      }
    }
    req.send(variable);
  }else
  {
      alert('Please fill the id field')
  }
}
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
          alert('Police station is not available with id '+id);
        else if(returndata=="correct")
          id=id;
        else
          alert("Something went wrong try again,Try again later");
      }
    }
    req.send(variable);
  }else
  {
      alert("Please fill the police station id field");
  }
}
