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
    $book1 = $row["b_fk_1"];
    $book2 = $row["b_fk_2"];

    

    if ($book1 != NULL) {
        $sql = "insert into user_history (prn_fk, book_id_fk) values ($prn_session_id, $book1)";
        mysqli_query($conn, $sql);
        $sql = "update books set is_issued = 1 where book_id = $book1";
        mysqli_query($conn, $sql);
        $sql = "update book_type join books on book_type.book_type_id=books.book_type_fk
                set book_type.quantity = book_type.quantity-1 
                where book_id = $book1";
        mysqli_query($conn, $sql);
        $sql = "update users set b_fk_1 = NULL where prn = $prn_session_id";
        mysqli_query($conn, $sql);
    }
    
    if ($book2 != NULL) {
        $sql = "insert into user_history (prn_fk, book_id_fk) values ($prn_session_id, $book2)";
        mysqli_query($conn, $sql);
        $sql = "update books set is_issued = 1 where book_id = $book2";
        mysqli_query($conn, $sql);
        $sql = "update book_type join books on book_type.book_type_id=books.book_type_fk
                set book_type.quantity = book_type.quantity-1 
                where book_id = $book2";
        mysqli_query($conn, $sql);
        $sql = "update users set b_fk_2 = NULL where prn = $prn_session_id";
        mysqli_query($conn, $sql);
    }

    $link = "Location: index.php";

    header($link);
    
?>