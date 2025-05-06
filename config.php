<?php 

	$conn = new mysqli("localhost", "root", "", "projektmunka");
	
	if($conn->connect_error){
		die("Sikertelen kapcsolódás! ".$conn->connect_error);
	}

?>