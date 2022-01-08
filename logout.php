<?php
	include 'connect.php';
	
	unset($_SESSION['user']);
	header('Location: index.php');
?>