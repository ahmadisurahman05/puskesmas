<?php
$host="localhost";
$username="root"; 
$password="";
$db_name="bidan";
$tbl_name="tabel_ibu";

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name";
$result=mysql_query($sql);

?>

<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>
<table width="400" border="1" cellspacing="0" cellpadding="3">

<tr>
<td align="center"><strong>Nama Ibu</strong></td>
<td align="center"><strong>Alamat</strong></td>
<td align="center"><strong>Update</strong></td>
</tr>

<?php
while($rows=mysql_fetch_array($result)){
?>

<tr>
<td><?php echo $rows['nama_ibu']; ?></td>
<td><?php echo $rows['alamat']; ?></td>

<td align="center"><a href="update.php?id=<?php echo $rows['id_ibu']; ?>">update</a></td>
</tr>

<?php
}
?>
</table>
</td>
</tr>
<?php
mysql_close();
?>