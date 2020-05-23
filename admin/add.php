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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>iLibrary | Add books</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="css/shop-homepage.css"> 

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
                <h1 class="jumbotron-heading">Add Books</h1>
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
                            <input class="form-control" type="text" name="author" autocomplete="on" required="required" />
                        </div>

                        <div class="form-group">
                            <label> Category<span style="color:red;">*</span></label>
                            <select class="form-control" name="category" required="required">
                            <option value=""> Select Category</option>
                            <?php 
                                $sql = "SELECT * from  category";
                                $results = mysqli_query($conn,$sql);
                                $cnt=1;
                                while($row = $results->fetch_assoc())
                                { 
                            ?>  
                            <option value="<?php echo $row["category_name"];?>"><?php echo $row["category_name"];?></option>
                            <?php } ?> 
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" name="description" autocomplete="off" required="required" />
                        </div>
                        
                        <div class="form-group">
                            <label>Cost<span style="color:red;">*</span></label>
                            <input class="form-control" type="number" name="cost" autocomplete="off" required="required" />
                        </div>

                        <div class="form-group">
                        <label>Quantity<span style="color:red;">*</span></label>
                        <input class="form-control" type="number" name="quantity" autocomplete="off" required="required" />
                        </div>
                        
                        <div class="form-group">
                            <label>Location<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="location" autocomplete="off" required="required" />
                        </div>

                        <div class="form-group">
                            <label>Image Name (compete name with extension)<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="image" value="book.png" autocomplete="off" required="required"/>
                            <p class="help-block">Please leave the default value if you don't have an image</p>        
                        </div>

                        <button type="submit" name="add" class="btn btn-success">Add</button>
                    </form>
                </div>
                <?php
                //Generate book_type_id by yourself by incrementing previous book_type_id in book_type table
                    //Generate book_id by incrementing previous book_id in books table
                    // echo "Connected successfully";
                    if(isset($_POST["add"])) {    
                        $title = $_POST["title"];
                        $author = $_POST["author"];
                        $description = $_POST["description"];
                        $cost = $_POST["cost"];
                        $category = $_POST["category"];
                        $quantity = $_POST["quantity"];
                        $location = $_POST["location"];
                        $cover_image = $_POST["image"];

                        $sql = "insert into book_type (title, author, category, description, cost, location, quantity, cover_image) 
                                values ('$title', '$author', '$category', '$description', $cost, '$location', $quantity, '$cover_image')";

                        $result = mysqli_query($conn, $sql); //this variable can be used later if needed

                        $sql_get_book_type_id = "select * from book_type where title = '$title' and author = '$author'";
                        $result1 = mysqli_query($conn, $sql_get_book_type_id);
                        $row = $result1->fetch_assoc();
                        $book_id = $row["book_type_id"];

                        $count = 1;
                        while($count<=$quantity)
                        {
                            $sql1 = "insert into books (book_type_fk) values ($book_id)";
                            mysqli_query($conn, $sql1);
                            $count++;
                        }
                        echo "<script>
                            function alert_box() {
                            return window.alert('Book(s) Added');
                            }
                            </script>";
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