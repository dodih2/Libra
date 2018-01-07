<script type="text/javascript">
	function validasi(form){
		if (form.nama_penulis.value == ''){
			alert("Anda belum mengisikan Nama Penulis!");
			form.nama_penulis.focus();
		return (false);
		}
		if (form.alamat_penulis.value == ''){
			alert("Anda belum mengisikan Alamat Penulis!");
			form.alamat_penulis.focus();
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
	$aksi="modul/mod_penulis/aksi_penulis.php";
	switch($_GET['act']){
	default:
	  	$p      = new Paging;
    	$batas  = 5;
    	$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$cek = mysqli_query($conn, "SELECT * FROM penulis");
		$jmldata = mysqli_num_rows($cek);
		$tampil = mysqli_query($conn, "SELECT * FROM penulis ORDER BY id_penulis DESC LIMIT $posisi,$batas");
		$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
	   echo "<h2>penulis</h2>
          <input type=button class=tombol_tambah value='Tambah penulis' onclick=\"window.location.href='?module=penulis&act=tambahpenulis';\">";
      echo "<h2>penulis</h2>";
	      echo "<table class='list'><thead>
          <tr>
          <td class='left'><h4>NO</h4></td>
          <td class='left'><h4>NAMA PENULIS</h4></td>
		  <td class='left'><h4>ALAMAT</h4></td>
		  <td colspan=2><h4>AKSI</h4></td>
          </tr></thead> "; 

	  while ($r=mysqli_fetch_array($tampil)){
	  $_GET['id']=$r['id_penulis'];
       echo "<tr><td class='left' width='25'>$no</td>
             <td class='left'>$r[nama_penulis]</td>
			 <td class='left'>$r[alamat_penulis]</td>
             <td class='center' width='50'><input type=button class=tombol_edit value=Edit onclick=\"window.location.href='?module=penulis&act=editpenulis&id=$r[id_penulis]';\">	
			 </td>
			 <td><input type=button class=tombol_hapus value=Hapus onclick=\"window.location.href='$aksi?module=penulis&act=delete&id=$_GET[id]';\"></td></tr>
			 ";
      $no++;
   	  }
      echo "</table>";
	  echo "
		    <div class='row'>
				<div class='col-md-6 col-md-offset-4'>
					<div class=\"pagination\"> $linkHalaman</div>
				</div>
			</div>
		";
   	  break;
	  case "editpenulis":
	  $edit = mysqli_query($conn, "SELECT * FROM penulis WHERE id_penulis = '$_GET[id]'");
	  $r=mysqli_fetch_array($edit);
	  $r['id_penulis']=$_GET['id'];
	  echo "<h2>Edit penulis</h2>
          <form method=POST action=$aksi?module=penulis&act=update onSubmit='return validasi(this)'>
          <input type=hidden name=id value='$r[id_penulis]'>
		  <table class='list'>
          <tr><td>Nama penulis</td>     	<td> : <input type=text name='nama_penulis' value='$r[nama_penulis]'></td></tr>
		  <tr><td>Nama penulis</td>     	<td> : <textarea type=text name='alamat_penulis'>$r[alamat_penulis]</textarea></td></tr>
		  <tr><td colspan=2><input type=submit class=tombol_tambah value=Simpan name=simpan>
                            <input type=button class=tombol_hapus value=Batal onclick=self.history.back()></td></tr>
		</table></form>";
	  break;
	  case "tambahpenulis":
	  echo "<h2>Tambah penulis</h2>
          <form method=POST action=$aksi?module=penulis&act=input onSubmit='return validasi(this)'>
          <table class='list'>
          <tr><td>Nama penulis</td>     	<td> : <input type=text name='nama_penulis'></td></tr>
		  <tr><td>Alamat penulis</td>     	<td> : <textarea type=text name='alamat_penulis'></textarea></td></tr>
		  <tr><td colspan=2><input type=submit class=tombol_tambah value=Simpan name=simpan>
                            <input type=button class=tombol_hapus value=Batal onclick=self.history.back()></td></tr>
		</table></form>";
	  break;
	}
}
?>