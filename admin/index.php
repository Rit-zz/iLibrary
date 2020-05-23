<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>iLibrary | Admin</title>

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
		<div class="container">

			<br><br><br>
			<div class="row">
				<div class="col-lg-3 col-md-0"></div>
				<div class="col-lg-6 col-md-12">
					<form action="search.php" method="get">
						<div class="active-cyan-4 mb-4">
							<div class="form-group">    
								<input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search">
							</div>
							<button type="submit" class="btn btn-primary">Search - Author/Title/Category</button>
						</div>
					</form>                
				</div>
				<div class="col-lg-3 col-md-0"></div>
			</div>

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

					$sql = "select * from book_type limit 10";

					$result = mysqli_query($conn, $sql);

					$count = mysqli_num_rows($result);

					if ($count > 0) {
					// output data of each row
						while($row = $result->fetch_assoc()) {
							// echo "id: " . $row["bt_id"]. " - Name: " . $row["title"]. " " . $row["cover_image"]. "<br>";
							$link_path = "http://localhost/ilibrary/main/images/books/";
							$card_string = "<div class='col-lg-4 col-md-6 mb-4'>".
								"<div class='card h-100'>".
								"<img class='card-img-top' src='". $link_path . $row["cover_image"] ."' >".
								"<div class='card-body'>".
									"<h4 class='card-title text-uppercase'>".
									$row["title"].
									"</h4>".
									"<div class='text-uppercase'>".
									"<span style='font-size: 20px; font-weight: bold; color: #000000'>
									Authors: </span>". $row["author"] . "</div>".
									"</div>".
									"<div class='row'>".
									"<div class='col-md-6'><a href='know.php?book_type_id=" . $row["book_type_id"] . 
									"'><button type='button' class='btn btn-success' style='margin-bottom: 5px; margin-left: 5px'>Know More</button></a></div>".
								" </div>".
							" </div>".
							"</div>";
							echo $card_string;
						}
					} else {
						echo "0 results";
					}
				?>        
			</div>
		</div>
		<!-- /.container -->
		<!-- Footer -->
		<?php include('includes/footer.php') ?>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	</body>

</html>
 
