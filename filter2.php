<?php   
   $str='';
$array=array();
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
/*if($i==0)
$str=$str." fee.annual between ".$minv." and ".$maxv;
else
{
$str=$str." and fee.annual between ".$minv." and ".$maxv;
$i=1;
}*/
}
?>