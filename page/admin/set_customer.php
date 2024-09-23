<?php
// Include pagination function
include 'pagination1.php';

// Database connection parameters
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bookselling';

// Connect to the database using MySQLi
$koneksi = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Query to select data from the database
$sql =  "SELECT * FROM customer ORDER BY nama_cus";
$result = $koneksi->query($sql);

// Pagination configuration
$rpp = 10; // records per page
$reload = "customer.php?pagination=true";
$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
if ($page <= 0) {
    $page = 1;
}
$tcount = $result->num_rows;
$tpages = ($tcount) ? ceil($tcount / $rpp) : 1;
$count = 0;
$i = ($page - 1) * $rpp;
$no_urut = ($page - 1) * $rpp;
?>

<div class="hdkonten">
    Data Customer
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th><center>Aksi</center></th>
        </tr>
    </thead>
    <tbody>
        <?php
        while (($count < $rpp) && ($i < $tcount)) {
            $result->data_seek($i);
            $data = $result->fetch_assoc();
        ?>
            <tr>
                <td width="80px"><?php echo ++$no_urut; ?></td>
                <td><?php echo $data['nama_cus']; ?></td>
                <td width="120px" class="text-center">
                    <a href="#" onclick="confirm_modal('del_cus.php?id=<?php echo $data['id_cus']; ?>');" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        <?php
            $i++;
            $count++;
        }
        ?>
    </tbody>
</table>

<div><?php echo paginate_one($reload, $page, $tpages); ?></div>

<!-- Modal Popup untuk delete -->
<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Hapus data?</h4>
            </div>
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger" id="delete_link">Confirm</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Javascript untuk popup modal Delete -->
<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#modal_delete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>
