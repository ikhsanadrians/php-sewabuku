<?php
ob_start();
include('config.php');
$koneksi = new database();

$cekdir = is_dir("foto_peminjam");
if ($cekdir) {
  opendir("foto_peminjam");
} else {
  mkdir("foto_peminjam");
  chmod("foto_peminjam", 0755);
  opendir("foto_peminjam");
}
$daftar_list = array("jpeg", "jpg", "png");
$name_file = $_FILES['foto_peminjam']['name'];
$pecah = explode(".", $name_file);
$ekstensi = $pecah[1];
if (in_array($ekstensi, $daftar_list)) {
  $lokasi_foto_peminjam = $_FILES['foto_peminjam']['tmp_name'];
  $nama_foto_peminjam = $_FILES['foto_peminjam']['name'];
  $dir_foto_peminjam = "foto_peminjam/$nama_foto_peminjam";
  move_uploaded_file($lokasi_foto_peminjam, $dir_foto_peminjam);
  $koneksi->tambah_data_peminjam(
    $_POST['kode_peminjam'],
    $_POST['nama_peminjam'],
    $_POST['jenis_kelamin'],
    $_POST['tanggal_lahir'],
    $_POST['alamat'],
    $_POST['pekerjaan'],
    $dir_foto_peminjam
  );
  header('location: browse_data.php');
  ob_flush();
} else {
  echo "Type file harus berupa gambar <br>";
  header('location: browse_data.php');
  ob_flush();
}
