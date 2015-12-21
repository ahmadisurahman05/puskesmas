<?php require_once('../../Connections/koneksi.php'); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="action_input_periksa_ibu_hamil.php" method="post" name="form1" id="form1">
  <p><h1>Menu Ibu Periksa Hamil</h1>&nbsp;</p>
  <table align="center">
   <tr valign="baseline">
      <td nowrap align="right">Nama Ibu :</td>
      <td>
		<select name="ibu" required>
		<option value="">-Pilih Ibu-</option>
		
		<?php $result=@mysql_query("select * from tabel_ibu");
				
		while($row = mysql_fetch_array($result))
		{ 
		?>	
		<option value="<?php echo $row['id_ibu'];?>"><?php echo $row['nama_ibu']; ?></option>
		
		 <?php  } ?>
		 </select>
		</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nama Ayah:</td>
      <td>
		<select name="ayah" required>
		<option value="">-Ayah-</option>
		
		<?php $result=@mysql_query("select * from tabel_ayah");
				
		while($row = mysql_fetch_array($result))
		{ 
		?>	
		<option value="<?php echo $row['id_ayah'];?>"><?php echo $row['nama_ayah']; ?></option>
		
		 <?php  } ?>
		 </select>
		</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" required>Tanggal periksa:</td>
      <td><input type="date" name="tanggal" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Keterangan:</td>
      <td><textarea  name="ket" required></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><p>
      <input type="submit" value="Simpan" /> 
      <input type="reset" value="Cancel" />
      <p>
    <a href="input_imunisasi.php"> <-- Input Imunisasi</a> | <a href="input_melahirkan.php">Input Ibu Melahirkan--></a></p></p>
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>