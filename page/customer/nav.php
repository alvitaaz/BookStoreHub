<div class="hdnav">
    Kategori
</div>
<ul class="kategori">
    <?php 
    include "../../pagination2.php";
    $querykategori = $conn->query("SELECT * FROM kategori");
    $rpp = 4; // jumlah record per halaman
    $reload = "home.php?page=&pagination=true";
    $page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
    if ($page <= 0) $page = 1;  
    $tcount = $querykategori->num_rows;
    $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
    $count = 0;
    $i = ($page - 1) * $rpp;
    $no_urut = ($page - 1) * $rpp;
    while ($count < $rpp && $i < $tcount) {
        $querykategori->data_seek($i);
        $kategori = $querykategori->fetch_assoc();
    ?>
    <li><a href="home.php?kategori=<?php echo $kategori['id_kategori'] ?>"><span class="glyphicon glyphicon-list"></span> <?php echo $kategori['kategori'] ?></a></li>
    <?php 
        $i++; 
        $count++;
    } ?>
</ul>
<div><?php echo paginate_kategori($reload, $page, $tpages); ?></div>
