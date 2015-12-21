<?php require_once('../../Connections/koneksi.php'); ?>
<?php 
$id_ayah = @$_POST['ayah'];
$id_ibu = @$_POST['ibu'];
$tanggal = @$_POST['tanggal'];
$ket = @$_POST['ket'];

if($id_ayah==null or $id_ibu=null or $tanggal=null or $ket=null)
{
	echo '<script language="javascript">
					alert("Harap isi semua data");
					history.back();
					</script>';
}

else
{				
	$result=mysql_query("INSERT INTO `bidan`.`tabel_periksa_ibu_hamil` (`id_ibu`, `id_ayah`, `Tanggal_periksa`, `Ket`) VALUES 
	('$_POST[ibu]', '$_POST[ayah]', '$_POST[tanggal]','$_POST[ket]');");
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