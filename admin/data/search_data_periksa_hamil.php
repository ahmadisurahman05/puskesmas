<!DOCTYPE HTML>
<html>
<head>
	<title>Search</title>
</head>
<?php require_once('../../Connections/koneksi.php'); ?>
<body>
	<h2 align="center"> Data Periksa Ibu Hamil</h2>
	<form action="result_data_ibu_periksa_hamil.php" method="post">
		
		<input name="nama_ayah" type="search" placeholder="Nama Ayah"> <input name="nama_ibu" type="search" placeholder="Nama Ibu"> <input name="tgl" type="date" placeholder="Tanggal"> 
		<input type="submit" value="Search">
	</form>
</body>
</html>