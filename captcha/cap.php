<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title>
		</title>
		<link rel="stylesheet" type="text/css" href="../style.css"  />
<link href="../asset/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="../admin/gambar/LIBRA-icon.png">
	</head>
	<body>
<form action="captcha/hasil.php" method="post">
      <table border="0" cellpadding="0" cellspacing="0" align="center">
        <td><label for="exampleInputEmail1">Captcha :</label></td>
        <td><img src="captcha/gambar.php" alt="gambar" /> </td>
        </tr>
        <td><label for="exampleInputEmail1">Isikan Captcha :</label></td>
        <td><input name="nilaiCaptcha" value="" maxlength="6" class="form-control"/></td>
        <td><a href="hasil.php"><input type ="submit" value="Validasi Captcha" class="btn btn-primary"></a></td>
      </tr>
      </table>
    </form>
		    <script src="../asset/js/jquery-3.2.1.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
	</body>
</html>