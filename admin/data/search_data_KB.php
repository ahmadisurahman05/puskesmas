<!DOCTYPE HTML>
<html>
<head>
	<title>Search</title>
</head>
<?php require_once('../../Connections/koneksi.php'); ?>
<body>
	<h2 align="center"> Data KB </h2>
	<form action="result_data_KB.php" method="post">
		
		<input name="jenis_kb" type="search" placeholder="Jenis KB"> <input name="tgl" type="date" placeholder="Tanggal"> <input name="nama_ayah" type="search" placeholder="Nama Ayah"> <input name="nama_ibu" type="search" placeholder="Nama Ibu"> 
		<input type="submit" value="Search">
	</form>
</body>
</html>