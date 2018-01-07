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
// Input penerbit
if ($module=='penerbit' AND $act=='input'){
  mysqli_query($conn, "INSERT INTO penerbit(nama_penerbit, alamat_penerbit) VALUES('$_POST[nama_penerbit]', '$_POST[alamat_penerbit]')");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='penerbit' AND $act=='update'){
	mysqli_query($conn, "UPDATE penerbit SET nama_penerbit 	 = '$_POST[nama_penerbit]',
									 alamat_penerbit = '$_POST[alamat_penerbit]' 
							   WHERE id_penerbit 	 = '$_POST[id]'");
	header('location:../../media.php?module='.$module);	
}
elseif($module=='penerbit' AND $act=='delete'){
	mysqli_query($conn, "DELETE FROM penerbit  WHERE  id_penerbit = '$_GET[id]'");
	header('location:../../media.php?module='.$module);	
}
}
?>