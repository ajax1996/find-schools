<?php
$con=mysqli_connect("localhost","root","","data");
$c=$_POST["col"];
$v=$_POST["value"];
?>
<html>
  <head><style type="text/css" >
		tr{border:1px solid black;}
		td{border:1px solid black;}
		th{border:1px solid black;}
	</style>
</head>
  <body>

<?php
  if($c=="" || $v=="")
  	echo "fill all entries!!!";
  else
  {
  $sql="select * from schools where ".$c."='$v'";
  $c=mysqli_query($con,$sql);
  if($c)
  {
  echo "<table>";
  while($row=mysqli_fetch_assoc($c))
  {
  	echo "<tr>";
    	echo "<td>".$row['school_id']."</td><td>".$row['school_name']."</td><td>".$row['school_address']."</td><td>".$row['school_contact']."</td><td>".$row['school_website']."</td><td>".$row['school_rating']."</td><td>".$row['school_city']."</td><td>".$row['school_board']."</td><td>".$row['school_lat']."</td><td>".$row['school_long']."</td><td>".$row['school_img']."</td>";
    	echo "</tr>";
  }
  echo "</table>";
}
else
  echo "NOTHING FOUND";
}
?>
</body>
</html>