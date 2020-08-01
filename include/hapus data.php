<?php
	include 'connection.php';
	
	$query = 'DELETE  monitoring , reservoir FROM monitoring INNER JOIN reservoir ON monitoring.id = reservoir.id WHERE monitoring.id = "'.$_GET['id'].'"';
	
	$result = mysqli_query($link, $query);
	
	if($result)
		
		header('Location: ../pages/tabel/tbl_turbidity.php');
	else
		echo 'Gagal Menghapus Data';
?>