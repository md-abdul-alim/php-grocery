<?php 

include 'Connection.php';
$conn=new Connection;

$getProductId=$_GET['productId'];
$holdDashboardData=$conn->getAll("SELECT * FROM task_list WHERE productId=$getProductId");

foreach($holdDashboardData as $getData){
	$productId=$getData['productId'];
	$productTitle=$getData['productTitle'];
	$description=$getData['description'];
	$weight=$getData['weight'];

	$conn->insertDoneTaskList($productId,$productTitle,$description,$weight);
}


$conn->getAll("DELETE FROM task_list WHERE productId=$productId");
header("location:index.php");

?>
