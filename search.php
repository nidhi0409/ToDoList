<!DOCTYPE html>
<?php include 'db.php'; 

if(isset($_POST['search'])){

$name= htmlspecialchars($_POST['search']);
$sql = "select * from tasks where name like '%$name%' ";

$rows = $con->query($sql);

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
			<center><h1>To Do List</h1></center>
			
			<button type="button" class="btn btn-success" data-target="#myModal" data-toggle="modal">Add Task</button>
			<button type="button" class="btn pull-right" onclick="print()">Print</button>
			<hr>
			<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Add Task</h4>
	      </div>
	      <div class="modal-body">
	        <form method="post" action="add.php">
	        	<div class="form-group">
	        		<label>Task Name</label>
	        		<input type="text" name="task" required class="form-control">
	        	</div>
	        	<input type="submit" name="send" value="Add Task" class="btn btn-success">
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	<div class="col-md-12 text-center">
		<p>Search</p>
		<form action="search.php" method="post" class="form-group">
			<input type="text" name="search" class="form-control" placeholder="Search">
		</form>
	</div>

	<?php if(mysqli_num_rows($rows)<0): ?>
		<h2 class="text-danger text-center">Nothing Found</h2>
		<a href="index.php" class="btn btn-warning">Back</a>
	<?php else: ?>


	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Task</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	    <?php while($row=$rows->fetch_assoc()):?>

	       
	      <th><?php echo $row['id'] ?></th>
	      <td class="col-md-10"><?php echo $row['name'] ?></td>
	      <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
	      <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
	    </tr>
	    <?php endwhile; ?>
	  </tbody>
	</table>
<?php endif; ?>
			</div>
		</div>
</body>
</html>