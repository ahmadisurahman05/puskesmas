<?php require_once('../../Connections/koneksi.php'); ?>
<?php 
$hostname_koneksi = "localhost";
$database_koneksi = "bidan";
$username_koneksi = "root";
$password_koneksi = "";
$koneksi = mysql_pconnect($hostname_koneksi, $username_koneksi, $password_koneksi) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php 
$anak = $_POST['anak'];
$umur = $_POST['umur'];
$id_ibu = $_POST['ibu'];
$tanggal = $_POST['tanggal'];
$imunisasi = $_POST['imunisasi'];

if($anak==null or $id_ibu=null or $tanggal=null or $imunisasi=null or $umur==null)
{
	echo '<script language="javascript">
					alert("Harap isi semua data");
					history.back();
					</script>';
}

else
{				
	$result=mysql_query("INSERT INTO `bidan`.`tabel_imunisasi` (`id_anak`, `umur_anak`, `id_ibu`, `tanggal_imunisasi`, `id_jenis_imunisasi`) VALUES 
	('$_POST[anak]', '$_POST[umur]', '$_POST[ibu]','$_POST[tanggal]','$_POST[imunisasi]');");
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