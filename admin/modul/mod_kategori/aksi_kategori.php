<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
$module=$_GET[module];
$act=$_GET[act];
// Input Kategori
if ($module=='kategori' AND $act=='input'){
  mysqli_query($conn, "INSERT INTO kategori(nama_kategori) VALUES('$_POST[nama_kategori]')");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='kategori' AND $act=='update'){
	mysqli_query($conn, "UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]' WHERE id_kategori = '$_POST[id]'");
	header('location:../../media.php?module='.$module);	
}
elseif($module=='kategori' AND $act=='delete'){
	mysqli_query($conn, "DELETE FROM kategori  WHERE  id_kategori = '$_GET[id]'");
	header('location:../../media.php?module='.$module);	
}
}
?>