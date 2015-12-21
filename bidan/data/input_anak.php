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
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tabel_anak (id_anak, nama_anak, ttl, jenis_kelamin, gol_darah, agama, id_ayah, id_ibu) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString(@$_POST['id_anak'], "int"),
                       GetSQLValueString(@$_POST['nama_anak'], "text"),
                       GetSQLValueString(@$_POST['ttl'], "date"),
                       GetSQLValueString(@$_POST['jenis_kelamin'], "text"),
                       GetSQLValueString(@$_POST['gol_darah'], "text"),
                       GetSQLValueString(@$_POST['agama'], "text"),
                       GetSQLValueString(@$_POST['id_ayah'], "int"),
                       GetSQLValueString(@$_POST['id_ibu'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "input_anak.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= @$_SERVER['QUERY_STRING'];
  }
  echo '<script language="javascript">
		alert("Input Berhasil");
		</script>';
}
?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p><h1>Menu Identitas Anak </h1>&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama anak :</td>
      <td><input type="text" name="nama_anak" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tanggal Lahir :</td>
      <td><input type="date" name="ttl" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Jenis Kelamin :</td>
      <td>
		  <label>
    <input type="radio" name="jenis_kelamin" value="L"/>Laki-Laki</label>
  <br />
  <label>
    <input type="radio" name="jenis_kelamin" value="P"/>Perempuan</label>
    <tr valign="baseline">
      <td nowrap align="right">Golongan darah :</td>
      <td><select name="gol_darah" required/>
		<option value="">-Pilih Golongan Darah-</option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="AB">AB</option>
		<option value="O">O</option>
		</select>
	  </td>
		 
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Agama :</td>
      <td><select name="agama" required/>
		<option value="">-Pilih Agama-</option>
		<option value="Islam">Islam</option>
		<option value="Katolik">Katolik</option>
		<option value="Protestan">Protestan</option>
		<option value="Budha">Budha</option>
		<option value="Hindu">Hindu</option>
		 </select>
    </tr>
	<?php
		$result = mysql_query("SELECT * FROM tabel_ayah order by id_ayah desc");

		if($result === FALSE) { 
			die(mysql_error()); // TODO: better error handling
		}
	?>

	<tr valign="baseline">
      <td nowrap align="right">Nama Ayah :</td>
      <td>
		<select name="id_ayah">
		<?php while($row = mysql_fetch_array($result))
		{ 
		?>	
		<option value="<?php echo $row['id_ayah'];?>"><?php echo $row['nama_ayah']; ?></option>
		
		 <?php  } ?>
		 
		 
		 
		 </select>
		</td>
	</tr>
    <?php
		$result = mysql_query("SELECT * FROM tabel_ibu order by id_ibu desc");

		if($result === FALSE) { 
			die(mysql_error()); // TODO: better error handling
		}
	?>

	<tr valign="baseline">
      <td nowrap align="right">Nama Ibu :</td>
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
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><p>
        <input type="submit" value="Simpan" /> 
        <input type="reset" value="Cancel" />
      </p>
      <p><a href="input_ibu.php"> <-- Input Data Ibu </a> | <a href="home.php">Selesai</a></p></td>
    </tr>
  </table>
  <input type="hidden" name="id_anak" value="" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>
  <br />
</p>
<p>&nbsp;</p>
