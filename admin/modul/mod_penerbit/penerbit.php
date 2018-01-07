<script type="text/javascript">
	function validasi(form){
		if (form.nama_penerbit.value == ''){
			alert("Anda belum mengisikan Nama Penerbit!");
			form.nama_penerbit.focus();
		return (false);
		}
		if (form.alamat_penerbit.value == ''){
			alert("Anda belum mengisikan Alamat Penerbit!");
			form.alamat_penerbit.focus();
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
	$aksi="modul/mod_penerbit/aksi_penerbit.php";
	switch($_GET['act']){
	default:
	  	$p      = new Paging;
    	$batas  = 5;
    	$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$cek = mysqli_query($conn, "SELECT * FROM penerbit");
		$jmldata = mysqli_num_rows($cek);
		$tampil = mysqli_query($conn, "SELECT * FROM penerbit ORDER BY id_penerbit DESC LIMIT $posisi,$batas");
		$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
	   echo "<h2>PENERBIT</h2>
          <input type=button class=tombol_tambah value='Tambah Penerbit' onclick=\"window.location.href='?module=penerbit&act=tambahpenerbit';\">";
      echo "<h2>Penerbit</h2>";
	      echo "<table><thead>
          <tr>
          <td class='left'>no</td>
          <td class='left'>Nama Penerbit</td>
		  <td class='left'>Alamat</td>
		  <td colspan=2><h4>AKSI</h4></td>
          </tr></thead> "; 
	  while ($r=mysqli_fetch_array($tampil)){
	  $_GET['id']=$r['id_penerbit'];
       echo "<tr><td class='left' width='25'>$no</td>
             <td class='left'>$r[nama_penerbit]</td>
			 <td class='left'>$r[alamat_penerbit]</td>
             <td class='center' width='50'><input type=button class=tombol_edit value=Edit onclick=\"window.location.href='?module=penerbit&act=editpenerbit&id=$r[id_penerbit]';\">
			 </td>
			 <td><input type=button class=tombol_hapus value=Hapus onclick=\"window.location.href='$aksi?module=penerbit&act=delete&id=$_GET[id]';\"></td></tr>
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
	  case "editpenerbit":
	  $edit = mysqli_query($conn, "SELECT * FROM penerbit WHERE id_penerbit = '$_GET[id]'");
	  $r=mysqli_fetch_array($edit);
	  $r['id_penerbit']=$_GET['id'];
	  echo "<h2>Edit penerbit</h2>
          <form method=POST action=$aksi?module=penerbit&act=update onSubmit='return validasi(this)'>
          <input type=hidden name=id value='$r[id_penerbit]'>
		  <table class='list'>
          <tr><td>Nama penerbit</td>     	<td> : <input type=text name='nama_penerbit' value='$r[nama_penerbit]'></td></tr>
		  <tr><td>Nama penerbit</td>     	<td> : <textarea type=text name='alamat_penerbit'>$r[alamat_penerbit]</textarea></td></tr>
		  <tr><td colspan=2><input type=submit class=tombol_tambah value=Simpan name=simpan>
                            <input type=button class=tombol_hapus value=Batal onclick=self.history.back()></td></tr>
		</table></form>";
	  break;
	  case "tambahpenerbit":
	  echo "<h2>Tambah penerbit</h2>
          <form method=POST action=$aksi?module=penerbit&act=input onSubmit='return validasi(this)'>
          <table class='list'>
          <tr><td>Nama penerbit</td>     	<td> : <input type=text name='nama_penerbit'></td></tr>
		  <tr><td>Nama penerbit</td>     	<td> : <textarea type=text name='alamat_penerbit'></textarea></td></tr>
		  <tr><td colspan=2><input type=submit class=tombol_tambah value=Simpan name=simpan>
                            <input type=button class=tombol_hapus value=Batal onclick=self.history.back()></td></tr>
		</table></form>";
	  break;
	}
}
?>