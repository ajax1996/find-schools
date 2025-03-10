<!DOCTYPE html>
<?php 
$con=mysqli_connect("localhost","root","","data");
session_start();
if(isset($_POST["city"]))
$_SESSION["city"]=$_POST["city"];
?>
<?php
    if(isset($_POST['lemail'])&&isset($_POST['lpassword']))
        {
          $lemail=$_POST['lemail'];
          $lpassword=$_POST['lpassword'];
          $query="select * from users";
          $sql=mysqli_query($con,$query);
          $flag=false;
          $user_name="";
          while ($row=mysqli_fetch_assoc($sql)) {
            $name=$row['user_email'];
            $password=$row['user_password'];
            if($name==$lemail&&$password==$lpassword)
            {
              $flag=true;
              $user_name=$row['user_name'];
              $user_id=$row['user_id'];
              break;
            }
          }
          if($flag)
          {
            if(!empty($_POST['remember_me']))
            {
                setcookie("user_email",$_POST['lemail'],time()+10*24*365*60*60);
                  setcookie("user_password",$_POST['lpassword'],time()+10*24*365*60*60);
            }
            else{
              setcookie("user_email","",time()+10*24*365*60*60);
              setcookie("user_password","",time()+10*24*365*60*60);
            }
            $_SESSION['user']=$user_name;
            $_SESSION['user_id']=$user_id;
            echo "<script type='text/javascript'>alert('Logged In Successfully!')</script>";
            header("Refresh:1; url=index.php");
          }
          else
          {
            echo "<script type='text/javascript'>alert('Username or Password is Incorrect!')</script>";
          }
        }

  ?>
  <?php
      if(isset($_POST['logout']))
      {
        unset($_SESSION['user']);
        unset($_SESSION['user_id']);
      echo "<script type='text/javascript'>alert('Logged Out Successfully!')</script>";
      //header("Refresh:1,url=index.php");
    }
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
    <link rel="stylesheet" type="text/css" href="index.css">
  <title>My Project</title>
</script>
</head> 
<body>
  <div class="div1">
    <img src="logo.png"/>
      <input type="text" name="search" placeholder="Search Keywords..." autocomplete="off"><button type="button" class="search-button"><span class="glyphicon glyphicon-search"></span></button><br>
    <form  action="#" method="POST" target=""> 
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
$sql="select infra.sports,infra.labs,infra.arts_culture,fee.class from infra,fee";
$c=mysqli_query($con,$sql);
$i=0;
$arr2=array('infra','infra','infra','fee1');
$arr=array('sports','labs','arts_culture','class1');
$arr_name=array('Sports','Labs','Art & Culture','Class');
$arr_icon=array('glyphicon glyphicon-knight','glyphicon glyphicon-scale','glyphicon glyphicon-music','glyphicon glyphicon-education');
while($i<=3)
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
echo "<button class='accordion' type='button'><i class='$arr_icon[$i]'></i>  $arr_name[$i]</button><div class='accordion-content'><ul>";
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
    <button type="button" class="accordion"><i class="fa fa-inr"></i>  Fee-Range</button>
    <div class="accordion-content">
      <!-- <label for="myRange1">Lower Bound</label><p>Rs: <span id="lower_bound"></span></p>
      <input type="range" min="1" max="100" value="50" class="slider" id="myRange1">
      <label for="myRange2">Upper Bound</label><p>Rs: <span id="upper_bound"></span></p>
      <input type="range" min="1" max="100" value="50" class="slider" id="myRange2"><br> -->
      <section class="range-slider">
        <span class="rangeValues"></span>
        <input value="500" min="500" max="500000" step="500" type="range" name="minv">
        <input value="500000" min="500" max="500000" step="500" type="range" name="maxv">
      </section>
    </div>
         <input type="submit"  value="Apply Filter">
      </form>
  </div>
   <!--Division2 right top-->
  <div class="div2">
    <a href=""><i class="fa fa-home"></i>  Home</a>
    <?php
      if(isset($_SESSION['user']))
      {
        ?>
        <button style="background-color: transparent;border: none;">Hi <?php echo $_SESSION['user'];?></button>
        <form method="POST" action="#">
          <button type="submit" name="logout">Logout</button>
        </form>
        <?php
      }
      else{
      ?><button onclick="document.getElementById('login').style.display='block'"><i class="fa fa-sign-in"></i>  Login</button>
      <button onclick="document.getElementById('sign-up').style.display='block'">Sign Up</button>
      <?php
     }
    ?>
    
    <!-- Form To select City  -->
    <form action="#" method="POST">
    <select id="city" onchange ="this.form.submit()"  name="city"><option>Select-City</option><?php
         $q="select distinct school_city from schools";
         $c1=mysqli_query($con,$q);
         while($row=mysqli_fetch_assoc($c1))
         {
          $s=$row["school_city"];
        echo "<option value='$s' ";?> <?php if(isset($_SESSION['city'])&&$_SESSION['city']==$s)
          {
            echo "selected='selected'";
          } ?>
  <?php echo ">".$row["school_city"]."</option>"; 
      }
         ?>   
    </select>
    </form>
  </div>


   <!--Division3 right bottom-->
  <div class="div3">
    <!-- Php Code to retrieve city selected from select menu -->
    <div id="login" class="login">
        <form class="modal-content animate" action="#" method="POST">
          <div class="imgcontainer">
            <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close PopUp">&times;</span>
            <img src="avatar.png" alt="Avatar" class="avatar">
          </div>
          <div class="container">
            <input type="email" placeholder="Enter Email" name="lemail" required="required" autocomplete="off" value="<?php if(isset($_COOKIE['user_email'])&&$_COOKIE['user_email']!=''){
              echo ($_COOKIE['user_email']);
            }else{
              echo ('');
            }?>">
            <input type="password" placeholder="Enter Password" name="lpassword" required="required"
            value="<?php if(isset($_COOKIE['user_password'])&&$_COOKIE['user_password']!=''){
              echo ($_COOKIE['user_password']);
            }else{
              echo ('');
            }?>"
            >        
            <button type="submit">Login</button>
            <input type="checkbox" style="margin:26px 30px;" name="remember_me" <?php if(isset($_COOKIE['user_email'])){
              echo ('checked');
            }?> > Remember me      
            <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
          </div>
          
        </form>
        
      </div>

      <div id="sign-up" class="sign-up">
        <form class="modal-content animate" action="#" method="POST">
          <div class="imgcontainer">
            <span onclick="document.getElementById('sign-up').style.display='none'" class="close" title="Close PopUp">&times;</span>
            <!-- <img src="avatar.png" alt="Avatar" class="avatar"> -->
            <h1>Sign Up Here</h1>
          </div>
          <div class="container">
            <input type="text" placeholder="Enter Username" name="sname" required="required" autocomplete="off">
            <input type="email" placeholder="Enter Email" name="semail" required="required" autocomplete="off">
            <input type="password" placeholder="Enter Password" name="spassword" required="required">        
            <button type="submit">Sign Up</button>
          </div>
          
        </form>
        
      </div>

      <?php

        if(isset($_POST['sname'])&&isset($_POST['semail'])&&isset($_POST['spassword']))
        {
          $sname=$_POST['sname'];
          $semail=$_POST['semail'];
          $spassword=$_POST['spassword'];
          $query="insert into users values('','$sname','$semail','$spassword')";
          $sql=mysqli_query($con,$query);
          if($sql)
          {
            echo "<script type='text/javascript'>alert('Signed Up Successfully!')</script>";
          }else{
            echo "<script type='text/javascript'>alert('Sign Up Falied!')</script>";
          }
          
        }
      ?>

    <?php include "filter.php";?>
<?php include "sort.php";?>
  
      <?php

           echo $sql;
           
         // $sql="select * from schools where school_city='$city' order by school_rating";
          $c=mysqli_query($con,$sql);
          $i=0;
          ?>
          <div class="grid-container"><?php
          while($row=mysqli_fetch_assoc($c))
          {    
            $v=$row["school_id"];
            $sq="select class,transp,reg,adm,annual from fee where school_id='$v'";
            $m=mysqli_query($con,$sq);
            $sss='';
            while($row3=mysqli_fetch_assoc($m))
            {
              $sum=$row3["annual"];
              $sss=$sss."<i class='fa fa-map-signs'></i> ".ucwords($row3["class"]).":".$sum."<br>";
            }
            ?>

              
                <div class="card">
                  <img src="images/<?php echo $row['school_img']?>" alt="John" style="width:100%">
            <div class="content" >
          <h3><?php echo ucwords($row['school_name'])?></h3>
          <div class="stars">
          <div class="star-ratings-sprite"><span style="width:<?php echo ($row["school_rating"]*2*10).'%'?>;" class="star-ratings-sprite-rating"></span></div>
               <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        </div><br>
          <p><?php echo $sss;?></p>
          <p><?php echo strtoupper($row['school_city'])?></p>
          <div class="link">
            <a title="Visit Our Website" href="<?php echo $row['school_website']?>"><i class="fa fa-dribbble"></i></a> 
            <a title="More Info" href="details.php?var=<?php echo $row['school_id'];?>"><i class="fa fa-info-circle"></i></a>  
            <a title="Locate Us On Map"><button style="background-color: transparent;border: none;outline: 0" class="school-location" type="button" data-lat="<?php echo $row['school_lat'];?>" data-lng="<?php echo $row['school_long']?>" data-nm="<?php echo $row['school_name']?>"><i class="fa fa-map-marker"></i></button></a>
         </div>
            </div>
         <!-- <button><a href="index.php" style="text-decoration: none;
          font-size: 22px;
          color: white;">Contact</a></button> -->
        </div>


                    <?php
        }
      


      ?>
      </div>
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
          let name=this.dataset.nm;
          name=name.toUpperCase();
          open_map(lat, lng, name);   
          });
        });

      function open_map(lat, lng, name){
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
  .setHTML('<h4>'+name+'</h4>')
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
var modal = document.getElementById('login');
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
<script type="text/javascript">
  function getVals(){
  // Get slider values
  var parent = this.parentNode;
  var slides = parent.getElementsByTagName("input");
    var slide1 = parseFloat( slides[0].value );
    var slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  var displayElement = parent.getElementsByClassName("rangeValues")[0];
      displayElement.innerHTML = "Rs " + slide1 + " - Rs " + slide2;
}

window.onload = function(){
  // Initialize Sliders
  var sliderSections = document.getElementsByClassName("range-slider");
      for( var x = 0; x < sliderSections.length; x++ ){
        var sliders = sliderSections[x].getElementsByTagName("input");
        for( var y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
            sliders[y].oninput = getVals;
            // Manually trigger event first time to display values
            sliders[y].oninput();
          }
        }
      }
}
</script>
</body>
</html> 