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

if ((isset(@$_POST["MM_update"])) && (@$_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tabel_umum SET jenis_penyakit=%s, nama=%s, umur=%s, jenis_kelamin=%s, tanggal_periksa=%s, alamat=%s, ket=%s WHERE id_umum=%s",
                       GetSQLValueString(@$_POST['jenis_penyakit'], "text"),
                       GetSQLValueString(@$_POST['nama'], "text"),
                       GetSQLValueString(@$_POST['umur'], "int"),
                       GetSQLValueString(@$_POST['jenis_kelamin'], "text"),
                       GetSQLValueString(@$_POST['tanggal_periksa'], "date"),
                       GetSQLValueString(@$_POST['alamat'], "text"),
                       GetSQLValueString(@$_POST['ket'], "text"),
                       GetSQLValueString(@$_POST['id_umum'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "result_data_umum.php";
  if (isset(@$_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= @$_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset(@$_GET['id_umum'])) {
  $colname_Recordset1 = @$_GET['id_umum'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = sprintf("SELECT * FROM tabel_umum WHERE id_umum = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_free_result($Recordset1);
?>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Id Umum:</td>
      <td><?php echo $row_Recordset1['id_umum']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Jenis Penyakit:</td>
      <td><input type="text" name="jenis_penyakit" value="<?php echo htmlentities($row_Recordset1['jenis_penyakit'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nama:</td>
      <td><input type="text" name="nama" value="<?php echo htmlentities($row_Recordset1['nama'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Umur:</td>
      <td><input type="text" name="umur" value="<?php echo htmlentities($row_Recordset1['umur'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Jenis Kelamin:</td>
      <td><input type="text" name="jenis_kelamin" value="<?php echo htmlentities($row_Recordset1['jenis_kelamin'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tanggal Periksa:</td>
      <td><input type="text" name="tanggal_periksa" value="<?php echo htmlentities($row_Recordset1['tanggal_periksa'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alamat:</td>
      <td><input type="text" name="alamat" value="<?php echo htmlentities($row_Recordset1['alamat'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Keterangan:</td>
      <td><input type="text" name="ket" value="<?php echo htmlentities($row_Recordset1['ket'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Update record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id_umum" value="<?php echo $row_Recordset1['id_umum']; ?>">
</form>
<p>&nbsp;</p>
