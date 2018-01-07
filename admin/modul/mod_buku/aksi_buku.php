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

// Input buku
if ($module=='buku' AND $act=='input'){
	//Bagian Cover				
	$ekstensi_diperbolehkan	= array('png','jpg');
	$nama = $_FILES['cover']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['cover']['size'];
	$file_tmp = $_FILES['cover']['tmp_name'];
	
	//Bagian Ebook			
	$folder		= '../../../ebook/';
	$file_type	= array('doc','docx','xls','xlsx','pdf');
	$ebook	= $_FILES['ebook']['name'];
	$e = explode('.', $ebook);
	$ekst = strtolower(end($e));
	$file_size	= $_FILES['ebook']['size'];
	
	if((in_array($ekstensi, $ekstensi_diperbolehkan) === true) && (in_array($ekst, $file_type) === true)){
		if($ukuran < 1044070){
			move_uploaded_file($_FILES['ebook']['tmp_name'], $folder.$ebook);				
			move_uploaded_file($file_tmp, '../../../gambar/'.$nama);
			$query = mysqli_query($conn, "INSERT INTO buku(judul_buku,
									 			   id_kategori,
									  			   id_penerbit,
									  			   id_penulis, 
									  			   tahun_terbit,
									  			   cover,
									  			   deskripsi,
									  			   ebook) 
							   				 VALUES('$_POST[judul]',
									  				'$_POST[kategori]',
									  				'$_POST[penerbit]',
									  				'$_POST[penulis]',
									  				'$_POST[tahun_terbit]',
									  				'$nama',
									  				'$_POST[deskripsi]',
									  				'$ebook')");	
		}
		else{
			echo "<script>alert('Ukuran Cover Terlalu Besar!'); onclick=self.history.back()</script>";
		}
		header('location:../../media.php?module='.$module);
	}
	else{
		echo "<script>alert('Ekstensi File Tidak Diperbolehkan'); onclick=self.history.back()</script>";
	}
}
elseif ($module=='buku' AND $act=='update'){
		if (empty($_FILES['cover']['name'])) {
			if (empty($_FILES['ebook']['name'])){
    				mysqli_query($conn, "UPDATE buku SET  judul_buku	= '$_POST[judul]',
												  id_kategori	= '$_POST[kategori]',
												  id_penerbit	= '$_POST[penerbit]',
												  id_penulis	= '$_POST[penulis]',  
												  tahun_terbit	= '$_POST[tahun_terbit]',
												  deskripsi		= '$_POST[deskripsi]'  
										   WHERE  id_buku       = '$_POST[id]'");
				  header('location:../../media.php?module='.$module);
				}
			else {
				$folder		= '../../../ebook/';
				$file_type	= array('doc','docx','xls','xlsx','pdf');
				$ebook	= $_FILES['ebook']['name'];
				$e = explode('.', $ebook);
				$ekst = strtolower(end($e));
				if(in_array($ekst, $file_type) === true){
				move_uploaded_file($_FILES['ebook']['tmp_name'], $folder.$ebook);	
					mysqli_query($conn, "UPDATE buku SET      judul_buku	= '$_POST[judul]',
													  id_kategori	= '$_POST[kategori]',
													  id_penerbit	= '$_POST[penerbit]',
													  id_penulis	= '$_POST[penulis]',  
													  tahun_terbit	= '$_POST[tahun_terbit]',
													  deskripsi		= '$_POST[deskripsi]',
													  ebook			= '$ebook'  
											   WHERE  id_buku       = '$_POST[id]'");
				}
				else{
					echo "<script>alert('Ekstensi File Tidak Diperbolehkan'); onclick=self.history.back()</script>";
				}
			  	header('location:../../media.php?module='.$module);
			}
		}
		if (empty($_FILES['ebook']['name'])){
			
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['cover']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['cover']['size'];
			$file_tmp = $_FILES['cover']['tmp_name'];
			
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, '../../../gambar/'.$nama);
					mysql_queryi($conn, "UPDATE buku SET judul_buku		    = '$_POST[judul]', 
							 				     id_kategori		= '$_POST[kategori]',
											     id_penerbit		= '$_POST[penerbit]',
											     id_penulis		    = '$_POST[penulis]',
											     tahun_terbit	    = '$_POST[tahun_terbit]',
											     cover			    = '$nama',
											     deskripsi  		= '$_POST[deskripsi]'
											 WHERE id_buku          = '$_POST[id]'");
				}
				else{
					echo "<script>alert('Ukuran Gambar Terlalu Besar!'); onclick=self.history.back()</script>";
				}   
			 }
			else{
					echo "<script>alert('Ekstensi File Tidak Diperbolehkan'); onclick=self.history.back()</script>";
			}
			header('location:../../media.php?module='.$module);

		}
		else {
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['cover']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['cover']['size'];
			$file_tmp = $_FILES['cover']['tmp_name'];
						
			$folder		= '../../../ebook/';
			$file_type	= array('doc','docx','xls','xlsx','pdf');
			$ebook	= $_FILES['ebook']['name'];
			$e = explode('.', $ebook);
			$ekst = strtolower(end($e));
			$file_size	= $_FILES['ebook']['size'];	
			
			if((in_array($ekstensi, $ekstensi_diperbolehkan) === true) && (in_array($ekst, $file_type) === true)){
				if($ukuran < 1044070){
					move_uploaded_file($_FILES['ebook']['tmp_name'], $folder.$ebook);	
					move_uploaded_file($file_tmp, '../../../gambar/'.$nama);
					mysqli_query($conn, "UPDATE buku SET judul_buku		    = '$_POST[judul]', 
							 				     id_kategori		= '$_POST[kategori]',
											     id_penerbit		= '$_POST[penerbit]',
											     id_penulis		    = '$_POST[penulis]',
											     tahun_terbit	    = '$_POST[tahun_terbit]',
											     cover			    = '$nama',
											     deskripsi  		= '$_POST[deskripsi]',
											     ebook		    	= '$ebook'
											 WHERE id_buku          = '$_POST[id]'");
				}
				else{
					echo "<script>alert('Ukuran Gambar Terlalu Besar!'); onclick=self.history.back()</script>";
				}	   
			 }
			else{
					echo "<script>alert('Ekstensi File Tidak Diperbolehkan'); onclick=self.history.back()</script>";
			}
			header('location:../../media.php?module='.$module);
		}
		header('location:../../media.php?module='.$module);
}
elseif ($module=='buku' AND $act=='delete'){
	$del=mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$_GET[id]'");
	$r=mysqli_fetch_array($del);
	$file_cover = "../../../gambar/$r[cover]";
	$file_ebook = "../../../ebook/$r[ebook]";
	if (file_exists($file_cover) && file_exists($file_cover)){
		unlink($file_cover);
		unlink($file_ebook);
	}
	mysqli_query($conn, "DELETE FROM buku  WHERE  id_buku = '$_GET[id]'");

	header('location:../../media.php?module='.$module);
}
}
?>