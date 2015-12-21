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
  $insertSQL = sprintf("INSERT INTO tabel_imunisasi (id_kartu, id_imunisasi, id_kia, id_anak, id_ibu, tanggal_imunisasi, id_jenis_imunisasi) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_kartu'], "int"),
                       GetSQLValueString($_POST['id_imunisasi'], "int"),
                       GetSQLValueString($_POST['id_kia'], "int"),
                       GetSQLValueString($_POST['id_anak'], "int"),
                       GetSQLValueString($_POST['id_ibu'], "int"),
                       GetSQLValueString($_POST['tanggal_imunisasi'], "date"),
                       GetSQLValueString($_POST['id_jenis_imunisasi'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
}
?>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Id_kartu:</td>
      <td><input type="text" name="id_kartu" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Id_imunisasi:</td>
      <td><input type="text" name="id_imunisasi" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Id_kia:</td>
      <td><input type="text" name="id_kia" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Id_anak:</td>
      <td><input type="text" name="id_anak" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Id_ibu:</td>
      <td><input type="text" name="id_ibu" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tanggal_imunisasi:</td>
      <td><input type="text" name="tanggal_imunisasi" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Id_jenis_imunisasi:</td>
      <td><input type="text" name="id_jenis_imunisasi" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
