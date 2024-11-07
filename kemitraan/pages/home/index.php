<?php

include "controller/saldo/controller_saldo.php"

?>

<div class="app-content">
    <div class="card card-flush">
        <?php
        // CEK SALDO
        $search_field_where = array("Id_Pengguna");
        $search_criteria_where = array("=");
        $search_value_where = array("$u_Id_Pengguna");
        $search_connector_where = array("ORDER BY Id_Saldo ASC LIMIT 1");
        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_saldo", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
        if ($result['Status'] == "Sukses") {
            $data_saldo = $result['Hasil'][0];
            if ($data_saldo['Status_Saldo'] == "Approved") {
        ?>
                <div class="mt-10 text-center">
                    <br>
                    <h1 class="fs-2x">Selamat datang di halaman <b class="text-danger">Kemitraan Rizgold</b></h1>
                    <h1 class="fs-2x">Nikmatilah <b class="text-primary">fitur-fitur</b> yang ada di dalam halaman ini</b></h1>
                
                    <div class="text-center justify-content-center">
                        <div class="form-group row p-10 px-20">
                            <div class="col-lg-3">
                                <div class="container shadow bg-dark p-10 rounded" onclick="alert('Container clicked!')" style="cursor:pointer">
                                    <i class="text-warning bi bi-bag-check fs-5x"></i>
                                    <h2 class="text-white mt-7"> Belanja</h2>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="container shadow bg-dark p-10 rounded" onclick="alert('Container clicked!')" style="cursor:pointer">
                                    <i class="text-warning bi bi-youtube fs-5x"></i>
                                    <h2 class="text-white mt-7"> Konten</h2>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="container shadow bg-dark p-10 rounded" onclick="alert('Container clicked!')" style="cursor:pointer">
                                    <i class="text-warning bi bi-wallet2 fs-5x"></i>
                                    <h2 class="text-white mt-7"> Transaksi</h2>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="container shadow bg-dark p-10 rounded" onclick="alert('Container clicked!')" style="cursor:pointer">
                                    <i class="text-warning bi bi-person-circle fs-5x"></i>
                                    <h2 class="text-white mt-7"> Profile</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="mt-10">
                    <div class="text-center">
                        <h1 class="text-success fs-1x"><b>Anda telah mengupload bukti transfer</b></h1>
                        <h3 class="text-muted">Silahkan menunggu proses transaksi anda sedang diverifikasi oleh Admin</h3>
                    </div>
                </div>
                <br>
                <br>
            <?php
            }
        } else {
            ?>
            <div class="mt-10">
                <div class="text-center">
                    <?php
                    if ($u_Status_Kemitraan == "Distributor") {
                        $nominal_transfer = "3000000";
                    } else {
                        $nominal_transfer = "1500000";
                    };
                    ?>
                    <h4>Silahkan Transfer sebesar </h4>
                    <h4> <font class="text text-danger fs-2x"><b><?php echo $a_format_angka->rupiah($nominal_transfer) ?></b></font> </h4>
                    <h5><i>sebagai dana belanja pertama anda</i></h5>
                </div>
                <div class="mt-6">
                    <div class="px-20">
                        <hr>
                    </div>
                    <div class="text-center">
                        <h2 class="text-dark"><b>Bank Central Asia (BCA)</b></h2>
                        <h2 class="text-dark">A/n : Rokim Abdul Karim</h2>
                        <h5><small>Nomor Rekening : </small></h5>
                        <span class="badge badge-warning text-hover-dark fs-2" onclick="copyToClipboard()" style="cursor: pointer;" title="Salin nomor rekening">
                            <span id="noRekening">32141 1231412 1231231</span> &nbsp;
                            <i class="ki-solid ki-copy fs-2 text-dark">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                    </div>
                </div>
                <script>
                    function copyToClipboard() {
                        var copyText = document.getElementById("noRekening").innerText;
                        navigator.clipboard.writeText(copyText).then(function() {
                            alert('No Rekening berhasil disalin');
                        }, function(err) {
                            console.error('Error: ', err);
                        });
                    }
                </script>
                <div class="card-body">
                    <div class="d-flex align-items-center flex-column">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="Saldo" value="<?php echo $nominal_transfer ?>">
                            <div class="text-center">
                                <div class="mb-6">
                                    <h6 class="text-dark"> Silahkan upload bukti transfer jika anda sudah melakukan transfer</h6>
                                </div>
                                <div class="row mb-6">
                                    <div class="col-lg-9">
                                        <input type="file" name="Bukti_Transfer_Saldo" class="form-control" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="submit" name="submit_upload" class="btn btn-primary" value="Upload" onclick="return confirm('Anda yakin untuk mengunggah file ini?')">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>