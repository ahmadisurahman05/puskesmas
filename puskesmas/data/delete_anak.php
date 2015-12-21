<?php
include"../../Connections/koneksi.php";
$id=$_GET['id'];


$hapus=mysql_query("delete from tabel_anak where id_anak='$id' ");
if($hapus)
{
echo '<script language="javascript">
				alert("Data Berhasil Dihapus");
				</script>';
				}
else
{echo '<script language="javascript">
				alert("Data Gagal berhasil Dihapus");
				history.back();
				</script>';}
?>
