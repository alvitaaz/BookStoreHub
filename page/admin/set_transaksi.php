<?php
// Mulai sesi hanya jika belum ada sesi yang aktif
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah sesi 'email_su' sudah diatur
if (!isset($_SESSION['email_su'])) {
    header("location:../../index.php?act=masuk");
    exit; // Keluar dari skrip setelah melakukan redirect
}

// Periksa apakah sesi 'nama_su' sudah diatur dan berikan nilai default jika belum diatur
$nama = isset($_SESSION['nama_su']) ? $_SESSION['nama_su'] : '';

// Inisialisasi koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'bookselling');
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

@$set = isset($_GET['set']) ? $_GET['set'] : ""; // Tambahkan perlindungan isset untuk $_GET['set']
if ($set == "tanggal") {
    // Periksa apakah $_POST['tanggal'] sudah diatur sebelum mengaksesnya
    if (isset($_POST['tanggal'])) {
        $tanggal = $_POST['tanggal'];
        $query_tanggal   = mysqli_query($koneksi, "SELECT * from selesai where tgl_order like '$tanggal'");
    } else {
        // Tindakan yang diambil jika $_POST['tanggal'] tidak diatur
        echo "Tanggal belum dipilih."; // Menampilkan pesan kesalahan kepada pengguna
        exit; // Keluar dari skrip setelah menampilkan pesan kesalahan
    }
} else if ($set == "status_transaksi") {
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
        $query_status_transaksi = mysqli_query($koneksi, "SELECT * from selesai where status_beli='$status'");
    } else {
        // Tindakan yang diambil jika $_POST['status'] tidak diatur
        echo "Status transaksi belum dipilih."; // Menampilkan pesan kesalahan kepada pengguna
        exit; // Keluar dari skrip setelah menampilkan pesan kesalahan
    }
}

// includekan fungsi paginasi
include 'pagination1.php';
// query
$sql =  "SELECT * FROM selesai";
$result = mysqli_query($koneksi, $sql);

// Pastikan $result tidak null sebelum mengaksesnya
if (!$result) {
    die("Error: " . mysqli_error($koneksi));
}

//pagination config start
$rpp = 10; // jumlah record per halaman
$reload = "transaksi.php?page=&pagination=true";
@$page = intval($_GET["page"]);
if ($page <= 0) $page = 1;
$tcount = mysqli_num_rows($result);
$tpages = ($tcount) ? ceil($tcount / $rpp) : 1; // total pages, last page number
$count = 0;
$i = ($page - 1) * $rpp;
$no_urut = ($page - 1) * $rpp;
//pagination config end
?>
<div class="hdkonten">
    Data Status Transaksi
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form method="post" action="transaksi.php?set=tanggal">
                <label style="margin-top:10px;"> Seleksi menurut tanggal</label><br>
                <input name="tanggal" type="text" id="tgl" autocomplete="off" style="width:200px;padding:6px;">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
        <div class="col-md-3">
            <form method="post" action="transaksi.php?set=status_transaksi">
                <label style="margin-top:10px;"> Seleksi Status Transaksi</label><br>
                <select name="status" style="width:200px;padding:6px;">
                    <option>order</option>
                    <option>lunas</option>
                </select>
                <button type="submit" class="btn btn-success">Cari</button>
            </form>
        </div>
        <div class="col-md-3">
            <form method="post" action="transaksi.php?set=nama">
                <label style="margin-top:10px;"> Seleksi menurut nama customer</label><br>
                <input name="nama" type="text" autocomplete="off" style="width:200px;padding:6px;">
                <button type="submit" class="btn btn-danger">Cari</button>
            </form>
        </div>
    </div>
    Hari ini tanggal : <?php echo date('d-m-Y'); ?>
    <table id="mytable" class="table table-bordered" style="width:80%;margin-left:-15px;margin-top:10px;">
        <thead>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Status Transaksi</th>
            <th>Tanggal Order</th>
            <th><center>Aksi</center></th>
        </thead>
        <?php
        $no = 1;
        if ($set == "") {
            while (($count < $rpp) && ($data = mysqli_fetch_array($result))) {
                $qrycus = mysqli_query($koneksi, "SELECT * from customer where id_cus='$data[id_cus]'");
                // Periksa apakah query customer berhasil dieksekusi
                if ($qrycus) {
                    $datacus = mysqli_fetch_array($qrycus);
                    $nama = $datacus ? $datacus['nama_cus'] : 'Nama tidak tersedia'; // Periksa apakah $datacus tidak null sebelum mengakses indeksnya
                } else {
                    // Tindakan yang diambil jika query customer gagal
                    $nama = 'Nama tidak tersedia';
                }
        ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $data['status_beli'] ?></td>
                    <td><?php echo $data['tgl_order'] ?></td>
                    <td>
                        <center>
                            <a href="#" class='detail_order btn btn-info' id='<?php echo  $data['kode_beli']; ?>'>Detail Order</a>
                            <a href="#" class='edit btn btn-primary' id='<?php echo  $data['kode_beli']; ?>'>Edit</a>
                            <a href="#" onclick="confirm_modal('del_transaksi.php?&id=<?php echo  $data['kode_beli']; ?>'); " class="btn btn-danger">Delete</a>
                        </center>
                    </td>
                </tr>
        <?php
                $count++;
            }
        } else if ($set == "tanggal") {
            include "set_transaksi_tanggal.php";
        } else if ($set == "status_transaksi") {
            include "set_transaksi_status_transaksi.php";
        } else if ($set == "nama") {
            include "set_transaksi_nama.php";
        }
        ?>
    </table>
</div>
<div><?php echo paginate_one($reload, $page, $tpages); ?></div>

<!-- Modal Popup untuk Edit-->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk D_order-->
<div id="do" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Hapus data? ?</h4>
            </div>
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger" id="delete_link">Confirm</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Javascript untuk popup modal Edit-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".edit").click(function () {
            var m = $(this).attr("id");
            $.ajax({
                url: "edit_transaksi.php",
                type: "GET",
                data: { id: m, },
                success: function (ajaxData) {
                    $("#ModalEdit").html(ajaxData);
                    $("#ModalEdit").modal('show', { backdrop: 'true' });
                }
            });
        });
    });
</script>

<!-- Javascript untuk popup modal Detail Order-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".detail_order").click(function () {
            var m = $(this).attr("id");
            $.ajax({
                url: "detail_order.php",
                type: "GET",
                data: { id: m, },
                success: function (ajaxData) {
                    $("#do").html(ajaxData);
                    $("#do").modal('show', { backdrop: 'true' });
                }
            });
        });
    });
</script>

<!-- Javascript untuk popup modal Delete-->
<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#modal_delete').modal('show', { backdrop: 'static' });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tgl").datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>
