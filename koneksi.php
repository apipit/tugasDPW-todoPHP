<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "todo_db";

// membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// mengecek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>
