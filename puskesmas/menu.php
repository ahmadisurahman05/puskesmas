<?php
if(!isset($_SESSION)) {
     session_start();
}
if(isset($_SESSION['status'])){
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../cssmenu/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="/script.js"></script>
   <title>Input Data Ayah</title>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='data/home.php' target="bidanayang">Home</a></li>
   <li class='active has-sub'><a href='' target="bidanayang">Lihat Data Pasien</a>
      <ul>
         <li class='sub'><a href='data/result_data_KB.php' target="bidanayang">Data Pencarian KB</a>
         <li class='has-sub'><a href='#'>Data Pencarian KIA</a>
            <ul>
               <li class='has-sub'><a href='#'>Data Pencarian Ibu</a>
            <ul>
            		<li class='sub'><a href='data/result_data_ibu_melahirkan.php' target="bidanayang">Data Pencarian Ibu Melahirkan</a>
					<li class='sub'><a href='data/result_data_ibu_periksa_hamil.php' target="bidanayang">Data Pencarian Ibu Periksa Hamil</a>
			</ul>
               <li><a href='data/result_data_anak.php' target="bidanayang">Data Pencarian Anak</a></li>
            </ul>
             <li class='sub'><a href='data/result_data_umum.php' target="bidanayang">Data Pencarian Umum</a>
         </li>
      </ul>
   </li>
   <li><a href="../logout.php">Logout</a></li>
 </div>

</body>
</html>
<?php 
}else{
?>
<script>document.location.href="../index.php"</script>
<?php 
}
?>