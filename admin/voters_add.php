<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$Lastname = $_POST['lastname'];
		$voters_id = $_POST['voters_id'];
		$sex = $_POST['sex'];
		$date = $_POST['date'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//generate voters id
		

		$sql = "INSERT INTO voters (firstname, middlename, lastname,voters_id,sex,date,photo,password) VALUES ('$firstname','$middlename', '$lastname', '$voters_id','$sex','$date','$filename','$password')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>