<?php 
	session_start(); 
	require_once "connect.php";
	if (!isset($_SESSION['nim']) || !isset($_SESSION['nama']) || !isset($_SESSION['role'])) {
		header("Location: login_admin.php");
		exit;
	}

	if ($_SESSION['role'] != "Super Admin") {
		header("Location: admin.php");
		exit;
	}

	if (!isset($_GET['admin_nim'])) {
		header("Location: admin.php");
		exit;
	}

	$admin_nim = (string)$_GET['admin_nim'];
	echo mysqli_real_escape_string($admin_nim);
	exit;
	mysqli_query($connection, "DELETE FROM admin WHERE nim='".mysqli_real_escape_string($_GET['admin_nim'])."'");
	header("Location: admin_list.php");
?>