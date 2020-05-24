<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["aloggedin"]) || $_SESSION["aloggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>iLibrary</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  
  <style type="text/css">
  
  body {
  /*font-family: 'Roboto Slab', serif;*/
  /* background-color: #56baed; */
  /* height: 100vh; */
	}

div.ex1 {

  overflow: scroll;
}
    
    </style>
  <!-- <style type="text/css">.responsive { -->
  <!-- width: 100%; -->
  <!-- height: 100%; -->
  <!-- }</style> -->




</head>

<body onload="draw();">

  <!-- Navigation -->
  <?php include('includes/header.php');?>
  <!-- Page Content -->
  <div class="container">

    <!-- <div class="row"> -->
      <!-- <div class="col-lg-12"> -->
          <br>

        <div class="row">

        <?php

          $servername = "localhost";
          $username = "root";
          $password = "";

          // Create connection
          $conn = mysqli_connect($servername, $username, $password, "ilibrarydb");

          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          // echo "Connected successfully";

          $book_type_id = $_GET["book_type_id"];

          $sql = "select * from book_type where book_type_id=$book_type_id";
          

          $result = mysqli_query($conn, $sql);

          $row = $result->fetch_assoc();
          // $count = mysqli_num_rows($result);

          $link_path = "http://localhost/ilibrary/main/images/books/";
          $link_map_path = "http://localhost/ilibrary/main/images/maps/map";
          $ext = ".png";
          $card_string = "<div class='col-lg-6 col-md-6'>
            
              <img class='card-img-top' src='". $link_path . $row["cover_image"] . " ' > 
              <div class='card-body'>
                <h4 class='card-title text-uppercase'>" . 
                  $row["title"] . 
                "</h4>
                <div class='text-uppercase'><span style='font-size: 20px; font-weight: bold; color: #000000'>Authors: </span>". $row["author"] . "</div>
                <br>
                <button type='button' class='btn btn-primary' style='margin-bottom: 5px;
                 margin-left: 5px; float: left;'>Available: ". $row["quantity"] ."</button>              
            </div>
          </div>
          
          <div class='col-lg-6 col-md-6'>
          <h3>Location:</h3>
        <div class='ex1'>


            <img width='720' height='640' src='". $link_map_path . $row["location"] . $ext . "' />
            <!-- <canvas id='canvas' width='720' height='640'></canvas> -->

        </div>
      </div>  
    </div> 
          
          ";

          echo $card_string;
        ?>

        <script>
            function alert_box() {
              return window.alert("Book added to cart");
            }
        </script>
          


  

       
        
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include('includes/footer.php');?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>





  <script>
    function draw() {
      var ctx = document.getElementById('canvas').getContext('2d');
      var img = new Image();
      img.onload = function() {
        ctx.drawImage(img, 0, 0);
        ctx.beginPath();
    //     ctx.moveTo(30, 96);
        ctx.fillStyle = "rgba(255, 0, 0, 0.75)";
        ctx.fillRect(74, 259, 128, 25);
        ctx.stroke();
      };
      img.src = 'map.png';
    }
</script>
</body>

</html>
