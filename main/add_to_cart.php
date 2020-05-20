<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ./../auth/login.php");
    exit;
}

$prn_session_id = $_SESSION['username'];  //Session ID is here
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

$sql = "select * from books where book_type_fk=$book_type_id and is_issued=0";


$result = mysqli_query($conn, $sql);


$count = mysqli_num_rows($result);
$book_id = 0;

if ($count > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $book_id = $row["book_id"];
    break;
    } 
} else {
        echo "0 results";
}


$sql = "select * from users where username='$prn_session_id'";

$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
// echo $row["b_fk_1"];

$query_parameter = "";
if($row["b_fk_1"] == NULL)
    $query_parameter = "b_fk_1";
else if($row["b_fk_2"] == NULL)
    $query_parameter = "b_fk_2";
else echo "Already 2 books in cart";

if($row["b_fk_1"] != $book_id && $row["b_fk_2"] != $book_id) {
    $sql = "update users set $query_parameter = $book_id where username='$prn_session_id'";
    $result = mysqli_query($conn, $sql);
} else {
    echo "Book already in cart";
}
// $row = $result->fetch_assoc();

// $link = "Location: know.php?book_type_id=$book_type_id";
$link = "Location: index.php";

header($link);

?>