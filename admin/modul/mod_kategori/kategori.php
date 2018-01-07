<script type="text/javascript">
	function validasi(form){
		if (form.nama_kategori.value == ''){
			alert("Anda belum mengisikan Nama Kategori!");
			form.nama_kategori.focus();
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
	$aksi="modul/mod_kategori/aksi_kategori.php";
	switch($_GET[act]){
	default:
	  	$p      = new Paging;
    	$batas  = 5;
    	$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$cek = mysqli_query($conn, "SELECT * FROM kategori");
		$jmldata = mysqli_num_rows($cek);
		$tampil = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori DESC LIMIT $posisi,$batas");
		$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
	   echo "<h2>KATEGORI</h2>
          <input type=button class=tombol_tambah value='Tambah Kategori' onclick=\"window.location.href='?module=kategori&act=tambahkategori';\">";
      echo "<h2>User</h2>";
	      echo "<table><thead>
          <tr>
          <td class='left'><h4>NO</h3></td>
          <td class='left'><h4>NAMA KATEGORI</h4></td>
		  <td colspan=2><h4>AKSI</h4></td>
          </tr></thead> "; 
	  while ($r=mysqli_fetch_array($tampil)){
	  $_GET['id']=$r['id_kategori'];
       echo "<tr><td class='left' width='25'>$no</td>
             <td class='left'>$r[nama_kategori]</td>
             <td class='center' width='50'><input type=button class=tombol_edit value=Edit onclick=\"window.location.href='?module=kategori&act=editkategori&id=$r[id_kategori]';\">	
			 </td>
			 <td><input type=button class=tombol_hapus value=Hapus onclick=\"window.location.href='$aksi?module=kategori&act=delete&id=$_GET[id]';\"></td></tr>
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
	  case "editkategori":
	  $edit = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori = '$_GET[id]'");
	  $r=mysqli_fetch_array($edit);
	  $r['id_kategori']=$_GET['id'];
	  echo "<h2>Edit Kategori</h2>
          <form method=POST action=$aksi?module=kategori&act=update onSubmit='return validasi(this)'>
          <input type=hidden name=id value='$r[id_kategori]'>
		  <table class='list'>
          <tr><td>Nama Kategori</td>     	<td> : <input type=text name='nama_kategori' value='$r[nama_kategori]'></td></tr>
		  <tr><td colspan=2><input type=submit class=tombol_tambah value=Simpan name=simpan>
                            <input type=button class=tombol_hapus value=Batal onclick=self.history.back()></td></tr>
		</table></form>";
	  break;
	  case "tambahkategori":
	  echo "<h2>Tambah Kategori</h2>
          <form method=POST action=$aksi?module=kategori&act=input onSubmit='return validasi(this)'>
          <table class='list'>
          <tr><td>Nama Kategori</td>     	<td> : <input type=text name='nama_kategori'></td></tr>
		  <tr><td colspan=2><input type=submit  class=tombol_tambah value=Simpan name=simpan>
                            <input type=button value=Batal class=tombol_hapus onclick=self.history.back()></td></tr>
		</table></form>";
	  break;
	}
}
?>