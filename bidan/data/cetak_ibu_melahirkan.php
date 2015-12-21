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
  $updateSQL = sprintf("UPDATE tabel_melahirkan SET id_ibu=%s, id_ayah=%s, id_anak=%s, tanggal_melahirkan=%s, ket=%s WHERE id_melahirkan=%s",
                       GetSQLValueString(@$_POST['id_ibu'], "int"),
                       GetSQLValueString(@$_POST['id_ayah'], "int"),
                       GetSQLValueString(@$_POST['id_anak'], "int"),
                       GetSQLValueString(@$_POST['tanggal_melahirkan'], "date"),
                       GetSQLValueString(@$_POST['ket'], "text"),
                       GetSQLValueString(@$_POST['id_melahirkan'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "report_ibu_melahirkan.php";
  if (isset(@$_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= @$_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset(@$_GET['id_melahirkan'])) {
  $colname_Recordset1 = @$_GET['id_melahirkan'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = sprintf("select a.id_melahirkan,tanggal_melahirkan,ket,
b.nama_ibu,
c.nama_ayah,
d.nama_anak
from tabel_melahirkan as a, tabel_ibu as b, tabel_ayah as c, tabel_anak as d WHERE a.id_ibu=a.id_ibu and a.id_ayah=c.id_ayah and a.id_anak=d.id_anak and id_melahirkan = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_free_result($Recordset1);
?>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <p>&nbsp;</p>
  <p><h1><center>Data Ibu Melahirkan</center></h1></p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Id Melahirkan:</td>
      <td><?php echo $row_Recordset1['id_melahirkan']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nama Ibu:</td>
      <td><?php echo htmlentities($row_Recordset1['nama_ibu'], ENT_COMPAT, ''); ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nama Ayah:</td>
      <td><?php echo htmlentities($row_Recordset1['nama_ayah'], ENT_COMPAT, ''); ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nama Anak:</td>
      <td><?php echo htmlentities($row_Recordset1['nama_anak'], ENT_COMPAT, ''); ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tanggal Melahirkan:</td>
      <td><?php echo htmlentities($row_Recordset1['tanggal_melahirkan'], ENT_COMPAT, ''); ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Keterangan:</td>
      <td><?php echo htmlentities($row_Recordset1['ket'], ENT_COMPAT, ''); ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id_melahirkan" value="<?php echo $row_Recordset1['id_melahirkan']; ?>">
</form>
<p>&nbsp;</p>
