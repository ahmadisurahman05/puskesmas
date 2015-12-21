<h1 align="center">Laporan Data Umum</h1>
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
			
		</tr>

<?php 
	$nama = @$_POST['nama'];
	$jenis = @$_POST['jenis'];
	$tgl = @$_POST['tgl'];
		require_once('../../Connections/koneksi.php'); 
		
		$sql = "select * from tabel_umum where jenis_penyakit like '%$jenis%' and nama like '%$nama%' and tanggal_periksa like '%$tgl%'" ;
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