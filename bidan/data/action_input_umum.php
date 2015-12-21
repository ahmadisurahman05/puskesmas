<?php require_once('../../Connections/koneksi.php'); ?>
<?php 
$nama_penyakit = @$_POST['nama_penyakit'];
$nama = @$_POST['nama'];
$umur = @$_POST['umur'];
$umur = @$_POST['jenis_kelamin'];
$tanggal = @$_POST['tanggal'];
$alamat = @$_POST['alamat'];
$ket = @$_POST['ket'];

if($nama_penyakit==null or $nama=null or $umur=null or $tanggal=null or $alamat=null or $ket=null)
{
	echo '<script language="javascript">
					alert("Harap isi semua data");
					history.back();
					</script>';
}

else
{				
	$result=mysql_query("INSERT INTO `bidan`.`tabel_umum` (`jenis_penyakit`, `nama`, `umur`, `jenis_kelamin`, `tanggal_periksa`, `alamat`, `ket`) 
	VALUES ('$_POST[nama_penyakit]', '$_POST[nama]', '$_POST[umur]', '$_POST[jenis_kelamin]', '$_POST[tanggal]', '$_POST[alamat]', '$_POST[ket]');");
	if($result)
	{
	echo '<script language="javascript">
					alert("Data Berhasil Disimpan");
					</script>';
					}
	else
	{echo '<script language="javascript">
					alert("Data Gagal Simpan");
					history.back();
					</script>';}
}
			
?>