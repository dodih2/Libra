<?php
include "config/koneksi.php";

$pass     = md5($_POST['password']);
$login=mysqli_query($conn, "SELECT * FROM user WHERE username='$_POST[username]' AND password='$pass' AND blokir='N'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

if ($ketemu > 0){
  session_start();
  include "admin/timeout.php";
  
  $_SESSION['username']     = $r['username'];
  $_SESSION['password']     = $r['password'];
  
  $_SESSION['login'] = 1;
  timer();

  header('location:'.$r['level']);
}
else{
	$error_login = "Maaf, Username & Password Salah! Atau ID Anda Sedang Di Blokir Oleh Admin.";
	echo "
	<html>
	<head>
	<title>Login Admin</title>
	</head>
	<body>
	
	<div>
	<div> 
	$error_login
	<br /><center><a href=\"index.php\" class=\"clickhere\">ULANGI LAGI</a></center>
	</div>
	</div>
	
	</body>
	</html>
	";
}
?>