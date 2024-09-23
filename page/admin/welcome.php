<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    .jumbotron {
      background: linear-gradient(to right, #0033cc, #003366);
      color: #fff;
    }
  </style>
</head>
<body>
  <?php
  //  zona waktu ke Jakarta
  date_default_timezone_set('Asia/Jakarta');

  $nama = "Admin"; 

  //  ucapan selamat berdasarkan waktu
  $hour = date('H');
  if ($hour < 12) {
      $greeting = "Selamat Pagi";
  } elseif ($hour < 15) {
      $greeting = "Selamat Siang";
  } elseif ($hour < 18) {
      $greeting = "Selamat Sore";
  } else {
      $greeting = "Selamat Malam";
  }
  ?>

  <div class="container-fluid">
    <!-- Jumbotron -->
    <div class="jumbotron text-center">
      <h1 class="display-4"><?php echo $greeting; ?>, <?php echo "<b style='font-size:20px;'>".$nama."</b>"; ?>!</h1>
      <p class="lead">Anda saat ini berada di dashboard Admin Aplikasi Toko Online (kedaiku.com)</p>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
