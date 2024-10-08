<?php
include "db.php";
session_start();
if (isset($_SESSION['email_su'])) {
    header("location: halaman_superuser.php");
} else if (isset($_SESSION['email_cus'])) {
    header("location: page/customer/home.php");
}
@$pesan = $_GET['pesan'];
if ($pesan == "berhasil daftar") {
    echo "<script type='text/javascript'>alert('Anda berhasil mendaftar, silahkan login');</script>";
} else if ($pesan == "login") {
    echo "<script type='text/javascript'>alert('Anda harus login dulu');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>kedaiku.com</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery-ui.js"></script>
    <style>
       
    </style>
</head>
<body>
<div id="head">
    <div class="hdkiri">
        <a href="index.php">kedai<b>ku</b>.com</a>
    </div>
    <div class="hdkanan">
        <form action="index.php" method="get">
            <input type="text" name="judul" placeholder="cari buku yang anda inginkan disini.." class="cari">
            <input type="submit" name="cari" value="cari" class="tombolcari">
        </form>
        <?php
        @$cari = $_GET['cari'];
        if ($cari) {
            $judul = $_GET['judul'];
            $qry_cari_buku = mysqli_query($conn, "SELECT * from buku where judul like '%$judul%'");
        }
        ?>
    </div>
</div>
<div id="menu">
    <div class="menukiri">
        <ul>
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="index.php?page=cara"><span class="glyphicon glyphicon-question-sign"></span> How to Buy</a>
            </li>
            <li><a href="index.php?page=tentang"><span class="glyphicon glyphicon-info-sign"></span> About Us</a>
            </li>
        </ul>
    </div>
    <div class="menukanan">
        <ul>
            <li><a data-toggle="modal" data-target="#daftar"><span class="glyphicon glyphicon-pencil"></span> Create Account</a></li>
            <li><a data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> Masuk</a>
            </li>
            <li><a href="#"><span class="glyphicon glyphicon-plus"></span> cart (0)</a></li>
        </ul>
    </div>
</div>
<div id="content">
    <div id="contentkiri">
        <div class="welcome">
            <?php
            @$page = $_GET['page'];
            if ($page == "tentang") {
                include("tentang.php");
            } else if ($page == "cara") {
                include("carabeli.php");
            } else {
                include("welcome.php");
            }
            ?>
        </div>
        <div class="produk">
            <div class="hdproduk">
            Please select books below.
            </div>
            <?php
// do query berdasarkan kategori atau katalog buku yang dipilih
            @$id_kategori = $_GET['kategori'];
            @$id_katalog = $_GET['katalog'];
            $q_seleksi_buku = mysqli_query($conn, "SELECT * from buku where id_kategori='$id_kategori'");
            $q_seleksi_buku1 = mysqli_query($conn, "SELECT * from buku where id_katalog='$id_katalog'");
            $q_buku = mysqli_query($conn, "SELECT * from buku");
// nampilin semua buku kalo ga ada kategori yang dipilih
            if ($id_kategori == 0) {
                while ($buku = mysqli_fetch_array($q_buku)) {
                    // display produk buku
                    ?>
                    <div class="col-md-3">
                        <div class="tamp_produk" style="border: solid #fff 1px;">
                            <?php include("produk.php"); ?>
                        </div>
                    </div>
                <?php }
            } else if ($id_kategori >= 1 && $id_katalog >= 1) {
                while ($seleksi_buku1 = mysqli_fetch_array($q_seleksi_buku1)) { ?>
                    <div class="col-md-3">
                        <div class="tamp_produk">
                            <?php include("seleksi_produk1.php"); ?>
                        </div>
                    </div>
                <?php }
            } else if ($id_kategori >= 1) {
                while ($seleksi_buku = mysqli_fetch_array($q_seleksi_buku)) { ?>
                    <div class="col-md-3">
                        <div class="tamp_produk">
                            <?php include("seleksi_produk.php"); ?>
                        </div>
                    </div>
                <?php }
            } ?>

        </div>



    </div>
    <div id="contentkanan">
        <div class="navkanan">
            <?php include("kategori.php") ?>
        </div>
        <div class="navkanan">
            <?php
            $q_seleksi_katalog = mysqli_query($conn, "SELECT * from katalog where id_kategori='$id_kategori'");
            if ($id_kategori == 0) {
                include("katalog.php");
            } else {
                include("seleksi_katalog.php");
            }
            ?>
        </div>
    </div>
</div>
<!-- modal login -->
<div id="login" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;background:#4682b5;;color:#fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Please Log In</h4>
            </div>
            <div class="modal-body">
                <form action="actlogin.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="email" type="email" class="form-control" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Masuk">
                    Don't have an account yet? <a data-toggle="modal" data-target="#daftar">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--modal daftar-->
<div id="daftar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;background:#4682b5;;color:#fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Please fill in the registration form</h4>
            </div>
            <div class="modal-body">
                <form action="actdaftar.php" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap anda">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input name="email" type="email" class="form-control" placeholder="email anda">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="pass" type="password" class="form-control" placeholder="password">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>


<div id="detail" class="modal fade">

</div>

<!-- modal login dulu -->
<div id="logindulu" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;background:#4682b5;;color:#fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Please log in first to be able to buy.</h4>
            </div>
            <div class="modal-body">
                <form action="actlogin.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="email" type="email" class="form-control" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Masuk">
                    Don't have an account yet? <a data-toggle="modal" data-target="#daftar">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div style="height: 1000px;"></div> 
<div id="footer" style="margin-top:1250px;">
<?php include("footer.php"); ?>
</div>
</body>
</html>
