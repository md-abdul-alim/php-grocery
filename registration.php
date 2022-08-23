<?php 
session_start();
session_unset();
session_destroy();
include 'Connection.php';
$conn=new Connection;

if (isset($_POST['submit']))
{
	$userName=$_POST['userName'];
	$password=md5($_POST['password']);
	$regData=array(
		':userName'=>$userName,
		':password'=>$password
	);
	$conn->registration("INSERT INTO users (userName,password) VALUES (:userName,:password)",$regData);

	echo "Registration Completer";
	header("location:login.php");
}
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>registration</title>
 </head>
 <body style="background-color:powderblue">
 	<h1 style="font-size:60px;color:RED">Registration Page</h1>
 	<form action="" method="POST">
	 	<label>User Name:</label>
	 	<input type="text" name="userName"><br><br>
	 	<label>Password:</label>
	 	<input type="password" name="password"><br><br>
	 	<input style="margin:10px" type="submit" name="submit" value="Register">
 	</form>
 </body>
 </html>