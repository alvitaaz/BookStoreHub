<div style="text-align:center;">
    <img src="img/gambar_buku/<?php echo $seleksi_buku['gambar']; ?>"><br>
    <a href="#"><?php echo $seleksi_buku['judul']; ?></a><br> 
    Rp.<?php echo number_format($seleksi_buku['harga']); ?>,-<br>

    <?php 
    $qrystok = $conn->query("SELECT * FROM stok WHERE id_buku='{$seleksi_buku['id_buku']}'");
    if ($qrystok->num_rows > 0) {
        while($stok = $qrystok->fetch_assoc()) {
            echo "<br>stok tersedia <b>{$stok['stok']}</b>";
            if($stok['stok'] >= 1) {
                echo "<a data-toggle='modal' data-target='#detail' class='btn btn-success open' id='{$seleksi_buku['id_buku']}'>Lihat Detail</a>";
            }
        }
    } else {
        echo "Stok tidak tersedia.";
    }
    ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".open").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "detail.php",
                type: "GET",
                data: {id: m},
                success: function (ajaxData){
                    $("#detail").html(ajaxData);
                    $("#detail").modal('show',{backdrop: 'true'});
                }
            });
        });
    });
</script>
