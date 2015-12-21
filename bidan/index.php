<?php
if(!isset($_SESSION)) {
     session_start();
}
if(isset($_SESSION['status'])){
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Praktek Bidan</title>
</head>

<body>
<center>
<table width="800" border="0" align="center">
<tr>
  <td> 
    <?php include('menu.php'); 
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
  <td align="center"><h2></h2>
    <iframe name="bidanayang" src="data/home.php" width="900px" height="360px"></iframe>
</td>
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
<?php 
}else{
?>
<script language="Javascript">
alert("ANDA SUDAH LOGOUT, LOGIN TERLEBIH DAHULU UNTUK MASUK HALAMAN UTAMA");
document.location.href="../index.php"</script>
<?php 
}
?>