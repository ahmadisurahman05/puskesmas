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
  $updateSQL = sprintf("UPDATE tabel_imunisasi SET id_anak=%s, umur_anak=%s, id_ibu=%s, tanggal_imunisasi=%s, id_jenis_imunisasi=%s WHERE id_imunisasi=%s",
                       GetSQLValueString(@$_POST['id_anak'], "int"),
                       GetSQLValueString(@$_POST['umur_anak'], "int"),
                       GetSQLValueString(@$_POST['id_ibu'], "int"),
                       GetSQLValueString(@$_POST['tanggal_imunisasi'], "date"),
                       GetSQLValueString(@$_POST['id_jenis_imunisasi'], "int"),
                       GetSQLValueString(@$_POST['id_imunisasi'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "result_data_anak.php";
  if (isset(@$_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= @$_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset(@$_GET['id_imunisasi'])) {
  $colname_Recordset1 = @$_GET['id_imunisasi'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = sprintf("SELECT * FROM tabel_imunisasi WHERE id_imunisasi = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_free_result($Recordset1);
?>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Id_imunisasi:</td>
      <td><?php echo $row_Recordset1['id_imunisasi']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Id_anak:</td>
      <td><input type="text" name="id_anak" value="<?php echo htmlentities($row_Recordset1['id_anak'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Umur_anak:</td>
      <td><input type="text" name="umur_anak" value="<?php echo htmlentities($row_Recordset1['umur_anak'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Id_ibu:</td>
      <td><input type="text" name="id_ibu" value="<?php echo htmlentities($row_Recordset1['id_ibu'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tanggal_imunisasi:</td>
      <td><input type="text" name="tanggal_imunisasi" value="<?php echo htmlentities($row_Recordset1['tanggal_imunisasi'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Id_jenis_imunisasi:</td>
      <td><input type="text" name="id_jenis_imunisasi" value="<?php echo htmlentities($row_Recordset1['id_jenis_imunisasi'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Update record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id_imunisasi" value="<?php echo $row_Recordset1['id_imunisasi']; ?>">
</form>
<p>&nbsp;</p>
