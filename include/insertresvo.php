<?php
	include 'connection.php';
	
	$query = 'INSERT INTO reservoir (nturesv,adc) VALUES ("'.$_GET['nturesv'].'", "'.$_GET['adc'].'")';
	
	$result = mysqli_query($link, $query);
	
	if($result)
		header('Location: insertP.php');
	else
	echo 'Insert Failed';
?>