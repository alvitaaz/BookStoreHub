<center>
    <img src="img/gambar_buku/<?php echo $buku['gambar']; ?>"><br>
    <a href="#"><?php echo $buku['judul']; ?></a><br> 
    Rp.<?php echo number_format($buku['harga']); ?>,-<br>
    <?php 
    $qrystok = mysqli_query($conn, "SELECT * FROM stok where id_buku='{$buku['id_buku']}'");
    while($stok = mysqli_fetch_array($qrystok)){
    ?>
    <br>
    <div style="text-align:center;">stock available <b><?php echo $stok['stok']; ?></b></div>
    <?php if($stok['stok'] >= 1){ ?>
    <a data-toggle="modal" data-target="#detail" class="btn btn-success open" id='<?php echo $buku['id_buku']; ?>'>Detail</a>
    <?php }} ?>
</center>

<script type="text/javascript">
    $(document).ready(() => {
        $(".open").click(function(e) {
            const m = $(this).attr("id");
            $.ajax({
                url: "detail.php",
                type: "GET",
                data: { id: m },
                success: (ajaxData) => {
                    $("#detail").html(ajaxData);
                    $("#detail").modal('show', { backdrop: 'true' });
                },
                error: (xhr, status, error) => {
                    console.error(error);
                }
            });
        });
    });
</script>
