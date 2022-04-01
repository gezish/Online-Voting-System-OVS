<?php
	$conn = new mysqli('localhost', 'root', 'password', 'votesystem');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>