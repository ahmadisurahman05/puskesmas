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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tabel_kb (id_kartu, id_ibu, id_ayah, tanggla_kb, id_jenis_kb, ket) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_kartu'], "int"),
                       GetSQLValueString($_POST['id_ibu'], "int"),
                       GetSQLValueString($_POST['id_ayah'], "int"),
                       GetSQLValueString($_POST['tanggla_kb'], "date"),
                       GetSQLValueString($_POST['id_jenis_kb'], "int"),
                       GetSQLValueString($_POST['ket'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
}
?>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
<p><h1>Menu KB</h1>&nbsp;</p>
<table align="center">
    <tr valign="baseline">
      <td width="74" align="right" nowrap>Tanggal KB</td>
      <td width="25" align="center">:</td>
      <td width="261"><input type="text" name="tanggla_kb" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Keterangan</td>
      <td align="center">:</td>
      <td><input type="text" name="ket" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td><input name="tb_register" type="submit" id="tb_register" value="Register"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
