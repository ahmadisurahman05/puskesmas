<!DOCTYPE HTML>
<html>
<head>
	<title>Search</title>
</head>
<?php require_once('../../Connections/koneksi.php'); ?>
<body>
	<h2 align="center"> Data Imunisasi </h2>
	<form action="result_data_anak.php" method="post">
		
		<input name="nama" type="search" placeholder="Nama Anak"> <input name="tgl" type="date" placeholder="Tanggal">  <input name="ibu" type="search" placeholder="Nama Ibu"> 
		
		<input type="submit" value="Search">
	</form>
</body>
</html>