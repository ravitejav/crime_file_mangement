<?php
/**
 * to check the images are correct or not
 */
class piccheck
{
  public function photocheck($name,$unique,$path,$headerfail)
  {
    if ($_FILES[$name]['tmp_name']!='')
    {
      $path=$path.$unique.'.jpg';
      $uploadOk = 1;
      $imageFileType = pathinfo($path,PATHINFO_EXTENSION);
      $check = getimagesize($_FILES[$name]["tmp_name"]);
      if($check !== false)
      {
        $uploadOk = 1;
      }
      else
      {
        echo "<script>alert(\"Please choose JPG format for images \")</script>";
        $uploadOk = 0;
        return false;
      }
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" )
      {
        echo "<script>alert('Only Image Files are allowed')</script>";
        $uploadOk = 0;
        return false;
      }
      if($uploadOk==0)
      {
        $headerfail="location:".$headerfail;
         header($headerfail);
      }
      if (move_uploaded_file($_FILES[$name]["tmp_name"], $path))
      {
        return true;
      }else
      {
        return false;
      }
    }
  }
  public function documentcheck($name,$unique,$path,$headerfail)
  {
    if ($_FILES[$name]['tmp_name']!='')
    {
      $path=$path.$unique.'.doc';
      $uploadOk = 1;
      $DocumentFileType = pathinfo($path,PATHINFO_EXTENSION);
      $check = filesize($_FILES[$name]["tmp_name"]);
      if($check !== false)
      {
        $uploadOk = 1;
      }
      else
      {
        echo "<script>alert(\"Please choose the document \")</script>";
        return false;
        $uploadOk = 0;
      }
      if($DocumentFileType != "docx" && $DocumentFileType != "doc")
      {
        echo "<script>alert('Only docx files are allowed')</script>";
        $uploadOk = 0;
        return false;
      }
      if($uploadOk==0)
      {
        $headerfail="location:".$headerfail;
        header($headerfail);
      }
      if (move_uploaded_file($_FILES[$name]["tmp_name"], $path))
      {
        return true;
      }else
      {
        return false;
      }
    }
  }
}
?>
