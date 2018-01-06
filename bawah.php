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
<?php
	$p      = new Paging;
    $batas  = 5;
    $posisi = $p->cariPosisi($batas);
    $cek = mysqli_query($conn, "SELECT * FROM buku");
	$jmldata = mysqli_num_rows($cek);
	$buku_terbaru = mysqli_query($conn, "SELECT judul_buku, id_buku FROM buku ORDER BY id_buku DESC LIMIT $posisi,$batas");
	$kategori = mysqli_query($conn, "SELECT nama_kategori, id_kategori FROM kategori ORDER BY id_kategori ASC");

echo "<div style=height:300px>";
echo "<table class=tbl>";
echo "<tr>";
echo "<td><h4>BUKU TERBARU</h4></td>";
echo "</tr>";
while($b=mysqli_fetch_array($buku_terbaru)){
	$_GET['id']=$b['id_buku'];
	echo "<tr><td><a href=?module=detail&act=detail&id=$_GET[id]>$b[judul_buku]</a></td></tr>";
}
echo "</table>";
echo "<table class=tbl>";
echo "<tr><td><h4>Kategori</h4></td></tr>";
while($k=mysqli_fetch_array($kategori)){
	$_GET['id']=$k['id_kategori'];
	echo "<tr><td class=warna><a href=?module=cari_kat&id=$_GET[id]>$k[nama_kategori]</a></td></tr>";
}
echo "</table>";
echo "</table>";
echo "<table class=tbl>";
echo "<tr><td><h4>Pesan</h4></td></tr>";
include 'tiny.php';
echo "</table>";
echo "</div>";
?>

</body>
</html>