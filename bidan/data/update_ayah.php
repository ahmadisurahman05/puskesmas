<?php require_once('../../Connections/koneksi.php'); ?>
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

$editFormAction = @$_SERVER['PHP_SELF'];
if (isset(@$_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities(@$_SERVER['QUERY_STRING']);
}

if ((isset(@$_POST["MM_update"])) && (@$_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE tabel_ayah SET nama_ayah=%s, ttl=%s, alamat=%s, id_pendidikan=%s, pekerjaan=%s, gol_darah=%s, agama=%s, id_ibu=%s WHERE id_ayah=%s",
                       GetSQLValueString(@$_POST['nama_ayah'], "text"),
                       GetSQLValueString(@$_POST['ttl'], "date"),
                       GetSQLValueString(@$_POST['alamat'], "text"),
                       GetSQLValueString(@$_POST['id_pendidikan'], "int"),
                       GetSQLValueString(@$_POST['pekerjaan'], "text"),
                       GetSQLValueString(@$_POST['gol_darah'], "text"),
                       GetSQLValueString(@$_POST['agama'], "text"),
                       GetSQLValueString(@$_POST['id_ibu'], "int"),
                       GetSQLValueString(@$_POST['id_ayah'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "list_ayah.php";
  if (isset(@$_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= @$_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_RecAyah = "-1";
if (isset(@$_GET['id_ayah'])) {
  $colname_RecAyah = @$_GET['id_ayah'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_RecAyah = sprintf("SELECT * FROM tabel_ayah WHERE id_ayah = %s", GetSQLValueString($colname_RecAyah, "int"));
$RecAyah = mysql_query($query_RecAyah, $koneksi) or die(mysql_error());
$row_RecAyah = mysql_fetch_assoc($RecAyah);
$totalRows_RecAyah = mysql_num_rows($RecAyah);
$no=1;
?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <p><h1><center>List Data Ayah</center></h1></p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id Ayah:</td>
      <td><?php echo $row_RecAyah['id_ayah']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama Ayah:</td>
      <td><input type="text" name="nama_ayah" value="<?php echo htmlentities($row_RecAyah['nama_ayah'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tanggal Lahir:</td>
      <td><input type="text" name="ttl" value="<?php echo htmlentities($row_RecAyah['ttl'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Alamat:</td>
      <td><input type="text" name="alamat" value="<?php echo htmlentities($row_RecAyah['alamat'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Pendidikan:</td>
      <td><input type="text" name="id_pendidikan" value="<?php echo htmlentities($row_RecAyah['id_pendidikan'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Pekerjaan:</td>
      <td><input type="text" name="pekerjaan" value="<?php echo htmlentities($row_RecAyah['pekerjaan'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Golongan darah:</td>
      <td><input type="text" name="gol_darah" value="<?php echo htmlentities($row_RecAyah['gol_darah'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Agama:</td>
      <td><input type="text" name="agama" value="<?php echo htmlentities($row_RecAyah['agama'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id Ibu:</td>
      <td><input type="text" name="id_ibu" value="<?php echo htmlentities($row_RecAyah['id_ibu'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Ubah" />
      <input type="reset" value="Batal" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form2" />
  <input type="hidden" name="id_ayah" value="<?php echo $row_RecAyah['id_ayah']; ?>" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
mysql_free_result($RecAyah);
?>
