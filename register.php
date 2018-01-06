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
    include "config/koneksi.php";
    echo "
    <div align='center' class='regis-j'>
      <div align='left' class='regis-f'>
        <div class='regis'>
          <div align='center'><img src='admin/gambar/LIBRA-image.png' style='height:250px'></div>
          <form action='aksi_register.php' method='POST'>
            <h2 align='center'>Pendaftaran.</h2>
            <hr class='featurette-divider'>
            <div class='form-group'>
              <label for='exampleInputEmail1'>Username :</label>
              <input name='username' type='text' class='form-control' id='exampleInputEmail1' placeholder='Username'>
            </div>
            <div class='form-group'>
              <label for='exampleInputPassword1'>Password :</label>
              <input name='password' type='password' class='form-control' id='exampleInputPassword1' placeholder='Password'>
            </div>
            <div class='form-group'>
              <label for='exampleInputEmail1'>Nama Lenkap :</label>
              <input name='nama' type='text' class='form-control' id='exampleInputEmail1' placeholder='Nama Lenkap'>
            </div>
            <div class='form-group'>
              <label for='exampleInputEmail1'>E-mail :</label>
              <input name='email' type='text' class='form-control' id='exampleInputEmail1' placeholder='Email'>
            </div>
            <div class='form-group'>
              <label for='exampleInputEmail1'>No.Telp/HP :</label>
              <input name='no_hp' type='text' class='form-control' id='exampleInputEmail1' placeholder='Nomer HP'>
            </div>";
include 'captcha/cap.php';
echo "
            <hr class='featurette-divider'>
            <button name'simpan' type='submit' class='btn btn-primary'>Simpan</button>
            <button name'simpan' type='submit' class='btn btn-default'><a href='index.php'>Batal</a></button>
            <hr class='featurette-divider'>
          </form>
        </div>
      </div>
    </div>
    ";
    ?>
    <script src="asset/js/jquery-3.2.1.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
</body>
</html>