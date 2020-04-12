<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Add Books</title>
</head>
<body>
    <?php
    //Generate book_type_id by yourself by incrementing previous book_type_id in book_type table
    //Generate book_id by incrementing previous book_id in books table
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
    $title = $_POST["title"];
    $author = $_POST["author"];
    $description = $_POST["description"];
    $cost = $_POST["cost"];
    $quantity = $_POST["quantity"];
    $location = $_POST["location"];
    $cover_image = $_POST["image"];

    $sql = "insert into book_type (title, author, description, cost, location, quantity, cover_image) 
            values ('$title', '$author', '$description', $cost, '$location', $quantity, '$cover_image')";

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
    ?>
    <div class="alert alert-primary" role="alert"> 
    <h4><?php echo "Books Added!";
        header("refresh:1; url=add.html"); 
        ?></h4>
    </div>
</body>
</html>

