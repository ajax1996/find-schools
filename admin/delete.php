<?php
$con=mysqli_connect("localhost","root","","data");
if(isset($_POST["table"]))
  $table=$_POST["table"];
$s="select * from ".$table;
?>



<?php
  $old=$_POST["schools_old"];
  $col=$_POST["column"];
  if($old=="" || $col=="")
  	echo "fill all entries!!!";
  else
  {
  
  if($table!='schools')
  {
  $sql="delete from ".$table." where ".$col."='$old'";
  $c=mysqli_query($con,$sql);
}
else
{
   $sql="delete from fee where ".$col."='$old'";
  $c=mysqli_query($con,$sql);
  $sql="delete from infra where ".$col."='$old'";
  $c=mysqli_query($con,$sql);
  $sql="delete from time where ".$col."='$old'";
  $c=mysqli_query($con,$sql);
  $sql="delete from schools where ".$col."='$old'";
  $c=mysqli_query($con,$sql);
}

}
?>