<script type="text/javascript">
	function validasi(form){
		if (form.username.value == ''){
			alert("Anda belum mengisikan Username");
			form.username.focus();
		return (false);
		}
			 
		if (form.password.value == ''){
			alert("Anda belum mengisikan Password");
			form.password.focus();
			return (false);
		}
		if (form.level.value == ''){
			alert("Anda belum mengisikan Level");
			form.level.focus();
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
	$aksi="modul/mod_user/aksi_user.php";
	
	switch($_GET[act]){
	  // Tampil User
	  default:
	 	$p      = new Paging;
    	$batas  = 5;
    	$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$cek = mysqli_query($conn, "SELECT * FROM user");
		$jmldata = mysqli_num_rows($cek);
		$tampil = mysqli_query($conn, "SELECT * FROM user ORDER BY id_user DESC LIMIT $posisi,$batas");
		$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
      
	  echo "<h2>User</h2><br/>
          <input type=button class=tombol_tambah value='Tambah User' onclick=\"window.location.href='?module=user&act=tambahuser';\">";
  
	      echo "<table><thead>
          <tr>
          <td class='left'><h4>No</h4></td>
          <td class='left'><h4>Uername</h4></td>
          <td class='left'><h4>Nama Lengkap</h4></td>
          <td class='left'><h4>Email</h4></td>
          <td class='left'><h4>No.HP</h4></td>
          <td class='center'><h4>Level</h4></td>
          <td class='center'><h4>Blokir</h4></td>
          <td class='center' colspan=2><h4>Aksi</h4></td>
          </tr></thead> "; 

	  while ($r=mysqli_fetch_array($tampil)){
	  $_GET['id']=$r['id_user'];
       echo "<tr><td class='left' width='25'>$no</td>
             <td class='left'>$r[username]</td>
             <td class='left'>$r[nama]</td>
		         <td class='left'><a href=mailto:$r[email]>$r[email]</a></td>
		         <td class='left'>$r[no_hp]</td>
		         <td class='center'>$r[level]</td>
		         <td class='center'>$r[blokir]</td>
             <td class='center' width='50'><input type=button class=tombol_edit value=Edit onclick=\"window.location.href='?module=user&act=edituser&id=$r[id_user]';\">	
			 </td>
			 <td><input type=button class=tombol_hapus value=Hapus onclick=\"window.location.href='$aksi?module=user&act=delete&id=$_GET[id]';\"></td></tr>
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
	case "tambahuser":
	  echo "<h2>Tambah User</h2>
          <form method=POST action=$aksi?module=user&act=input onSubmit='return validasi(this)'>
          <table class='list'>
          <tr><td>Username</td>     <td> : <input type=text name='username'></td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'></td></tr>
          <tr><td>Nama Lengkap</td> <td> : <input type=text name='nama' size=30></td></tr>  
          <tr><td>E-mail</td>       <td> : <input type=text name='email' size=30></td></tr>
          <tr><td>No.Telp/HP</td>   <td> : <input type=text name='no_hp' size=20></td></tr>
		  <tr><td>Level</td>   		<td> : <select name=level>
										   <option value=''>- Pilih -</option>
										   <option value=admin>admin</option>
										   <option value=user>user</option>
										   </select></td></tr>
		<tr><td colspan=2><input type=submit class=tombol_tambah value=Simpan name=simpan>
                            <input type=button value=Batal class=tombol_hapus onclick=self.history.back()></td></tr>
		</table></form>";
	  break;
	  case "edituser":
	  	$r['id_user']=$_GET['id'];
	  	$edit=mysqli_query($conn, "SELECT * FROM user WHERE id_user='$_GET[id]'");
    	$r=mysqli_fetch_array($edit);
		
		echo "<h2>Edit User</h2>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_user]'>
          <table class='list'>
          <tr><td class='left'>Username</td>     <td> : <input type=text name='username' value='$r[username]' disabled> **)</td></tr>
          <tr><td class='left'>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td class='left'>Nama Lengkap</td> <td> : <input type=text name='nama' size=30  value='$r[nama]'></td></tr>
          <tr><td class='left'>E-mail</td>       <td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td class='left'>No.Telp/HP</td>   <td> : <input type=text name='no_hp' size=30 value='$r[no_hp]'></td></tr>";

		 if ($r[blokir]=='N'){
		 	 echo "<tr><td class='left'>Blokir</td>     <td> : <input type=radio name='blokir' value='Y'> Y   
											   <input type=radio name='blokir' value='N' checked> N </td></tr>";
		 }
		 else{
		 	 echo "<tr><td class='left'>Blokir</td>     <td> : <input type=radio name='blokir' value='Y' checked> Y  
											  <input type=radio name='blokir' value='N'> N </td></tr>";
		 }
		
		 echo "<tr><td class='left' colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
								**) Username tidak bisa diubah.</td></tr>
			  <tr><td class='left' colspan=2><input type=submit class=tombol_tambah value=Update>
								<input type=button class=tombol_hapus value=Batal class=tombol_hapus onclick=self.history.back()></td></tr>
			  </table></form>";
	  break;
	}
}
?>