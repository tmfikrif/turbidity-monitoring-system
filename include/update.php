<?php



	include 'connection.php';
	

	$query = 'UPDATE realtime SET ntu = "'.$_GET['ntu'].'",adc="'.$_GET['adc'].'" WHERE id = "1"';
	
	$result = mysqli_query($link, $query);
	
	if($result)
		header('Location: ../index.php');
	else
		echo 'Update Failed';
?>