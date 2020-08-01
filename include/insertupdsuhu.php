<?php
	include 'connection.php';
	
	$query = 'INSERT INTO realtimesuhu (celcius,adc) VALUES ("'.$_GET['celcius'].'", "'.$_GET['adc'].'")';
	
	$result = mysqli_query($link, $query);
	
	if($result)
		header('Location: insertupdsuhu.php');
	else
	echo 'Insert Failed';
?>