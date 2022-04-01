<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$Lastname = $_POST['lastname'];
	        $username = $_POST['username'];
		$sex = $_POST['sex'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//generate voters id
		

		$sql = "INSERT INTO admin (firstname, middlename, lastname,username,sex,photo,password) VALUES ('$firstname','$middlename', '$lastname','$username','$sex','$filename','$password')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'admin added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: adminaccount.php');
?>