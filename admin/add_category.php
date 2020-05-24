<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["aloggedin"]) || $_SESSION["aloggedin"] !== true){
    header("location: login.php");
    exit;
}

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
    if(isset($_POST['create']))
    {
        $category=$_POST['category'];
        $sql="INSERT INTO category (category_name) VALUES ('$category')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            echo "<script>
            function alert_box() {
            return window.alert('Author added');
            }
            </script>";
        }
        // $query->bindParam(':author',$author,PDO::PARAM_STR);
        // $query->execute();
        // $lastInsertId = $dbh->lastInsertId();
        // if($lastInsertId)
        // {
        //     $_SESSION['msg']="Author Listed successfully";
        //     header('location:authors.php');
        // }
        // else 
        // {
        //     $_SESSION['error']="Something went wrong. Please try again";
        //     header('location:authors.php');
        // }
    }
            
?> 

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>iLibrary | Add Category</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">body {
  /*font-family: 'Roboto Slab', serif;*/
  background-color: #56baed;
  height: 100vh;
	}</style>
  <!-- <style type="text/css">.responsive { -->
  <!-- width: 100%; -->
  <!-- height: 100%; -->
  <!-- }</style> -->

</head>

<body>

  <!-- Navigation -->
  <?php include('includes/header.php');?>
  <!-- Page Content -->

  <div class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Add Category</h1>
            </div>
	</div>

    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-0"></div>
            <div class="col-lg-6 col-md-12">
                <form role="form" method="post">
                    <div class="active-cyan-4 mb-4">
                        <div class="form-group">
                            <label>Category Name</label>    
                            <input class="form-control" type="text" name="category" placeholder="Add New Category" aria-label="Search" required>
                        </div>
                        <button type="submit" name="create" class="btn btn-primary">Add Category</button>
                    </div>
                </form>                
            </div>
            <div class="col-lg-3 col-md-0"></div>
        </div>
    
  <!-- Footer -->
  <!-- <div class="container"> -->
  	<?php include('includes/footer.php');?>  
  <!-- </div> -->
	  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>