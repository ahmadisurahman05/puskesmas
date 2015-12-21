<!DOCTYPE html>
<html>
</head>

<body>

<?php include "search_data_periksa_hamil.php";?>
</br>
	<table border="1" width="100%">
		<tr>
			<td align="center"><b>No</td>
			<td align="center"><b>Nama Ayah</td>
			<td align="center"><b>Nama Ibu</td>
			<td align="center"><b>Tanggal Periksa</td>
			<td align="center"><b>Keterangan</td>
            <td align="center"><b>Action</td>
			
		</tr>

<?php 
	$ayah = @$_POST['nama_ayah'];
	$ibu = @$_POST['nama_ibu'];
	$tgla = @$_POST['tgl_awal'];
	$tglb = @$_POST['tgl_akhir'];
	
		require_once('../../Connections/koneksi.php'); 
		
		$sql = "select* from tabel_periksa_ibu_hamil as a, tabel_ayah as c, tabel_ibu as d where 
		a.id_ibu=d.id_ibu and a.id_ayah=c.id_ayah  and c.nama_ayah like '%$ayah%' and d.nama_ibu like '%$ibu%' and a.Tanggal_periksa BETWEEN '$tgla' and '$tglb'" ;
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
			<td align="center"><?php echo $row['nama_ayah'];?></td>
			<td align="center"><?php echo $row['nama_ibu'];?></td>
			<td align="center"><?php echo $row['Tanggal_periksa'];?></td>
			<td align="center"><?php echo $row['Ket'];?></td>
            <td> <i> <center><a href="update_ibu_periksa_hamil.php?id_periksa=<?php echo $row['id_periksa'];?>"> Update </a> </i> || <i> <a href="delete_ibu_periksa_hamil.php?id_periksa=<?php echo $row['id_periksa'];?>"> Hapus </a> </i> || <i> <a href="cetak_ibu_periksa_hamil.php?id_periksa=<?php echo $row['id_periksa'];?>" onClick="w = window.open(this.href);w.print();return false;"> Print </a> </i></center></td>
			
		<tr>	
		
			
	<?php
		}
	}		
	
	
?>	
</table>
<br>
<a href="report_data_ibu_periksa_hamil.php" onClick="w = window.open(this.href);w.print();return false;">Cetak Laporan</a>
</body>
</html>