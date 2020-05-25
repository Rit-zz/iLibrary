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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>iLibrary | List Issued</title>

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
                <h1>All issued Books</h1>
            </div>
	    </div>

        
        <div class="container">    
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Book</th>
                                    <th scope="col">Issuer Username</th>
                                    <th scpo="col">Issuing Date</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php                       
                            $sql = " SELECT username_fk, date_of_issue, title  FROM user_history, books, book_type 
                                    WHERE user_history.is_returned=0 
                                    AND user_history.book_id_fk = books.book_id 
                                    AND books.book_type_fk = book_type.book_type_id ";
                            
                            $result = mysqli_query($conn, $sql);

                            // echo $result;
                            $count = mysqli_num_rows($result);

                            if ($count > 0) {
                                while($row = $result->fetch_assoc()) {
                                $row_string = 
                                "<tr>
                                    <td><strong>". $row["title"] ."</strong></td>
                                    <td><strong>". $row["username_fk"] ."</strong></td>
                                    <td><strong>". $row["date_of_issue"] ."</strong></td> 
                                </tr>";

                                echo $row_string;

                                }
                            } else {
                                echo "0 results";
                            }
                            
                            ?>                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include('includes/footer.php') ?>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
