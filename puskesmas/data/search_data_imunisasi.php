<!DOCTYPE HTML>
<html>
<head>
	<title>Search</title>
</head>
<?php require_once('../../Connections/koneksi.php'); ?>
<body>
	<h2 align="center"> Data Imunisasi </h2>
	<form action="result_data_imunisasi.php" method="get">
		
		<input name="namaimunisasi" type="search" placeholder="Nama Imunisasi"> <input name="tgl" type="date" placeholder="Tanggal"> <input name="idjenisimunisasi" type="search" placeholder="Nama Jenis Imunisasi"> <input name="anak" type="search" placeholder="Nama Anak"> <input name="ibu" type="search" placeholder="ibu">
		<input type="submit" value="Search">
	</form>
</body>
</html>