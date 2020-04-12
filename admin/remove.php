<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Remove Book</title>
</head>
<body>
    <?php
    //Generate book_type_id by yourself by incrementing previous book_type_id in book_type table
    //Generate book_id by incrementing previous book_id in books table
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

    // echo "Connected successfully";
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
    ?>
    <div class="alert alert-primary" role="alert"> 
    <h4><?php echo $status;
        header("refresh:1; url=remove.html"); 
        ?></h4>
    </div>
</body>
</html>
 
