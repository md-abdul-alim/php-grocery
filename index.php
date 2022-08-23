<?php 
session_start();
if(!isset($_SESSION['logged_in']))
{
	header("location:login.php");
}
$getUserName=$_SESSION['logged_in'];
include 'Connection.php';
$conn=new Connection;

//Call getAll for Showing data on Dashboard
$holdDashboardData=$conn->getAll("SELECT * FROM task_list");
//insert into database Task List
if(isset($_POST['submit']))
{
	$productTitle=$_POST['productTitle'];
	$description=$_POST['description'];	
	$weight=$_POST['weight'];
	$conn->insertTaskList($productTitle,$description,$weight);
	//calling Full Dashboard after inserting data
	$holdDashboardData=$conn->getAll("SELECT * FROM task_list");
	//print_r($_POST['productTitle']);
}else if(isset($_POST['src']))//Search Task From DashBoard
{
	if(isset($_POST['src'])){
		$holdSearchText=$_POST['search'];
		$holdDashboardData=$conn->getAll("SELECT * FROM task_list WHERE productTitle LIKE '%$holdSearchText%'");
	}else
	{
		$holdDashboardData=$conn->getAll("SELECT * FROM task_list");
	}
}else if(isset($_POST['logout'])){
	session_unset();
	session_destroy();
	header("location:login.php");
}


?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 </head>
 <body>
 	<?php echo "User Name: ".$_SESSION['logged_in']; ?>
 	<form action="" method="POST">
		<input style="color:red" type="submit" onclick="return confirm('Logging Out')" name="logout" value="Log Out">
		<input type="button" value="Registration" onclick="window.location='registration.php';" />
	</form>
 	<!--<a onclick="return confirm('Logging Out')" href="login.php" >Log Out</a> 
 	<a href="registration.php" >Registration</a>-->

 	<form action="" method="POST" style="background-color: pink">
 		<br>
 		<label>Product Title:</label>
 		<input type="text" name="productTitle" placeholder="Title" ><br><br>
 		<label>Product Description:</label>
 		<input type="text" name="description" placeholder="Description"><br><br>
 		<label>Weight:</label>
 		<label for="a">one_Kg</label>
 		<input type="radio" id='a' name="weight" value="1">
 		<label for="b">Five_Kg</label>
 		<input type="radio" id='b' name="weight" value="5">
 		<label for="c">Ten_Kg</label>
 		<input type="radio" id='c' name="weight" value="10"><br>

 		<input type="submit" name="submit" value="Insert"><br>
 	</form>
 	<br>
	<hr>
 	<table style="width:100%; background-color: skyblue" border="2">
 		<caption>Dashboard</caption>
 		<thead>
 			<tr>
 				<th>Product Id</th>
 				<th>Title</th>
 				<th>Description</th>
 				<th>Weight</th>
 				<th>Edit</th>
 				<th>Delete</th>
 				<th>Mark As Done</th>
 			</tr>
 		</thead>
 		<?php foreach($holdDashboardData as $getData){ ?>
 		<tbody>
 			<tr>
 				<td><?php echo $getData['productId'] ?></td>
 				<td><?php echo $getData['productTitle'] ?></td>
 				<td><?php echo $getData['description'] ?></td>
 				<td><?php echo $getData['weight'] ?></td>
 				<td><a href="edit.php?productId=<?php echo $getData['productId'];?>">edit</a></td>
 				<td><a onclick="return confirm('are you sure?')" href="delete.php?productId=<?php echo $getData['productId']; ?>">Delete</a></td>
 				<td><input type="button" value="Done" onclick="window.location='doneTask.php?productId=<?php echo $getData['productId']; ?>'" /></td>
 			</tr>
 		</tbody>
 		<?php } ?>
 	</table>
	<!-- Search Area-->
 	<hr>
 	<form action="" method="POST">
		<input type="text" name="search">
		<input style="color:blue" type="submit" name="src" value="search">
	</form>
	<br>
	<input type="button" value="Task Done List" onclick="window.location='taskDoneList.php';" />
 </body>
 </html>