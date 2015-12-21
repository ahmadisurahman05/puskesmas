<form action="" method="post" name="input_pasien" id="input_pasien">
  <table width="720" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
      <td width="146">Pilih Provinsi </td>
      <td width="20" align="center">:</td>
      <td width="554">
      <select name="propinsi" id="propinsi">
        <option>--Pilih Provinsi--</option>
        <?php
//mengambil nama-nama propinsi yang ada di database
$propinsi = mysql_query("SELECT * FROM prov ORDER BY nama_prov");
while($p=mysql_fetch_array($propinsi)){
echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
}
?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="text" name="textfield2" id="textfield2"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="text" name="textfield3" id="textfield3"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="text" name="textfield4" id="textfield4"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="text" name="textfield5" id="textfield5"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="text" name="textfield6" id="textfield6"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="text" name="textfield7" id="textfield7"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="text" name="textfield8" id="textfield8"></td>
    </tr>
  </table>
</form>
<?php echo $row_anak['']; ?>
<?php require_once('file:///C|/xampp/htdocs/klinik_bidan/Connections/koneksi.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_koneksi, $koneksi);
$query_anak = "SELECT * FROM tabel_anak";
$anak = mysql_query($query_anak, $koneksi) or die(mysql_error());
$row_anak = mysql_fetch_assoc($anak);
$totalRows_anak = mysql_num_rows($anak);

mysql_select_db($database_koneksi, $koneksi);
$query_ayah = "SELECT * FROM tabel_ayah";
$ayah = mysql_query($query_ayah, $koneksi) or die(mysql_error());
$row_ayah = mysql_fetch_assoc($ayah);
$totalRows_ayah = mysql_num_rows($ayah);

mysql_select_db($database_koneksi, $koneksi);
$query_ibu = "SELECT * FROM tabel_ibu";
$ibu = mysql_query($query_ibu, $koneksi) or die(mysql_error());
$row_ibu = mysql_fetch_assoc($ibu);
$totalRows_ibu = mysql_num_rows($ibu);

mysql_select_db($database_koneksi, $koneksi);
$query_imunisasi = "SELECT * FROM tabel_imunisasi";
$imunisasi = mysql_query($query_imunisasi, $koneksi) or die(mysql_error());
$row_imunisasi = mysql_fetch_assoc($imunisasi);
$totalRows_imunisasi = mysql_num_rows($imunisasi);

mysql_select_db($database_koneksi, $koneksi);
$query_jenis_imunisasi = "SELECT * FROM tabel_jenis_imunisasi";
$jenis_imunisasi = mysql_query($query_jenis_imunisasi, $koneksi) or die(mysql_error());
$row_jenis_imunisasi = mysql_fetch_assoc($jenis_imunisasi);
$totalRows_jenis_imunisasi = mysql_num_rows($jenis_imunisasi);

mysql_select_db($database_koneksi, $koneksi);
$query_jenis_kb = "SELECT * FROM tabel_jenis_kb";
$jenis_kb = mysql_query($query_jenis_kb, $koneksi) or die(mysql_error());
$row_jenis_kb = mysql_fetch_assoc($jenis_kb);
$totalRows_jenis_kb = mysql_num_rows($jenis_kb);

mysql_select_db($database_koneksi, $koneksi);
$query_kartu_anggota = "SELECT * FROM tabel_kartu_anggota";
$kartu_anggota = mysql_query($query_kartu_anggota, $koneksi) or die(mysql_error());
$row_kartu_anggota = mysql_fetch_assoc($kartu_anggota);
$totalRows_kartu_anggota = mysql_num_rows($kartu_anggota);

mysql_select_db($database_koneksi, $koneksi);
$query_kb = "SELECT * FROM tabel_kb";
$kb = mysql_query($query_kb, $koneksi) or die(mysql_error());
$row_kb = mysql_fetch_assoc($kb);
$totalRows_kb = mysql_num_rows($kb);

mysql_select_db($database_koneksi, $koneksi);
$query_kia = "SELECT * FROM tabel_kia";
$kia = mysql_query($query_kia, $koneksi) or die(mysql_error());
$row_kia = mysql_fetch_assoc($kia);
$totalRows_kia = mysql_num_rows($kia);

mysql_select_db($database_koneksi, $koneksi);
$query_melahirkan = "SELECT * FROM tabel_melahirkan";
$melahirkan = mysql_query($query_melahirkan, $koneksi) or die(mysql_error());
$row_melahirkan = mysql_fetch_assoc($melahirkan);
$totalRows_melahirkan = mysql_num_rows($melahirkan);

mysql_select_db($database_koneksi, $koneksi);
$query_pendidikan = "SELECT * FROM tabel_pendidikan";
$pendidikan = mysql_query($query_pendidikan, $koneksi) or die(mysql_error());
$row_pendidikan = mysql_fetch_assoc($pendidikan);
$totalRows_pendidikan = mysql_num_rows($pendidikan);

mysql_select_db($database_koneksi, $koneksi);
$query_periksa_ibu = "SELECT * FROM tabel_periksa_ibu_hamil";
$periksa_ibu = mysql_query($query_periksa_ibu, $koneksi) or die(mysql_error());
$row_periksa_ibu = mysql_fetch_assoc($periksa_ibu);
$totalRows_periksa_ibu = mysql_num_rows($periksa_ibu);

mysql_select_db($database_koneksi, $koneksi);
$query_umum = "SELECT * FROM tabel_umum";
$umum = mysql_query($query_umum, $koneksi) or die(mysql_error());
$row_umum = mysql_fetch_assoc($umum);
$totalRows_umum = mysql_num_rows($umum);

mysql_free_result($anak);

mysql_free_result($ayah);

mysql_free_result($ibu);

mysql_free_result($imunisasi);

mysql_free_result($jenis_imunisasi);

mysql_free_result($jenis_kb);

mysql_free_result($kartu_anggota);

mysql_free_result($kb);

mysql_free_result($kia);

mysql_free_result($melahirkan);

mysql_free_result($pendidikan);

mysql_free_result($periksa_ibu);

mysql_free_result($umum);
?>
