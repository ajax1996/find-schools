<?php
$search="";
if(isset($_POST["search"]))
{
    $search=$_POST["search"];
    $city=$_SESSION["city"];
    if(!isset($_SESSION["city"]) && $_SESSION["city"]=='Select-City')
  {
    
  $sql="select * from schools where school_id like '%$search%' or school_name like '%$search%' or school_address like '%$search%' or school_contact like '%$search%' or school_website like '%$search%' or school_rating like '%$search%' or school_city like '%$search%' or school_board like '%$search%' or school_lat like '%$search%' or school_long like '%$search%'";
  }
  else
  {
  $sql="select * from schools where (school_id like '%$search%' or school_name like '%$search%' or school_address like '%$search%' or school_contact like '%$search%' or school_website like '%$search%' or school_rating like '%$search%' or school_city like '%$search%' or school_board like '%$search%' or school_lat like '%$search%' or school_long like '%$search%') and school_city='$city'";
  }
}
else
{




if(isset($_POST["classtype"]) && $_POST["classtype"]!="Select-Class")
{
$classtype1=$_POST["classtype"];
$classtype=" where class='$classtype1' ";
}
else
{
  $classtype=" group by fee.school_id ";
}

if(isset($_SESSION["city"]) && $_SESSION["city"]!='Select-City')
{
  $city=$_SESSION["city"];
if(isset($_POST["sortby"]) || isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"]) || isset($_POST["$arr[3]"]))
{
  if((isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"])  || isset($_POST["$arr[3]"])) && isset($_POST["sortby"]))
  {
  $var=$_POST["sortby"];
  if($var=='ulth')
  $sql="select schools.* from schools inner join (SELECT infra.school_id from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on schools.school_id=tab.school_id where schools.school_city='$city'".$str3." order by schools.school_rating";
  else if($var=='uhtl')
   $sql="select schools.* from schools inner join (SELECT infra.school_id from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on schools.school_id=tab.school_id where schools.school_city='$city'".$str3." order by schools.school_rating desc";
  else if($var=='flth')
  $sql="select distinct schools.* from schools inner join(SELECT infra.school_id,fee1.annual from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on schools.school_id=tab.school_id where schools.school_city='$city'".$str3." order by tab.annual"; 
  else if($var=='fhtl')
  $sql="select distinct schools.* from schools inner join(SELECT infra.school_id,fee1.annual from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on schools.school_id=tab.school_id where schools.school_city='$city'".$str3." order by tab.annual desc";
  else if($var=='dctf')
  {
    include 'distance.php';
    $sql="select schools.* from schools inner join(select distinct distsort.* from distsort inner join(SELECT infra.school_id,fee1.annual from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on distsort.school_id=tab.school_id )tab2 on schools.school_id=tab2.school_id where schools.school_city='$city'".$str3."order by tab2.dist";
    /*$ss2="delete from distsort";
    mysqli_query($con,$ss2);*/
  }
  }
  else if(isset($_POST["sortby"]))
  {
    $var=$_POST["sortby"];
    
  if($var=='ulth')
  $sql="select schools.* from schools inner join(select school_id,annual from fee".$classtype.")fee1 on schools.school_id=fee1.school_id where schools.school_city='$city'".$str1.$str3." order by schools.school_rating";
  else if($var=='uhtl')
   $sql="select schools.* from schools inner join(select school_id,annual from fee".$classtype.")fee1 on schools.school_id=fee1.school_id where schools.school_city='$city'".$str1.$str3." order by schools.school_rating desc";
  else if($var=='flth')
  $sql="select schools.* from schools inner join(select school_id,annual from fee".$classtype.")fee1 on schools.school_id=fee1.school_id where schools.school_city='$city'".$str1.$str3." order by fee1.annual"; 
  else if($var=='fhtl')
  $sql="select schools.* from schools inner join(select school_id,annual from fee".$classtype.")fee1 on schools.school_id=fee1.school_id where schools.school_city='$city'".$str1.$str3." order by fee1.annual desc";
  else if($var=='dctf')
  {
    include 'distance.php';
    $sql="select schools.* from schools inner join(select distsort.* from distsort inner join(select school_id,annual from fee".$classtype.")fee1 on distsort.school_id=fee1.school_id )tab2 on schools.school_id=tab2.school_id where schools.school_city='$city'".$str1.$str3." order by tab2.dist";
    /*$ss2="delete from distsort";
    mysqli_query($con,$ss2);*/
  }
  } 
  else if(isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"]) || isset($_POST["$arr[3]"]))
    $sql="select schools.* from schools inner join (SELECT infra.school_id,fee1.annual from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on schools.school_id=tab.school_id where schools.school_city='$city'".$str3;

}
else
  $sql="select schools.* from schools inner join(select school_id,annual from fee".$classtype.")fee1 on schools.school_id=fee1.school_id where school_city='$city'".$str1.$str3;
}
else
  {
    if(isset($_POST["sortby"]) || isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"]) || isset($_POST["$arr[3]"]))
{
  if((isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"]) || isset($_POST["$arr[3]"])) && isset($_POST["sortby"]))
  {
  $var=$_POST["sortby"];
  if($var=='ulth')
  $sql="select schools.* from schools inner join (SELECT infra.school_id from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on schools.school_id=tab.school_id ".$str5." order by school_rating";
  else if($var=='uhtl')
   $sql="select schools.* from schools inner join (SELECT infra.school_id from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on schools.school_id=tab.school_id ".$str5." order by school_rating desc";
  else if($var=='flth')
  $sql="select distinct schools.* from schools inner join(SELECT infra.school_id,fee1.annual from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on schools.school_id=tab.school_id ".$str5." order by tab.annual"; 
  else if($var=='fhtl')
  $sql="select distinct schools.* from schools inner join(SELECT infra.school_id,fee1.annual from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on schools.school_id=tab.school_id ".$str5." order by tab.annual desc";
  else if($var=='dctf')
  {
    include 'distance.php';
    $sql="select schools.* from schools inner join(select distinct distsort.* from distsort inner join(SELECT infra.school_id,fee1.annual from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on distsort.school_id=tab.school_id)tab2 on schools.school_id=tab2.school_id".$str5."order by tab2.dist ";
    /*$ss2="delete from distsort";
    mysqli_query($con,$ss2);*/
  }
  
  }
  else if(isset($_POST["sortby"]))
  {
    $var=$_POST["sortby"];
    
  if($var=='ulth')
  $sql="select schools.* from schools inner join(select school_id,annual from fee".$classtype.")fee1 on schools.school_id=fee1.school_id ".$str2.$str4." order by schools.school_rating";
  else if($var=='uhtl')
   $sql="select schools.* from schools inner join(select school_id,annual from fee".$classtype.")fee1 on schools.school_id=fee1.school_id ".$str2.$str4." order by schools.school_rating desc";
  else if($var=='flth')
  $sql="select schools.* from schools inner join(select school_id,annual from fee".$classtype.")fee1 on schools.school_id=fee1.school_id ".$str2.$str4." order by fee1.annual"; 
  else if($var=='fhtl')
  $sql="select schools.* from schools inner join(select school_id,annual from fee".$classtype.")fee1 on schools.school_id=fee1.school_id ".$str2.$str4." order by fee1.annual desc";
   else if($var=='dctf')
  {
    include 'distance.php';
    $sql="select schools.* from schools inner join(select distsort.* from distsort inner join(select school_id,annual from fee".$classtype.")fee1 on distsort.school_id=fee1.school_id ".$str2.")tab2 on schools.school_id=tab2.school_id ".$str4." order by tab2.dist";
    /*$ss2="delete from distsort";
    mysqli_query($con,$ss2);*/
  }
  } 
  else if(isset($_POST["$arr[0]"]) || isset($_POST["$arr[1]"]) || isset($_POST["$arr[2]"])  || isset($_POST["$arr[3]"]))
    $sql="select schools.* from schools inner join (SELECT infra.school_id from infra inner join (select fee.*,fee2.class1 from fee inner join(select school_id,GROUP_CONCAT(class SEPARATOR '') as class1 from fee group by school_id)fee2 on fee.school_id=fee2.school_id".$classtype.")fee1 on infra.school_id=fee1.school_id where ".$str.$str1." )tab on schools.school_id=tab.school_id ".$str5;

}
else
    $sql="select schools.* from schools inner join(select school_id,annual from fee".$classtype.")fee1 on schools.school_id=fee1.school_id ".$str2.$str4;
  }

}

/*
if(isset($_POST["sortd"]))
{
  $lat1=28.630394199999998;
  $long1=77.3712281;
  $sql9="select school_id,school_lat,school_long from schools";
  $c9=mysqli_query($con,$sql9);
  $school_id9=array();
  $lat2=array();
  $long2=array();
  $dis=array();
  $final=array();
  $l=0;
  while($row9=mysqli_fetch_assoc($c9))
  {
     $schhol_id9[$l]=$row9["school_id"];
     $lat2[$l]=$row9["school_lat"];
     $long2[$l]=$row9["school_long"];
     $l=$l+1;
  }
  for($u=0;$u<$l;$u++)
  {
    $dis[$u]=getdistance($lat1,$lat2[$u],$long1,$long2[$u]);
  }
  for($u=0;$u<$l;$u++)
  {
    $sid=$school_id9[$u];
    $final[$sid]=$dis[$u];
  }
  asort($final);
  foreach($final as $key=>$val)
  {
     echo "$key=$val";
  }
  if(isset($_POST["city"]))
  {
    //$sql10="select schools.* from schools"
  }
}*/
?>
