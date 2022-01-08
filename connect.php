<?php
	$hostName = 'localhost';
	$userName = 'root';
	$passWord = '';
	$databaseName = 'shop';
	$connect = new mysqli($hostName, $userName, $passWord, $databaseName);
	
	if($connect -> connect_error){
		echo 'Khong the ket noi database';
	}else{
		$connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
		session_start();
	}
?>