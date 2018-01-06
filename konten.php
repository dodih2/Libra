<?php
include "config/koneksi.php";
include "config/class_paging.php";
// Bagian Home
$module = isset($_GET['module']) ? $_GET['module'] : null;
switch($module){
	case 'home' 	: include "home.php";
				   	  break;			   	  
	case 'tentang' 	: include "tentang.php";
				   	  break;
	case 'cari' 	: include "cari.php";
				      break;
	case 'detail' 	: include "detail_buku.php";
				   	  break;
	case 'cari_kat' : include "cari_kategori.php";
				      break;
default:
require "home.php";
}
?>