<?php 
session_start();

include 'Connection.php';
$conn=new Connection;

if (isset($_POST['submit']))
{
	$userName=$_POST['userName'];
	$password=md5($_POST['password']);
	$login=$conn->login("SELECT * FROM users WHERE userName='$userName' AND  password='$password'");

	if(count($login))
	{
		foreach ($login as $loginData) {
			$_SESSION['logged_in']=$loginData['userName'];
		}
	}
	header("location:index.php");
}
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>login</title>
 </head>
 <body style="background-color:powderblue">
 	<h1 style="font-size:60px;color:RED">Login Page</h1>
 	<form action="" method="POST">
	 	<label>User Name:</label>
	 	<input type="text" name="userName"><br><br>
	 	<label>Password:</label>
	 	<input type="password" name="password"><br><br>
	 	<input style="margin:10px" type="submit" name="submit" value="Login">
 	</form>
 </body>
 </html>