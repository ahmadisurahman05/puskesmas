<?php require_once('../../Connections/koneksi.php'); ?>
<?php 
$ayah = @$_POST['ayah'];
$ibu = @$_POST['ibu'];
$anak = @$_POST['anak'];
$tanggal = @$_POST['tanggal'];
$ket = @$_POST['ket'];

if($ayah==null or $ibu=null or $tanggal=null or $ket=null or $anak=null)
{
	echo '<script language="javascript">
					alert("Harap isi semua data");
					history.back();
					</script>';
}

else
{				
	$result=mysql_query("INSERT INTO `bidan`.`tabel_melahirkan` (`id_ibu`, `id_ayah`, `id_anak`, `tanggal_melahirkan`, `ket`) VALUES 
	('$_POST[ibu]', '$_POST[ayah]','$_POST[anak]', '$_POST[tanggal]','$_POST[ket]');");
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