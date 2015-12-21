<?php require_once('../../Connections/koneksi.php'); ?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="action_input_umum.php" method="post" name="form1" id="form1">
  <p><h1>Menu Umum</h1>&nbsp;</p>
  <table align="center">
    
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama Penyakit:</td>
      <td><input type="text" name="nama_penyakit" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama:</td>
      <td><input type="text" name="nama" value="" size="32" required /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Umur:</td>
      <td><input type="text" name="umur" value="" size="32" required /></td>
    </tr>
     <tr valign="baseline">
      <td nowrap align="right">Jenis Kelamin :</td>
      <td><label><input type="radio" name="jenis_kelamin" value="L"/>Laki-Laki</label>
	  <label><input type="radio" name="jenis_kelamin" value="P"/>Perempuan</label>
	  </td>
	 </tr>
	 <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tanggal Periksa:</td>
      <td><input type="date" name="tanggal" value="" size="32" required	 /></td>
    </tr>
	<tr valign="baseline">
      <td nowrap="nowrap" align="right">Alamat:</td>
      <td><textarea  name="alamat" required></textarea></td>
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
    <a href="input_Imunisasi.php"> <-- Input IMunisasi</a> | <a href="input_kb.php">Input KB--></a></p></p>
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>