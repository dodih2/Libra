<div id=home>
<div class='row'>
<?php
switch($_GET['act']){	
	case "detail" :
	$detail=mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$_GET[id]'");
	$d=mysqli_fetch_array($detail);
	  $kate  = $d['id_kategori'];
	  $pnrbt = $d['id_penerbit'];
	  $pnls  = $d['id_penulis'];
	  $nama_kat   = mysqli_query($conn, "SELECT nama_kategori FROM kategori WHERE id_kategori = '$kate'");
	  $nama_pnrbt = mysqli_query($conn, "SELECT nama_penerbit FROM penerbit WHERE id_penerbit = '$pnrbt'");
	  $nama_pnls = mysqli_query($conn, "SELECT nama_penulis FROM penulis WHERE id_penulis = '$pnls'");
	  $k = mysqli_fetch_array($nama_kat);
	  $pb = mysqli_fetch_array($nama_pnrbt);
	  $pl = mysqli_fetch_array($nama_pnls);

	echo "
	<div class='row'>
  		<div class='col-sm-6 col-md-4 col-md-6 col-md-offset-4'>
    		<div class='thumbnail'>
      		<img style='height:350px' src='../gambar/$d[cover]' alt='...'>
      			<div class='caption'>
       		 		<h3>$d[judul_buku]</h3>
       		 		<p>Kategori&emsp;&emsp;: $k[nama_kategori]</p>
        			<p>Penulis    &emsp;&emsp; : $pl[nama_penulis]</p>
        			<p>Penerbit &emsp;&emsp;: $pb[nama_penerbit]</p>
        			<p>Tahun Tebit&emsp;: $d[tahun_terbit]</p>
        			<a class='btn btn-primary' role='button' value='DOWNLOAD' href='../ebook/$d[ebook]'>Pinjam Buku</a>
      			</div>
    		</div>
  		</div>
	</div>
	";
	break;
}
?>
</div>
</div>