<?php
$minv=500;
$maxv=500000;
if(isset($_POST["minv"]))
$minv=$_POST["minv"];
if(isset($_POST["maxv"]))
$maxv=$_POST["maxv"];
if(isset($_SESSION["city"]) && $_SESSION["city"]!='Select-City')
{
  $city=$_SESSION["city"];
if(isset($_POST["sortby"]) || isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"]) || isset($_POST["$arr[3]"]))
{
  if((isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"])  || isset($_POST["$arr[3]"])) && isset($_POST["sortby"]))
  {
  $var=$_POST["sortby"];
  if($var=='ulth')
  $sql="select * from schools where school_id in (SELECT infra.school_id from infra inner join (select school_id,annual,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee1 on infra.school_id=fee1.school_id where ".$str." and fee1.annual between ".$minv." and ".$maxv.") and school_city='$city' order by school_rating";
  else if($var=='uhtl')
   $sql="select * from schools where school_id in (SELECT infra.school_id from infra inner join (select school_id,annual,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee1 on infra.school_id=fee1.school_id where ".$str." and fee1.annual between ".$minv." and ".$maxv.") and school_city='$city' order by school_rating desc";
  else if($var=='flth')
  $sql="select distinct schools.* from schools,fee where schools.school_id in(SELECT infra.school_id from infra inner join (select school_id,annual,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee1 on infra.school_id=fee1.school_id where ".$str." and fee1.annual between ".$minv." and ".$maxv.") and school_city='$city' and schools.school_id=fee.school_id order by fee.annual"; 
  else if($var=='fhtl')
  $sql="select distinct schools.* from schools,fee where schools.school_id in(SELECT infra.school_id from infra inner join (select school_id,annual,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee1 on infra.school_id=fee1.school_id where ".$str." and fee1.annual between ".$minv." and ".$maxv.") and school_city='$city' and schools.school_id=fee.school_id order by fee.annual desc";
  }
  else if(isset($_POST["sortby"]))
  {
    $var=$_POST["sortby"];
    
  if($var=='ulth')
  $sql="select schools.* from schools inner join(select school_id,annual from fee group by school_id)fee1 on schools.school_id=fee1.school_id where fee1.annual between ".$minv." and ".$maxv." and schools.school_city='$city' order by schools.school_rating";
  else if($var=='uhtl')
   $sql="select schools.* from schools inner join(select school_id,annual from fee group by school_id)fee1 on schools.school_id=fee1.school_id where fee1.annual between ".$minv." and ".$maxv." and schools.school_city='$city' order by schools.school_rating desc";
  else if($var=='flth')
  $sql="select schools.* from schools inner join(select school_id,annual from fee group by school_id)fee1 on schools.school_id=fee1.school_id where fee1.annual between ".$minv." and ".$maxv." and schools.school_city='$city' order by fee1.annual"; 
  else if($var=='fhtl')
  $sql="select schools.* from schools inner join(select school_id,annual from fee group by school_id)fee1 on schools.school_id=fee1.school_id where fee1.annual between ".$minv." and ".$maxv." and schools.school_city='$city' order by fee1.annual desc";
  } 
  else if(isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"]) || isset($_POST["$arr[3]"]))
    $sql="select * from schools where school_id in (SELECT infra.school_id from infra inner join (select school_id,annual,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee1 on infra.school_id=fee1.school_id where ".$str." and fee1.annual between ".$minv." and ".$maxv.") and school_city='$city'";

}
else
  $sql="select schools.* from schools inner join(select school_id,annual from fee group by school_id)fee1 on schools.school_id=fee1.school_id where fee1.annual between ".$minv." and ".$maxv." and school_city='$city'";
}
else
  {
    if(isset($_POST["sortby"]) || isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"]) || isset($_POST["$arr[3]"]))
{
  if((isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"]) || isset($_POST["$arr[3]"])) && isset($_POST["sortby"]))
  {
  $var=$_POST["sortby"];
  if($var=='ulth')
  $sql="select * from schools where school_id in (SELECT infra.school_id from infra inner join (select school_id,annual,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee1 on infra.school_id=fee1.school_id where ".$str." and fee1.annual between ".$minv." and ".$maxv.") order by school_rating";
  else if($var=='uhtl')
   $sql="select * from schools where school_id in (SELECT infra.school_id from infra inner join (select school_id,annual,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee1 on infra.school_id=fee1.school_id where ".$str." and fee1.annual between ".$minv." and ".$maxv.") order by school_rating desc";
  else if($var=='flth')
  $sql="select distinct schools.* from schools,fee where schools.school_id in(SELECT infra.school_id from infra inner join (select school_id,annual,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee1 on infra.school_id=fee1.school_id where ".$str." and fee1.annual between ".$minv." and ".$maxv.") and schools.school_id=fee.school_id order by fee.annual"; 
  else if($var=='fhtl')
  $sql="select distinct schools.* from schools,fee where schools.school_id in(SELECT infra.school_id from infra inner join (select school_id,annual,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee1 on infra.school_id=fee1.school_id where ".$str." and fee1.annual between ".$minv." and ".$maxv.") and schools.school_id=fee.school_id order by fee.annual desc";
  }
  else if(isset($_POST["sortby"]))
  {
    $var=$_POST["sortby"];
    
  if($var=='ulth')
  $sql="select schools.* from schools inner join(select school_id,annual from fee group by school_id)fee1 on schools.school_id=fee1.school_id where fee1.annual between ".$minv." and ".$maxv." order by schools.school_rating";
  else if($var=='uhtl')
   $sql="select schools.* from schools inner join(select school_id,annual from fee group by school_id)fee1 on schools.school_id=fee1.school_id where fee1.annual between ".$minv." and ".$maxv." order by schools.school_rating desc";
  else if($var=='flth')
  $sql="select schools.* from schools inner join(select school_id,annual from fee group by school_id)fee1 on schools.school_id=fee1.school_id where fee1.annual between ".$minv." and ".$maxv." order by fee1.annual"; 
  else if($var=='fhtl')
  $sql="select schools.* from schools inner join(select school_id,annual from fee group by school_id)fee1 on schools.school_id=fee1.school_id where fee1.annual between ".$minv." and ".$maxv." order by fee1.annual desc";
  } 
  else if(isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"])  || isset($_POST["$arr[3]"]))
    $sql="select * from schools where school_id in (SELECT infra.school_id from infra inner join (select school_id,annual,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee1 on infra.school_id=fee1.school_id where ".$str." and fee1.annual between ".$minv." and ".$maxv.")";

}
else
    $sql="select schools.* from schools inner join(select school_id,annual from fee group by school_id)fee1 on schools.school_id=fee1.school_id where fee1.annual between ".$minv." and ".$maxv;
  }

?>
