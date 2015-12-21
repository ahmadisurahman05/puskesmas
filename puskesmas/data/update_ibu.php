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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tabel_ibu SET nama_ibu=%s, ttl=%s, alamat=%s, id_pendidikan=%s, pekerjaan=%s, gol_darah=%s, agama=%s WHERE id_ibu=%s",
                       GetSQLValueString($_POST['nama_ibu'], "text"),
                       GetSQLValueString($_POST['ttl'], "date"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['id_pendidikan'], "int"),
                       GetSQLValueString($_POST['pekerjaan'], "text"),
                       GetSQLValueString($_POST['gol_darah'], "text"),
                       GetSQLValueString($_POST['agama'], "text"),
                       GetSQLValueString($_POST['id_ibu'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "list_ibu.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_RecIbu = "-1";
if (isset($_GET['id_ibu'])) {
  $colname_RecIbu = $_GET['id_ibu'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_RecIbu = sprintf("SELECT * FROM tabel_ibu WHERE id_ibu = %s", GetSQLValueString($colname_RecIbu, "int"));
$RecIbu = mysql_query($query_RecIbu, $koneksi) or die(mysql_error());
$row_RecIbu = mysql_fetch_assoc($RecIbu);
$totalRows_RecIbu = mysql_num_rows($RecIbu);
$no=1;
?>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Id_ibu:</td>
      <td><?php echo $row_RecIbu['id_ibu']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nama_ibu:</td>
      <td><input type="text" name="nama_ibu" value="<?php echo htmlentities($row_RecIbu['nama_ibu'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ttl:</td>
      <td><input type="text" name="ttl" value="<?php echo htmlentities($row_RecIbu['ttl'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alamat:</td>
      <td><input type="text" name="alamat" value="<?php echo htmlentities($row_RecIbu['alamat'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Id_pendidikan:</td>
      <td><input type="text" name="id_pendidikan" value="<?php echo htmlentities($row_RecIbu['id_pendidikan'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Pekerjaan:</td>
      <td><input type="text" name="pekerjaan" value="<?php echo htmlentities($row_RecIbu['pekerjaan'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Gol_darah:</td>
      <td><input type="text" name="gol_darah" value="<?php echo htmlentities($row_RecIbu['gol_darah'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Agama:</td>
      <td><input type="text" name="agama" value="<?php echo htmlentities($row_RecIbu['agama'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Ubah">
      <input type="reset" value="Ubah"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id_ibu" value="<?php echo $row_RecIbu['id_ibu']; ?>">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
mysql_free_result($RecIbu);
?>
