<?php
	include 'connection.php';
	
	$query = 'INSERT INTO monitoringsuhu (celcius,adc,status) VALUES ("'.$_GET['celcius'].'", "'.$_GET['adc'].'", "'.$_GET['status'].'")';
	
	$result = mysqli_query($link, $query);
	
	if($result)
		header('Location: insertsuhu.php');
	else
	echo 'Insert Failed';
?>