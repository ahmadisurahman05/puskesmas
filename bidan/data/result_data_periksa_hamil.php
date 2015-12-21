<!DOCTYPE html>
<html>
</head>

<body>
<?php include "search_data_imunisasi.php";?>
</br>
	<table border="1" width="100%">
		<tr>
			<td align="center"><b>No</td>
			<td align="center"><b>Id Kartu</td>
			<td align="center"><b>Nama Jenis Imunisasi</td>
			<td align="center"><b>Id KIA</td>
			<td align="center"><b>Tanggal Imunisasi</td>
			<td align="center"><b>Id Imunisasi</td>
			<td align="center"><b>Nama Anak</td>
			<td align="center"><b>Nama Ibu</td>
		</tr>

<?php 
		require_once('../../Connections/koneksi.php');
		$idkartu = @$_GET['jenis_periksa'];
		$idimunisasi = @$_GET['jenis_periksa'];
		$idkia = @$_GET['jenis_periksa'];
		$idjenisimunisasi = @$_GET['jenis_periksa'];
		$tgl = @$_GET['jenis_periksa'];
		$anak = @$_GET['jenis_periksa'];
		$ibu = @$_GET['jenis_periksa'];
		$sql = "SELECT a.`nama_jenis_imunisasi` , b.`tanggal_imunisasi` ,  `id_imunisasi` , c.`nama_anak` , d.`nama_ibu` , e.`id_kartu` , f.`id_kia`  
		FROM tabel_jenis_imunisasi AS a, tabel_imunisasi AS b, tabel_anak AS c, tabel_ibu AS d, tabel_kartu_anggota AS e, tabel_kia AS f
		WHERE b.id_jenis_imunisasi = a.id_jenis_imunisasi
		AND b.id_anak = c.id_anak
		AND b.id_ibu = d.id_ibu
		AND b.id_kartu = e.id_kartu
		AND b.id_kia = f.id_kia";
	$hasil=mysql_query($sql)or die (mysql_error());

	$data = mysql_num_rows($hasil);
	$no=0;
	$no++;
	if ($data!=null)
	{
	while($row=mysql_fetch_array($hasil))
		{

	?>
		<tr>
		
			<td align="center"><?php echo $no++;?></td>
			<td align="center"><?php echo $row['id_kartu'];?></td>
			<td align="center"><?php echo $row['nama_jenis_imunisasi'];?></td>
			<td align="center"><?php echo $row['id_kartu'];?></td>
			<td align="center"><?php echo $row['tanggal_imunisasi'];?></td>
			<td align="center"><?php echo $row['id_imunisasi'];?></td>
			<td align="center"><?php echo $row['nama_anak'];?></td>
			<td align="center"><?php echo $row['nama_ibu'];?></td>
		<tr>	
		
			
	<?php
		}
	}		
	else
	{?>
		<script language="javascript">
		alert("Data Tidak Ditemukan");
		history.back();
		</Script>
		<?php
	}
	
?>	
</table>
</body>
</html>