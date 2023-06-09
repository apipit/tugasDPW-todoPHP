<?php
  // kode PHP 
// memanggil file koneksi.php
include_once "koneksi.php";

// query untuk mengambil data dari tabel
$sql = "SELECT * FROM todo";
$result = mysqli_query($conn, $sql);

// // mengecek apakah query berhasil
// if (mysqli_num_rows($result) > 0) {
//   // output data dari setiap baris
//   while($row = mysqli_fetch_assoc($result)) {
//     echo "ID: " . $row["id"]. " - Judul: " . $row["judul"]. "<br>";
//   }
// } else {
//   echo "Tidak ada data.";
// }

// menutup koneksi
mysqli_close($conn);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>411211075- ToDos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
  </head>
  <body style="background-color: #ccd3fd; ">
   <div class="container" style="max-width: 80%; padding-top: 2%;">
     <!-- nav header disini -->
    <style>
  .navbar-collapse {
    justify-content: flex-end;
  }

  .dropdown-menu {
    margin-top: 0;
    margin-right: 0;
    border-radius: 0;
    box-shadow: none;
    position: absolute;
    right: 0;
  }
  
</style>
<header>
  
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded" >
  <div class="container-fluid">
    <a href="index.php"><h3 class="navbar" style="padding-left: 1%;color:#25858b;">tuGAS</h3></a>
    

    <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="showAlert(event)">Todo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="showAlert(event)">Project</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="showAlert(event)">Team</a>
        </li>
      </ul>
      
    </div>
<!-- alert disini ya  -->

<div id="alert" class="alert alert-danger" role="alert" style="position: fixed; bottom: 20px; right: 20px; display: none;">
  Maaf, fitur belum tersedia pak 🙏
</div>

<!-- alert disini ya  -->

    <div class="nav-item dropdown" >
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="img/img1.png" alt="Avatar" class="rounded-circle" style="width: 30px; height: 30px;">
      </a>
      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
        <li><a class="dropdown-item" href="#" onclick="showAlert(event)">Profil mu</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

</div>

</header>



<main>
  <style>
  .col-md-4 h3 {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 10px;
    margin-bottom: 20px;
  }
</style>
  <div class="container " style="margin-top: 50px;">
  <div class="row gap-4 justify-content-center">
    <div class="col-md-4 rounded p-3" style="background-color: #f8f9fa07;">
      <style>
        a{
          text-decoration: none;
          color:#25858b;
        }
      </style>
      <a href="#" onclick="showAlert(event)"><h3><i class="fas fa-calendar-day"></i> Today</h3></a>
      <a href="#" onclick="showAlert(event)"> <h3><i class="fas fa-cloud-sun" ></i> My Day</h3></a>
      <form action="reset.php" method="post">
      <a href="reset.php" ><h3><i class="fas fa-power-off"></i> Reset</h3></a>
      </form>
      

       
      
       

    </div>

    
    <div class="col-md-7 rounded p-3" style="background-color: #f8f9fa; ">
      <!-- tiap kolum -->

<?php
//koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "todo_db");

//query untuk mengambil data dari database
$query = "SELECT judul, tanggal FROM todo";

//eksekusi query
$result = mysqli_query($koneksi, $query);

//looping untuk menampilkan data dalam elemen HTML yang diinginkan
while($row = mysqli_fetch_assoc($result)) {
  echo '<div class="col-md-7 rounded p-3" style="background-color: #f8f9fa;">';
  echo '<h3>'.$row['judul'].'</h3>';
  echo '<p>'.$row['tanggal'].'</p>';
  echo '</div>';
  
  
}
echo' <div class="input-group rounded">
<input type="text" class="form-control rounded" placeholder="Add a task ...">

<div class="input-group-append">
  <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#taskModal"><i class="fas fa-plus"></i></button>
</div>

</div>';
//tutup koneksi ke database
mysqli_close($koneksi);
?>

      <!-- add to tombol -->

     

      <!-- Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taskModalLabel">Add Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 5%;">
        <form action="tambah.php" method="POST">
          <div class="form-group" >
            <label for="taskTitle">Title</label>
            <input type="text" class="form-control" id="taskTitle" name="taskTitle" placeholder="Enter task title...">
          </div>
          <div class="form-group" style="margin-top: 5%;">
            <label for="taskDate">Due Date</label>
            <input type="date" class="form-control" id="taskDate" name="taskDate">
          </div>
          <button type="submit" class="btn btn-primary flex-fill" style="margin-top: 5%;">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
      
    </div>
  </div>
</div>


</main>




   </div>
    

   <script>
    function showAlert(event) {
      event.preventDefault();
      document.getElementById("alert").style.display = "block";
      setTimeout(function(){ document.getElementById("alert").style.display = "none"; }, 3000);
    }
    </script>
    
    <!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>