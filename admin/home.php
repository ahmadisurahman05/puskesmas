 <?php
		$result = mysql_query("SELECT * FROM tabel_pendidikan order by id_pendidikan asc");

		if($result === FALSE) { 
			die(mysql_error()); // TODO: better error handling
		}
	?>

	<tr valign="baseline">
      <td nowrap align="right">Pendidikan:</td>
      <td>
		<select>
		<?php while($row = mysql_fetch_array($result))
		{ 
		?>	
		<option value="<?php echo $row['id_pendidikan'];?>"><?php echo $row['nama_pendidikan']; ?></option>
		
		 <?php  } ?>
		 
		 
		 
		 <select>
		<?php while($row = mysql_fetch_array($result))
		{ 
		?>	
		<option value="<?php echo $row['id_ayah'];?>"><?php echo $row['id_ayah'].'.  '.$row['nama_ayah']; ?></option>
		
		 <?php  } ?>
		 </select>
		 
		 
		 
		 
<select>
		<?php while($row = mysql_fetch_array($result))
		{ 
		?>	
		<option value="<?php echo $row['id_ibu'];?>"><?php echo $row['id_ibu'].'.  '.$row['nama_ibu']; ?></option>
		
		 <?php  } ?>
		 </select>