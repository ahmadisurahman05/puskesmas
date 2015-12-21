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
  $updateSQL = sprintf("UPDATE login SET password=%s, status=%s WHERE username=%s",
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['username'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "update.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_koneksi, $koneksi);
$query_RecPuskes = "SELECT * FROM login";
$RecPuskes = mysql_query($query_RecPuskes, $koneksi) or die(mysql_error());
$row_RecPuskes = mysql_fetch_assoc($RecPuskes);
$totalRows_RecPuskes = mysql_num_rows($RecPuskes);

?>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <center><table width="453" border="2" cellspacing="2" cellpadding="2">
    <tr>
      <td width="119" bgcolor="#999999">Username</td>
      <td width="83" bgcolor="#999999">Password</td>
      <td width="102" bgcolor="#999999">Status</td>
      <td width="111" bgcolor="#999999">Action</td>
      </tr>
    <?php do { ?>
    <tr>
    <td bgcolor="#999999"><?php echo htmlentities($row_RecPuskes['username'], ENT_COMPAT, ''); ?></td>
    <td bgcolor="#999999"><?php echo htmlentities($row_RecPuskes['password'], ENT_COMPAT, ''); ?></td>
    <td bgcolor="#999999"><?php echo htmlentities($row_RecPuskes['status'], ENT_COMPAT, ''); ?></td>
    <td bgcolor="#999999"><a href="update_pengguna.php?username=<?php echo htmlentities($row_RecPuskes['username'], ENT_COMPAT, ''); ?>">Edit | Delete</td>
    </tr>
    <?php } while ($row_RecPuskes = mysql_fetch_assoc($RecPuskes)); ?>
  </table>
  </center>
</form>
