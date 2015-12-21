<h1 align="center">Laporan Data Keluarga Berencana</h1>
	<table border="1" width="100%">
		<tr>
			<td align="center"><b>No</td>
			<td align="center"><b>Nama Ayah</td>
			<td align="center"><b>Nama Ibu</td>
			<td align="center"><b>Tanggal KB</td>
			<td align="center"><b>Keterangan</td>
			<td align="center"><b>Nama Jenis KB</td>
			
		</tr>

<?php 
	$jenis = @$_POST['jenis_kb'];
	$tgl = @$_POST['tgl'];
	$ayah = @$_POST['nama_ayah'];
	$ibu = @$_POST['nama_ibu'];
		require_once('../../Connections/koneksi.php'); 
		
		$sql = "select* from tabel_kb as a, tabel_jenis_kb as b, tabel_ayah as c, tabel_ibu as d where a.id_jenis_kb=b.id_jenis_kb and a.id_ayah=c.id_ayah and a.id_ibu=d.id_ibu and a.tanggla_kb Like '%$tgl%' and c.nama_ayah like '%$ayah%' and d.nama_ibu like '%$ibu%' and b.nama_jenis_kb like '%$jenis%'" ;
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