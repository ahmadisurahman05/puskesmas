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
  $updateSQL = sprintf("UPDATE tabel_anak SET nama_anak=%s, ttl=%s, jenis_kelamin=%s, gol_darah=%s, agama=%s, id_ayah=%s, id_ibu=%s WHERE id_anak=%s",
                       GetSQLValueString($_POST['nama_anak'], "text"),
                       GetSQLValueString($_POST['ttl'], "date"),
                       GetSQLValueString($_POST['jenis_kelamin'], "text"),
                       GetSQLValueString($_POST['gol_darah'], "text"),
                       GetSQLValueString($_POST['agama'], "text"),
                       GetSQLValueString($_POST['id_ayah'], "int"),
                       GetSQLValueString($_POST['id_ibu'], "int"),
                       GetSQLValueString($_POST['id_anak'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "list_anak.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
$id = $_GET['id_anak'];
mysql_select_db($database_koneksi, $koneksi);
$query_RecAnak = "SELECT * FROM tabel_anak as a, tabel_ayah as b, tabel_ibu as c where a.id_ayah=b.id_ayah and a.id_ibu=c.id_ibu and a.id_anak='$id'";
$RecAnak = mysql_query($query_RecAnak, $koneksi) or die(mysql_error());
$row_RecAnak = mysql_fetch_assoc($RecAnak);
$totalRows_RecAnak = mysql_num_rows($RecAnak);
$no=1;
?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <center><h1>List Data Anak</h1></center>
  <table align="center">
    
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama_anak:</td>
      <td><input type="text" name="nama_anak" value="<?php echo htmlentities($row_RecAnak['nama_anak'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ttl:</td>
      <td><input type="text" name="ttl" value="<?php echo htmlentities($row_RecAnak['ttl'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Jenis_kelamin:</td>
      <td><input type="text" name="jenis_kelamin" value="<?php echo htmlentities($row_RecAnak['jenis_kelamin'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gol_darah:</td>
      <td><input type="text" name="gol_darah" value="<?php echo htmlentities($row_RecAnak['gol_darah'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Agama:</td>
      <td><input type="text" name="agama" value="<?php echo htmlentities($row_RecAnak['agama'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">id_ayah:</td>
      <td><input type="text" name="id_ayah" value="<?php echo htmlentities($row_RecAnak['id_ayah'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">id_ibu:</td>
      <td><input type="text" name="id_ibu" value="<?php echo htmlentities($row_RecAnak['id_ibu'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Ubah" />
      	  <input type="reset" value="Batal" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_anak" value="<?php echo $row_RecAnak['id_anak']; ?>" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
mysql_free_result($RecAnak);
?>
