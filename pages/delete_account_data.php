<?php
include('config.php');
$db = new database();
if (isset($_GET['id'])) {
  $kode_peminjam = $_GET['id'];
  $data_peminjam = $db->kode_peminjam($kode_peminjam);
  $kode_peminjam = $data_peminjam[0]['kode_peminjam'];
  $db->hapus_data_peminjam($kode_peminjam);
  header('location: browse_data.php');
} else {
  header('location: browse_data.php');
}
