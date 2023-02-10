<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `out`") or die(mysqli_error());
	header('location: out.php');
    