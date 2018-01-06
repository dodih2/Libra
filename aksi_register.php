<?php
include "config/koneksi.php";

  $use  = $_POST['username'];
  $pas  =md5($_POST['password']);
  $nam  = $_POST['nama'];
  $ema  = $_POST['email'];
  $no   = $_POST['no_hp'];
  $simpan = mysqli_query($conn, "INSERT INTO user SET username='$use', password='$pas', nama='$nam', email='$ema', no_hp='$no', level='user'") or die(mysqli_error());
  if($simpan) {
    header('location: index.php');
   } else{
    echo "Upss Something wrong..";
   }
 ?>