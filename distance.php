<?php
	/**
	 * 
	 */
	class Distance
	{
		public $id;
		public $distance;
		function setId($id)
		{
			$this->id=$id;
		}
		function setDistance($distance)
		{
			$this->distance=$distance;
		}
		function getId()
		{
			return $this->id;
		}
		function getDistance()
		{
			return $this->distance;
		}
	}

?>
<?php
		function getdistance($lat1 ,$lat2,$lon1 ,$lon2)
		{
			$earthRadius=6371;
			$latfrom=deg2rad($lat1);
			$lonfrom=deg2rad($lon1);
			$latto=deg2rad($lat2);
			$lonto=deg2rad($lon2);

			$latdiff=$latto-$latfrom;
			$londiff=$lonto-$lonfrom;

			$angle=2 *asin(sqrt(pow(sin($latdiff/2),2) + cos($latfrom)*cos($latto)*pow(sin($londiff/2),2)));

			return $angle*$earthRadius;
		}
?>

<?php
		function cmp($a, $b)
		{
		    return ($a->getDistance()>$b->getDistance());
		}

		

?>
<?php
	$con=mysqli_connect("localhost","root","","data");
	$query="select school_id,school_lat,school_long from schools where school_city='ghaziabad'";
	$exec=mysqli_query($con,$query);
	$arr=array();
	$lat1=28.6297291;
	$long1=77.3698669;
	while ($row=mysqli_fetch_assoc($exec)) {
		//$row['school_lat']." ".$row['school_long']."<br>";
		$distance=new Distance;
		$distance->setId($row['school_id']);
		$distance->setDistance(getdistance($lat1,$row['school_lat'],$long1,$row['school_long']));
		array_push($arr, $distance);
	}
	usort($arr, "cmp");
	$p=0;
	foreach ($arr as $value) {
		$id=$value->getId();
		$distance=$value->getDistance();
        $query="select * from schools where school_id='$id'";
		$exec=mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($exec);
		//echo $row['school_name']." ".$row["school_id"]." ".$distance."<br>";
		$idd=$row["school_id"];
		$ddd=$distance;
		$s2="insert into distsort values('$idd','$ddd')";
		//echo "insert into distsort values('$idd','$ddd')";
		mysqli_query($con,$s2);
		//$ids=array();
		/*$d=$row['school_id'];
		if($p==0)
		$ids[$p]=" and schools.school_id in('$d' ";
	    else
        $ids[$p]=$ids[$p-1]." ,'$d' ";
        $p=$p+1;*/
	}

	/*$ids[$p]=$ids[$p-1].")";
	$p=$p+1;*/

?>