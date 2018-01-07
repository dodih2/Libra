<div id=home>
<div class='row'>
<?php
	$tampil = mysqli_query($conn, "SELECT * FROM buku WHERE id_kategori='$_GET[id]' ORDER BY id_buku DESC");
	$ketemu=mysqli_num_rows($tampil);
	
echo "<div class=result>";
if($ketemu > 0){
while($c=mysqli_fetch_array($tampil)){
	$_GET['id']=$c['id_buku'];
	echo "
	  <div class='col-sm-6 col-md-3'>
	  	<input type=hidden name='id_buku' value='$_GET[id]'>
	    <div class='thumbnail thumbnails'>
	      <img style='height:350px' src='../gambar/$c[cover]' alt='...'>
	      <div class='caption'>
	        <h3><a href='?module=detail&act=detail&id=$_GET[id]'>$c[judul_buku]</a></h3>
	        <p>$c[deskripsi]</p>
	        <input type=button class='btn btn-primary' value='Selengkapnya' onclick=\"window.location.href='?module=detail&act=detail&id=$_GET[id]';\">
	      </div>
	    </div>
	  </div>
";
}
}
else {
	echo "Upss E-book Nya gak ada Hikss :'("; 
}
echo "</div>";
?>
</div>
</div>