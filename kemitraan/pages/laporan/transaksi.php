<?php include "controller/transaksi/function/crud_transaksi.php"; ?>

<div class="pt-lg-9">
    <div class="card">
        <div class="card-header">
            <div class="">
                <div id="kt_app_toolbar" class="app-toolbar py-4">
                    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
                        <div class="d-flex flex-stack flex-wrap gap-4 w-100">
                            <div class="page-title d-flex flex-column gap-3 me-3">
                                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Transaksi</h1>
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                        <a href="index.php" class="text-gray-500">
                                            <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                    </li>
                                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Transaksi</li>
                                    <li class="breadcrumb-item">
                                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                    </li>
                                    <li class="breadcrumb-item text-gray-500"><a href="<?php echo $kehalaman ?>" class="text-gray-800 text-hover-primary">Data Transaksi</a></li>
                                    <?php if (isset($_GET["edit"])) { ?>
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <li class="breadcrumb-item text-gray-500">Edit Transaksi</li>
                                    <?php } else if (isset($_GET["tambah"])) { ?>
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <li class="breadcrumb-item text-gray-500">Tambah Transaksi</li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <span class="badge badge-<?php if ((isset($_GET['edit'])) and ($edit['Status'] == "Aktif")) {
                                                echo "success";
                                            } else {
                                                echo "danger";
                                            } ?> fs-6"><?php echo $edit['Status'] ?></span>
            </div>
        </div>
    </div>
</div>



<div id="kt_app_content" class="app-content pb-0">
    <script type="text/javascript">
        function konfirmasi_hapus_data_permanen(id) {
            var txt;
            var r = confirm("Apakah Anda Yakin Ingin Menghapus Permanen Data Ini ?");
            if (r == true) {
                document.location.href = '<?php echo $kehalaman ?>&hapus_data_permanen&id=' + id
            } else {

            }
        }

        function konfirmasi_hapus_data_ke_tong_sampah(id) {
            var txt;
            var r = confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
            if (r == true) {
                document.location.href = '<?php echo $kehalaman ?>&hapus_data_ke_tong_sampah&id=' + id
            } else {

            }
        }

        function konfirmasi_arsip_data(id) {
            var txt;
            var r = confirm("Apakah Anda Yakin Ingin Mengarsip Data Ini ?");
            if (r == true) {
                document.location.href = '<?php echo $kehalaman ?>&arsip_data&id=' + id
            } else {

            }
        }

        function konfirmasi_restore_data_dari_arsip(id) {
            var txt;
            var r = confirm("Apakah Anda Yakin Ingin Mengeluarkan Data Ini Dari Arsip ?");
            if (r == true) {
                document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_arsip&id=' + id
            } else {

            }
        }

        function konfirmasi_restore_data_dari_tong_sampah(id) {
            var txt;
            var r = confirm("Apakah Anda Yakin Ingin Merestore Data Ini Dari Tong Sampah ?");
            if (r == true) {
                document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_tong_sampah&id=' + id
            } else {

            }
        }
    </script>

    <!-- FORM ADD -->
    <?php if ((isset($_GET["tambah"])) or (isset($_GET["edit"]))) { ?>

        <?php if (isset($_GET['tambah'])) {

            // BACA DATA TERAKHIR
            $a_result_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_transaksi_penjualan", "Id_Transaksi_Penjualan");
            if ($a_result_terbaru['Status'] == "Sukses") {
                $Id_Auto_Increment = $a_result_terbaru['Hasil'][0]['Id_Transaksi_Penjualan'] + 1;
            } else {
                $Id_Auto_Increment = 1;
            }

            // Step 2: Concatenate all parts to create the unique 'Nomor_Transaksi_New'
            // Format Id_Auto_Increment to be 5 digits long, padded with leading zeros
            $Nomor_Transaksi_New = "T-" . str_pad($Id_Auto_Increment, 5, '0', STR_PAD_LEFT);
        } ?>


        <div class="card py-4">
            <div class="card-body">

                <form id="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="text-end">
                                <?php if (isset($_GET['edit'])) { ?>

                                    <?php $encode_id = $a_hash->encode($edit['Id_Pengguna'], $_GET['menu']); ?>

                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <?php if (($edit['Status'] == "Terarsip") or ($edit['Status'] == "Terhapus")) { ?>
                                                <a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah('<?php echo $encode_id; ?>')"><i class="ki-solid ki-arrow-circle-left text-primary"> </i>Restore</a>
                                            <?php } ?>

                                        </li>
                                        <li class="list-inline-item">
                                            <?php if ($edit['Status'] == "Terhapus") { ?>
                                                <a href="#" class="text-danger" onclick="konfirmasi_hapus_data_permanen('<?php echo $encode_id; ?>')"><i class="ki-solid ki-trash text-danger"> </i>Hapus Permanen </a>
                                            <?php } elseif (($edit['Status'] == "Aktif") or ($edit['Status'] == "Terarsip")) { ?>
                                                <a href="#" class="text-danger" onclick="konfirmasi_hapus_data_ke_tong_sampah('<?php echo $encode_id; ?>')"><i class="ki-solid ki-trash text-danger"> </i>Hapus </a>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="fv-row mb-7">
                                    <h3>Identitas Pembeli</h3>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Nama</label>
                                    <select name="Id_Pengguna" id="Select-Id-Pengguna" onchange="ubah_status_kemitraan();" class="form-select fw-bold" data-kt-select2="true" data-placeholder="Pilih Pengguna" data-kt-user-table-filter="role" data-allow-clear="true">
                                        <option value=""></option>
                                        <?php
                                        $search_field_where = array("Status");
                                        $search_criteria_where = array("=");
                                        $search_value_where = array("Aktif");
                                        $search_connector_where = array("");

                                        $result_mitra = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_pengguna", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
                                        if ($result_mitra['Status'] == "Sukses") {

                                            $data_hasil_mitra = $result_mitra['Hasil'];
                                            foreach ($data_hasil_mitra as $data_mitra) {
                                                $Status_Kemitraan = $data_mitra['Status_Kemitraan'];
                                        ?>
                                                <option
                                                    value="<?php echo $data_mitra['Id_Pengguna']; ?>"
                                                    data-perusahaan="<?php echo $data_mitra['Nama_Perusahaan'] . " - " . $data_mitra['Organisasi_Kode']; ?>"
                                                    data-status-kemitraan="<?php echo $data_mitra['Status_Kemitraan']; ?>"
                                                    data-organisasi-kode="<?php echo $data_mitra['Organisasi_Kode']; ?>"
                                                    <?php if (isset($_GET['edit']) && $edit['Id_Pengguna'] == $data_mitra['Id_Pengguna']) {
                                                        echo "selected";
                                                    } ?>>
                                                    <?php echo "$data_mitra[Nama_Depan] $data_mitra[Nama_Belakang] - $data_mitra[Nama_Perusahaan] - $data_mitra[Status_Kemitraan] "; ?>
                                                </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="fw-semibold fs-6 mb-2">Perusahaan</label>
                                    <input readonly name="Nama_Perusahaan" id="Nama_Perusahaan" type="text" class="form-control form-control-solid mb-3 mb-lg-0" />
                                    <input readonly name="Organisasi_Kode" id="Organisasi_Kode" type="text" class="form-control form-control-solid mb-3 mb-lg-0 d-none" />
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="fw-semibold fs-6 mb-2">Status Kemitraan</label>
                                    <input readonly name="Status_Kemitraan" id="Status_Kemitraan" type="text" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="fv-row mb-7">
                                    <h3>Identitas Transaksi</h3>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Nomor Transaksi</label>
                                    <input name="Nomor_Transaksi" type="text" class="form-control form-control-solid mb-3 mb-lg-0" readonly value="<?php
                                                                                                                                                    if (isset($_GET['edit'])) {
                                                                                                                                                        echo $edit['Nomor_Transaksi'];
                                                                                                                                                    } else {
                                                                                                                                                        echo $Nomor_Transaksi_New; // Default to today's date in 'YYYY-MM-DD' format
                                                                                                                                                    }
                                                                                                                                                    ?>" />
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Tanggal Transaksi</label>
                                    <input name="Tanggal_Transaksi" type="date" class="form-control mb-3 mb-lg-0"
                                        value="<?php
                                                if (isset($_GET['edit'])) {
                                                    echo $edit['Tanggal_Transaksi'];
                                                } else {
                                                    echo date('Y-m-d'); // Default to today's date in 'YYYY-MM-DD' format
                                                }
                                                ?>" />
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Status Transaksi</label>
                                    <select name="Metode_Pembelian" required class="form-select fw-bold" data-kt-select2="true" data-placeholder="Pilih Status" data-kt-user-table-filter="role" data-hide-search="true">

                                        <option <?php if (isset($_GET['edit'])) {
                                                    if ($edit['Status_Transaksi'] == "Baru") {
                                                        echo "selected";
                                                    }
                                                } ?> value="Baru">Baru</option>
                                        <?php if (isset($_GET['edit'])) { ?>
                                            <option <?php if (isset($_GET['edit'])) {
                                                        if ($edit['Status_Transaksi'] == "Proses") {
                                                            echo "selected";
                                                        }
                                                    } ?> value="Proses">Proses</option>
                                            <option <?php if (isset($_GET['edit'])) {
                                                        if ($edit['Status_Transaksi'] == "Selesai") {
                                                            echo "selected";
                                                        }
                                                    } ?> value="Selesai">Selesai</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <hr class="mb-7">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="fv-row mb-7">
                                    <h3>Informasi Produk</h3>
                                </div>

                                <div class="fv-row mb-4">
                                    <label class="required fw-semibold fs-6 mb-2">Produk</label>
                                    <select name="Id_Produk" id="Select-Id-Produk" onchange="ambil_harga_by_status_kemitraan(); hitung_total()" class="form-select fw-bold" data-kt-select2="true" data-placeholder="Pilih Produk" data-kt-user-table-filter="role" data-allow-clear="true">
                                        <option value=""></option>
                                        <?php
                                        $search_field_where = array("Status");
                                        $search_criteria_where = array("=");
                                        $search_value_where = array("Aktif");
                                        $search_connector_where = array("");

                                        $result_produk = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_produk", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
                                        if ($result_produk['Status'] == "Sukses") {
                                            $data_hasil_produk = $result_produk['Hasil'];
                                            foreach ($data_hasil_produk as $data_produk) {
                                        ?>
                                                <option
                                                    value="<?php echo $data_produk['Id_Produk']; ?>"
                                                    data-harga-distributor="<?php echo $data_produk['Harga_Distributor']; ?>"
                                                    data-harga-agen="<?php echo $data_produk['Harga_Agen']; ?>"
                                                    <?php if (isset($_GET['edit']) && $edit['Id_Produk'] == $data_produk['Id_Produk']) {
                                                        echo "selected";
                                                    } ?>>
                                                    <?php echo $data_produk['Nama_Produk']; ?>
                                                </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Harga</label>
                                    <input name="Harga" id="Harga" type="text" class="form-control mb-3 mb-lg-0 form-control-solid" />
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">QTY</label>
                                    <input name="QTY" id="QTY" min="0" mas="100" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" type="text" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET['edit'])) {
                                                                                                                                                                                                                    echo $edit['QTY'];
                                                                                                                                                                                                                } ?>" onkeyup="hitung_total()" />
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Total</label>
                                    <input name="Total" id="Total" type="text" class="form-control mb-3 mb-lg-0 form-control-solid" value="<?php if (isset($_GET['edit'])) {
                                                                                                                                                echo $edit['Total'];
                                                                                                                                            } ?>" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="fv-row mb-7">
                                    <h3>Informasi Pembayaran & Barang</h3>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Metode Pembelian</label>
                                    <select name="Metode_Pembelian" required class="form-select fw-bold" data-kt-select2="true" data-placeholder="Pilih Metode Pembalian" data-kt-user-table-filter="role" data-hide-search="true">
                                        <option value=""></option>
                                        <option <?php if (isset($_GET['edit'])) {
                                                    if ($edit['Metode_Pembelian'] == "Shopee") {
                                                        echo "selected";
                                                    }
                                                } ?> value="Shopee">Shopee</option>
                                        <option <?php if (isset($_GET['edit'])) {
                                                    if ($edit['Metode_Pembelian'] == "Whatsapp") {
                                                        echo "selected";
                                                    }
                                                } ?> value="Whatsapp">Whatsapp</option>
                                    </select>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Metode Pembayaran</label>
                                    <select name="Metode_Pembayaran" required class="form-select fw-bold" data-kt-select2="true" data-placeholder="Pilih Metode Pembayaran" data-kt-user-table-filter="role" data-hide-search="true">
                                        <option value=""></option>
                                        <option <?php if (isset($_GET['edit'])) {
                                                    if ($edit['Metode_Pembayaran'] == "Tunai") {
                                                        echo "selected";
                                                    }
                                                } ?> value="Tunai">Tunai</option>
                                        <option <?php if (isset($_GET['edit'])) {
                                                    if ($edit['Metode_Pembayaran'] == "Transfer") {
                                                        echo "selected";
                                                    }
                                                } ?> value="Transfer">Transfer</option>
                                    </select>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Status Pembayaran</label>
                                    <select name="Status_Pembayaran" required class="form-select fw-bold" data-kt-select2="true" data-placeholder="Pilih Status Pembayaran" data-kt-user-table-filter="role" data-hide-search="true">
                                        <option <?php if (isset($_GET['edit'])) {
                                                    if ($edit['Status_Pembayaran'] == "Belum Bayar") {
                                                        echo "selected";
                                                    }
                                                } ?> value="Belum Bayar">Belum Bayar</option>
                                        <?php if (isset($_GET['edit'])) { ?>
                                            <option <?php if (isset($_GET['edit'])) {
                                                        if ($edit['Status_Pembayaran'] == "Sudah Bayar") {
                                                            echo "selected";
                                                        }
                                                    } ?> value="Sudah Bayar">Sudah Bayar</option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Status Barang</label>
                                    <select name="Status_Barang" required class="form-select fw-bold" data-kt-select2="true" data-placeholder="Pilih Status Barang" data-kt-user-table-filter="role" data-hide-search="true">
                                        <option <?php if (isset($_GET['edit'])) {
                                                    if ($edit['Status_Barang'] == "Belum Dikirim") {
                                                        echo "selected";
                                                    }
                                                } ?> value="Belum Dikirim">Belum Dikirim</option>

                                        <?php if (isset($_GET['edit'])) { ?>
                                            <option <?php if (isset($_GET['edit'])) {
                                                        if ($edit['Status_Barang'] == "Sedang Dikirim") {
                                                            echo "selected";
                                                        }
                                                    } ?> value="Sedang Dikirim">Sedang Dikirim</option>
                                            <option <?php if (isset($_GET['edit'])) {
                                                        if ($edit['Status_Barang'] == "Diterima") {
                                                            echo "selected";
                                                        }
                                                    } ?> value="Diterima">Diterima</option>
                                            <option <?php if (isset($_GET['edit'])) {
                                                        if ($edit['Status_Barang'] == "Dibatalkan") {
                                                            echo "selected";
                                                        }
                                                    } ?> value="Dibatalkan">Dibatalkan</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <hr class="mb-7">

                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Bukti Transaksi</label>
                            <input name="File_Bukti_Transaksi" type="file" class="form-control" accept=".png, .gif, .jpg, .jpeg, .pdf, .zip, .rar" />
                            <?php if (isset($_GET['edit'])) {
                                $folder_konten = "assets/images/bukti_transaksi/";
                            ?>
                                <br>
                                <?php if ($edit['File_Bukti_Transaksi'] != "") { ?>
                                    <a href="<?php echo $folder_konten . $edit['File_Bukti_Transaksi'] ?>" class="btn btn-light-success btn-sm" target="_blank"><i class="ki-solid ki-eye"></i>Lihat</a>
                                    <a href="<?php echo $folder_konten . $edit['File_Bukti_Transaksi'] ?>" class="btn btn-light-info btn-sm" download="<?php echo $edit['File_Bukti_Transaksi'] ?>"><i class="ki-solid ki-cloud-download"></i>Download</a>
                                <?php } else { ?>
                                    <span class="badge badge-light-danger">Konten ini tidak memiliki File</span>
                                <?php } ?>
                            <?php } ?>
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Catatan</label>
                            <textarea name="Catatan" class="form-control mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                    echo $edit['Catatan'];
                                                                                                } ?></textarea>
                        </div>

                        <div class="row mb-7">
                            <div class="pt-5 col-lg-12 text-center">
                                <a href="<?php echo $kehalaman ?>"><button type="button" class="btn btn-light-danger me-3">Kembali</button></a>
                                <?php if (isset($_GET['edit'])) {
                                ?>
                                    <button type="submit" class="btn btn-primary" name="submit_update">
                                        <span class="indicator-label">Ubah</span>
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <button type="submit" class="btn btn-primary" name="submit_simpan">
                                        <span class="indicator-label">Simpan</span>
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    <?php } ?>

    <!-- FORM DATA TABLE -->
    <?php if (!((isset($_GET["tambah"])) or (isset($_GET["edit"])))) { ?>
        <div class="card py-0">
            <div class="card-header pt-4 text-end" style="min-height: 0;">
                <div class="card-title">
                    <h1>Data Transaksi</h1>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex align-items-center position-relative my-1">
                        <div class="align-items-center position-relative fs-6">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Aktif">AKTIF (<?php echo $hitung_Aktif ?>)</a></li>
                                <li class="list-inline-item text-primary"> | </li>
                                <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terhapus">SAMPAH (<?php echo $hitung_Terhapus ?>)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-header border-0 pt-6">
                <div class="card-title d-none">
                    <div class="d-flex align-items-center position-relative my-1 mx-1">
                        <select name="filter" id="filterSelect" class="form-select">
                            <option <?php if (!(isset($_GET['filter']))) {
                                        echo "selected";
                                    } ?> value="All">Status Kemitraan</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Distributor")) {
                                        echo "selected";
                                    } ?> value="Distributor">Distributor</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Agen")) {
                                        echo "selected";
                                    } ?> value="Agen">Agen</option>
                        </select>
                    </div>

                    <div class="d-flex align-items-center position-relative my-1 mx-1">
                        <input type="date" class="form-control" name="" placeholder="Mulai">
                    </div>


                    <div class="d-flex align-items-center position-relative my-1 mx-1">
                        <select name="filter" id="filterSelect" class="form-select">
                            <option <?php if (!(isset($_GET['filter']))) {
                                        echo "selected";
                                    } ?> value="All">Metode Pembelian</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Shopee")) {
                                        echo "selected";
                                    } ?> value="Shopee">Shopee</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Whatsapp")) {
                                        echo "selected";
                                    } ?> value="Whatsapp">Whatsapp</option>
                        </select>
                    </div>

                    <div class="d-flex align-items-center position-relative my-1 mx-1">
                        <select name="filter" id="filterSelect" class="form-select">
                            <option <?php if (!(isset($_GET['filter']))) {
                                        echo "selected";
                                    } ?> value="All">Status Transaksi</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Proses")) {
                                        echo "selected";
                                    } ?> value="Proses">Proses</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Selesai")) {
                                        echo "selected";
                                    } ?> value="Selesai">Selesai</option>
                        </select>
                    </div>

                    <div class="d-flex align-items-center position-relative my-1 mx-1">
                        <select name="filter" id="filterSelect" class="form-select">
                            <option <?php if (!(isset($_GET['filter']))) {
                                        echo "selected";
                                    } ?> value="All">Status Pembayaran</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Belum Bayar")) {
                                        echo "selected";
                                    } ?> value="Belum Bayar">Belum Bayar</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Lunas")) {
                                        echo "selected";
                                    } ?> value="Lunas">Lunas</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Tempo")) {
                                        echo "selected";
                                    } ?> value="Tempo">Lunas</option>
                        </select>
                    </div>

                    <div class="d-flex align-items-center position-relative my-1 mx-1">
                        <select name="filter" id="filterSelect" class="form-select">
                            <option <?php if (!(isset($_GET['filter']))) {
                                        echo "selected";
                                    } ?> value="All">Status Barang</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Diterima")) {
                                        echo "selected";
                                    } ?> value="Diterima">Diterima</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Dikirim")) {
                                        echo "selected";
                                    } ?> value="Dikirim">Dikirim</option>
                        </select>
                    </div>

                    &nbsp;

                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" data-kt-user-table-filter="search" class="form-control w-250px ps-13" placeholder="Search" />
                    </div>
                </div>

                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <a href="<?php echo $kehalaman ?>&tambah" class="btn btn-sm btn-light-primary">
                            <i class="ki-duotone ki-plus fs-2"></i>Tambah</a>
                    </div>
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                    </div>
                </div>
            </div>

            <div class="card-body py-4">


                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="">No</th>
                            <th class="">Tanggal</th>
                            <th class="">Nomor Transaksi</th>
                            <th class="">Nama Mitra</th>
                            <th class="">Produk</th>
                            <th class="">QTY</th>
                            <th class="">Pembelian</th>
                            <th class="">Pembayaran</th>
                            <th class="">Barang</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <?php

                        $search_controller = new Search_Controller();
                        $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                        $filter_tanggal_transaksi_dari = isset($_GET['filter_tanggal_transaksi_dari']) ? $_GET['filter_tanggal_transaksi_dari'] : "";
                        $filter_tanggal_transaksi_sampai = isset($_GET['filter_tanggal_transaksi_sampai']) ? $_GET['filter_tanggal_transaksi_sampai'] : "";
                        $filter_status_transaksi = isset($_GET['filter_status_transaksi']) ? $_GET['filter_status_transaksi'] : "";
                        $filter_status_pembayaran = isset($_GET['filter_status_pembayaran']) ? $_GET['filter_status_pembayaran'] : "";
                        $filter_status_barang = isset($_GET['filter_status_barang']) ? $_GET['filter_status_barang'] : "";

                        $data_hasil = $search_controller->select_search_filter($filter_status, $filter_tanggal_transaksi_dari, $filter_tanggal_transaksi_sampai, $filter_status_transaksi, $filter_status_pembayaran, $filter_status_barang);
                        $nomor = 0;

                        foreach ($data_hasil as $data) {
                            $nomor++;
                            $encode_id = $a_hash->encode($data['Id_Transaksi'], $_GET['menu']); ?>

                            <tr>
                                <td>
                                    <?php echo $nomor ?>
                                </td>
                                <td class="d-flex align-items-center">
                                    <a class="text-gray-800 text-hover-primary mb-1" href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
                                        <?php echo $data['Tanggal_Transaksi'] ?>
                                    </a>

                                </td>
                                <td><?php echo $data['Nomor_Transaksi'] ?></td>
                                <td>
                                    <?php
                                    $result_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", $data['Id_Pengguna']);
                                    if ($result_pengguna['Status'] == "Sukses") {
                                        $data_pengguna = $result_pengguna['Hasil'];
                                    ?>
                                        <span><?php echo $data_pengguna['Nama_Depan'] . " " . $data_pengguna['Nama_Belakang']; ?></span>
                                        <span><?php echo $data_pengguna['Status_Kemitraan'] ?></span>
                                        <span><?php echo $data_pengguna['Nama_Perusahaan'] ?></span>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $result_produk = $a_tambah_baca_update_hapus->baca_data_id("tb_produk", "Id_Produk", $data['Id_Produk']);
                                    if ($result_produk['Status'] == "Sukses") {
                                        $data_produk = $result_produk['Hasil'];
                                        $id_produk_kategori = $result_produk['Hasil']['Id_Produk_Kategori'];
                                    ?>
                                        <span><?php echo $data_produk['Nama_Produk'] ?></span>
                                        <?php
                                        $result_produk_kategori = $a_tambah_baca_update_hapus->baca_data_id("tb_produk_kategori", "Id_Produk_Kategori", $data_produk['Id_Produk_Kategori']);
                                        if ($result_produk_kategori['Status'] == "Sukses") {
                                            $data_produk_kategori = $result_produk_kategori['Hasil'];
                                        ?>
                                            <span><?php echo $data_produk_kategori['Nama_Kategori'] ?></span>
                                    <?php
                                        }
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-light-info fw-bold"><?php echo $data['Status_Pembelian'] ?></div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-<?php if ($data['Status_Pembayaran'] == "Lunas") {
                                                                echo 'light-success';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Status_Pembayaran'] ?></div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-<?php if ($data['Status_Pembayaran'] == "Diterima") {
                                                                echo 'light-success';
                                                            } else if ($data['Status_Pembayaran'] == "Dikirim") {
                                                                echo 'light-primary';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Status_Pembayaran'] ?></div>
                                </td>

                                <td class="text-center">
                                    <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
                                        <i class="ki-solid ki-notepad-edit text-warning fs-2">
                                        </i>
                                    </a>
                                </td>

                            </tr>

                        <?php

                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    <?php } ?>
</div>



<script>
    function ubah_status_kemitraan() {
        // Get the select element for the user
        var selectElement = document.getElementById('Select-Id-Pengguna');
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        // Get the data attributes
        var statusKemitraan = selectedOption.getAttribute('data-status-kemitraan');
        var namaPerusahaan = selectedOption.getAttribute('data-perusahaan');
        var organisasiKode = selectedOption.getAttribute('data-organisasi-kode');

        // Set the values of 'Status_Kemitraan' and 'Nama_Perusahaan' inputs
        document.getElementById('Status_Kemitraan').value = statusKemitraan || ''; // Empty if no value
        document.getElementById('Nama_Perusahaan').value = namaPerusahaan || ''; // Empty if no value
        document.getElementById('Organisasi_Kode').value = organisasiKode || ''; // Empty if no value

        // Clear the product selection using Select2
        $('#Select-Id-Produk').val(null).trigger('change'); // Clear the Select2 selection

        // Clear the Harga, QTY, and Total fields
        document.getElementById('QTY').value = "";
        document.getElementById('Harga').value = "";
        document.getElementById('Total').value = "";
    }

    function ambil_harga_by_status_kemitraan() {
        var statusKemitraan = document.getElementById('Status_Kemitraan').value;

        if (statusKemitraan === "") {
            alert('Silahkan pilih Nama terlebih dahulu');
            // $('#Select-Id-Produk').val(null).trigger('change'); // Clear the Select2 selection
        } else {
            var selectElement = document.getElementById('Select-Id-Produk');
            var selectedOption = selectElement.options[selectElement.selectedIndex];

            var harga = statusKemitraan === 'Distributor' ?
                selectedOption.getAttribute('data-harga-distributor') :
                selectedOption.getAttribute('data-harga-agen');

            document.getElementById('Harga').value = formatRupiah(harga) || ''; // Format as Rupiah
        }
    }

    function formatRupiah(value) {
        if (!value) return '';
        return 'Rp ' + parseInt(value).toLocaleString('id-ID');
    }

    function hitung_total() {
        var hargaProduk = document.getElementById('Harga').value.replace(/\D/g, '');
        var qtyProduk = document.getElementById('QTY').value;

        if (hargaProduk && qtyProduk) {
            var totalHargaProduk = hargaProduk * qtyProduk;
            document.getElementById('Total').value = formatRupiah(totalHargaProduk); // Format total as Rupiah
        } else {
            document.getElementById('Total').value = '';
        }
    }

    // Trigger event when page loads (for edit cases)
    document.getElementById('Select-Id-Pengguna').addEventListener('DOMContentLoaded', ubah_status_kemitraan);

    // Using jQuery/Select2 to clear selections
    $('#Select-Id-Produk').select2({
        placeholder: 'Pilih Produk',
        allowClear: true // Enable the 'X' clear button
    });

    document.getElementById('QTY').addEventListener('keyup', hitung_total);
</script>