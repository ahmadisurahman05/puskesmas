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
  $insertSQL = sprintf("INSERT INTO tabel_ibu (nama_ibu, ttl, alamat, id_pendidikan, pekerjaan, gol_darah, agama) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nama_ibu'], "text"),
                       GetSQLValueString($_POST['ttl'], "date"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['id_pendidikan'], "int"),
                       GetSQLValueString($_POST['pekerjaan'], "text"),
                       GetSQLValueString($_POST['gol_darah'], "text"),
                       GetSQLValueString($_POST['agama'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
	
  $insertGoTo ="input_ibu.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  echo '<script language="javascript">
				alert("Input Berhasil");
				</script>';
 
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p><h1>Menu Identitas Ibu</h1>&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama Ibu :</td>
      <td><input type="text" name="nama_ibu" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tanggal Lahir :</td>
      <td><input type="date" name="ttl" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Alamat :</td>
      <td><input type="text" name="alamat" value="" size="32" required/></td>
    </tr>
	<?php
		$result = mysql_query("SELECT * FROM tabel_pendidikan order by id_pendidikan asc");

		if($result === FALSE) { 
			die(mysql_error()); // TODO: better error handling
		}
	?>

	<tr valign="baseline">
      <td nowrap align="right">Pendidikan :</td>
      <td>
		<select name="id_pendidikan">
		<option>-Pilih Pendidikan-</option>
		<?php while($row = mysql_fetch_array($result))
		{ 
		?>	
		<option value="<?php echo $row['id_pendidikan'];?>"><?php echo $row['nama_pendidikan']; ?></option>
		
		 <?php  } ?>
		 </select>
		</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Pekerjaan :</td>
      <td><input type="text" name="pekerjaan" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Golongan darah :</td>
      <td><select name="gol_darah">
		<option>-Pilih Golongan Darah-</option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="AB">AB</option>
		<option value="O">O</option>
		 </select>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Agama :</td>
      <td><select name="agama" required/>
		<option>-Pilih Agama-</option>
		<option value="Islam">Islam</option>
		<option value="Katolik">Katolik</option>
		<option value="Protestan">Protestan</option>
		<option value="Budha">Budha</option>
		<option value="Hindu">Hindu</option>
		 </select>
	</td>
    </tr>
	<tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><p>
        <input type="submit" value="Simpan" /> 
        <input type="reset" value="Cancel" />
      </p>
    </tr>
  </table>
      <p><p align="center"><a href="input_ayah.php"> <-- Input Data Ayah </a> | <a href="input_anak.php">Input Data Anak --></a></p></td>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>