<?php

include "../dashboard/controller/saldo/controller_saldo.php"

?>

<div class="app-content">
    <div class="card card-flush">
        <div class="mt-10 text-center">
            <h1 class="fs-2x">Selamat datang di halaman <b class="text-danger">Kemitraan Rizgold</b></h1>
        </div>

        <?php
        // CEK SALDO
        $search_field_where = array("Id_Pengguna");
        $search_criteria_where = array("=");
        $search_value_where = array("$u_Id_Pengguna");
        $search_connector_where = array("");
        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_saldo", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
        if ($result['Status'] == "Sukses") {
            $u_data_saldo = $result['Hasil'];
            $saldo_awal = $u_data_saldo[0]['Saldo'];
        ?>
            <div class="mt-10">
                <div class="text-center">
                    <h1 class="text-primary fs-1x"><b>Anda telah mengupload bukti transfer</b></h1>
                    <h2 class="text-muted">Transaksi anda sedang diproses oleh Admin</h2>
                </div>
            </div>
            <br>
            <br>
        <?php
        } else {
            // BELUM ADA SALDO
        ?>
            <div class="mt-4">
                <div class="text-center">
                    <?php
                    if ($u_Status_Kemitraan == "Distributor") {
                        $nominal_transfer = "3000000";
                    } else {
                        $nominal_transfer = "1500000";
                    };
                    ?>
                    <h3>Silahkan Transfer sebesar <font class="text text-primary fs-2x fw-bold"><?php echo $a_format_angka->rupiah($nominal_transfer) ?></font> sebagai dana belanja pertama anda</h3>
                </div>
                <div class="mt-6">
                    <div class="text-center">
                        <h1 class="text-danger fs-1x"><b>Bank BCA</b></h1>
                        <h2 class="text-danger">A/n : Rokim Abdul Karim</h2>
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
                                    <h4 class="text-muted"> Silahkan upload bukti transfer jika sudah melakukan transfer</h4>
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