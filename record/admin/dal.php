<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `time`") or die(mysqli_error());
	header('location: record.php');
    