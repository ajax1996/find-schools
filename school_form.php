<!DOCTYPE html>
<html>
<head>
	<title>School Registration Form</title>
	<style type="text/css">
		
		.side-nav {
			width: 80%;
			height: 100%;
			margin-bottom: 10%;
			position: absolute;
			margin-left: 10%;
			overflow: scroll;
			background: rgb(249,249,249);
			text-align: center;
		}
		.side-nav input{
			width: 99%;
			height: auto;
			padding: 10px;
			outline: none;
		}
		.side-nav table{
			width: 100%;
			height: auto;
			text-align: center;
			padding: 10px;
			border: 1px solid black;
		}

		.side-nav button{
			padding: 5px;
			outline: none;
			display: block;
			color: white;
			font-size: 14px;
			border-radius: 5px;
			background: #2d2d2d;
			left: 0px;
			cursor: pointer;

		}
		.details-table input{
			width: 50%;
			height: auto;
			padding: 10px;
			outline: none;
		}

	</style>
</head>
<body>
	<form method="post" action="school_form2.php">
		<div class="side-nav">
		  <h3>School Registration Form</h3>
		  <p>-------------------------------------------------</p>
		  <table cellspacing="10">
		  	<tr>
		  		<td>
		            <input type="text" name="school_name" placeholder="School Name" />
		  		</td>
		  		
		  	</tr>
		  	<tr>
		  		<td>
		            <input type="text" placeholder="Address"  name="school_address" />
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  <input type="number" name="school_contact" placeholder="Contact +91" />
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			<input type="text" name="school_website" placeholder="School's Website Url:eg.www.example.com"> 
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			<input type="text" name="school_city" placeholder="Enter City">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td colspan="2">
		  			<button onclick="getLocation()" type="button">Give Geo Location</button>

		  			<p id="demo" name="demo"></p>

					<script>
					var x = document.getElementById("demo");
					function getLocation() {
					    if (navigator.geolocation) {
					        navigator.geolocation.getCurrentPosition(showPosition);
					        

					    } else { 
					        x.innerHTML = "Geolocation is not supported by this browser.";
					    }
					}

					function showPosition(position) {
					    x.innerHTML =position.coords.latitude + 
					    "," + position.coords.longitude;
					}
					</script>
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			<p align="left">Upload School Image</p>
		  			<input type="file" name="school_image" id="school_image"  placeholder="Upload School Image" />
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			<input type="text" name="board" placeholder="Board Affiliated">
		  		</td>
		  	</tr>
		  </table>
		  <p>------------------------------------------InfraStructure Details---------------------------------------------</p>
		  <table cellspacing="10">
		  	<tr>
		  		<td>
		  			<input type="text" name="school_sports" placeholder="Sports separated by ,eg.Hockey,FootBall">
		  		</td>
		  		<td>
		  			<select name="libr">
		  				<option selected="selected">Library</option>
		  				<option>Available</option>
		  				<option>Not Available</option>
		  			</select>
		  		</td>
		  		
		  	</tr>
		  	<tr>
		  		<td>
		  			<input type="text" name="school_labs" placeholder="Labs separated by ,eg. Physics,Chemistry">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td colspan="2">
		  			<input type="text" name="school_art" placeholder="Art and Culture separated by ,eg.Music,Dance">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			<input type="text" name="school_moreinfo" placeholder="Link of InfraStructure for more details eg.www.example.com/infrastructure">
		  		</td>
		  	</tr>
		  </table>
		  	<p>------------------------------------------Fee Details---------------------------------------------</p>
		  <table class="details-table">
		  	<tr>
		  		<th>
		  			Class
		  		</th>
		  		<th>
		  			Transport Fee
		  		</th>
		  		<th>
		  			Registration Fee
		  		</th>
		  		<th>
		  			Admission Fee
		  		</th>
		  		<th>
		  			Annual Fee
		  		</th>
		  		<th>
		  			Fee Details Link
		  		</th>
		  	</tr>
		  	<tr>
		  		<td>
		  			Playway
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="transport_playway">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="registration_playway">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="admission_playway">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="annual_playway">
		  		</td>
		  		<td>
		  			<input type="text" name="feeinfo_playway" placeholder="Link eg.www.exaple.com/fee_details.php">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			Primary
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="transport_primary">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="registration_primary">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="admission_primary">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="annual_primary">
		  		</td>
		  		<td>
		  			<input type="text" name="feeinfo_primary" placeholder="Link eg.www.exaple.com/fee_details.php">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			Secondary
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="transport_secondary">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="registration_secondary">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="admission_secondary">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="annual_secondary">
		  		</td>
		  		<td>
		  			<input type="text" name="feeinfo_secondary" placeholder="Link eg.www.exaple.com/fee_details.php">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			Higher
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="transport_higher">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="registration_higher">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="admission_higher">
		  		</td>
		  		<td>
		  			<input type="number" min="0" name="annual_higher">
		  		</td>
		  		<td>
		  			<input type="text" name="feeinfo_higher" placeholder="Link eg.www.exaple.com/fee_details.php">
		  		</td>
		  	</tr>
		  </table>
		  <p>------------------------------------------Timing Details---------------------------------------------</p>
		  <table class="details-table" border="1">
		  	<th>
		  		Season
		  	</th>
		  	<th>
		  		Division
		  	</th>
		  	<th>
		  		Start Time
		  	</th>
		  	<th>
		  		End Time
		  	</th>
		  	<tr>
		  		<td rowspan="4">
		  			Summer
		  		</td>
		  		<td>
		  			Playway
		  		</td>
		  		<td>
		  			<input type="time" name="tplss" >
		  		</td>
		  		<td>
		  			<input type="time" name="tplse" >
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			Primary
		  		</td>
		  		<td>
		  			<input type="time" name="tprss">
		  		</td>
		  		<td>
		  			<input type="time" name="tprse">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			Secondary
		  		</td>
		  		<td>
		  			<input type="time" name="tsss">
		  		</td>
		  		<td>
		  			<input type="time" name="tsse">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			Higher
		  		</td>
		  		<td>
		  			<input type="time" name="thss">
		  		</td>
		  		<td>
		  			<input type="time" name="thse">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td rowspan="4">
		  			Winter
		  		</td>
		  		<td>
		  			Playway
		  		</td>
		  		<td>
		  			<input type="time" name="tplws">
		  		</td>
		  		<td>
		  			<input type="time" name="tplwe">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			Primary
		  		</td>
		  		<td>
		  			<input type="time" name="tprws">
		  		</td>
		  		<td>
		  			<input type="time" name="tprwe">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			Secondary
		  		</td>
		  		<td>
		  			<input type="time" name="tsws">
		  		</td>
		  		<td>
		  			<input type="time" name="tswe">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td>
		  			Higher
		  		</td>
		  		<td>
		  			<input type="time" name="thws">
		  		</td>
		  		<td>
		  			<input type="time" name="thwe">
		  		</td>
		  	</tr>
		  </table>
		  <button type="submit" style="padding: 5px;
			outline: none;
			color: white;
			font-size: 14px;
			width: 200px;
			margin:30px;
			border-radius: 5px;
			background: #8FBC8F;
			left: 40%;
			position: absolute;
			cursor: pointer;">Register</button>
	    </div>
	</form>
	
</body>
</html>

<?php
/*
$con=mysqli_connect("localhost","root","","data");
if(isset($_POST["school_name"]))
	$school_name=$_POST["school_name"];
if(isset($_POST["school_address"]))
	$school_address=$_POST["school_address"];
if(isset($_POST["school_contact"]))
	$school_contact=$_POST["school_contact"];
if(isset($_POST["school_website"]))
	$school_web=$_POST["school_website"];
if(isset($_POST["school_city"]))
	$school_city=$_POST["school_city"];


if(isset($_POST["demo"]))
	$location=$_POST["demo"];


if(isset($_POST["board"]))
	$board=$_POST["board"];
if(isset($_POST["school_sports"]))
	$sports=$_POST["school_sports"];
if(isset($_POST["school_labs"]))
	$labs=$_POST["school_labs"];
if(isset($_POST["school_art"]))
	$art=$_POST["school_art"];
if(isset($_POST["school_moreinfo"]))
	$info=$_POST["school_moreinfo"];
$trans=array();
$adm=array();
$reg=array();
$annual=array();
$feeinfo=array();
if(isset($_POST["transport_playway"]))
	$trans[0]=$_POST["transport_playway"];
if(isset($_POST["registration_playway"]))
	$reg[0]=$_POST["registration_playway"];
if(isset($_POST["admission_playway"]))
	$adm[0]=$_POST["admission_playway"];
if(isset($_POST["annual_playway"]))
	$annual[0]=$_POST["annual_playway"];
if(isset($_POST["feeinfo_playway"]))
	$feeinfo[0]=$_POST["feeinfo_playway"];

if(isset($_POST["transport_primary"]))
	$trans[1]=$_POST["transport_primary"];
if(isset($_POST["registration_primary"]))
	$reg[1]=$_POST["registration_primary"];
if(isset($_POST["admission_primary"]))
	$adm[1]=$_POST["admission_primary"];
if(isset($_POST["annual_primary"]))
	$annual[1]=$_POST["annual_primary"];
if(isset($_POST["feeinfo_primary"]))
	$feeinfo[1]=$_POST["feeinfo_primary"];

if(isset($_POST["transport_secondary"]))
	$trans[2]=$_POST["transport_secondary"];
if(isset($_POST["registration_secondary"]))
	$reg[2]=$_POST["registration_secondary"];
if(isset($_POST["admission_secondary"]))
	$adm[2]=$_POST["admission_secondary"];
if(isset($_POST["annual_secondary"]))
	$annual[2]=$_POST["annual_secondary"];
if(isset($_POST["feeinfo_secondary"]))
	$feeinfo[2]=$_POST["feeinfo_secondary"];

if(isset($_POST["transport_higher"]))
	$trans[3]=$_POST["transport_higher"];
if(isset($_POST["registration_higher"]))
	$reg[3]=$_POST["registration_higher"];
if(isset($_POST["admission_higher"]))
	$adm[3]=$_POST["admission_higher"];
if(isset($_POST["annual_higher"]))
	$annual[3]=$_POST["annual_higher"];
if(isset($_POST["feeinfo_higher"]))
	$feeinfo[3]=$_POST["feeinfo_higher"];
$t=array();
$t[0]=array();
$t[1]=array();
$t[2]=array();
$t[3]=array();
$t[4]=array();
$t[5]=array();
$t[6]=array();
$t[7]=array();
if(isset($_POST["tplss"]))
	$t[0][0]=$_POST["tplss"];
if(isset($_POST["tplse"]))
	$t[0][1]=$_POST["tplse"];
if(isset($_POST["tprss"]))
	$t[1][0]=$_POST["tprss"];
if(isset($_POST["tprse"]))
	$t[1][1]=$_POST["tprse"];
if(isset($_POST["tsss"]))
	$t[2][0]=$_POST["tsss"];
if(isset($_POST["tsse"]))
	$t[2][1]=$_POST["tsse"];
if(isset($_POST["thss"]))
	$t[3][0]=$_POST["thss"];
if(isset($_POST["thse"]))
	$t[3][1]=$_POST["thse"];


if(isset($_POST["tplws"]))
	$t[4][0]=$_POST["tplws"];
if(isset($_POST["tplwe"]))
	$t[4][1]=$_POST["tplwe"];
if(isset($_POST["tprws"]))
	$t[5][0]=$_POST["tprws"];
if(isset($_POST["tprwe"]))
	$t[5][1]=$_POST["tprwe"];
if(isset($_POST["tsws"]))
	$t[6][0]=$_POST["tsws"];
if(isset($_POST["tswe"]))
	$t[6][1]=$_POST["tswe"];
if(isset($_POST["thws"]))
	$t[7][0]=$_POST["thws"];
if(isset($_POST["thwe"]))
	$t[7][1]=$_POST["thwe"];


if(isset($_POST["libr"]) && $_POST["libr"]!="Library")
	$lib=$_POST["libr"];
$arr=array('playway','primary','secondary','higher');
$sql1="select school_id from schools";
$c1=mysqli_query($con,$sql1);
$int=rand(1000,99999);
$id=strtoupper(substr($school_city,0,2)).$int;
while($row=mysqli_fetch_assoc($c1))
{
  if($row["school_id"]==$id)
  {
  	$int=rand(1000,99999);
     $id=strtoupper(substr($school_city,0,2)).$int;
     mysqli_data_seek($c1,0);
  }
}
echo $id;
$sql="insert into schools values ('$id','$school_name','$school_address','$school_contact','$school_web',0,'$school_city','$board',0,0,'$id.jpeg'";
mysqli_query($con,$sql);
$sql="insert into infra values ('$id','$lib','$sports','$labs','$art','$info')";
mysqli_query($con,$sql);
for($i=0;$i<4;$i++)
{
	$a=$arr[$i];
	$t=$trans[$i];
	$r=$reg[$i];
	$ad=$adm[$i];
	$an=$annual[$i];
	$f=$feeinfo[$i];
$sql="insert into fee values ('$id','$a','$t','$r','$ad','$an','$f')";
mysqli_query($con,$sql);
}
$arra=array('summer','summer','summer','summer','winter','winter','winter','winter');
$cl=array('playway','primary','secondary','higher','playway','primary','secondary','higher');
for($i=0;$i<8;$i++)
{
		$A=$t[$i][0];
		$B=$t[$i][1];
		$C=$arra[$i];
		$D=$cl[$i];
     $sql="insert into time values ('$id','$C','$D','$A','$B')";
     mysqli_query($con,$sql);
}
*/
?>