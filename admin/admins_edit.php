<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$sex = $_POST['sex'];
		$created_on = $_POST['created_on'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		if($password == $row['password']){
			$password = $row['password'];
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
		}

		$sql = "UPDATE admin SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname',username='$username', sex = '$sex', created_on = '$created_on', password = '$password' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'admin updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: adminaccount.php');

?>