<?php
session_start();
error_reporting(0);
include "timeout.php";

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:../logout.php');
}
else{
if (empty($_SESSION['username']) AND empty($_SESSION['password']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Polindra</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" href="gambar/LIBRA-icon.png">
	<link href="../asset/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="btss">
	<div id="atas-kiri">
	<a href=?module=home>LIBRARY POLINDRA</a>
	</div>
	<div id="atas-kanan">
	    <ul>
			<li><a href=?module=beranda>Beranda </a><span>|</span></li>
			<li><a href=?module=pesan>Pesan </a><span>|</span></li>
			<li><a href=?module=home>Admin Editor <span>|</span></li></li>
			<li><a href=?module=buku>Tambah Buku <span>|</span></li></li>
			<li><a href=?module=user>Tambah User <span>|</span></li></li>
			<li><a href=../logout.php>Logout </a></li>
		</ul>
	   </div>
</div>
<div class="container-fluid">
	<div class="row">
		<div id="header">
			<br />
		    <a href=?module=beranda><img src="gambar/LIBRA-image.png" width="420px" height="220px"/></a>
		    <br />
		    <br />
		    <h1>Perpustakaan Politeknik Negeri Indramayu</h1>
		    <p class="teks">Perpustakaan adalah kunci dunia</p>
		    <br />
		    <br />
		  
		    <form method="post" action="?module=cari&act=search">
		    <input type="text" name="cari" class="cari" placeholder="Temukan Buku yang kamu cari!"/><br /><br />
		    <button type="submit" class="search">Cari Buku</button>
		    </form>
		</div>
	</div>
</div>
<div align="center" class="jarak">
	<div align="center" id="konten">
		<?php require 'konten.php'
		?>
	</div>
</div>
<div class="container-fluid">
    <div class="row" id="bawah">
        <?php include "../bawah.php";?>
    </div>
</div>
<div class="container-fluid">
	<div class="row" id="footer">
		Copyright &copy <a href="http://www.polindra.ac.id">Teknik Informatika Polindra</a> 2017 - 2018
	</div>
</div>
	<script src="../asset/js/jquery-3.2.1.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
}
?>
