<?php
include 'connection.php';
SESSION_start();
if(isset($_SESSION['username']))
{
	header('location:logtable.php');
}
if(isset($_POST['button']))
{
	$Username=$_POST['usename'];
	$Password=$_POST['password'];
	$result=mysqli_query($con,"SELECT  *
	FROM `registration_table` WHERE  Username ='$Username'AND Password ='$Password'");
	if(mysqli_num_rows($result)==1)
	{
		$row_data= mysqli_fetch_assoc($result);
		$_SESSION['username']=$row_data['login_id'];
		header('location:logtable.php');
    }
    else
	{
        echo" <script> alert('you have entered incorrect password or username' );
       
        </script>";
    }


}
?>
<html>
<head>
<title>LOGIN</title></head>
<body>
<form method="post" enctype="multipart/form-data" >
Username:<input type="text" name="usename"><br><br>
Password:<input type="password" name="password"><br><br>
<input type="submit" value="submit" name="button"><br><br>
</form>
</body>
</html>

