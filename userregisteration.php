
<?php
	session_start();
	include 'includes/conn.php';
	
if(isset($_POST['register']))
		{	
		//insert data to the table
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$Lastname = $_POST['lastname'];
			$voters_id = $_POST['voters_id'];
			$sex = $_POST['sex'];
			$date = $_POST['date'];
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$filename = $_FILES['photo']['name'];
			if(!empty($filename))
			{
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
			}

			$sql="INSERT INTO  voters (firstname, middlename, lastname,voters_id,sex,date,password) VALUES ('$firstname','$middlename', '$lastname', '$voters_id','$sex','$date','$password')";
				if($conn->query($sql)===true)
				{
					
					echo "<script>alert('USER REGISTERD SUCSSESFULLY');</script>";
				}
				else {
					echo "<script>alert('Error');</script>";
				}
				header('location:index2.php');
			$firstname = "";
			$middlename = "";
			$Lastname = "";
			$voters_id = "";
			$sex = "";
			$date = "";
			$password = "";
			$filename="";

}

?>


<!DOCTYPE html>
<html>

	<head>
	
		<title>Voter Registration</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="dist/CSS/portable.css">
	</head>
	
	<body>
		<div class="main col-6 col-s-9">
			
				
					<form method="POST" class="all">
						<center>
						<h1>voter Registration</h1>
                                            
							<input type="text" name="firstname" placeholder="firstname" required>
							<input type="text" name="middlename" placeholder="middlename" required>
							<input type="text" name="lastname" placeholder="lastname" required>
							<input type="text" name="voters_id" placeholder="voters_id" required>
							<input type="text" name="sex" placeholder="sex" required>
							<input type="date" name="date" placeholder="date" required>
							<input type="file" id="photo" name="photo" placeholder="image" required>
							<input type="password" name="password" placeholder="password" required>
							<input type="submit" class="register" name="register" value="Register">
							<a href='index.php'><b>Login Here</b></a>
						</center>
					</form>
									
									
			
			</div>
		</div>

		</div>

	</body>
</html>