<?php
// session_start();
// $conn= mysqli_connect("localhost","root", "", "iLibrary");
// $username=$_POST["username"];
// $pwd=$_POST["password"];
// $sql="select * from user where username=".$username;
// $res=mysqli_query($conn,$sql);
// $row=mysqli_fetch_array($res);
// if(mysqli_num_rows($res)>0)
// {
//     $_SESSION['username']= $row['username'];
//     $_SESSION['firstname']= $row['firstname'];
// }
// else{
//     echo "Result not found.";
// }

// Collect the post data you submitted
// Post the data you collected using CURL to http://112.133.242.241/Student_Project/si_index.php 
// CURL should return the response page the remote server generated to you
// Extract the result from the returned page
// Do with them whatever you like (display them , store them in a database, etc)
?> 
<!-- authentication script location: http://112.133.242.241/Student_Project/si_index.php -->
<?php
$username=$_POST["username"];
$pwd=$_POST["password"];
$prof=$_POST["prof"]; // Hardcode value and post
$intr=$_POST["intrtype"]; // Hardcode value and post
?>