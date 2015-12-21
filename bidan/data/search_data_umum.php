<!DOCTYPE HTML>
<html>
<head>
	<title>Search</title>
</head>
<?php require_once('../../Connections/koneksi.php'); ?>
<body>
	<h2 align="center"> Data Umum</h2>
	<form action="result_data_umum.php" method="post">
		
		<input name="jenis" type="search" placeholder="Jenis Penyakit"> 
		<input name="tgl_awal" type="date" required>
				<input name="tgl_akhir" type="date" required>
		<input name="nama" type="search" placeholder="Nama">
		<input type="submit" value="Search">
	</form>
</body>
</html>