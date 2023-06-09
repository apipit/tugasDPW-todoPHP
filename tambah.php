<?php

// Get the task title and due date from the POST request
$task_title = $_POST['taskTitle'];
$task_date = $_POST['taskDate'];

// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$database = "todo_db";

$conn = mysqli_connect($host, $username, $password, $database);
// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menyiapkan pernyataan SQL
$sql = "INSERT INTO todo (id,judul,tanggal) VALUES ('','$task_title', '$task_date')";

// Menjalankan pernyataan SQL dan memeriksa hasilnya
if (mysqli_query($conn, $sql)) {
    echo '<div id="alert" class="alert alert-success" role="alert" style="position: fixed; top: 20px; right: 20px; display: none;">
    Data Berhasil di Update ✅
  </div>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("Location: index.php");
?>
