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

mysql_select_db($database_koneksi, $koneksi);
$query_RecIbu = "SELECT * FROM tabel_ibu as a, tabel_pendidikan as c where a.id_pendidikan=c.id_pendidikan order by id_ibu asc";
$RecIbu = mysql_query($query_RecIbu, $koneksi) or die(mysql_error());
$row_RecIbu = mysql_fetch_assoc($RecIbu);
$totalRows_RecIbu = mysql_num_rows($RecIbu);
$no=1;
?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p><h1>List Data Ibu</h1>&nbsp;</p>
  <table width="800" border="2" cellspacing="4" cellpadding="4">
    <tr>
      <td>No</td>
      <td>Nama Ibu</td>
      <td>Tanggal Lahir</td>
      <td>Alamat</td>
      <td>Pendidikan</td>
      <td>Pekerjaan</td>
      <td>Golongan Darah</td>
      <td>Agama</td>
      <td>Action</td>
    </tr>
	<?php do { ?>
    <tr>
      <td><?php echo $no++?></td>
      <td><?php echo htmlentities($row_RecIbu['nama_ibu'], ENT_COMPAT, ''); ?></td>
      <td><?php echo htmlentities($row_RecIbu['ttl'], ENT_COMPAT, ''); ?></td>
      <td><?php echo htmlentities($row_RecIbu['alamat'], ENT_COMPAT, ''); ?></td>
      <td><?php echo htmlentities($row_RecIbu['nama_pendidikan'], ENT_COMPAT, ''); ?></td>
      <td><?php echo htmlentities($row_RecIbu['pekerjaan'], ENT_COMPAT, ''); ?></td>
      <td valign="baseline"><?php echo htmlentities($row_RecIbu['gol_darah'], ENT_COMPAT, ''); ?></td>
      <td><?php echo htmlentities($row_RecIbu['agama'], ENT_COMPAT, ''); ?></td>
      <td><a href="update_ibu.php?id_ibu=<?php echo htmlentities($row_RecIbu['id_ibu'], ENT_COMPAT, ''); ?>">Edit</a> | <a href="delete_ibu.php?id=<?php echo htmlentities($row_RecIbu['id_ibu'], ENT_COMPAT, ''); ?>">Delete</a></td>
    </tr>
	 <?php } while ($row_RecIbu = mysql_fetch_assoc($RecIbu)); ?>	
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_ibu" value="<?php echo $row_RecIbu['id_ibu']; ?>" />
</form>
<p>&nbsp;</p>

<?php
mysql_free_result($RecIbu);
?>
