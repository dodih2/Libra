<?php
include "../config/koneksi.php";
include "../config/class_paging.php";
// Bagian Home
if ($_GET['module']=='home'){
  	include "home.php";
 }
// Bagian Cari
if ($_GET['module']=='cari'){
  	include "cari.php";
 }
// Bagian Pesan
if ($_GET['module']=='pesan'){
    include "../kirimpesan/dasbor/pesan.php";
 }
// Bagian Detail Buku
if ($_GET['module']=='detail'){
  	include "detail_buku.php";
 }
// Bagian Kategori
if ($_GET['module']=='cari_kat'){
  	include "cari_kategori.php";
 }
// Bagian Beranda
if ($_GET['module']=='beranda'){
  	include "beranda.php";
 }
// Bagian User
if ($_GET['module']=='user'){
  	include "modul/mod_user/user.php";
}
// Bagian Buku
if ($_GET['module']=='buku'){
  	include "modul/mod_buku/buku.php";
}
// Bagian Kategori
if ($_GET['module']=='kategori'){
  	include "modul/mod_kategori/kategori.php";
}
// Bagian Penerbit
if ($_GET['module']=='penerbit'){
  	include "modul/mod_penerbit/penerbit.php";
}
if ($_GET['module']=='penulis'){
  	include "modul/mod_penulis/penulis.php";
}
?>