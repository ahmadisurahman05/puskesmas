<!DOCTYPE html>
<html>
</head>

<body>

<?php include "search_data_melahirkan.php";?>
</br>
	<table border="1" width="100%">
		<tr>
			<td align="center"><b>No</td>
			<td align="center"><b>Nama Ayah</td>
			<td align="center"><b>Nama Ibu</td>
			<td align="center"><b>Nama Anak</td>
			<td align="center"><b>Tanggal Melahirkan</td>
			
		</tr>

<?php 
	$anak = $_POST['nama_anak'];
	$ayah = $_POST['nama_ayah'];
	$ibu = $_POST['nama_ibu'];
	$tgl = $_POST['tgl'];
		require_once('../../Connections/koneksi.php'); 
		
		$sql = "select* from tabel_anak a, tabel_melahirkan as b, tabel_ayah as c, tabel_ibu as d where 
		a.id_ibu=d.id_ibu and a.id_ayah=c.id_ayah and a.id_anak=b.id_anak and a.nama_anak like '%$anak%' and c.nama_ayah like '%$ayah%' and d.nama_ibu like '%$ibu%' and b.tanggal_melahirkan like '%$tgl%'" ;
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
			<td align="center"><?php echo $row['nama_anak'];?></td>
			<td align="center"><?php echo $row['tanggal_melahirkan'];?></td>
			
			
			
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
<a href="report_ibu_melahirkan.php" onClick="w = window.open(this.href);w.print();return false;">Cetak Laporan</a>
</body>
</html>