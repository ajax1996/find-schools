<?php
  session_start();
  if($_GET['var'])
    $_SESSION['school_id']=$_GET['var'];
  if(isset($_SESSION['school_id']))
    $id=$_SESSION['school_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
  crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
  crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

    <?php
     $con=mysqli_connect("localhost","root","","data");
    $query="select * from schools where school_id='$id'";
    $exec=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($exec);
    $name=ucwords($row['school_name']);
    $rating=$row['school_rating'];
    $address=ucwords($row['school_address']);
    $contact=$row['school_contact'];
    $image=$row['school_img'];
    $board=strtoupper($row['school_board']);
    $website=$row['school_website'];
    $city=ucfirst($row['school_city']);

  ?>

  <?php
    if(isset($_POST['textReview']) and isset($_POST['userRating']))
    {
      $query="select AVG(rating) as avg from reviews where school_id='$id'";
      $exec=mysqli_query($con,$query);
      $row=mysqli_fetch_assoc($exec);
      $new_avg=0;
      if(empty($row['avg']))
      {
          $new_avg=($_POST['userRating']+$rating)/2;
      }
      else
      {
        $new_avg=($row['avg']+$_POST['userRating'])/2;
      }
      //echo $row['avg'];
      
      $query="update schools set school_rating='$new_avg' where school_id='$id'";
      $rating=$new_avg;
      $exec=mysqli_query($con,$query);
      if($exec)
      {

      }
      else
      {
        echo "Error";
      }
    }


  ?>


  <?php
  if(isset($_POST['userName']) or isset($_POST['userRating']) or isset($_POST['textReview']))
  {
    $dt = new DateTime();
    $months=array("","January","February","March","April","May","June","July","August","September","October","November","December");
    $date=(string)($dt->format('d-m-Y'));
    $day=explode('-', $date)[0];
    $month=$months[(int)(explode('-', $date)[1])]; 
    $year=explode('-', $date)[2];
    $date=$day.' '.$month.','.$year;
    $user=$_SESSION['user_id'];
    $userRating=$_POST['userRating'];
    $textReview=$_POST['textReview'];
    $query="insert into reviews(user_id,date,rating,review,school_id) values($user,'$date','$rating','$textReview','$id')";
    $exec=mysqli_query($con,$query);
    error_reporting(E_ERROR | E_PARSE);
    $row=mysqli_fetch_assoc($exec);
    if($exec==true)
    {
      ?>
      <script type="text/javascript">alert('Review Uploaded Successfully...');</script>
      <?php
    }else
    {
      ?>
        <script type="text/javascript">alert('Review Upload Failed...');</script>
      <?php
    }
  }
  ?>
  <title><?php echo $name;?></title>
</head>
<body>
  <div class="container">
    <div class="header d-flex flex-column justify-content-center" style="background-image:url(images/<?php echo $image;?>)">
      <div class="overlay"></div>
      <div class="content">
        <h1><?php echo $name;?></h1>
        <div class="ratings">
          <span><?php echo $rating;?> <i class="fas fa-star"></i></span>
        </div>
        <p><i class="fas fa-map"></i> <?php echo $address;?></p>
        <p><i class="fas fa-phone"></i> <?php echo $contact;?></p>
        <p><?php echo $city;?></p>
      </div>
    </div>
    
    <div class="main-section">
      <div class="row">
        <div class="col col-lg-4 col-md-12 col-sm-12 mt-4">
          <div class="info d-flex flex-column">
            <p>Board: <?php 
              if($board!="")
              {
                echo $board;
              }
              else
              {
                echo "N/A";
              }
            ?></p>
            <p><i class="fas fa-map"></i> <?php echo $address;?></p>
            <p><i class="fa fa-globe" aria-hidden="true"></i>  <a href="<?php echo $website;?>">Link To Website</a></p>
          </div>
          <div style="
            width: 100%;
            height: auto;
            margin-top: 30px;
            overflow-y: scroll;
          ">
            <?php
                $query="select * from infra where school_id='$id'";
                $exec=mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($exec);
            ?>
            <h4>Facilities</h4>
            <table cellpadding="8">
              <tr>
                <td>
                  <input class="facilities"  type="image" src="/Minor/images/sports.png" height="40" width="40">
                </td>
                <td>
                  <span>
                    <?php
                      if(empty($row['sports']))
                        echo "Not Available";
                      else
                        echo strtoupper(($row['sports']));
                    ?>
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="facilities"  type="image" src="/Minor/images/library.png" height="40" width="40">
                </td>
                <td>
                  <span>
                    <?php
                      if(empty($row['library']))
                        echo "Not Available";
                      else
                        echo "Available";
                    ?>
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="facilities"  type="image" src="/Minor/images/labs.png" height="40" width="40">
                </td>
                <td>
                  <span>
                    <?php
                      if(empty($row['labs']))
                        echo "Not Available";
                      else
                        echo strtoupper(($row['labs']));
                    ?>
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="facilities"  type="image" src="/Minor/images/artculture.png" height="40" width="40">
                </td>
                <td>
                  <span>
                    <?php
                      if(empty($row['arts_culture']))
                        echo "Not Available";
                      else
                        echo strtoupper(($row['arts_culture']));
                    ?>
                  </span>
                </td>
              </tr>
            </table>
          </div>
          <div style="
              margin-top: 30px;
              overflow-y: scroll;
              width: 100%;
              height: auto;
          ">
            <p><input type="image" src="/Minor/images/clock.png" height="35" width="35"><font size="5"> Time-Table</font></p>
            <?php
                $query="select * from time where school_id='$id'";
                $exec=mysqli_query($con,$query);
                if(mysqli_num_rows($exec)==0)
                {
                  ?>
                  <p>Time-Table Not Available</p>
                  <?php
                }else{
                
            ?>
            <table cellpadding="10" border="1" style="width: 100%;">
              <tr>
                <th>
                  Season
                </th>
                <th>
                  Division
                </th>
                <th>
                  Time
                </th>
                <?php
                  $i=0;
                  while ($row=mysqli_fetch_assoc($exec)) {
                    if($i==0)
                    {
                    ?>
                      <tr>
                        <td rowspan="4">
                          <?php echo strtoupper($row['season']); ?>
                        </td>
                        <td>
                          <?php echo ucfirst($row['class']); ?>
                        </td>
                        <td>
                          <?php echo $row['start'].'AM-'.$row['end'].'PM';  ?>
                        </td>
                      </tr>
                    <?php
                    }
                    else if($i==4)
                    {
                      ?>
                      <tr>
                        <td rowspan="4">
                            <?php echo strtoupper($row['season']);?>
                        </td>
                        <td>
                          <?php echo ucfirst($row['class']); ?>
                        </td>
                        <td>
                          <?php echo $row['start'].'AM-'.$row['end'].'PM';  ?>
                        </td>
                      </tr>

                      <?php
                    }
                    else
                    {
                      ?>
                      <tr>
                        <td>
                          <?php echo ucfirst($row['class']);?>
                        </td>
                        <td>
                          <?php echo $row['start'].'AM-'.$row['end'].'PM';  ?>
                        </td>
                      </tr>
                      <?php
                    }
                    $i++;
                  }
                ?>
              </tr>
            </table><?php
          }
            ?>
          </div>
        </div>
        <div class="col col-lg-8 col-md-12 col-sm-12 mt-4">
          <div class="list-group" id="myList" role="tablist">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#write" role="tab"><i class="fas fa-pencil-alt"></i> Write a Review</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#read" role="tab"><i class="far fa-comment"></i> Reviews & Ratings</a>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" id="write" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  <?php
                    if(isset($_SESSION['user']))
                    {
                      ?>
                    <form method="post">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Add Review</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write how do you feel about the school" autocomplete="off" name="textReview"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="rating">Ratings</label>
                      <input type="number" class="form-control" id="ratings" placeholder="Rate the School" min="1" max="5" step="any" autocomplete="off" name="userRating">
                    </div>
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                  </form>
                      <?php
                    }
                    else
                    {
                      ?>
                      <div class="form-group">
                          <p style="font-size: 18px;">Login To Write a Review</p>
                      </div>

                      <?php
                    }
                  ?>
                  
                </div>
              </div>
            </div>
            <div class="tab-pane" id="read" role="tabpanel">
              <div class="reviews">
                <?php
                  $i=0;
                  $query="select reviews.*,users.user_name from reviews,users where reviews.user_id=users.user_id and reviews.school_id='$id'"; 
                  $exec=mysqli_query($con,$query);
                  while($row=mysqli_fetch_assoc($exec))
                  {
                    $i++;
                    ?>
                    
                    <div class="review">
                  <div class="about ratings">
                    <p><?php echo $row['user_name'] ?> <span><?php echo $row['rating']; ?> <i class="fas fa-star"></i></span></p>
                    <p><?php echo $row['date'] ?></p>
                  </div>
                  <div>
                    <?php echo $row['review'] ?>
                  </div>
                </div>
                    <?php
                  }
                  
                  if($i==0)
                  {
                    ?>
                    <p style="padding: 10px;">No Reviews Yet For This School</p>
                    <?php
                  }
                ?>
                

              </div>
            </div>
          </div>
          <div class="general">
            <p><font size="5">Fee Structure</font></p>
            <table border="1" cellpadding="10">
              <tr>
                <th>Division</th>
              <th>Transport Fee</th>
              <th>Registration Fee</th>
              <th>Admission Fee</th>
              <th>Annual Fee</th>
              <th>More Info</th>
              </tr>
              <?php
                $query="select * from fee where school_id='$id'";
                $exec=mysqli_query($con,$query);
                $i=0;
                while ($row=mysqli_fetch_assoc($exec)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo strtoupper($row['class']);?>
                    </td>
                    <td>
                      <?php if($row['transp']==0)
                            echo "N/A";
                            else
                              echo $row['transp'];
                      ?>
                    </td>
                    <td>
                      <?php 
                      if($row['reg']==0)
                        echo "N/A";
                      else
                      echo $row['reg'];?>
                    </td>
                    <td>
                      <?php 
                      if($row['adm']==0)
                        echo "N/A";
                      else
                      echo $row['adm'];?>
                    </td>
                    <td>
                      <?php 
                      if($row['annual']==0)
                        echo "N/A";
                      else
                      echo $row['annual'];?>
                    </td>
                    <?php
                      if($i==0)
                      {
                        ?><td rowspan="4">
                          <a href="<?php echo $row['moreinfo'];?>">Click Here</a>
                          </td><?php
                      }
                    ?>
                    
                  </tr>
                  <?php
                  $i++;
                }
                if($i==0)
                {
                  ?>
                  <tr>
                    <td>
                      <p>Information Not Available</p>
                    </td>
                  </tr>
                  
                  <?php
                }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
crossorigin="anonymous"></script>
<script>
  $('#myList a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
  })
  
  $('#myList a[href="#read"]').tab('show')
  $('#myList a[href="#write"]').tab('show')
</script>
</body>
</html>