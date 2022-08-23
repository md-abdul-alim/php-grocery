<?php 

include 'Connection.php';
$conn=new Connection;

$getDeleteId=$_GET['productId'];
$conn->getAll("DELETE FROM task_list WHERE productId=$getDeleteId");
header("location:index.php");

?>