<?php
	include 'connection.php';
	
	$query = 'DELETE FROM realtimesuhu WHERE id = 0 ';
	
	$result = mysqli_query($link, $query);
	
	if($result)
		header('Location: ../pages/grafik/grf_suhu.php');
	else
		echo 'Gagal Menghapus Data';
?>