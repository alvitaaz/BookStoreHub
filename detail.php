<?php
include "db.php";

// pastiin variabel $kd terdefinisi dan aman dari serangan injeksi SQL
$kd = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

// Query untuk dapet detail buku pake MySQLi
$q_detail = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$kd'");
$detail = mysqli_fetch_array($q_detail);
?>

<link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="container-fluid">
                <h3>Detail book "<i style="font-size:20px;"><?php echo htmlspecialchars($detail['judul']); ?></i>"</h3>
            </div>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="detailbuku">
                    <div class="col-md-4">
                        <img src="img/gambar_buku/<?php echo htmlspecialchars($detail['gambar']); ?>">
                    </div>
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td width="140px;"><p>Title</td><td>: <?php echo htmlspecialchars($detail['judul']); ?></p></td>
                            <tr>
                            <td><p>Author</td><td>: <?php echo htmlspecialchars($detail['pengarang']); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Publisher</td><td>: <?php echo htmlspecialchars($detail['penerbit']); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Number of pages</td><td>: <?php echo htmlspecialchars($detail['hal']); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Price</td><td>: Rp.<?php echo number_format($detail['harga']); ?>,-</p></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <i style="font-size:20px;">Description :</i><p><?php echo htmlspecialchars($detail['deskripsi']); ?></p>
        </div>
        <div class="modal-footer">
            <p>You must log in first if you want to buy our book</p>
            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Kembali</button>
        </div>
    </div>
</div>

<!-- modal login dulu -->
<div id="loginsek" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;background:#2e8b57;color:#fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Please login first to be able to purchase</h4>
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
                    <input type="submit" class="btn btn-success" value="Masuk">
                    don't have an account yet? <a data-toggle="modal" data-target="#daftar">Register</a>
                </form>
            </div>
        </div>
    </div>
</div>
