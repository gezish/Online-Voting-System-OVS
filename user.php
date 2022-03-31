<?php
	include 'includes/session.php';
	$servername="localhost";
	$username="root";
	$password="asd123!@#";
	$dbname="votesystem1";
			
	//create connection
	
	$conn=new mysqli($servername,$username,$password,$dbname);
	
	
	//check connection
	
	if($conn->connect_error){
		die("Connection failed :". $conn->connect_error);
	}
	
if(isset($_POST['register'])){	
		//insert data to the table
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
			$sql="INSERT INTO  voters (firstname, middlename, lastname,voters_id,sex,date,photo,password) VALUES ('$firstname','$middlename', '$lastname', '$voters_id','$sex','$date','$filename','$password')";
		if($conn->query($sql)){
			$_SESSION['true'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
			$firstname = "";
			$middlename = "";
			$Lastname = "";
			$voters_id = "";
			$sex = "";
			$date = "";
			$password = "";
			$photo = "";

}

?>


<!DOCTYPE html>
<html>

	<head>
	
		<title>User Registration</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="CSS/portable.css">
	</head>
	
	<body>
		<div class="main col-s-15 col-s-19">
			
				
					<form method="POST" class="all">
						<center>
						<h1>User Registration</h1>
						<div>
                                               		 <label for="firstname" class="all">First Name</label>
							<input type="text" name="firstname" placeholder="firstname" required>
						</div>
						<div>
							<label for="middlename" class="all">Middle Name</label>
							<input type="text" name="middlename" placeholder="middlename" required>
						</div>
						<div>
							<label for="lastname" class="all control-label">Last Name</label>
							<input type="text" name="lastname" placeholder="lastname" required>
						</div>
						<div>
							<label for="voters_id" class="all">Voters Id</label>
							<input type="text" name="voters_id" placeholder="voters_id" required>
						</div
						<div>						
							<label for="sex" class="all">Gender</label>
							<input type="text" name="sex" placeholder="sex" required>
						</div>
						<div>
							<label for="date" class="all">Date</label>
							<input type="date" name="date" placeholder="date" required>
						</div>
						<div>
							<label for="passoword" class="all">password</label>
							<input type="password" name="password" placeholder="password" required>
						</div>
						<div>
                 				  	 <label for="photo" class="all">Photo</label>
                     				  	 <input type="file" id="photo" name="photo">
               					 </div>
						<input type="submit" class="register" name="register" value="Register">
						</center>
					</form>
									
									
			
			</div>
		</div>
		
		
		
		




		<!--------------------------Footer Part-------------------------------------------------------------------->
		<hr class="headfoot">
		<div class="footer">
		
			&copy Admas University
		
		</div>

	</body>
</html>