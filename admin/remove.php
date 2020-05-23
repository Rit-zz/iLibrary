<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $status = "";
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

        <title>iLibrary | Remove books</title>

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
                <h1 class="jumbotron-heading">Remove Books</h1>
            </div>
        </div>                

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-0"></div>
				<div class="col-lg-6 col-md-12">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Title<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="title" autocomplete="off"  required />
                        </div>

                        <div class="form-group">
                            <label> Author<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="author" autocomplete="off" required="required" />
                        </div>

                        <div class="form-group">
                        <label>Quantity<span style="color:red;">*</span></label>
                        <input class="form-control" type="number" name="quantity" autocomplete="off" required="required" />
                        </div>
                        <button type="submit" name="remove" class="btn btn-danger">Remove</button>
                    </form>
                </div>
            </div>
        </div>
        
        <?php
        //Generate book_type_id by yourself by incrementing previous book_type_id in book_type table
        //Generate book_id by incrementing previous book_id in books table
            // echo "Connected successfully";
            if(isset($_POST["remove"]))
            {
                $title = $_POST["title"];
                $author = $_POST["author"];
                $quantity = $_POST["quantity"];

                $sql = "select book_type_id, title, author, quantity from book_type where title = '$title' and author = '$author'";
                $result = mysqli_query($conn, $sql); //this variable can be used later if needed
                //check if row returned -> book is present. 
                if(mysqli_num_rows($result)>0)
                {
                    $row = $result->fetch_assoc();
                    // $quantity_retrieved = $row["quantity"];
                    $book_type_id =$row["book_type_id"];
                    $count=1;
                    while($count<=$quantity)
                    {
                        $sql1 = "delete from books where book_type_fk = $book_type_id";
                        mysqli_query($conn, $sql1);
                        $count++;
                    }
                    $sql2 = "delete from book_type where title = '$title' and author = '$author'";
                    mysqli_query($conn, $sql2);
                    // $link = "Location: add.html";
                    // header("refresh:2; url=add.html");
                    $status="Books Deleted!";
                }
                else
                {
                    $status="No Such Book Present!";
                }
                //check if quantity < available quantity.
            }
            echo "<script>
            function alert_box() {
              return window.alert($status);
            }
            </script>";
        ?>
        <br>            
        <!-- Footer -->
        <?php include('includes/footer.php') ?>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
 
