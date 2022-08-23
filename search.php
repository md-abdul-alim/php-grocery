<?php 
include 'Connection.php';
$conn=new Connection;

$getproductTitle=$_GET['productTitle'];
$holdDashboardData=$conn->getAll("SELECT * FROM task_list WHERE productTitle LIKE '%$getproductTitle%'");

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Searching Page</title>
 </head>
 <body>
 	
	<hr>
 	<table style="width:100%" border="2">
 		<caption>Dashboard</caption>
 		<thead>
 			<tr>
 				<th>Product Id</th>
 				<th>Title</th>
 				<th>Description</th>
 				<th>Weight</th>
 				<th>Edit</th>
 				<th>Delete</th>
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
 				<td><a onclick="return confirm('are you sure?')" href="delete.php?productId=<?php echo $getData['productId']; ?>" title="Delete Page">Delete</a></td>
 			</tr>
 		</tbody>
 		<?php } ?>
 	</table>
 	<hr>


 </body>
 </html>