<div class='row'>
<?php
	$aksi="modul/mod_buku/aksi_buku.php";
	$act = isset($_GET['act']) ? $_GET['act'] : null;
 	switch($act){
	default:
		 $p      = new Paging;
    $batas  = 12;
    $posisi = $p->cariPosisi($batas);
	$no = $posisi+1;
	$cek = mysqli_query($conn, "SELECT * FROM buku");
	$jmldata = mysqli_num_rows($cek);
	$tampil = mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku DESC LIMIT $posisi,$batas");
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
	
	  while ($r=mysqli_fetch_assoc($tampil)){

	  echo "
			<div class='col-sm-6 col-md-3'>
			    <div class='thumbnail thumbnails'>
			    	<img style='height:350px' src='../gambar/$r[cover]' alt='cover'>
			    	<div class='caption'>
			        	<h4>$r[judul_buku]</h4>
			        	<p>$r[deskripsi]</p>
			        	<input type=button class='btn btn-primary' value='Selengkapnya' onclick=\"window.location.href='?module=detail&act=detail&id=$r[id_buku]';\">
			      	</div>
			    </div>
			</div>
		";
		$no++;
   	  }
   	  break;
	}
?>
</div>
<?php
echo "
    <div class='row'>
		<div class='col-md-6 col-md-offset-4'>
			<div class=\"pagination\"> $linkHalaman</div>
		</div>
	</div>
";
?>