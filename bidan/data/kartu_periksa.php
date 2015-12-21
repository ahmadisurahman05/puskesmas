<?php require_once('../Connections/koneksi.php'); ?>
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

if ((isset(@$_POST["MM_insert"])) && (@$_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO tabel_kartu_anggota (id_kartu, jenis_periksa) VALUES (%s, %s)",
                       GetSQLValueString(@$_POST['id_kartu'], "int"),
                       GetSQLValueString(@$_POST['jenis_periksa'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "../index.php";
  if (isset(@$_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= @$_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<form action="<?php echo $editFormAction; ?>" method="post" name="kartu_periksa" id="kartu_periksa">
  <table width="324" align="center">
    <tr valign="baseline">
      <td width="82" align="right" nowrap>Kartu ID:</td>
      <td width="28" align="center">:</td>
      <td width="198"><input type="text" name="id_kartu" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Jenis Periksa:</td>
      <td align="center">:</td>
      <td><input type="text" name="jenis_periksa" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td><input name="tb_kartu" type="submit" id="tb_kartu" value="Register"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form2">
</form>
<p>&nbsp;</p>
