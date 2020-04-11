<?php
    $prn_session_id = 1;
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    $conn = mysqli_connect($servername, $username, $password, "ilibrarydb");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully";
    
    $sql = "select * from users where prn=$prn_session_id";
 
    $result = mysqli_query($conn, $sql);

    $row = $result->fetch_assoc();
    $book_id = $_GET["book_id"];
 
    if ($row["b_fk_1"] == $book_id) {
        $sql = "update users set b_fk_1 = NULL where prn = $prn_session_id";
        mysqli_query($conn, $sql);
        echo "1";
    }
    if ($row["b_fk_2"] == $book_id) {
        $sql = "update users set b_fk_2 = NULL where prn = $prn_session_id";
        mysqli_query($conn, $sql);
        echo "2";
    }

    $link = "Location: cart.php";

    header($link);

?>