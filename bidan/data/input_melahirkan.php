<?php require_once('../../Connections/koneksi.php'); ?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="action_input_melahirkan.php" method="post" name="form1" id="form1">
  <p>
  <h1>Menu Ibu Melahirkan</h1>
  &nbsp;</p>
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
      <td nowrap="nowrap" align="right">Tanggal melahirkan:</td>
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
    <a href="input_kb.php"> <-- Input KB</a> | <a href="input_periksa_ibu_hamil.php">Input Periksa Ibu Hamil--></a></p></p>
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>