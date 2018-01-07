<?php
include "../config/koneksi.php";
include "../config/class_paging.php";
// Bagian Cari
if ($_GET['module']=='cari'){
  	include "cari.php";
 }
 // Bagian Pesan
if ($_GET['module']=='pesan'){
    include "../kirimpesan/dasbor/pesan.php";
 }
 // Bagian Cari
if ($_GET['module']=='cari'){
  	include "cari.php";
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
?>