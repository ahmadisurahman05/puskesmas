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
  $updateSQL = sprintf("UPDATE tabel_kb SET id_ibu=%s, id_ayah=%s, tanggla_kb=%s, id_jenis_kb=%s, ket=%s WHERE id_KB=%s",
                       GetSQLValueString(@$_POST['id_ibu'], "int"),
                       GetSQLValueString(@$_POST['id_ayah'], "int"),
                       GetSQLValueString(@$_POST['tanggla_kb'], "date"),
                       GetSQLValueString(@$_POST['id_jenis_kb'], "int"),
                       GetSQLValueString(@$_POST['ket'], "text"),
                       GetSQLValueString(@$_POST['id_KB'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "result_data_KB.php";
  if (isset(@$_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= @$_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset(@$_GET['id_KB'])) {
  $colname_Recordset1 = @$_GET['id_KB'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = sprintf("SELECT * FROM tabel_kb WHERE id_KB = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_free_result($Recordset1);
?>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <p><h1><center>Data Pengguna KB</center></h1></p>
  <p>&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td align="right" nowrap>Id KB:</td>
      <td><?php echo $row_Recordset1['id_KB']; ?></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap>Nama Ibu:</td>
      <td><input type="text" name="id_ibu" value="<?php echo htmlentities($row_Recordset1['id_ibu'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap>Nama Ayah:</td>
      <td><input type="text" name="id_ayah" value="<?php echo htmlentities($row_Recordset1['id_ayah'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap>Tanggal KB:</td>
      <td><input type="text" name="tanggla_kb" value="<?php echo htmlentities($row_Recordset1['tanggla_kb'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap>Id Jenis KB:</td>
      <td><input type="text" name="id_jenis_kb" value="<?php echo htmlentities($row_Recordset1['id_jenis_kb'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap>Keterangan:</td>
      <td><input type="text" name="ket" value="<?php echo htmlentities($row_Recordset1['ket'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap>&nbsp;</td>
      <td><input type="submit" value="Update record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id_KB" value="<?php echo $row_Recordset1['id_KB']; ?>">
</form>
<p>&nbsp;</p>
