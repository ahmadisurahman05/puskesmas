<!DOCTYPE html>
<html>
</head>

<body>
<?php include "search_data_umum.php";?>
</br>
	<table border="1" width="100%">
		<tr>
			<td align="center"><b>No</td>
			<td align="center"><b>Nama</td>
			<td align="center"><b>Nama Penyakit</td>
			<td align="center"><b>Umur</td>
			<td align="center"><b>Jenis Kelamin</td>
			<td align="center"><b>Tanggal Periksa</td>
			<td align="center"><b>Alamat</td>
			<td align="center"><b>Keterangan</td>
            <td align="center"><b>Action</td>
			
		</tr>

<?php 
	$nama = @$_POST['nama'];
	$jenis = @$_POST['jenis'];
	$tgla = @$_POST['tgl_awal'];
	$tglb = @$_POST['tgl_akhir'];
		require_once('../../Connections/koneksi.php'); 
		
		$sql = "select * from tabel_umum where jenis_penyakit like '%$jenis%' and nama like '%$nama%' and tanggal_periksa BETWEEN '$tgla' and '$tglb'" ;
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
			
			<td align="center"><?php echo $row['nama'];?></td>
			<td align="center"><?php echo $row['jenis_penyakit'];?></td>
			<td align="center"><?php echo $row['umur'];?></td>
			<td align="center"><?php echo $row['jenis_kelamin'];?></td>
			<td align="center"><?php echo $row['tanggal_periksa'];?></td>
			<td align="center"><?php echo $row['alamat'];?></td>
			<td align="center"><?php echo $row['ket'];?></td>
            <td> <i> <center><a href="update_umum.php?id_umum=<?php echo $row['id_umum'];?>"> Update </a> </i> || <i> <a href="delete_umum.php?id_umum=<?php echo $row['id_umum'];?>"> Hapus </a> </i> || <i> <a href="cetak_umum.php?id_umum=<?php echo $row['id_umum'];?>" onClick="w = window.open(this.href);w.print();return false;"> Print </a> </i></center></td>
		<tr>	
		<tr>	
		
			
	<?php
		}
	}		
	
	
?>	
</table>
</br>
<a href="report_data_umum.php" onClick="w = window.open(this.href);w.print();return false;">Cetak Laporan</a>
</body>
</html>