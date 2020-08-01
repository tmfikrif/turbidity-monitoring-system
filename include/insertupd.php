<?php
	include 'connection.php';
	
	$query = 'INSERT INTO realtime (ntu,adc) VALUES ("'.$_GET['ntu'].'", "'.$_GET['adc'].'")';
	
	$result = mysqli_query($link, $query);
	
	if($result)
		header('Location: insertupd.php');
	else
	echo 'Insert Failed';
?>