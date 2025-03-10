<?php
$con=mysqli_connect("localhost","root","","data");
if(isset($_POST["table"]))
  $table=$_POST["table"];
$s="select * from ".$table;
?>



<?php
  $old=$_POST["schools_old"];
  $new=$_POST["schools_new"];
  $col=$_POST["column"];
  if($old=="" || $new=="" || $col=="")
  	echo "fill all entries!!!";
  else
  {
  $sql="update ".$table." set ".$col."='$new' where ".$col."='$old'";
  $c=mysqli_query($con,$sql);
}
?>