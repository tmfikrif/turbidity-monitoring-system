<?php
	include 'connection.php';
	
	$query = 'INSERT INTO admin (username, password,email, jabatan, foto) VALUES ("'.$_POST['u'].'", "'.md5($_POST['p']).'", "'.$_POST['e'].'", "'.$_POST['j'].'", "'.$_POST['f'].'")';
	
	$result = mysqli_query($link, $query);
	
	if($result)
		header('Location: ../index.php');
	else
		echo 'Gagal';
?>