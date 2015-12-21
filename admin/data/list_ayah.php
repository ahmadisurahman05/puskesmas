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
  $updateSQL = sprintf("UPDATE tabel_ayah SET nama_ayah=%s, ttl=%s, alamat=%s, id_pendidikan=%s, pekerjaan=%s, gol_darah=%s, agama=%s, id_ibu=%s WHERE id_ayah=%s",
                       GetSQLValueString($_POST['nama_ayah'], "text"),
                       GetSQLValueString($_POST['ttl'], "date"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['id_pendidikan'], "int"),
                       GetSQLValueString($_POST['pekerjaan'], "text"),
                       GetSQLValueString($_POST['gol_darah'], "text"),
                       GetSQLValueString($_POST['agama'], "text"),
                       GetSQLValueString($_POST['id_ibu'], "int"),
                       GetSQLValueString($_POST['id_ayah'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "list_ayah.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_koneksi, $koneksi);
$query_RecAyah = "SELECT * FROM tabel_ayah as a, tabel_ibu as b, tabel_pendidikan as c where a.id_pendidikan=c.id_pendidikan and a.id_ibu=b.id_ibu ";
$RecAyah = mysql_query($query_RecAyah, $koneksi) or die(mysql_error());
$row_RecAyah = mysql_fetch_assoc($RecAyah);
$totalRows_RecAyah = mysql_num_rows($RecAyah);
$no=1;
?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p><h1>List Data Ayah</h1>&nbsp;</p>
  <table width="885" border="2" cellspacing="4" cellpadding="4">
    <tr>
      <td>No</td>
      <td>Nama Ayah</td>
      <td>Tanggal Lahir</td>
      <td>Alamat</td>
      <td>Pendidikan</td>
      <td>Pekerjaan</td>
      <td>Golongan Darah</td>
      <td>Agama</td>
      <td>Nama Ibu</td>
	  <td>Action</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo htmlentities($row_RecAyah['nama_ayah'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAyah['ttl'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAyah['alamat'], ENT_COMPAT, ''); ?></td>
	    <td><?php echo htmlentities($row_RecAyah['nama_pendidikan'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAyah['pekerjaan'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAyah['gol_darah'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAyah['agama'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAyah['nama_ibu'], ENT_COMPAT, ''); ?></td>
		<td><a href="update_ayah.php?id_ayah=<?php echo htmlentities($row_RecAyah['id_ayah'], ENT_COMPAT, ''); ?>">Edit</a> | <a href="delete_ayah.php?id=<?php echo htmlentities($row_RecAyah['id_ayah'], ENT_COMPAT, ''); ?>">Delete</a></td>
      </tr>
      <?php } while ($row_RecAyah = mysql_fetch_assoc($RecAyah)); ?>
  </table>
  <p>&nbsp;  </p>
  <p>
    <input type="hidden" name="MM_update" value="form1" />
    <input type="hidden" name="id_ayah" value="<?php echo $row_RecAyah['id_ayah']; ?>" />
  </p>
</form>
<p>&nbsp;</p>
<?php
mysql_free_result($RecAyah);
?>
