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
  $insertSQL = sprintf("INSERT INTO tabel_ayah ( nama_ayah, ttl, alamat, id_pendidikan, pekerjaan, gol_darah, agama, id_ibu) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nama_ayah'], "text"),
                       GetSQLValueString($_POST['ttl'], "date"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['id_pendidikan'], "text"),
                       GetSQLValueString($_POST['pekerjaan'], "text"),
                       GetSQLValueString($_POST['gol_darah'], "text"),
                       GetSQLValueString($_POST['agama'], "text"),
                       GetSQLValueString($_POST['id_ibu'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "input_ayah.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  echo '<script language="javascript">
				alert("Input Berhasil");
				</script>';
}
?>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <p><h1>Menu Identitas Ayah</h1>&nbsp;</p>
  <table width="348" align="center">
    <tr valign="baseline">
      <td width="111" height="26" align="right" nowrap>Nama Ayah</td>
      <td width="21" align="center">:</td>
      <td width="226"><input type="text" name="nama_ayah" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tanggal Lahir</td>
      <td align="center">:</td>
      <td><input type="date" name="ttl" value="" size="32" required/></td>
    </tr>
	
    <tr valign="baseline">
      <td nowrap align="right">Alamat</td>
      <td align="center">:</td>
      <td><input type="text" name="alamat" value="" size="32" required/></td>
	
		<?php
		$result = mysql_query("SELECT * FROM tabel_pendidikan order by id_pendidikan asc");

		if($result === FALSE) { 
			die(mysql_error()); // TODO: better error handling
		}
	?>

	<tr valign="baseline">
      <td nowrap align="right">Pendidikan:</td>
	  <td>:</td>
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
	
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Pekerjaan</td>
      <td align="center">:</td>
      <td><input type="text" name="pekerjaan" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Golongan darah</td>
      <td align="center">:</td>
      <td><select name="gol_darah">
	  <option>-Pilih Golongan Darah-</option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="AB">AB</option>
		<option value="O">O</option>
		 </select>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Agama </td>
	  <td>:</td>
      <td><select name="agama" required/>
		<option>-Pilih Agama-</option>
		<option value="Islam">Islam</option>
		<option value="Katolik">Katolik</option>
		<option value="Protestan">Protestan</option>
		<option value="Budha">Budha</option>
		<option value="Hindu">Hindu</option>
		 </select>
    </tr>
	
	

	<?php
		$result = mysql_query("SELECT * FROM tabel_ibu order by id_ibu desc");

		if($result === FALSE) { 
			die(mysql_error()); // TODO: better error handling
		}
	?>

	<tr valign="baseline">
      <td nowrap align="right">Nama Istri:</td>
	  <td>:</td>
      <td>
		<select name="id_ibu">
		<?php while($row = mysql_fetch_array($result))
		{ 
		?>	
		<option value="<?php echo $row['id_ibu'];?>"><?php echo $row['nama_ibu']; ?></option>
		
		 <?php  } ?>
		 
		 
		 
		 </select>
		</td>
	</tr>
	<tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td><p>
        <input type="submit" value="Simpan" /> 
        <input type="reset" value="Cancel" />
      </p>
    </tr>
  </table>
      <p><p align="center"><a href="input_ibu.php"><-- Input Data Ibu </a>|<a href="input_anak.php">Input Data Anak --></a></p></td>
  
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
