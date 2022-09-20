<?php
include 'db.php';

if (isset($_POST['send'])) {
	$name= $_POST['task'];
	$sql= "insert into tasks (name) values ('$name')";
	$val=$con->query($sql);
	if($val){
		header('location: index.php');
	}
}

?>