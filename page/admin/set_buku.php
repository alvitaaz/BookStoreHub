<?php 
// Sisipkan fungsi paginasi
include 'pagination1.php';

// Koneksi ke database menggunakan MySQLi
$conn = mysqli_connect('localhost', 'root', '', 'bookselling');

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query
$sql =  "SELECT * FROM buku ORDER BY judul";
$result = mysqli_query($conn, $sql);

// Konfigurasi paginasi
$rpp = 5; // Jumlah record per halaman
$reload = "buku.php?pagination=true";
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page <= 0) $page = 1;  
$tcount = mysqli_num_rows($result);
$tpages = ($tcount) ? ceil($tcount / $rpp) : 1; // Total halaman, nomor halaman terakhir
$count = 0;
$i = ($page - 1) * $rpp;
$no_urut = ($page - 1) * $rpp;
?>
<div class="hdkonten">
    Data Buku
</div>
<div class="container">
    <p><a href="#" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Add Data</a>        

    <table id="mytable" class="table table-bordered" style="width:78%;">
        <style type="text/css">
            th {
                text-align: center;
            }
        </style>
        <thead>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Gambar Buku</th>
            <th>Stok</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while (($count < $rpp) && ($i < $tcount)) {
                mysqli_data_seek($result, $i);
                $data = mysqli_fetch_array($result);
            ?>
            <tr>
                <td><center><?php echo $no++ ?></center></td>
                <td><?php echo $data['judul'] ?></td>
                <td><center><img src="../../img/gambar_buku/<?php echo $data['gambar'] ?> " style="width:70px;height:80px;"></center></td>
                <td>
                    <center>
                        <?php 
                        $qrystok = mysqli_query($conn, "SELECT * FROM stok WHERE id_buku='$data[id_buku]'");
                        $data_stok = mysqli_fetch_array($qrystok);
                        $stok = $data_stok['stok'];
                        echo $stok;
                        if ($stok == "") { ?>
                            <a href="#" class='open_modal_tstok' id='<?php echo $data['id_buku']; ?>'><span class="glyphicon glyphicon-plus"></span></a> 
                        <?php } else { ?>
                            <a href="#" class='open_modal_stok' id='<?php echo $data['id_buku']; ?>'><span class="glyphicon glyphicon-pencil"></span></a>
                        <?php } ?> 
                    </center>
                </td>
                <td>
                    <center>
                        <a href="#" class='open_modal btn btn-info' id='<?php echo $data['id_buku']; ?>'><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="#" class="btn btn-danger" onclick="confirm_modal('del_buk.php?&id=<?php echo $data['id_buku']; ?>');"><span class="glyphicon glyphicon-trash"></span></a>
                    </center>
                </td>
            </tr>
            <?php
                $i++; 
                $count++;
            }
            ?>
        </tbody>
    </table>
</div>
<div><?php echo paginate_one($reload, $page, $tpages); ?></div>

<!-- Modal Popup untuk Add buku--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!-- Isi modal -->
</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!-- Isi modal -->
</div>

<!-- Modal Popup untuk tambah stok--> 
<div id="Modaltstok" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!-- Isi modal -->
</div>

<!-- Modal Popup untuk Edit stok--> 
<div id="ModalEditstok" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!-- Isi modal -->
</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
    <!-- Isi modal -->
</div>

<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
    $(document).ready(function () {
        $(".open_modal").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "edit_buku.php",
                type: "GET",
                data : {id: m,},
                success: function (ajaxData){
                    $("#ModalEdit").html(ajaxData);
                    $("#ModalEdit").modal('show',{backdrop: 'true'});
                }
            });
        });
    });
</script>

<!-- Javascript untuk popup modal Edit stok--> 
<script type="text/javascript">
    $(document).ready(function () {
        $(".open_modal_stok").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "edit_stok.php",
                type: "GET",
                data : {id: m,},
                success: function (ajaxData){
                    $("#ModalEditstok").html(ajaxData);
                    $("#ModalEditstok").modal('show',{backdrop: 'true'});
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".open_modal_tstok").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "tambah_stok.php",
                type: "GET",
                data : {id: m,},
                success: function (ajaxData){
                    $("#Modaltstok").html(ajaxData);
                    $("#Modaltstok").modal('show',{backdrop: 'true'});
                }
            });
        });
    });
</script>

<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
        $('#modal_delete').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#tgl").datepicker({dateFormat : 'yy/mm/dd'});              
    });
</script>
