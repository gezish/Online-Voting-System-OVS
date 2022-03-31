<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $voters_id=$_POST['voters_id'];
$id=$_POST['id'];
$newpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
  $sql ="SELECT voters_id FROM voters WHERE id=:id and voters_id =:voters_id ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':voters_id ', $voters_id , PDO::PARAM_STR);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update voters set Password=:newpassword where id=:id and voters_id =:voters_id";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':voters_id', $voters_id, PDO::PARAM_STR);
$chngpwd1-> bindParam(':id', $id, PDO::PARAM_STR);
$chngpwd1-> bindParam(':password', $password, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('voters_id or id no is invalid');</script>"; 
}
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>online voting system System||Forgot Password Page</title>

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!--clock init-->
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head> 
<body>
	<div class="error_page">

		<div class="error-top">
			<h2 class="inner-tittle page">OVS voter</h2>
			<div class="login">
				
				<div class="buttons login">
					<h3 class="inner-tittle t-inner" style="color: lightblue">Forgot Password</h3>
				</div>
				<form id="login" method="post" name="chngpwd" onSubmit="return valid();"> 

					<input type="text" class="text" value="voters_id" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'voters_id';}" name="voters_id" required="true">
					<input type="text" class="text" value="id" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'voters_id';}" required="true" name="id" maxlength="10" pattern="[0-9]+">
					<input type="password" value="New Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="newpassword" required="true">
					<input type="password" value="Confirm Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="confirmpassword" required="true">
					<div class="submit"><input type="submit" onclick="myFunction()" value="Reset" name="submit" ></div>
					<div class="clearfix"></div>

					<div class="new">
						<p><a href="index.php">Already have an account</a></p>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>


		</div>


		<!--//login-top-->
	</div>

	<!--//login-->
	<!--footer section start-->
	<div class="footer">
		
		<?php include_once('includes/footer.php');?>
	</div>
	<!--footer section end-->
	<!--/404-->
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>