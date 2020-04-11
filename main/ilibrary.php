<?php
require "si_connection.php";
$username=$_POST["username"];
$pwd=$_POST["password"];
$sql="select * from mdl_user where username like '".$username."';";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$pwd1=crypt($pwd,$row[8]);

if(mysqli_num_rows($res)>0)
{
	if($pwd1!=$row[8])
	{
		//php render failure page
		include 'error.html';
	}
	else
	{
		//php render success page - open index page
		include 'index.html';
    }
}
else
{
	//php render failure page for username not found!!!
	include 'error.html';
}
?>