<?php
$con=mysqli_connect("localhost","root","","data");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="minor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">


   



    <title>Project Minor</title>
  </head>
  <body>
   
   <div class="wrapper">
   	<nav id="sidebar">
   		<div class="sidebar-header">
   			<img src="logo.jpg" height="200" width="200">
   		</div>
   		
   		
   		<ul class="list-unstyled components">
        <li>
          <input type="text" id="keywords" name="searchbar" placeholder="Search By Keywords...">
        </li>
   			<li class="active">
   				<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Sort by</a>
   				<ul class="collapse list-unstyled" id="homeSubmenu">
          <li>
            <a href="#"><span class="glyphicon glyphicon-star"></span>      User Ratings</a>
              </li>
              <li>
              <a href="#"><i class="fa fa-rupee" style="font-size:24px"></i>      Fee Structure</a>
             </li>
             <li>
                <a href="#"><i class="fa fa-map"></i>      Distance</a>
             </li>
        </ul>
   			</li>
   			<li>
   				<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Filter by</a>
   				<ul class="collapse list-unstyled" id="pageSubmenu">
            <form action="#" method="POST" target="">   
         

            

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
echo "  <li class='Sports'><font color='rgb(57,57,57)' style='font-size:18px' id='sports'>$arr[$i]</font>
<ul>";
foreach ($str[$i] as $value)
{
 if($value!='')
{
  $value=ucfirst($value);
  echo "<li><input type='checkbox' name='$arr[$i][]' value='$value'>   $value</li>";
    $j++;
}
}
echo "</ul></li>";
$i++;
mysqli_data_seek($c,0);
}
?>        
    
         <input type="submit">
      </form>
   				</ul>
          
        </li>
   		</ul>
   		
   		
   	</nav>
   	

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

/*$sql="select * from schools where school_id in (select school_id from infra where ".$str.")";
$c=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($c))
{
  echo $row["school_id"]." ".$row["school_name"]."<br>";
}
}*/

?>




   	<div class="content">
   		<nav class="navbar navbar-expand-lg navbar-light bg-light">
   		
   		<button type="button" id="sidebarCollapse" class="btn btn-info">
   			<i class="fa fa-align-justify"></i> <span></span>
   		</button>
   		
  <!--<a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">SignUp</a>
      </li>
    </ul>
  </div>
</nav>
  	
  </div>


        <div id="school_info">
    <table>
      <?php
          $sql="select * from schools where school_id in (select school_id from infra where ".$str.")";
                    $c=mysqli_query($con,$sql);
                    $i=0;
                    while($row=mysqli_fetch_assoc($c))
          {    
            if($i==3)
            {
              $i=0;
              ?><tr><?php
              
            }
            else if($i==0)
            {
              ?><tr><?php
            }
              ?><td style="padding: 20px 25px 20px 25px;">
                <div class="card">
                   <img src="<?php echo 'images/'.$row['school_img'];?>" alt="John" style="width:100%">
                   <h4><?php echo ucwords($row["school_name"]);?></h4>
                  <p class="title"><?php echo ucwords($row["school_address"]);?></p>
                <p><?php echo $row["school_contact"];?></p>
                <p><?php echo ucfirst($row["school_city"]);?></p>
                <div class="star-ratings-sprite"><span style="width:<?php echo ($row['school_rating']*2*10).'%'?>" class="star-ratings-sprite-rating"></span></div>
                              <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                <div style="margin: 24px 0;">
                  <a href="<?php echo 'https://www.google.com/maps/@'.$row['school_lat'].','.$row['school_long'];?>"><i class="fa fa-map-marker" style="font-size:24px"></i></a> 
                  <!-- <a href="#"><i class="fa fa-twitter"></i></a>  
                  <a href="#"><i class="fa fa-linkedin"></i></a>  
                  <a href="#"><i class="fa fa-facebook"></i></a>  -->
               </div>
                <p><button><a class="info_button" href="<?php echo $row['school_website']?>">Visit School Website</a></button></p>
                    </div>
                    </td>
                    <?php
            $i++;
            if($i==3)
                    {
                      ?></tr><?php
                    }
          }
        } 


      ?>
    </table>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script>
	    $(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
		});  
	</script>  
  </body>
</html>