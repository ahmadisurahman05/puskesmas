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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "register")) {
  $insertSQL = sprintf("INSERT INTO anggota (nama, email, pass, status) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['pass'], "int"),
                       GetSQLValueString($_POST['status'], "int"));

  mysql_select_db($database_koneksi_db, $koneksi_db);
  $Result1 = mysql_query($insertSQL, $koneksi_db) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<center>
<table width="800" border="0" align="center">
<tr>
  <td><?php include('./menu.php'); 
  ?>
</td>
</tr>
<tr>
  <td><img src="../gambar/hbg_img.jpg" width="800" height="200" alt="footer" /></td>
</tr>
<tr>
  <td bgcolor="#FF9900">&nbsp;</td>
</tr>
<tr>
  <td><h2>Halaman Registrasi</h2>
    <table width="800" border="0" align="center">
      <tr>
        <td></td>
      </tr>
      <tr>
        <td><form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="register" id="register">
          <table width="720" border="0" align="center">
            <tr>
              <td width="269" align="right">NAMA</td>
              <td width="25" align="center">:</td>
              <td width="412"><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
              <td align="right">EMAIL</td>
              <td align="center">:</td>
              <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
              <td align="right">PASSWORD</td>
              <td align="center">:</td>
              <td><input type="password" name="pass" id="pass"></td>
            </tr>
            <tr>
              <td align="right">STATUS</td>
              <td align="center">:</td>
              <td><select name="status" id="status">
                <option>Pilih Status</option>
                <option value="2">Bidan</option>
                <option value="3">Puskesmas</option>
                <option value="4">Resepsionis</option>
              </select></td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td><input type="submit" name="tb_register" id="register3" value="+Tambahkan" /></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="register" />
        </form></td>
      </tr>
    </table>
    </h2></td>
</tr>
<tr>
  <td bgcolor="#FF9900">&nbsp;</td>
</tr>
<tr>
  <td><img src="../gambar/design.jpg" width="800" height="100" alt="footer" /></td>
</tr>
</table>
</body>
</center>
</html>
