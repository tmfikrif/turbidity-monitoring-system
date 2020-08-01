<?php 
	include 'connection.php';
	session_start();
	extract($_POST); 

	$query = 'SELECT * from admin where email="'.$e.'" and password="'.md5($password).'"';

	$result = mysqli_query($link,$query);
	if (mysqli_num_rows($result) != 0){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header('Location: ../index.php');
	} else 
	

	header('Location: ../pages/login.php');

	
 ?>
