<script type="text/javascript">
	function validasi(form){
		if (form.judul.value == ''){
			alert("Anda belum mengisikan Judul");
			form.judul.focus();
		return (false);
		}
			 
		if (form.kategori.value == ''){
			alert("Anda belum mengisikan kategori");
			form.kategori.focus();
			return (false);
		}
		if (form.penerbit.value == ''){
			alert("Anda belum mengisikan Penerbit");
			form.penerbit.focus();
			return (false);
		}
		if (form.penulis.value == ''){
			alert("Anda belum mengisikan Penulis");
			form.penulis.focus();
			return (false);
		}
		if (form.cover.value == ''){
			alert("Anda belum mengisikan cover");
			form.cover.focus();
			return (false);
		}
		if (form.ebook.value == ''){
			alert("Anda belum mengisikan Ebook");
			form.ebook.focus();
			return (false);
		}
		return (true);
	}
</script>
<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
	$aksi="modul/mod_buku/aksi_buku.php";
	switch($_GET[act]){
	default:
	
	$p      = new Paging;
    $batas  = 5;
    $posisi = $p->cariPosisi($batas);
	$no = $posisi+1;
	$cek = mysqli_query($conn, "SELECT * FROM buku");
	$jmldata = mysqli_num_rows($cek);
	$tampil = mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku DESC LIMIT $posisi,$batas");
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
	
	echo "<h2>BUKU</h2><br/>
          <input type=button class=tombol_tambah value='Tambah Buku' onclick=\"window.location.href='?module=buku&act=tambahbuku';\">
		  <input type=button class=tombol_tambah value='Kategori' onclick=\"window.location.href='?module=kategori';\">
		  <input type=button class=tombol_tambah value='Penerbit' onclick=\"window.location.href='?module=penerbit';\">
		  <input type=button class=tombol_tambah value='Penulis' onclick=\"window.location.href='?module=penulis';\">";
	      echo "<table class='list'><thead>
          <tr>
          <td class='left'><h4>NO</h4></td>
          <td class='left'><h4>JUDUL</h4></td>
          <td class='left'><h4>KATEGORI</h4></td>
          <td class='left'><h4>PENERBIT</h4></td>
          <td class='center'><h4>PENULIS</h4></td>
          <td class='center'><h4>TAHUN TERBIT</h4></td>
		  <td class='center'><h4>E-BOOK</h4></td>
		  <td class='center' colspan=2><h4>AKSI</h4></td>
          </tr></thead> "; 
	  while ($r=mysqli_fetch_assoc($tampil)){
	  $_GET[id]=$r[id_buku];
	  $kate  = $r[id_kategori];
	  $pnrbt = $r[id_penerbit];
	  $pnls  = $r[id_penulis];
	  $nama_kat   = mysqli_query($conn, "SELECT nama_kategori FROM kategori WHERE id_kategori = '$kate'");
	  $nama_pnrbt = mysqli_query($conn, "SELECT nama_penerbit FROM penerbit WHERE id_penerbit = '$pnrbt'");
	  $nama_pnls = mysqli_query($conn, "SELECT nama_penulis FROM penulis WHERE id_penulis = '$pnls'");
	  $k = mysqli_fetch_array($nama_kat);
	  $pb = mysqli_fetch_array($nama_pnrbt);
	  $pl = mysqli_fetch_array($nama_pnls);
       echo "<tr><td class='left' width='25'>$no</td>
             <td class='left'>$r[judul_buku]</td>
             <td class='left'>$k[nama_kategori]</td>
		         <td class='left'>$pb[nama_penerbit]</td>
		         <td class='left'>$pl[nama_penulis]</td>
		         <td class='center'>$r[tahun_terbit]</td>
				 <td class='center'><a href='../ebook/$r[ebook]'>$r[ebook]</a></td>
             <td class='center'><input type=button class=tombol_edit value=Edit onclick=\"window.location.href='?module=buku&act=editbuku&id=$r[id_buku]';\">
			 </td>
			 <td><input type=button class=tombol_hapus value=Hapus onclick=\"window.location.href='$aksi?module=buku&act=delete&id=$_GET[id]';\"></td></tr>
			 ";
		$no++;
   	  }
      echo "</table><br/>";
	  echo "
		    <div class='row'>
				<div class='col-md-6 col-md-offset-4'>
					<div class=\"pagination\"> $linkHalaman</div>
				</div>
			</div>
		";
   	  break;
	  case "tambahbuku":
	  $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori");
	  $penerbit = mysqli_query($conn, "SELECT * FROM penerbit ORDER BY id_penerbit");
	  $penulis  = mysqli_query($conn, "SELECT * FROM penulis ORDER BY id_penulis");
	  $tahun=1900;
	  echo "<h2>Tambah Buku</h2>
          <form method=POST action=$aksi?module=buku&act=input onSubmit='return validasi(this)'  enctype=multipart/form-data>
          <table>
          <tr><td>Judul</td>     	<td> : <input type=text name='judul'></td></tr>
		  <tr><td>Kategori</td>   	<td> : <select name=kategori>
		  								   <option value=''>- Pilih -</option>";
	 while ($kat=mysqli_fetch_array($kategori)){
	 		echo " <option value='$kat[id_kategori]'>$kat[nama_kategori]</option>";
	 	}
	 echo "</select></td></tr>          
           <tr><td>Penerbit</td> 	<td> : <select name='penerbit'>
		  								   <option value=''>- Pilih -</option>";
	 while ($pener=mysqli_fetch_array($penerbit)){
	 		echo " <option value='$pener[id_penerbit]'>$pener[nama_penerbit]</option>";
	 	}
	 echo "</select></td></tr>  
          <tr><td>Penulis</td>      <td> : <select name='penulis'>
		  								   <option value=''>- Pilih -</option>";
	while ($penul=mysqli_fetch_array($penulis)){
	 		echo " <option value='$penul[id_penulis]'>$penul[nama_penulis]</option>";
	 	}	  
	echo "	  
		  </select></td></tr>
          <tr><td>Tahun Terbit</td> <td> : <select name='tahun_terbit'><option>";
		  $y=date('Y');
		  for ($i=$tahun; $i<=$y; $i++){
			  	echo "<option value='$i'>$i<br>";
				echo "</option>";
			  }
	echo "
		  <tr><td>Cover</td>     	<td> : <input type=file name='cover'>
		  <tr><td>Deskripsi</td>    <td> : <textarea type=text name='deskripsi' style='width:250px; height:70px;'></textarea></td></tr>
		  <tr><td>E-book</td>     	<td> : <input type=file name='ebook'>
		  
		<tr><td colspan=2><input type=submit value=Simpan name=simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
		</table></form>";
	  break;
	  case "editbuku":
 	  	$kategori=mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori");
	  	$penerbit=mysqli_query($conn, "SELECT * FROM penerbit ORDER BY id_penerbit");
	 	$penulis=mysqli_query($conn, "SELECT * FROM penulis ORDER BY id_penulis");
	  	$tahun=1900;
	  	$r[id_buku]=$_GET[id];
	  	$edit=mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$_GET[id]'");
    	$r=mysqli_fetch_array($edit);
	  echo "<h2>Edit</h2>
          <form method=POST action=$aksi?module=buku&act=update enctype=multipart/form-data>
		  <input type=hidden name=id value='$r[id_buku]'>
          <table class='list'>
          <tr><td>Judul</td>     	<td> : <input type=text name='judul' value='$r[judul_buku]'></td></tr>
		  <tr><td>Kategori</td>   	<td> : <select name=kategori>
		  								   <option value='$r[id_kategori]'>- Pilih -</option>";
		  
		 while ($kat=mysqli_fetch_array($kategori)){
	 		echo " <option value='$kat[id_kategori]'>$kat[nama_kategori]</option>";
	 	}
	 echo "								   </select></td></tr>          
          <tr><td>Penerbit</td> 	<td> : <select name='penerbit'>
		  								   <option value='$r[id_penerbit]'>- Pilih -</option>";
	 while ($pener=mysqli_fetch_array($penerbit)){
	 		echo " <option value='$pener[id_penerbit]'>$pener[nama_penerbit]</option>";
	 	}
	 echo "
		  </select></td></tr>  
          <tr><td>Penulis</td>      <td> : <select name='penulis'>
		  								   <option value='$r[id_penulis]'>- Pilih -</option>";
	while ($penul=mysqli_fetch_array($penulis)){
	 		echo " <option value='$penul[id_penulis]'>$penul[nama_penulis]</option>";
	 	}	  
	echo "	  
		  </select></td></tr>
          <tr><td>Tahun Terbit</td> <td> : <select name='tahun_terbit'>";
		  $y=date('Y');
		  echo "<option value='$r[tahun_terbit]'></option>";
		  for ($i=$tahun; $i<=$y; $i++){
			  	echo "<option value='$i'>$i<br>";
				echo "</option>";
			  }
	echo "
		  </select>
		  <tr><td>Cover</td>     	<td> : <img src='../gambar/$r[cover]' widht='100px' height='100px'/><br /><input type=file name='cover'>
		  <tr><td>Deskripsi</td>    <td> : <textarea type=text name='deskripsi' style='width:250px; height:70px;'>$r[deskripsi]</textarea></td></tr>
		  <tr><td>E-book</td>     	<td> : <a href='../ebook/$r[ebook]'>$r[ebook]</a><br/><input type=file name='ebook'>
		  
		<tr><td colspan=2><input type=submit class=tombol_tambah value=Simpan name=simpan>
                            <input type=button class=tombol_hapus value=Batal onclick=self.history.back()></td></tr>
		</table></form>";
	  break;
	}
}
?>