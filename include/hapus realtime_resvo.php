<?php
	include 'connection.php';
	
	$query = 'DELETE FROM reservoir_realtime WHERE id = 0 ';
	
	$result = mysqli_query($link, $query);
	
	if($result)
		header('Location: ../pages/grafik/grf_turbidity.php');
	else
		echo 'Gagal Menghapus Data';
?>