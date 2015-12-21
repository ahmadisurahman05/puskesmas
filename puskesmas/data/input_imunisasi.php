<?php require_once('../../Connections/koneksi.php'); ?>

<form method="post" name="form1" action="action_input_imunisasi.php">
  <p><h1>Menu Imunisasi</h1>&nbsp;</p>
  <table align="center">
    
    <tr valign="baseline">
      <td nowrap align="right">Nama Anak:</td>
      <td>
		<select name="anak" required>
		<option value="">-Anak-</option>
		
		<?php $result=@mysql_query("select * from tabel_anak");
				
		while($row = mysql_fetch_array($result))
		{ 
		?>	
		<option value="<?php echo $row['id_anak'];?>"><?php echo $row['nama_anak']; ?></option>
		
		 <?php  } ?>
		 </select>
		</td>
    </tr>
	<tr valign="baseline">
      <td nowrap="nowrap" align="right">Umur Anak:</td>
      <td><input type="number" name="umur" value="" size="32" required/></td>
    </tr>
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
      <td nowrap="nowrap" align="right">Tanggal Imunisasi:</td>
      <td><input type="date" name="tanggal" value="" size="32" required/></td>
    </tr>
     <tr valign="baseline">
      <td nowrap align="right">Jenis Imunisasi:</td>
      <td>
		<select name="imunisasi" required>
		<option value="">-Jenis Imunisasi:-</option>
		
		<?php $result=@mysql_query("select * from tabel_jenis_imunisasi");
				
		while($row = mysql_fetch_array($result))
		{ 
		?>	
		<option value="<?php echo $row['id_jenis_imunisasi'];?>"><?php echo $row['nama_jenis_imunisasi']; ?></option>
		
		 <?php  } ?>
		 </select>
		</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><p>
      <input type="submit" value="Simpan" /> 
      <input type="reset" value="Cancel" />
    </p><p>
    <a href="input_melahirkan.php"> <-- Input Ibu Melahirkan</a> | <a href="input_umum.php">Input Umum--></a></p>
    </td></tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
