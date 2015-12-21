<h1 align="center">Laporan Ibu Melahirkan</h1>
<table border="1" width="100%">
		<tr>
			<td align="center"><b>No</td>
			<td align="center"><b>Nama Ayah</td>
			<td align="center"><b>Nama Ibu</td>
			<td align="center"><b>Nama Anak</td>
			
			<td align="center"><b>Jenis Kelamin</td>
			<td align="center"><b>Golongan Darah</td>
			<td align="center"><b>Tanggal Melahirkan</td>
			
		</tr>

<?php 
	$anak = @$_POST['nama_anak'];
	$ayah = @$_POST['nama_ayah'];
	$ibu = @$_POST['nama_ibu'];
	$tgl = @$_POST['tgl'];
		require_once('../../Connections/koneksi.php'); 
		
		$sql = "select a.nama_anak,b.tanggal_melahirkan, a.jenis_kelamin, a.gol_darah, c.nama_ayah, d.nama_ibu from tabel_anak a, tabel_melahirkan as b, tabel_ayah as c, tabel_ibu as d where a.id_ibu=d.id_ibu and a.id_ayah=c.id_ayah and a.id_anak=b.id_anak " ;
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
			
			
			<td align="center"><?php echo $row['jenis_kelamin'];?></td>
			<td align="center"><?php echo $row['gol_darah'];?></td>
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