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

// Input user
if ($module=='user' AND $act=='input'){
  $pass=md5($_POST['password']);
  mysqli_query($conn, "INSERT INTO user(username,
                                 password,
                                 nama,
                                 email, 
                                 no_hp,
								 level,
                                 id_session) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama]',
                                '$_POST[email]',
                                '$_POST[no_hp]',
								'$_POST[level]',
                                '$pass')");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='user' AND $act=='update'){
  if (empty($_POST[password])) {
    mysqli_query($conn, "UPDATE user SET  nama		     = '$_POST[nama]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_hp	         = '$_POST[no_hp]'  
                           WHERE  id_user        = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST['password']);
    mysqli_query($conn, "UPDATE user  SET password       = '$pass',
                                 nama		     = '$_POST[nama]',
                                 email           = '$_POST[email]',  
                                 blokir          = '$_POST[blokir]',  
                                 no_hp	         = '$_POST[no_hp]'  
                           WHERE id_user	     = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
elseif ($module=='user' AND $act=='delete'){
	mysqli_query($conn, "DELETE FROM user  WHERE  id_user = '$_GET[id]'");
	header('location:../../media.php?module='.$module);
}
}
?>