<!DOCTYPE html>
<html>
</head>

<body>
<?php include "search_data_anak.php";?>
</br>
	<table border="1" width="100%">
		<tr>
			<td align="center"><b>No</td>
			<td align="center"><b>Nama Anak</td>
			<td align="center"><b>Umur</td>
			<td align="center"><b>Tanggal Imunisasi</td>
			<td align="center"><b>Jenis Imunisasi</td>
			<td align="center"><b>Nama Ibu</td>
		</tr>
<?php 

	
	$ibu = $_POST['ibu'];
	$tgl = $_POST['tgl'];
	$anak = $_POST['anak'];
	include "../../Connections/koneksi.php";
	$periksa = $_GET['jenis_periksa'];
	$sql = "select* from tabel_imunisasi as a, tabel_jenis_imunisasi as b, tabel_ibu as c, tabel_anak as d where 
			a.id_jenis_imunisasi=b.id_jenis_imunisasi and a.id_ibu=c.id_ibu  and a.id_anak=d.id_anak and a.tanggal_imunisasi like '%$tgl%' and b.nama_jenis_imunisasi like '%$jenis%' and c.nama_ibu like '%$ibu%'" ;
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
			<td><?php echo $no++;?></td>
			<td align="center"><?php echo $row['nama_anak'];?></td>
			<td align="center"><?php echo $row['umur_anak'];?></td>
			<td align="center"><?php echo $row['tanggal_imunisasi'];?></td>
			<td align="center"><?php echo $row['nama_jenis_imunisasi'];?></td>
			<td ><?php echo $row['nama_ibu'];?></td>
			
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
</br>
<a href="report_imunisasi.php" onClick="w = window.open(this.href);w.print();return false;">Cetak Laporan</a>

</body>
</html>