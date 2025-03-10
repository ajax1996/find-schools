<?php
$con=mysqli_connect("localhost","root","","data");
if(isset($_POST["table"]))
  $table=$_POST["table"];
$s="select * from ".$table;
$c=mysqli_query($con,$s);
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css" >
		tr{border:1px solid black;}
		td{border:1px solid black;}
		th{border:1px solid black;}
	</style>
</head>
<body>
	<?php
	if($table=='schools')
{		
	echo "<table style='border:1px solid black'> ";
	echo "<th>"."school_id"."</th><th>"."school_name"."</th><th>"."school_address"."</th><th>"."school_contact"."</th><th>"."school_website"."</th><th>"."school_rating"."</th><th>"."school_city"."</th><th>"."school_board"."</th><th>"."school_lat"."</th><th>"."school_long"."</th><th>"."school_img"."</th>";
    while($row=mysqli_fetch_assoc($c))
    {
    	echo "<tr>";
    	echo "<td>".$row['school_id']."</td><td>".$row['school_name']."</td><td>".$row['school_address']."</td><td>".$row['school_contact']."</td><td>".$row['school_website']."</td><td>".$row['school_rating']."</td><td>".$row['school_city']."</td><td>".$row['school_board']."</td><td>".$row['school_lat']."</td><td>".$row['school_long']."</td><td>".$row['school_img']."</td>";
    	echo "</tr>";
    }
    echo "</table>";
}
else if($table=='fee')
{
	echo "<table style='border:1px solid black'> ";
	echo "<th>"."school_id"."</th><th>"."class"."</th><th>"."transp"."</th><th>"."reg"."</th><th>"."adm"."</th><th>"."annual"."</th><th>"."moreinfo"."</th>";
    while($row=mysqli_fetch_assoc($c))
    {
    	echo "<tr>";
    	echo "<td>".$row['school_id']."</td><td>".$row['class']."</td><td>".$row['transp']."</td><td>".$row['reg']."</td><td>".$row['adm']."</td><td>".$row['annual']."</td><td>".$row['moreinfo']."</td>";
    	echo "</tr>";
    }
    echo "</table>";
}
else if($table=='infra')
{
	echo "<table style='border:1px solid black'> ";
	echo "<th>"."school_id"."</th><th>"."library"."</th><th>"."sports"."</th><th>"."labs"."</th><th>"."arts_culture"."</th><th>"."moreinfo"."</th>";
    while($row=mysqli_fetch_assoc($c))
    {
    	echo "<tr>";
    	echo "<td>".$row['school_id']."</td><td>".$row['library']."</td><td>".$row['sports']."</td><td>".$row['labs']."</td><td>".$row['arts_culture']."</td><td>".$row['moreinfo']."</td>";
    	echo "</tr>";
    }
    echo "</table>";
}
else if($table=='time')
{
	echo "<table style='border:1px solid black'> ";
	echo "<th>"."school_id"."</th><th>"."season"."</th><th>"."class"."</th><th>"."start"."</th><th>"."end"."</th>";
    while($row=mysqli_fetch_assoc($c))
    {
    	echo "<tr>";
    	echo "<td>".$row['school_id']."</td><td>".$row['season']."</td><td>".$row['class']."</td><td>".$row['start']."</td><td>".$row['end']."</td>";
    	echo "</tr>";
    }
    echo "</table>";
}

    ?>
</body>
</html>