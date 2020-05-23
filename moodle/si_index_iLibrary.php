<?php
require "si_connection.php";
$username=$_POST["username"];
$pwd=$_POST["password"];
$prof=$_POST["prof"];
$intr=$_POST["intrtype"];

$sql="select * from mdl_user where username like '".$username."';";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$pwd1=crypt($pwd,$row[8]);
//echo $pwd1." ";
//echo "\n".$row[8]."\n";
if(mysqli_num_rows($res)>0)
{
	if($pwd1!=$row[8])
	{
		echo json_encode(array("error"=>true));
	}
	else
	{
		$userid=$row[0];
    	if($prof=="Teacher")
			$stmt="select roleid from mdl_role_assignments where userid=$userid and roleid=3;";
    	else
        	$stmt="select roleid from mdl_role_assignments where userid=$userid and roleid=5 and $intr='1';";
		$result=mysqli_query($con,$stmt);
		$ans=mysqli_fetch_array($result);
		//echo $ans[0];
    	//if(($ans[0]==5 && $prof=="Student")||($ans[0]!=5 && $prof=="Teacher"))
        if(mysqli_num_rows($result)!=0)
        {
			echo json_encode(array("id"=>$row['id'],"name"=>$row["firstname"],"username"=>$row["username"],"password"=>$row["password"],"email"=>$row["email"],"error"=>false));
        }
    	else
			echo json_encode(array("error"=>true));
    }
}
else
{
	echo json_encode(array("error"=>true));
}

?>
