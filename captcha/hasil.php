<?php
	    //memanggil lagi session untuk dimulai 
	    session_start();
	    if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
		    echo "Kode Captcha Anda Salah";
			}else{ // jika teryata lolos
			echo "Kode Captcha Anda Benar";
			}
	?>