<?php 
include 'Connection.php';
$conn=new Connection;

$getProductId=$_GET['productId'];
$holdThatProduct=$conn->getAll("SELECT * FROM task_list WHERE productId=$getProductId");

//update job
if(isset($_POST['update']))
{
	$description=$_POST['description'];
	$weight=$_POST['weight'];
	$holdArrayData=array(':description'=>$description,':weight'=>$weight);
	$conn->update("UPDATE task_list SET description=:description,weight=:weight WHERE productId=$getProductId",$holdArrayData);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Page</title>
</head>
<body>
	<form action="" method="POST">
		<?php foreach($holdThatProduct as $getData){ ?>
			<a href="index.php" title="">Back</a><br>
			<label>Product Id:<?php echo $getData['productId']; ?></label><br><br>
			<label>Description:<input type="text" name="description" value="<?php echo $getData['description'];?>"></label>
			<label>Weight:<input type="text" name="weight" value="<?php echo $getData['weight'];?>"></label><br><br>
			<input  type="submit" name="update" value="Update">
		<?php } ?>
	</form>
</body>
</html>