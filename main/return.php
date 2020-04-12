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
    $history_id = $_GET["history_id"];
    
    $sql = "update user_history set is_returned=1 where history_id=$history_id";
    $result = mysqli_query($conn, $sql);
    
    $sql = "update books 
            set is_issued=0 
            where book_id=(select book_id_fk FROM user_history WHERE history_id=$history_id)";
    $result = mysqli_query($conn, $sql);

    $sql = "update book_type 
            join books on book_type.book_type_id=books.book_type_fk 
            set book_type.quantity = book_type.quantity+1 
            where book_id = (select book_id_fk FROM user_history WHERE history_id=$history_id)";
    $result = mysqli_query($conn, $sql);

    $link = "Location: issued_books.php";

    header($link);

?>