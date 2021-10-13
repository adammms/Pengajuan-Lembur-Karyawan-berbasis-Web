<?php
	include 'config/koneksi.php';
		$inc = $_GET['inc'];
		$status = $_GET['status'];

	include 'config/koneksi.php';
		$sql ="UPDATE suratjalan SET status = $status WHERE inc = $inc";
		mysql_query($sql);
		header("Location:master.php?hal=approval-lembur-spv");
?>