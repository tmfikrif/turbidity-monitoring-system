<?php
	include 'connection.php';
	
	$query = 'INSERT INTO monitoring (ntu,adc,status) VALUES ("'.$_GET['ntu'].'", "'.$_GET['adc'].'", "'.$_GET['status'].'")';
	
	$result = mysqli_query($link, $query);
	
	if($result)
		header('Location: insert.php');
	else
	echo 'Insert Failed';
?>