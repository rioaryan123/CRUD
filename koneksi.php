<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'db_sekolah';
$conn = mysqli_connect('localhost', 'root', '', 'db_kampus');
  if($conn){
    // echo "koneksi berhasil";
  }
mysqli_select_db($conn, $db);
?>
