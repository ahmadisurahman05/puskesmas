<!DOCTYPE html>
<html>
</head>

<body>
<?php include "search_data_KB.php";?>
</br>
	<table border="1" width="100%">
		<tr>
			<td align="center"><b>No</td>
			<td align="center"><b>Nama Ayah</td>
			<td align="center"><b>Nama Ibu</td>
			<td align="center"><b>Tanggal KB</td>
			<td align="center"><b>Keterangan</td>
			<td align="center"><b>Nama Jenis KB</td>
            <td align="center"><b>Action</td>
			
		</tr>

<?php 
	$jenis = @$_POST['jenis_kb'];
	$tgla = @$_POST['tgl_awal'];
	$tglb = @$_POST['tgl_akhir'];
	$ayah = @$_POST['nama_ayah'];
	$ibu = @$_POST['nama_ibu'];
		require_once('../../Connections/koneksi.php'); 
		
		$sql = "select* from tabel_kb as a, tabel_jenis_kb as b, tabel_ayah as c, tabel_ibu as d where a.id_jenis_kb=b.id_jenis_kb and a.id_ayah=c.id_ayah and a.id_ibu=d.id_ibu and c.nama_ayah like '%$ayah%' and d.nama_ibu like '%$ibu%' and b.nama_jenis_kb like '%$jenis%' and a.tanggla_kb BETWEEN '$tgla' and '$tglb'" ;
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
			
			<td align="center"><?php echo $row['nama_ayah'];?></td>
			<td align="center"><?php echo $row['nama_ibu'];?></td>
			<td align="center"><?php echo $row['tanggla_kb'];?></td>
			<td><?php echo $row['ket'];?></td>
			<td><?php echo $row['nama_jenis_kb'];?></td>
            <td> <i> <center><a href="update_kb.php?id_KB=<?php echo $row['id_KB'];?>"> Update </a> </i> || <i> <a href="delete_kb.php?id_KB=<?php echo $row['id_KB'];?>"> Hapus </a> </i> || <i> <a href="cetak_kb.php?id_KB=<?php echo $row['id_KB'];?>" onClick="w = window.open(this.href);w.print();return false;"> Print </a> </i></center></td>
		<tr>	
		
			
	<?php
		}
	}		
	
	
?>	
</table>
</br>
<a href="report_data_kb.php" onClick="w = window.open(this.href);w.print();return false;">Cetak Laporan</a>
</body>
</html>