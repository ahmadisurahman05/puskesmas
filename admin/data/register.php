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
  $insertSQL = sprintf("INSERT INTO login (username, password, status) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['status'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "register.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table align="center">
    <tr valign="baseline" bgcolor="#666666">
      <td align="right" nowrap="nowrap"><strong>Nama:</strong></td>
      <td><strong>
        <input type="text" name="username" value="" size="32" />
      </strong></td>
    </tr>
    <tr valign="baseline" bgcolor="#666666">
      <td align="right" nowrap="nowrap"><strong>Password:</strong></td>
      <td><strong>
        <input type="text" name="password" value="" size="32" />
      </strong></td>
    </tr>
    <tr valign="baseline" bgcolor="#666666">
      <td align="right" nowrap="nowrap"><strong>Status:</strong></td>
      <td><strong>
        <select name="status">
          <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Bidan</option>
          <option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Puskesmas</option>
          <option value="3" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>Admin</option>
        </select>
      </strong></td>
    </tr>
    <tr valign="baseline" bgcolor="#666666">
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td><strong>
        <input type="submit" value="+Tambah" />
      </strong></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
