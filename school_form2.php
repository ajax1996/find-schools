<?php
$school_name="";
$school_address="";
$school_contact="";
$school_web="";
$school_city="";
$location=0;
$board="";
$sports="";
$labs="";
$art="";
$info="";
$con=mysqli_connect("localhost","root","","data");
//if(isset($_POST["school_name"]))
	$school_name=$_POST["school_name"];
//if(isset($_POST["school_address"]))
	$school_address=$_POST["school_address"];
//if(isset($_POST["school_contact"]))
	$school_contact=$_POST["school_contact"];
//if(isset($_POST["school_website"]))
	$school_web=$_POST["school_website"];
//if(isset($_POST["school_city"]))
	$school_city=$_POST["school_city"];


//if(isset($_POST["demo"]))
	//$location=$_POST["demo"];


//if(isset($_POST["board"]))
	$board=$_POST["board"];
//if(isset($_POST["school_sports"]))
	$sports=$_POST["school_sports"];
//if(isset($_POST["school_labs"]))
	$labs=$_POST["school_labs"];
//if(isset($_POST["school_art"]))
	$art=$_POST["school_art"];
//if(isset($_POST["school_moreinfo"]))
	$info=$_POST["school_moreinfo"];
$trans=array();
$adm=array();
$reg=array();
$annual=array();
$feeinfo=array();
for($i=0;$i<4;$i++)
{
$trans[$i]="";
$reg[$i]="";
$adm[$i]="";
$annual[$i]="";
$feeinfo[$i]="";
}
//if(isset($_POST["transport_playway"]))
	$trans[0]=$_POST["transport_playway"];
//if(isset($_POST["registration_playway"]))
	$reg[0]=$_POST["registration_playway"];
//if(isset($_POST["admission_playway"]))
	$adm[0]=$_POST["admission_playway"];
//if(isset($_POST["annual_playway"]))
	$annual[0]=$_POST["annual_playway"];
//if(isset($_POST["feeinfo_playway"]))
	$feeinfo[0]=$_POST["feeinfo_playway"];

//if(isset($_POST["transport_primary"]))
	$trans[1]=$_POST["transport_primary"];
//if(isset($_POST["registration_primary"]))
	$reg[1]=$_POST["registration_primary"];
//if(isset($_POST["admission_primary"]))
	$adm[1]=$_POST["admission_primary"];
//if(isset($_POST["annual_primary"]))
	$annual[1]=$_POST["annual_primary"];
//if(isset($_POST["feeinfo_primary"]))
	$feeinfo[1]=$_POST["feeinfo_primary"];

//if(isset($_POST["transport_secondary"]))
	$trans[2]=$_POST["transport_secondary"];
//if(isset($_POST["registration_secondary"]))
	$reg[2]=$_POST["registration_secondary"];
//if(isset($_POST["admission_secondary"]))
	$adm[2]=$_POST["admission_secondary"];
//if(isset($_POST["annual_secondary"]))
	$annual[2]=$_POST["annual_secondary"];
//if(isset($_POST["feeinfo_secondary"]))
	$feeinfo[2]=$_POST["feeinfo_secondary"];

//if(isset($_POST["transport_higher"]))
	$trans[3]=$_POST["transport_higher"];
//if(isset($_POST["registration_higher"]))
	$reg[3]=$_POST["registration_higher"];
//if(isset($_POST["admission_higher"]))
	$adm[3]=$_POST["admission_higher"];
//if(isset($_POST["annual_higher"]))
	$annual[3]=$_POST["annual_higher"];
//if(isset($_POST["feeinfo_higher"]))
	$feeinfo[3]=$_POST["feeinfo_higher"];

    $tplss="";

	$tplse="";

	$tprss="";

	$tprse="";

	$tsss="";

	$tsse="";

	$thss="";

	$thse="";

	$tplws="";

	$tplwe="";

	$tprws="";

	$tprwe="";

	$tsws="";

	$tswe="";

	$thws="";

	$thwe="";





	$tplss=$_POST["tplss"];

	$tplse=$_POST["tplse"];

	$tprss=$_POST["tprss"];

	$tprse=$_POST["tprse"];

	$tsss=$_POST["tsss"];

	$tsse=$_POST["tsse"];

	$thss=$_POST["thss"];

	$thse=$_POST["thse"];



	$tplws=$_POST["tplws"];

	$tplwe=$_POST["tplwe"];

	$tprws=$_POST["tprws"];

	$tprwe=$_POST["tprwe"];

	$tsws=$_POST["tsws"];

	$tswe=$_POST["tswe"];

	$thws=$_POST["thws"];

	$thwe=$_POST["thwe"];

 $lib="";
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
echo "Successfully Registered!!!!!"."<br>"."ID : ".$id;
$sql="insert into schools values ('$id','$school_name','$school_address','$school_contact','$school_web',0,'$school_city','$board',0,0,'$id.jpeg')";
//echo "insert into schools values ('$id','$school_name','$school_address','$school_contact','$school_web',0,'$school_city','$board',0,0,'$id.jpeg')";
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
//echo "insert into fee values ('$id','$a','$t','$r','$ad','$an','$f')";
mysqli_query($con,$sql);
}

$sql="insert into time values ('$id','summer','playway','$tplss','$tplse')";
//echo "insert into time values ('$id','summer','playway','$tplss','$tplse')";
$c3=mysqli_query($con,$sql);
$sql="insert into time values ('$id','summer','primary','$tprss','$tprse')";
$c4=mysqli_query($con,$sql);
$sql="insert into time values ('$id','summer','secondary','$tsss','$tsse')";
$c5=mysqli_query($con,$sql);
$sql="insert into time values ('$id','summer','higher','$thss','$thse')";
mysqli_query($con,$sql);
$sql="insert into time values ('$id','winter','playway','$tplws','$tplwe')";
mysqli_query($con,$sql);
$sql="insert into time values ('$id','winter','primary','$tprws','$tprwe')";
mysqli_query($con,$sql);
$sql="insert into time values ('$id','winter','secondary','$tsws','$tswe')";
mysqli_query($con,$sql);
$sql="insert into time values ('$id','winter','higher','$thws','$thwe')";
mysqli_query($con,$sql);


?>