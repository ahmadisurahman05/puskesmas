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
  $updateSQL = sprintf("UPDATE login SET password=%s, status=%s WHERE username=%s",
                       GetSQLValueString(@$_POST['password'], "text"),
                       GetSQLValueString(@$_POST['status'], "int"),
                       GetSQLValueString(@$_POST['username'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "../../admin/data/update.php";
  if (isset(@$_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= @$_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_RecPuskes = "-1";
if (isset(@$_GET['username'])) {
  $colname_RecPuskes = @$_GET['username'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_RecPuskes = sprintf("SELECT * FROM login WHERE username = %s", GetSQLValueString($colname_RecPuskes, "text"));
$RecPuskes = mysql_query($query_RecPuskes, $koneksi) or die(mysql_error());
$row_RecPuskes = mysql_fetch_assoc($RecPuskes);
$totalRows_RecPuskes = mysql_num_rows($RecPuskes);

?>
<form method="post" name="form2" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Username:</td>
      <td><?php echo $row_RecPuskes['username']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Password:</td>
      <td><input type="text" name="password" value="<?php echo htmlentities($row_RecPuskes['password'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Status:</td>
      <td><input type="text" name="status" value="<?php echo htmlentities($row_RecPuskes['status'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Ubah"><input type="reset" value="reset"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form2">
  <input type="hidden" name="username" value="<?php echo $row_RecPuskes['username']; ?>">
</form>
<p>&nbsp;</p>
<?php
mysql_free_result($RecPuskes);
?>
