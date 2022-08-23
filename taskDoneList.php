<?php 

include 'Connection.php';
$conn=new Connection;


$holdDoneTaskListData=$conn->getAll("SELECT * FROM task_list_done");

if(isset($_POST['clear']))
{
	$conn->getAll("DELETE FROM task_list_done");
	header("location:taskDoneList.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Task Done List</title>
</head>
<body>
	<a href="index.php" title="">Back</a><br>
	<table style="width:100%" border="2">
 		<caption>Dashboard</caption>
 		<thead>
 			<tr>
 				<th>Product Id</th>
 				<th>Title</th>
 				<th>Description</th>
 				<th>Weight</th>
 			</tr>
 		</thead>
 		<?php foreach($holdDoneTaskListData as $getData){ ?>
 		<tbody>
 			<tr>
 				<td><?php echo $getData['productId'] ?></td>
 				<td><?php echo $getData['productTitle'] ?></td>
 				<td><?php echo $getData['description'] ?></td>
 				<td><?php echo $getData['weight'] ?></td>
 			</tr>
 		</tbody>
 		<?php } ?>
 	</table>
 	<hr>
 	<br>
 	<form action="" method="POST">
 		<h1>Clear Dashboard <input type="submit" name="clear" value="Clear" /></h1>
 	</form>
</body>
</html>