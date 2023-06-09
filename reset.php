<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Run the SQL query
$sql = "DELETE todo FROM todo LEFT JOIN (SELECT judul FROM todo LIMIT 1) AS t1 ON todo.judul = t1.judul WHERE t1.judul IS NULL";

if (mysqli_query($conn, $sql)) {
    echo "Records deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
header("Location: index.php"); // Kembali ke index
?>
