<!DOCTYPE html>
<?php include 'db.php'; 

$id = $_GET['id'];
$sql = "SELECT * FROM tasks where id='$id' ";
$rows = $con->query($sql);
$row= $rows->fetch_assoc();
if(isset($_POST['send'])){
	$task= $_POST['task'];
	$sql2="update tasks set name='$task' where id='$id' ";
	$con->query($sql2);
	header('location: index.php');
}

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>todoList</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
		<div class="container">
			<center><h1>Update List</h1></center>
			<hr>
	
	        <form method="post">
	        	<div class="form-group">
	        		<label>Task Name</label>
	        		<input type="text" name="task" required value="<?php echo $row['name'];?>" class="form-control">
	        	</div>
	        	<input type="submit" name="send" value="Update Task" class="btn btn-success">&nbsp;
	        	<a href="index.php" class="btn btn-warning">Back</a>
	        </form>
			</div>
		</div>
</body>
</html>