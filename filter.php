<?php   
   $str='';

$array=array();
$minv=0;
if(isset($_POST["minv"]))
$minv=$_POST["minv"];
if(isset($_POST["maxv"]))
$maxv=$_POST["maxv"];
$i=0;
if(isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"]) || isset($_POST["$arr[3]"]) || isset($_POST["minv"]) || isset($_POST["maxv"]))
{
  if(isset($_POST["$arr[0]"]))
  $array[0]=$_POST["$arr[0]"];
  if(isset($_POST["$arr[1]"]))
  $array[1]=$_POST["$arr[1]"];
  if(isset($_POST["$arr[2]"]))
  $array[2]=$_POST["$arr[2]"];
  if(isset($_POST["$arr[3]"]))
  $array[3]=$_POST["$arr[3]"];

for($k=0;$k<4;$k++)
{ 
  if(!empty($array[$k]))
  {
foreach ($array[$k] as $v)
{
  if($i==0)
  {
    $str=$str.$arr2[$k].".".$arr[$k]." LIKE '%$v%'";
    $i=1;
  }
    else
      $str=$str." and ".$arr2[$k].".".$arr[$k]." LIKE '%$v%'";
}
}

}

}
if($minv!=0)
{
  $str1=" and fee1.annual between ".$minv." and ".$maxv;
}
else
{
  $str1=" ";
}
if($minv!=0)
{
  $str2=" where fee1.annual between ".$minv." and ".$maxv;
}
else
{
  $str2=" ";
}


if(isset($_POST["board"]))
{
  $sboard=$_POST["board"];
  $z=0;
  foreach($sboard as $bval)
  {
    if($z==0)
    {
      $str5=" where (schools.school_board='$bval' ";
    $str3=" and (schools.school_board='$bval' ";
    if($str2==" ")
    $str4=" where (schools.school_board='$bval' ";
    else
      $str4=$str3;
    $z=1;
    }
    else
    {
      $str3=$str3." or schools.school_board='$bval' ";
      $str4=$str4." or schools.school_board='$bval' ";
      $str5=$str5." or schools.school_board='$bval' ";
    }
  }
  $str3=$str3.")";
  $str4=$str4.")";
  $str5=$str5.")";
}
else
{
  $str3=" ";
  $str4=" ";
  $str5=" ";
}

?>