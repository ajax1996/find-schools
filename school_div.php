<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="card-css.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- 	<style type="text/css">
		
.school-div{
	width: 100%;
	height: 300px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	margin: auto;
	position: relative;
	border-radius: 5px;
}
.school-div:hover{
	box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2);
	transition: all .4s;
}
.school-div .image-div{
	height: 300px;
	width: 40%;
	align-items: center;
	float: left;
}
.school-div .image-div img{
	width: 100%;
	position: relative;
	border-radius: 5px;
	height: 100%;
}
.school-div .details-div{
	height: 300px;
	width: 50%;
	float: left;
	position: relative;
}
.school-div .details-div .title{
        width: 100%;
        max-height: 60px;
        margin-left: 10px;
        padding: 10px;
        font-size: 24px;
        font-family: arial;
        text-align: left;
        vertical-align: middle;
}
.school-div .details-div p{
	text-align: left;
	vertical-align: middle;
	font-size: 20px;
	margin-left: 10px;
  margin-bottom: 10px;
	font-family: sans-serif;
	color: grey;
}
.school-div .details-div i{
	size: 25px;
	color: black;
}

.school-div .details-div .stars{
        width: 10%;
        height: auto;
        margin-left: 10px;
}

.school-div .button-div{
  height: 300px;
  position: relative;
  width: 10%;
  float: left;
}
.school-div .details-div button{
	width: 100%;
	bottom: 0px;
	height: 40px;
	position: absolute;
	margin-top: 13px;
	color: white;
	font-size: 22px;
	font-family: arial;
	background: #2d2d2d;
	border: none;
}
.school-div .details-div button:hover{
	background: black;
	font-size: 24px;
	transition: all .2s;
}
.school-div .button-div button{
	width: 100%;
	height: 150px;
	background: white;
	border-radius: 5px;
	border: none;  
	color: black;
	font-size: 20px;
}

.school-div .button-div button:hover{
	background: rgb(249,249,249);
	font-size: 22px;
	transition: all 300ms;
	color: black;
}


.star-ratings-css {
              unicode-bidi: bidi-override;
              color: #c5c5c5;
              font-size: 25px;
              height: 25px;
              width: 100px;
              margin: 0 auto;
              position: relative;
              padding: 0;
              text-shadow: 0px 1px 0 #a2a2a2;
            }
            .star-ratings-css-top {
              color: #e7711b;
              padding: 0;
              position: absolute;
              z-index: 1;
              display: block;
              top: 0;
              left: 0;
              overflow: hidden;
            }
            .star-ratings-css-bottom {
              padding: 0;
              display: block;
              z-index: 0;
            }
            .star-ratings-sprite {
              background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2605/star-rating-sprite.png") repeat-x;
              font-size: 0;
              height: 21px;
              line-height: 0;
              overflow: hidden;
              text-indent: -999em;
              width: 110px;
              margin: 0 auto;
            }
            .star-ratings-sprite-rating {
              background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/2605/star-rating-sprite.png") repeat-x;
              background-position: 0 100%;
              float: left;
              height: 21px;
              display: block;
            }


	</style> -->
	<style>
.grid-container {
  display: inline-grid;
  grid-template-columns: auto auto auto;
  grid-row-gap: 25px;
  background-color: white;
  padding: 10px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 75%;
  height: 100%;
  border-radius: 7px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
.card img{
  width: 100%;
  border-radius: 7px;
  height: 200px;
}
.card .content{
  width: 100%;
  height: 250px;
}
.title {
  color: grey;
  font-size: 18px;
}

.card button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  border-radius: 7px;
  cursor: pointer;
  width: 100%;
  position: relative;
  bottom: 0px;
  font-size: 18px;
}

.content a {
  text-decoration: none;
  font-size: 24px;
  color: black;
}
.card button:hover,.content button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
	<!-- <div class="school-div">
		<div class="image-div">
			<img src="GH1918.png">
		</div>
		<div class="details-div">
			<div class="title"><i class="fa fa-institution"></i> Shubham Mishra</div>
			<div class="stars">
				<div class="star-ratings-sprite"><span style="width:70%;" class="star-ratings-sprite-rating"></span></div>
             <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
			</div>
			<p><i class="fa fa-map-signs"></i>  fsakfj;a jf;sdkjf;k kjlkfjdsa;fasdfasfsfkl fldslfalksj jf;lksjflk jlkjflkjaslkfjdskjfasdfjljfhdkfjhafksfnkafurfefnscn; nkf;dkasfkfj;sk f</p>
			<p><i class="fa fa-phone-square"></i>  contact number</p>
			<p>City</p>
			<button id="school-website"><a href="" style="text-decoration: none; color: white;"><i class="fa fa-globe" style="color: white;"></i>  Visit School Website</a></button>
		</div>
		<div class="button-div">
			<button id="school-location"><i class="fa fa-info-circle" style="color: red;"><a href="" style="text-decoration: none;color: black;"></i>  More Info</a></button>
			<button id="school-location"><a href="" style="text-decoration: none;color: black;"><i class="fa fa-map-marker"></i>  Find Us</a></button>
		</div>
	</div> -->
	<div class="grid-container">
<?php

           //echo $sql;
           $con=mysqli_connect("localhost","root","","data");
         $sql="select * from schools";
          $c=mysqli_query($con,$sql);
          $i=0;
          while($row=mysqli_fetch_assoc($c))
          {    
            ?>
                <div class="card">
                  <img src="images/<?php echo $row['school_img']?>" alt="John" style="width:100%">
            <div class="content">
          <h2><?php echo ucwords($row['school_name'])?></h2>
          <p class="title"><?php echo ucwords($row['school_address'])?></p>
          <p><?php echo strtoupper($row['school_city'])?></p>
          <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-dribbble"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="#"><i class="fa fa-linkedin"></i></a>  
            <a href="#"><i class="fa fa-facebook"></i></a> 
         </div>
            </div>
				 <button><a href="index.php" style="text-decoration: none; color: white; font-size: 22px;">Contact</a></button>
				</div>
                    <?php
        }
      


      ?>
</div>

</body>
</html>