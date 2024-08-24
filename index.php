<!DOCTYPE html>
<html lang="en">

<?php include "frontend/templates/head.php" ?>

<body>

    <?php

    include "app/config/function/init.php";

    $result_website = $a_tambah_baca_update_hapus->baca_data_id("tb_pengaturan_website", "Id_Pengaturan_Website", "1");
    $data_website = $result_website['Hasil'];

    $result_tentang_kami = $a_tambah_baca_update_hapus->baca_data_id("tb_tentang_kami", "Id_Tentang_Kami", "1");
    $data_tentang_kami = $result_tentang_kami['Hasil'];
    ?>

    <!-- Top Bar Start -->
    <?php include "frontend/templates/header.php" ?>
    <!-- Top Bar End -->

    <!-- Body Start -->
    <?php include "frontend/controllers/controllers.php" ?>
    <!-- Body End -->

    <!-- Footer Start -->
    <?php include "frontend/templates/footer.php" ?>
    <!-- Footer End -->


    <!-- Libraries -->
    <?php include "frontend/templates/script.html" ?>

</body>

</html>