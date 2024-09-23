<?php
include "db.php";

// Ambil data dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// Query untuk nyari superuser berdasarkan email dan password
$q_log_su = $conn->query("SELECT * FROM superuser WHERE email_su = '$email' AND password_su = '$password'");
$q_su = $q_log_su->fetch_assoc();

// Query untuk cari customer berdasarkan email dan password
$q_log_cus = $conn->query("SELECT * FROM customer WHERE email_cus = '$email' AND password_cus = '$password'");
$q_cus = $q_log_cus->fetch_assoc();

// ngecek jika superuser ditemukan
if ($q_su) {
    // Tentukan level superuser
    $level = $q_su['level'];

    // Mulai session dan ngatur variabel session
    session_start();
    $_SESSION['email_su'] = $email;
    $_SESSION['password_su'] = $password;
    $_SESSION['nama_su'] = $q_su['nama_su'];

    // Redirect sesuai dengan level superuser
    if ($level == "owner") {
        header("location: page/owner/index.php");
    } else if ($level == "admin") {
        header("location: page/admin/index.php");
    }
}
// Cek kalo customer ditemukan
else if ($q_cus) {
    // Mulai session dan atur variabel session
    session_start();
    $_SESSION['email_cus'] = $email;
    $_SESSION['password_cus'] = $password;
    $_SESSION['nama_cus'] = $q_cus['nama_cus'];
    $_SESSION['id_cus'] = $q_cus['id_cus'];

    // Redirect ke halaman customer
    header("location: page/customer/home.php");
}
// kalo tidak ada user ditemukan, nampiliin pesan error
else {
    echo "<script type='text/javascript'>alert('Email / Password tidak valid');window.location.href='index.php';</script>";
}
?>
