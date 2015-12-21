<h1 align="center">Laporan Ibu Periksa Hamil</h1>
<table border="1" width="100%">
		<tr>
			<td align="center"><b>No</td>
			<td align="center"><b>Nama Ayah</td>
			<td align="center"><b>Nama Ibu</td>
			<td align="center"><b>Tanggal Periksa</td>
			<td align="center"><b>Keterangan</td>
			
		</tr>

<?php 
	$ayah = $_POST['nama_ayah'];
	$ibu = $_POST['nama_ibu'];
	$tgl = $_POST['tgl'];
	
		require_once('../../Connections/koneksi.php'); 
		
		$sql = "select* from tabel_periksa_ibu_hamil as a, tabel_ayah as c, tabel_ibu as d where 
		a.id_ibu=d.id_ibu and a.id_ayah=c.id_ayah  and c.nama_ayah like '%$ayah%' and d.nama_ibu like '%$ibu%' and a.Tanggal_periksa like '%$tgl%'" ;
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