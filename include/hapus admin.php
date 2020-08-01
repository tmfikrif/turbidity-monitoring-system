<?php
	include 'connection.php';
	
	$query = 'DELETE FROM admin WHERE waktu = "'.$_GET['id'].'"';
	
	$result = mysqli_query($link, $query);
	
	if($result)
		header('Location: ../index.php');
	else
		echo 'Gagal Menghapus Data';
?>