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
   <li class='active has-sub'><a href='#'>Data Pasien</a>
      <ul>
         <li class='has-sub'><a href='#'>Registrasi Pasien</a>
            <ul>
               <li><a href='data/input_ibu.php' target="bidanayang">Data Ibu</a></li>
               <li><a href='data/input_ayah.php' target="bidanayang">Data Ayah</a></li>
               <li><a href='data/input_anak.php' target="bidanayang">Data Anak</a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'>List Data Pasien</a>
        	 <ul>
               <li><a href='data/list_ayah.php' target="bidanayang">Data Ayah</a></li>
               <li><a href='data/list_ibu.php' target="bidanayang">Data Ibu</a></li>
               <li><a href='data/list_anak.php' target="bidanayang">Data Anak</a></li>
            </ul>
      </ul>
   <li class='active has-sub'><a href='#'>Pelayanan</a>
      <ul>
         <li class='sub'><a href='data/input_kb.php' target="bidanayang">KB</a>
         <li class='has-sub'><a href='#'>KIA</a>
            <ul>
               <li class='has-sub'><a href='#'>Ibu</a>
            <ul>
               <li><a href='data/input_periksa_ibu_hamil.php' target="bidanayang">Periksa Hamil</a></li>
               <li><a href='data/input_melahirkan.php' target="bidanayang">Melahirkan</a></li>
            </ul>
               <li><a href='data/input_imunisasi.php' target="bidanayang">Anak</a></li>
            </ul>
             <li class='sub'><a href='data/input_umum.php' target="bidanayang">Umum</a>
         </li>
      </ul>
   </li>
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
   <li class='has-sub'><a href='#'>Akun</a>
            <ul>
               <li><a href='data/register.php' target="bidanayang">Register</a></li>
               <li><a href='data/update.php' target="bidanayang">Update</a>
               <li><a href="../logout.php">Logout</a></li>
            </ul>
   
</ul>
</div>

</body>
<html>
