<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Polindra</title>
<link rel="stylesheet" type="text/css" href="style.css"  />
<link href="asset/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="admin/gambar/LIBRA-icon.png">
</head>
<body>
<div class="btss">
    <div id="atas-kiri">
    <a href=?module=home>LIBRARY POLINDRA</a>
    </div>
    <div id="atas-kanan">
    <a href=?module=home>Beranda </a><span>|</span>
    <a href=?module=tentang>Tentang Kami </a><span>|</span>
    <?php
        include "login.php"
    ?>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div id="header">
            <br />
            <a href=?module=home><img src="admin/gambar/LIBRA-image.png" width="420px" height="220px"/></a>
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
<div class="container-fluid">
	<div class="row">
        <div id="konten"><?php require "konten.php";?></div>
    </div>
</div>
<div class="container-fluid">
    <div class="row" id="bawah">
        <?php include "bawah.php";?>
    </div>
</div>

<div class="container-fluid">
    <div class="row" id="footer">
        Copyright &copy <a href="http://www.polindra.ac.id">Teknik Informatika Polindra</a> 2017 - 2018
    </div>
</div>
    <script src="asset/js/jquery-3.2.1.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
</body>
</html>