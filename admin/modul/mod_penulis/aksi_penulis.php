<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];
// Input penulis
if ($module=='penulis' AND $act=='input'){
  mysqli_query($conn, "INSERT INTO penulis(nama_penulis, alamat_penulis) VALUES('$_POST[nama_penulis]', '$_POST[alamat_penulis]')");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='penulis' AND $act=='update'){
	mysqli_query($conn, "UPDATE penulis SET nama_penulis 	 = '$_POST[nama_penulis]',
									 alamat_penulis = '$_POST[alamat_penulis]' 
							   WHERE id_penulis 	 = '$_POST[id]'");
	header('location:../../media.php?module='.$module);	
}
elseif($module=='penulis' AND $act=='delete'){
	mysqli_query($conn, "DELETE FROM penulis  WHERE  id_penulis = '$_GET[id]'");
	header('location:../../media.php?module='.$module);	
}
}
?>