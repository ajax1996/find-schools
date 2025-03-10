<!DOCTYPE html>
<?php 
$con=mysqli_connect("localhost","root","","data");
?>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<link href='https://api.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css' rel='stylesheet' />
	<script src='https://api.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js'></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="index_css.css">
	<title>My Project</title>
</head>	
<body>
	<div class="div1">
		<img src="logo.jpg"/>
		<input type="text" name="search" placeholder="Search Keywords..." autocomplete="off"><button type="button" class="search-button"><span class="glyphicon glyphicon-search"></span></button>
		<form action="#" method="POST" target=""> 
		<font style="font-size: 22px;font-family:arial; cursor: default;">Sort By</font>
		<!-- In Sort By button is used in every tabs with same name,as on submitting only one type of sort can be performed -->
		<button type="button" class="accordion"><span class="glyphicon glyphicon-star"></span>  User Rating</button>
		<div class="accordion-content">
			<input type="radio" name="sortby" style="margin-bottom: 10px;" value="ulth">  Low To High<br>
			<input type="radio" name="sortby" style="margin-bottom: 10px;" value="uhtl">  High To Low
		</div>

		<button type="button" class="accordion"><i class="fa fa-inr"></i>  Fee Structure</button>
		<div class="accordion-content">
			<input type="radio" name="sortby" style="margin-bottom: 10px;" value="flth">  Low To High<br>
			<input type="radio" name="sortby" style="margin-bottom: 10px;" value="fhtl">  High To Low
		</div>

		<button type="button" class="accordion"><i class="fa fa-map"></i>  Distance</button>
		<div class="accordion-content">
			<input type="radio" name="sortby" style="margin-bottom: 10px;" value="dctf">  Close to Far<br>
			<input type="radio" name="sortby" style="margin-bottom: 10px;" value="dftc">  Far to Close
		</div>
		<font style="font-size: 22px;font-family:arial; cursor: default;">Filter By</font>  
         <?php
$sql="select * from infra";
$c=mysqli_query($con,$sql);
$i=2;
$arr=array('','','sports','labs','arts_culture');
while($i<=4)
{
$str=array(); 
$str[$i]=array();
while($row=mysqli_fetch_array($c))
{
  $str[$i]=array_merge($str[$i],array_map("trim",explode(",",$row["$i"])));
}

$str[$i]=array_unique($str[$i]);

?>      
<?php
$j=1;
echo "<button class='accordion' type='button'>$arr[$i]</button><div class='accordion-content'><ul>";
foreach ($str[$i] as $value)
{
 if($value!='')
{
  $value=ucwords($value);
  echo "<li><input type='checkbox' name='$arr[$i][]' value='$value'>  $value</li>";
    $j++;
}
}
echo "</ul></div>";
$i++;
mysqli_data_seek($c,0);
}
?>        
         
         <input type="submit">
      </form>
	</div>

   <!--Division2 right top-->
	<div class="div2">
		<a href=""><i class="fa fa-home"></i>  Home</a>
		<button onclick="document.getElementById('sign-up').style.display='block'"></i>  Login</button>
		<button>Sign Up</button>
		<!-- Form To select City  -->
		<form action="#" method="POST">
		<select id="city" onchange="this.form.submit()" name="city">
		     <option value="Delhi" <?php

		     	if(isset($_POST['city'])&&$_POST['city']=="Delhi")
		     	{
		     		echo "selected='selected'";
		     	}
		     	else if(!isset($_POST['city']))
		     	{
		     		echo "selected='selected'";
		     		$_POST['city']="Delhi";
		     	}
		     ?>>Delhi</option>
		     <option value="Ghaziabad" <?php

		     	if(isset($_POST['city'])&&$_POST['city']=="Ghaziabad")
		     	{
		     		echo "selected='selected'";
		     	}
		     ?>>Ghaziabad</option>
		     <option value="Gurgaon" <?php

		     	if(isset($_POST['city'])&&$_POST['city']=="Gurgaon")
		     	{
		     		echo "selected='selected'";
		     	}
		     ?>>Gurgaon</option>
		     <option value="Noida" <?php

		     	if(isset($_POST['city'])&&$_POST['city']=="Noida")
		     	{
		     		echo "selected='selected'";
		     	}
		     ?>>Noida</option>     
		</select>
		</form>
	</div>

   <!--Division3 right bottom-->
	<div class="div3">
		<!-- Php Code to retrieve city selected from select menu -->

		<div id="sign-up" class="sign-up">
  
			  <form class="modal-content animate" action="/action_page.php">
			        
			    <div class="imgcontainer">
			      <span onclick="document.getElementById('sign-up').style.display='none'" class="close" title="Close PopUp">&times;</span>
			      <img src="1.png" alt="Avatar" class="avatar">
			      <h1 style="text-align:center">Modal Popup Box</h1>
			    </div>

			    <div class="container">
			      <input type="text" placeholder="Enter Username" name="uname">
			      <input type="password" placeholder="Enter Password" name="psw">        
			      <button type="submit">Login</button>
			      <input type="checkbox" style="margin:26px 30px;"> Remember me      
			      <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
			    </div>
			    
			  </form>
			  
			</div>
		<?php
$str='';
$array=array();

$i=0;
if(isset($_POST["$arr[2]"]) || isset($_POST["$arr[3]"]) || isset($_POST["$arr[4]"]))
{
	$array[0]=$_POST["$arr[2]"];
	$array[1]=$_POST["$arr[3]"];
	$array[2]=$_POST["$arr[4]"];
for($k=0;$k<3;$k++)
{	
foreach ($array[$k] as $v)
{
	if($i==0)
	{
	  $str=$str.$arr[2]." LIKE '%$v%'";
	  $i=1;
	}
    else
    	$str=$str." and ".$arr[2+$k]." LIKE '%$v%'";
}
}

?>

      <?php
           
          $sql="select * from schools where school_id in (select school_id from infra where ".$str.")";
          $c=mysqli_query($con,$sql);
          $i=0;
          while($row=mysqli_fetch_assoc($c))
          {    
            ?>
                <div class="school-div">
		<div class="image-div">
			<img src="images/<?php echo $row["school_img"];?>">
		</div>
		<div class="details-div">
			<div class="title"><i class="fa fa-institution"></i> <?php echo ucwords($row["school_name"])?></div><br>
			<div class="stars">
				<div class="star-ratings-sprite"><span style="width:<?php echo ($row["school_rating"]*2*10).'%'?>;" class="star-ratings-sprite-rating"></span></div>
             <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
			</div><br>
			<p><i class="fa fa-map-signs"></i>  <?php  echo ucwords($row["school_address"]);?></p>
			<p><i class="fa fa-phone-square"></i>  <?php echo $row["school_contact"];?></p>
			<p><?php echo strtoupper($row["school_city"]);?></p>
			<button id="school-website"><a href="<?php echo $row["school_website"];?>" style="text-decoration: none; color: white;"><i class="fa fa-globe" style="color: white;"></i>  Visit School Website</a></button>
		</div>
		<div class="button-div">
			<button id="school-more" type="button"><i class="fa fa-info-circle" style="color: red;"><a href="details.php?var=<?php echo $row['school_id'];?>" style="text-decoration: none;color: black;" target="_blank"></i>  More Info</a></button>
			<button class="school-location" type="button" data-lat="<?php echo $row['school_lat'];?>" data-lng="<?php echo $row['school_long']?>"><i class="fa fa-map-marker"></i>  Find Us</button>
		</div>
	</div>
                    <?php
            
          }
      }else if(isset($_POST['city']))
      {
      	$selected_city=$_POST['city'];
      	$con=mysqli_connect("localhost","root","","data");
      	$query="select * from schools where school_city='$selected_city'";
      	$c=mysqli_query($con,$query);
      	while($row=mysqli_fetch_assoc($c))
      	{
      		?>
                <div class="school-div">
		<div class="image-div">
			<img src="images/<?php echo $row["school_img"];?>">
		</div>
		<div class="details-div">
			<div class="title"><i class="fa fa-institution"></i> <?php echo ucwords($row["school_name"])?></div><br>
			<div class="stars">
				<div class="star-ratings-sprite"><span style="width:<?php echo ($row["school_rating"]*2*10).'%'?>;" class="star-ratings-sprite-rating"></span></div>
             <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
			</div><br>
			<p><i class="fa fa-map-signs"></i>  <?php  echo ucwords($row["school_address"]);?></p>
			<p><i class="fa fa-phone-square"></i>  <?php echo $row["school_contact"];?></p>
			<p><?php echo strtoupper($row["school_city"]);?></p>
			<button id="school-website"><a href="<?php echo $row["school_website"];?>" style="text-decoration: none; color: white;"><i class="fa fa-globe" style="color: white;"></i>  Visit School Website</a></button>
		</div>
		<div class="button-div">
			<button id="school-more" type="button"><i class="fa fa-info-circle" style="color: red;"><a href="details.php?var=<?php echo $row['school_id'];?>" style="text-decoration: none;color: black;" target="_blank"></i>  More Info</a></button>
			<button class="school-location" type="button" data-lat="<?php echo $row['school_lat'];?>" data-lng="<?php echo $row['school_long']?>"><i class="fa fa-map-marker"></i>  Find Us</button>
		</div>
	</div>
                    <?php
      	}
      }



      ?>
	</div>
	<div id="modal-wrapper" class="modal">
	<span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
  	<button type="button" id="open-map" onclick="open_map()">Open Map</button>
	<div id='map'></div>
    <script>
    	document.querySelector('#open-map').addEventListener('click', () => {
        	document.querySelector('#map').classList.toggle('show');
      	});

      	const buttons = document.querySelectorAll('.school-location');
      	buttons.forEach(item => {
      		item.addEventListener('click', function () {
				document.getElementById('modal-wrapper').style.display='block';
    			let lat = parseFloat(this.dataset.lat);
    			let lng = parseFloat(this.dataset.lng);
    			open_map(lat, lng);		
      		});
      	});

    	function open_map(lat, lng){
    		mapboxgl.accessToken = 'pk.eyJ1Ijoia2FuaXNoazAwNyIsImEiOiJjam13eWZqbWwxaTdnM3FvODBucWx2dmtkIn0.buXcy0Inwx5ayKgRDHZcPg';
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v10',
center: [lng, lat],
zoom: 12
  });
var markerHeight = 50, markerRadius = 10, linearOffset = 25;
var popupOffsets = {
 'top': [0, 0],
 'top-left': [0,0],
 'top-right': [0,0],
 'bottom': [0, -markerHeight],
 'bottom-left': [linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
 'bottom-right': [-linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
 'left': [markerRadius, (markerHeight - markerRadius) * -1],
 'right': [-markerRadius, (markerHeight - markerRadius) * -1]
 };
var popup = new mapboxgl.Popup({offset: popupOffsets, className: 'my-class'})
  .setLngLat([lng, lat])
  .setHTML("<h1>Hello World!</h1>")
  .addTo(map);

  var marker = new mapboxgl.Marker().setLngLat([lng, lat]).addTo(map);
    	}
  

</script>
  
	</div>

<script>
	var accordions = document.getElementsByClassName("accordion");

for (var i = 0; i < accordions.length; i++) {
  accordions[i].onclick = function() {
    this.classList.toggle('is-open');

    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      // accordion is currently open, so close it
      content.style.maxHeight = null;
    } else {
      // accordion is currently closed, so open it
      content.style.maxHeight = content.scrollHeight + "px";
    }
  }
}

</script>
<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<script>
// If user clicks anywhere outside of the modal, Modal will close
var modal = document.getElementById('sign-up');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>