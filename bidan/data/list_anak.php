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

if ((isset(@$_POST["MM_update"])) && (@$_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE tabel_anak SET nama_anak=%s, ttl=%s, jenis_kelamin=%s, gol_darah=%s, agama=%s, id_ayah=%s, id_ibu=%s WHERE id_anak=%s",
                       GetSQLValueString(@$_POST['nama_anak'], "text"),
                       GetSQLValueString(@$_POST['ttl'], "date"),
                       GetSQLValueString(@$_POST['jenis_kelamin'], "text"),
                       GetSQLValueString(@$_POST['gol_darah'], "text"),
                       GetSQLValueString(@$_POST['agama'], "text"),
                       GetSQLValueString(@$_POST['id_ayah'], "int"),
                       GetSQLValueString(@$_POST['id_ibu'], "int"),
                       GetSQLValueString(@$_POST['id_anak'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "list_anak.php";
  if (isset(@$_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= @$_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_koneksi, $koneksi);
$query_RecAnak = "SELECT *, a.ttl ttl_anak FROM tabel_anak as a, tabel_ayah as b, tabel_ibu as c where a.id_ayah=b.id_ayah and a.id_ibu=c.id_ibu";
$RecAnak = mysql_query($query_RecAnak, $koneksi) or die(mysql_error());
$row_RecAnak = mysql_fetch_assoc($RecAnak);
$totalRows_RecAnak = mysql_num_rows($RecAnak);
$no=1;
?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <p><h1>List Data Anak</h1>&nbsp;</p>
  <table width="885" border="2" cellspacing="4" cellpadding="4">
    <tr>
      <td>No</td>
      <td>Nama Anak</td>
      <td>Tanggal Lahir</td>
      <td>Jenis Kelamin</td>
      <td>Golongan Darah</td>
      <td>Agama</td>
      <td>Nama Ayah</td>
      <td>Nama Ibu</td>
	  <td>Action</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo htmlentities($row_RecAnak['nama_anak'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAnak['ttl_anak'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAnak['jenis_kelamin'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAnak['gol_darah'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAnak['agama'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAnak['nama_ayah'], ENT_COMPAT, ''); ?></td>
        <td><?php echo htmlentities($row_RecAnak['nama_ibu'], ENT_COMPAT, ''); ?></td>
		<td><a href="update_anak.php?id_anak=<?php echo htmlentities($row_RecAnak['id_anak'], ENT_COMPAT, ''); ?>">Edit</a> | <a href="delete_anak.php?id=<?php echo htmlentities($row_RecAnak['id_anak'], ENT_COMPAT, ''); ?>">Delete</a></td>
      </tr>
      <?php } while ($row_RecAnak = mysql_fetch_assoc($RecAnak)); ?>
  </table>
  <p>&nbsp;  </p>
  <p>
    <input type="hidden" name="MM_update" value="form2" />
    <input type="hidden" name="id_anak" value="<?php echo $row_RecAnak['id_anak']; ?>" />
  </p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
mysql_free_result($RecAnak);
?>
