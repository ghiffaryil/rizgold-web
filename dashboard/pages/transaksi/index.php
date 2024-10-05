<?php include "controller/transaksi/function/controller_transaksi.php"; ?>
<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Data Transaksi</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <?php if ((isset($_GET["tambah"])) or (isset($_GET["edit"]))) { ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <?php if (isset($_GET["tambah"])) { ?>
                                            <h4>Tambah Transaksi</h4>
                                        <?php } elseif (isset($_GET["edit"])) { ?>
                                            <h4>Edit Transaksi</h4>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
                                        <?php if (isset($_GET["edit"])) { ?>
                                            <script type="text/javascript">
                                                function konfirmasi_hapus_data_permanen() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Menghapus Permanen Data Ini ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&hapus_data_permanen&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_hapus_data_ke_tong_sampah() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&hapus_data_ke_tong_sampah&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_arsip_data() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Mengarsip Data Ini ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&arsip_data&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_restore_data_dari_arsip() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Mengeluarkan Data Ini Dari Arsip ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_arsip&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_restore_data_dari_tong_sampah() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Merestore Data Ini Dari Tong Sampah ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_tong_sampah&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }
                                            </script>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <?php if ($edit['Status'] == "Aktif") { ?>
                                                        <a href="#" onclick="konfirmasi_arsip_data()"><i class="fa fa-archive fa-md"></i> ARSIPKAN </a>
                                                    <?php } elseif ($edit['Status'] == "Terarsip") { ?>
                                                        <a href="#" onclick="konfirmasi_restore_data_dari_arsip()"><i class="fa fa-archive fa-md"></i> AKTIFKAN </a>
                                                    <?php } elseif ($edit['Status'] == "Terhapus") { ?>
                                                        <a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah()"><i class="fa fa-archive fa-md"></i> RESTORE </a>
                                                    <?php } ?>

                                                </li>
                                                <li class="list-inline-item"> | </li>
                                                <li class="list-inline-item">
                                                    <?php if ($edit['Status'] == "Terhapus") { ?>
                                                        <a href="#" onclick="konfirmasi_hapus_data_permanen()"><i class="fa fa-trash fa-md"></i> HAPUS </a>
                                                    <?php } elseif (($edit['Status'] == "Aktif") or ($edit['Status'] == "Terarsip")) { ?>
                                                        <a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah()"><i class="fa fa-trash fa-md"></i> HAPUS </a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>

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
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <h3>Identitas Pembeli</h3>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">Nama</label>
                                                            <select name="Id_Pengguna" id="Select-Id-Pengguna" onchange="ubah_status_kemitraan();" class="form-select">
                                                                <?php
                                                                $search_field_where = array("Status");
                                                                $search_criteria_where = array("=");
                                                                $search_value_where = array("Aktif");
                                                                $search_connector_where = array("");

                                                                $result_mitra = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_pengguna", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
                                                                if ($result_mitra['Status'] == "Sukses") {
                                                                    $data_hasil_mitra = $result_mitra['Hasil'];
                                                                    foreach ($data_hasil_mitra as $data_mitra) {
                                                                        $read_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$data_mitra[Organisasi_Kode]");
                                                                        $data_perusahaan = $read_perusahaan['Hasil'];
                                                                ?>
                                                                        <option
                                                                            value="<?php echo $data_mitra['Id_Pengguna']; ?>"
                                                                            data-perusahaan="<?php echo $data_perusahaan['Nama_Perusahaan'] . " - " . $data_perusahaan['Organisasi_Kode']; ?>"
                                                                            data-status-kemitraan="<?php echo $data_perusahaan['Status_Kemitraan']; ?>"
                                                                            data-organisasi-kode="<?php echo $data_perusahaan['Organisasi_Kode']; ?>"

                                                                            <?php if (isset($_GET['edit']) && $edit['Id_Pengguna'] == $data_mitra['Id_Pengguna']) {
                                                                                echo "selected";
                                                                            } ?>>
                                                                            <?php echo "$data_mitra[Nama_Depan] $data_mitra[Nama_Belakang] - $data_perusahaan[Nama_Perusahaan] - $data_perusahaan[Status_Kemitraan] "; ?>
                                                                        </option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="fw-semibold">Perusahaan</label>
                                                            <?php
                                                            if (isset($_GET['edit'])) {
                                                                $read_data_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", $edit['Organisasi_Kode']);
                                                                if ($read_data_perusahaan['Status'] == "Sukses") {
                                                                    $nama_perusahaan = $read_data_perusahaan['Hasil']['Nama_Perusahaan'];
                                                                } else {
                                                                    $nama_perusahaan = "";
                                                                }
                                                            }
                                                            ?>
                                                            <input readonly placeholder="Nama Perusahaan akan terisi otomatis" name="Nama_Perusahaan" id="Nama_Perusahaan" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET['edit'])) {
                                                                                                                                                                                                                                                        echo $nama_perusahaan;
                                                                                                                                                                                                                                                    } ?>" />
                                                            <input readonly placeholder="Organisasi Kode akan terisi otomatis" name="Organisasi_Kode" id="Organisasi_Kode" type="text" class="form-control form-control-solid mb-3 mb-lg-0 d-none" value="<?php if (isset($_GET['edit'])) {
                                                                                                                                                                                                                                                                echo $edit['Organisasi_Kode'];
                                                                                                                                                                                                                                                            } ?>" />

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="fw-semibold">Status Kemitraan</label>
                                                            <input readonly placeholder="Status Kemitraan akan terisi otomatis" name="Status_Kemitraan" id="Status_Kemitraan" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET['edit'])) {
                                                                                                                                                                                                                                                            echo $edit['Status_Kemitraan'];
                                                                                                                                                                                                                                                        } ?>" />
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <h3>Identitas Transaksi</h3>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">Nomor Transaksi</label>
                                                            <input name="Nomor_Transaksi" type="text" class="form-control form-control-solid mb-3 mb-lg-0" readonly value="<?php
                                                                                                                                                                            if (isset($_GET['edit'])) {
                                                                                                                                                                                echo $edit['Nomor_Transaksi'];
                                                                                                                                                                            } else {
                                                                                                                                                                                echo $Nomor_Transaksi_New; // Default to today's date in 'YYYY-MM-DD' format
                                                                                                                                                                            }
                                                                                                                                                                            ?>" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="">Tanggal Transaksi</label>
                                                            <input name="Tanggal_Transaksi" type="date" class="form-control mb-3 mb-lg-0"
                                                                value="<?php
                                                                        if (isset($_GET['edit'])) {
                                                                            echo $edit['Tanggal_Transaksi'];
                                                                        } else {
                                                                            echo date('Y-m-d'); // Default to today's date in 'YYYY-MM-DD' format
                                                                        }
                                                                        ?>" />
                                                        </div>
                                                    </div>

                                                </div>

                                                <hr class="mb-7">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <h3>Informasi Produk</h3>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="">Produk</label>

                                                            <select name="Id_Produk" id="Select-Id-Produk" onchange="function_select_produk(this.value)" class="form-select" data-kt-select2="true" data-placeholder="Pilih Produk" data-kt-user-table-filter="role" data-allow-clear="true">
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

                                                        <div class="form-group">
                                                            <label class="">Harga</label>
                                                            <input placeholder="Harga akan terisi otomatis" name="Harga" id="Harga" type="text" class="form-control mb-3 mb-lg-0 form-control-solid" value="<?php if (isset($_GET['edit'])) {
                                                                                                                                                                                                                echo $edit['Harga'];
                                                                                                                                                                                                            } ?>" />
                                                        </div>

                                                        <div class=" form-group">
                                                            <label class="">QTY</label>
                                                            <input name="QTY" id="QTY" min="0" max="100" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" type="number" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET['edit'])) {
                                                                                                                                                                                                                                                echo $edit['QTY'];
                                                                                                                                                                                                                                            } ?>" onkeyup="hitung_total()" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="">Total</label>
                                                            <input placeholder="Total akan terisi otomatis" name="Total" id="Total" type="text" class="form-control mb-3 mb-lg-0 form-control-solid" value="<?php if (isset($_GET['edit'])) {
                                                                                                                                                                                                                echo $edit['Total'];
                                                                                                                                                                                                            } ?>" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <h3>Pembayaran & Barang</h3>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="">Metode Pembelian</label>
                                                            <select name="Metode_Pembelian" required class="form-select" data-kt-select2="true" data-placeholder="Pilih Metode Pembalian" data-kt-user-table-filter="role" data-hide-search="true">
                                                                <option value="All"> Semua </option>
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

                                                        <div class="form-group">
                                                            <label class="">Metode Pembayaran</label>
                                                            <select name="Metode_Pembayaran" required class="form-select" data-kt-select2="true" data-placeholder="Pilih Metode Pembayaran" data-kt-user-table-filter="role" data-hide-search="true">
                                                                <option value="All"> Semua </option>
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

                                                        <div class="form-group">
                                                            <label class="">Status Pembayaran</label>
                                                            <select name="Status_Pembayaran" required class="form-select" data-kt-select2="true" data-placeholder="Pilih Status Pembayaran" data-kt-user-table-filter="role" data-hide-search="true">
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

                                                        <div class="form-group">
                                                            <label class="">Status Barang</label>
                                                            <select name="Status_Barang" required class="form-select" data-kt-select2="true" data-placeholder="Pilih Status Barang" data-kt-user-table-filter="role" data-hide-search="true">
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

                                                        <div class="form-group">
                                                            <label class="">Status Transaksi</label>
                                                            <select name="Status_Transaksi" required class="form-select" data-kt-select2="true" data-placeholder="Pilih Status" data-kt-user-table-filter="role" data-hide-search="true">
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

                                                        <div class="form-group">
                                                            <label class="fw-semibold">Catatan</label>
                                                            <textarea name="Catatan" class="form-control mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                    echo $edit['Catatan'];
                                                                                                                                } ?></textarea>
                                                        </div>

                                                    </div>

                                                    <?php if (isset($_GET['edit'])) { ?>
                                                        <div class="col-lg-4">
                                                            <label class="">Bukti Transaksi</label>
                                                            <span class="form-group text-muted">Klik untuk mengganti</span>
                                                            <input name="File_Bukti_Transaksi" type="file" class="form-control" accept=".png, .gif, .jpg, .jpeg, .pdf, .zip, .rar" />
                                                            <?php
                                                            $folder_konten = "media/bukti_transaksi/";
                                                            if ($edit['File_Bukti_Transaksi'] != "") { ?>
                                                                <div class="p-10 text-center">
                                                                    <img src="media/bukti_transaksi/<?php echo $edit['File_Bukti_Transaksi'] ?>" style="width: 70%; height: auto; object-fit:fill;" />
                                                                </div>
                                                                <div class="row">
                                                                    <a href="<?php echo $folder_konten . $edit['File_Bukti_Transaksi'] ?>" class="btn btn-info btn-sm btn-block" download="<?php echo $edit['File_Bukti_Transaksi'] ?>"><i class="ki-solid ki-cloud-download"></i>Download</a>
                                                                </div>
                                                                <br><br>
                                                            <?php } else { ?>
                                                                <span class="badge badge-danger">Transaksi ini tidak memiliki Bukti Transfer</span>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="text-center">
                                                    <?php if (isset($_GET["tambah"])) {  ?>
                                                        <input type="submit" class="btn btn-primary" name="submit_simpan" value="SIMPAN">
                                                    <?php } elseif (isset($_GET["edit"])) { ?>
                                                        <input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE">
                                                    <?php } ?>
                                                    <input type="button" onclick="document.location.href='<?php echo $kehalaman ?>'" class="btn btn-danger" value="KEMBALI">
                                                </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (!((isset($_GET["tambah"])) or (isset($_GET["edit"])))) { ?>
                        <div class="box">
                            <div class="box-body">

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <a href="<?php echo $kehalaman ?>&tambah" class="btn btn-primary btn-sm">Tambah Baru</a>
                                    </div>

                                    <div class="col-lg-6" style="text-align: right;">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Aktif">AKTIF (<?php echo $hitung_Aktif ?>)</a></li>
                                            <li class="list-inline-item"> | </li>
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terarsip">TERARSIP (<?php echo $hitung_Terarsip ?>)</a></li>
                                            <li class="list-inline-item"> | </li>
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terhapus">SAMPAH (<?php echo $hitung_Terhapus ?>)</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <?php
                                    $search_controller = new Search_Controller();
                                    $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                                    $filter_status_kemitraan = isset($_POST['submit_filter']) ? $_POST['filter_status_kemitraan'] : "";
                                    $filter_tanggal_dari = isset($_POST['submit_filter']) ? $_POST['filter_tanggal_dari'] : "";
                                    $filter_tanggal_sampai = isset($_POST['submit_filter']) ? $_POST['filter_tanggal_sampai'] : "";
                                    $filter_metode_pembayaran = isset($_POST['submit_filter']) ? $_POST['filter_metode_pembayaran'] : "";
                                    $filter_status_transaksi = isset($_POST['submit_filter']) ? $_POST['filter_status_transaksi'] : "";
                                    $filter_status_pembayaran = isset($_POST['submit_filter']) ? $_POST['filter_status_pembayaran'] : "";
                                    $filter_status_barang = isset($_POST['submit_filter']) ? $_POST['filter_status_barang'] : "";
                                    ?>
                                    <div class="col-lg-10">
                                        <?php if (isset($_POST['submit_filter'])) { ?>
                                            <div class="text-muted">
                                                <h4> Hasil Filter : </h4>
                                                <?php
                                                if ($filter_tanggal_dari != "" or $filter_tanggal_sampai != "") {
                                                    echo "<span class='badge badge-light'>  Tanggal : " . tanggal_indonesia($filter_tanggal_dari) . " - " . tanggal_indonesia($filter_tanggal_sampai) . " </span> &nbsp;";
                                                }
                                                if ($filter_status_transaksi != "All") {
                                                    echo "<span class='badge badge-light'> Status Transaksi : $filter_status_transaksi </span> &nbsp;";
                                                }
                                                if ($filter_status_kemitraan != "All") {
                                                    echo "<span class='badge badge-light'>Status Kemitraan : $filter_status_kemitraan </span> &nbsp;";
                                                }

                                                if ($filter_metode_pembayaran != "All") {
                                                    echo "<span class='badge badge-light'> Pembayaran : $filter_metode_pembayaran </span> &nbsp;";
                                                }
                                                if ($filter_status_pembayaran != "All") {
                                                    echo "<span class='badge badge-light'> Status : $filter_status_pembayaran </span> &nbsp;";
                                                }
                                                if ($filter_status_barang != "All") {
                                                    echo "<span class='badge badge-light'> Barang : $filter_status_barang </span> &nbsp;";
                                                }
                                                ?>
                                            </div>
                                        <?php
                                        } ?>
                                    </div>

                                    <div class="col-lg-2 d-flex text-right">
                                        <div class="">
                                            <?php if (isset($_POST['submit_filter'])) { ?>
                                                <a href="?menu=transaksi" class="btn btn-sm btn-danger"> <i class="fa fa-close"></i></a>
                                            <?php } ?>

                                            <button type="button" class="btn btn-sm <?php if (isset($_POST['submit_filter'])) {
                                                                                        echo 'btn-primary';
                                                                                    } else {
                                                                                        echo 'btn-light';
                                                                                    } ?>" data-bs-toggle="modal" data-bs-target="#modal-filter">
                                                <i class="fa fa-filter"></i> Filter
                                        </div>
                                        </button>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-borderless table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%" class="text-center">No</th>
                                                    <th style="width:20%" class="text-center">Tanggal / Kode</th>
                                                    <th style="width:10%" class="text-center">Status Transaksi</th>
                                                    <th style="width:10%" class="text-center">Nama</th>
                                                    <th style="width:10%" class="text-center">Kemitraan</th>
                                                    <th style="width:10%" class="text-center">Produk</th>
                                                    <th style="width:5%" class="text-center">QTY</th>
                                                    <th style="width:5%" class="text-center">Total</th>
                                                    <th style="width:10%" class="text-center">Pembayaran</th>
                                                    <th style="width:10%" class="text-center">Status Bayar</th>
                                                    <th style="width:10%" class="text-center">Status Barang</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fs-7">
                                                <?php
                                                $data_hasil = $search_controller->select_search_filter(
                                                    filter_status: $filter_status,
                                                    filter_status_kemitraan: $filter_status_kemitraan,
                                                    filter_tanggal_dari: $filter_tanggal_dari,
                                                    filter_tanggal_sampai: $filter_tanggal_sampai,
                                                    filter_metode_pembayaran: $filter_metode_pembayaran,
                                                    filter_status_transaksi: $filter_status_transaksi,
                                                    filter_status_pembayaran: $filter_status_pembayaran,
                                                    filter_status_barang: $filter_status_barang
                                                );
                                                $nomor = 0;

                                                // Output the results for debugging
                                                // echo "<pre>";
                                                // var_dump($data_hasil);
                                                // echo "</pre>";

                                                foreach ($data_hasil as $data) {
                                                    $nomor++;
                                                    $encode_id = $a_hash->encode($data['Id_Transaksi_Penjualan'], $_GET['menu']); ?>

                                                    <tr>
                                                        <td><?php echo $nomor ?></td>
                                                        <td>
                                                            <a class="" href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
                                                                <?php echo $data['Tanggal_Transaksi'] ?>
                                                            </a>
                                                            <?php echo $data['Nomor_Transaksi'] ?>
                                                        </td>
                                                        <td>
                                                            <div class="badge badge-<?php if ($data['Status_Transaksi'] == "Baru") {
                                                                                        echo 'light';
                                                                                    } else if ($data['Status_Transaksi'] == "Proses") {
                                                                                        echo 'warning';
                                                                                    } else {
                                                                                        echo 'success';
                                                                                    } ?>"><?php echo $data['Status_Transaksi'] ?></div>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $result_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", $data['Id_Pengguna']);
                                                            if ($result_pengguna['Status'] == "Sukses") {
                                                                $data_pengguna = $result_pengguna['Hasil'];
                                                            ?>
                                                                <span><?php echo "$data_pengguna[Nama_Depan] $data_pengguna[Nama_Belakang]" ?></span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $data['Status_Kemitraan'] ?></td>
                                                        <td>
                                                            <?php
                                                            $result_produk = $a_tambah_baca_update_hapus->baca_data_id("tb_produk", "Id_Produk", $data['Id_Produk']);
                                                            if ($result_produk['Status'] == "Sukses") {
                                                                $data_produk = $result_produk['Hasil'];
                                                                $id_produk_kategori = $result_produk['Hasil']['Id_Produk_Kategori'];
                                                            ?>
                                                                <span><?php echo $data_produk['Nama_Produk'] ?></span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $data['QTY'] ?></td>
                                                        <td><?php echo $data['Total'] ?>,-</td>
                                                        <td><?php echo $data['Metode_Pembayaran'] ?></td>
                                                        <td>
                                                            <div class="text-<?php if ($data['Status_Pembayaran'] == "Sudah Bayar") {
                                                                                    echo 'success';
                                                                                } else {
                                                                                    echo 'danger';
                                                                                } ?>"><?php echo $data['Status_Pembayaran'] ?></div>
                                                        </td>
                                                        <td>
                                                            <div class="text-<?php if ($data['Status_Barang'] == "Diterima") {
                                                                                    echo 'success';
                                                                                } else if ($data['Status_Barang'] == "Sedang Dikirim") {
                                                                                    echo 'primary';
                                                                                } else {
                                                                                    echo 'danger';
                                                                                } ?>"><?php echo $data['Status_Barang'] ?></div>
                                                        </td>

                                                    </tr>

                                                <?php

                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- MODAL FILTER -->
<div class="modal fade" id="modal-filter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <div class="modal-content">
            <form class="form" action="" id="modal-filter-form" method="POST">
                <!-- MODAL HEADER -->
                <div class="modal-header" id="modal-header">
                    <h4 class="">Filter Transaksi</h4>
                    <div data-bs-dismiss="modal" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></div>
                </div>
                <!-- MODAL BODY -->
                <div class="modal-body py-5">
                    <div class="scroll-y me-n7 pe-7" id="modal-filter_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#modal-header" data-kt-scroll-wrappers="#modal-filter_scroll" data-kt-scroll-offset="300px">
                        <div class="mb-3 row">
                            <div class="col-lg-6">
                                <label for="filterStatusTransaksi" class="form-label">Status Transaksi</label>
                                <select name="filter_status_transaksi" class="form-select form-select-solid" data-allow-clear="true">
                                    <option value="All"> Semua </option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_status_transaksi'] == "Baru")) {
                                                echo "selected";
                                            } ?> value="Baru">Baru</option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_status_transaksi'] == "Proses")) {
                                                echo "selected";
                                            } ?> value="Proses">Proses</option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_status_transaksi'] == "Selesai")) {
                                                echo "selected";
                                            } ?> value="Selesai">Selesai</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="filterStatusKemitraan" class="form-label">Status Kemitraan</label>
                                <select name="filter_status_kemitraan" class="form-select form-select-solid" data-allow-clear="true">
                                    <option value="All"> Semua </option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_status_kemitraan'] == "Distributor")) {
                                                echo "selected";
                                            } ?> value="Distributor">Distributor</option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_status_kemitraan'] == "Agen")) {
                                                echo "selected";
                                            } ?> value="Agen">Agen</option>
                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="startDate" class="form-label">Dari</label>
                                    <input type="date" name="filter_tanggal_dari" class="form-control" id="startDate" name="startDate" placeholder="Mulai" value="<?php if ((isset($_POST['submit_filter']))) {
                                                                                                                                                                        echo $_POST['filter_tanggal_dari'];
                                                                                                                                                                    } ?>">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="startDate" class="form-label">Sampai</label>
                                    <input type="date" name="filter_tanggal_sampai" class="form-control" id="endDate" name="endDate" placeholder="Selesai" value="<?php if ((isset($_POST['submit_filter']))) {
                                                                                                                                                                        echo $_POST['filter_tanggal_sampai'];
                                                                                                                                                                    } ?>">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="filterMetodepembayaran" class="form-label">Metode Pembayaran</label>
                                <select name="filter_metode_pembayaran" class="form-select form-select-solid" data-allow-clear="true">
                                    <option value="All"> Semua </option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_metode_pembayaran'] == "Tunai")) {
                                                echo "selected";
                                            } ?> value="Tunai">Tunai</option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_metode_pembayaran'] == "Transfer")) {
                                                echo "selected";
                                            } ?> value="Transfer">Transfer</option>
                                </select>

                            </div>

                            <div class="col-lg-6">
                                <label for="filterStatusPembayaran" class="form-label">Status Pembayaran</label>
                                <select name="filter_status_pembayaran" class="form-select form-select-solid" data-allow-clear="true">
                                    <option value="All"> Semua </option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_status_pembayaran'] == "Belum Bayar")) {
                                                echo "selected";
                                            } ?> value="Belum Bayar">Belum Bayar</option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_status_pembayaran'] == "Lunas")) {
                                                echo "selected";
                                            } ?> value="Sudah Bayar">Sudah Bayar</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="filterStatusBarang" class="form-label">Status Barang</label>
                                <select name="filter_status_barang" class="form-select form-select-solid" data-allow-clear="true">
                                    <option value="All"> Semua </option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_status_barang'] == "Diterima")) {
                                                echo "selected";
                                            } ?> value="Belum DIkirim">Belum DIkirim</option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_status_barang'] == "Diterima")) {
                                                echo "selected";
                                            } ?> value="Sedang Dikirim">Sedang Dikirim</option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_status_barang'] == "Diterima")) {
                                                echo "selected";
                                            } ?> value="Diterima">Diterima</option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_status_barang'] == "Dikirim")) {
                                                echo "selected";
                                            } ?> value="Dibatalkan">Dibatalkan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL FOOTER -->
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="d-flex">
                            <button type="reset" id="" data-bs-dismiss="modal" class="btn btn-danger">Batal</button> &nbsp;
                            <button type="submit" name="submit_filter" id="modal_submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL FILTER -->

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


        // Set custom value before triggering the change event
        customSelectValue = 'ubah_status_kemitraan';

        // Clear the product selection using Select2
        $('#Select-Id-Produk').val(null).trigger('change');
    }

    function function_select_produk(val) {
        <?php if (isset($_GET['edit'])) { ?>
            var customSelectValue = ""
        <?php } ?>
        // Use the global variable if it's set
        if (customSelectValue !== '') {
            val = customSelectValue; // Use the custom value
            customSelectValue = ''; // Reset the global variable
        }
        if (val == "ubah_status_kemitraan") {
            // // Clear the Harga, QTY, and Total fields
            document.getElementById('QTY').value = "";
            document.getElementById('Harga').value = "";
            document.getElementById('Total').value = "";
        } else {

            ambil_harga_by_status_kemitraan();
            hitung_total();

        }
    }

    function ambil_harga_by_status_kemitraan() {
        var statusKemitraan = document.getElementById('Status_Kemitraan').value;


        if (statusKemitraan === "") {
            alert('Silahkan pilih Nama terlebih dahulu');
            // $('#Select-Id-Produk').val(null).trigger('change'); // Clear the Select2 selection
        } else {
            var selectElement = document.getElementById('Select-Id-Produk');
            var selectedOption = selectElement.options[selectElement.selectedIndex];

            var harga = statusKemitraan == 'Distributor' ?
                selectedOption.getAttribute('data-harga-distributor') :
                selectedOption.getAttribute('data-harga-agen');

            document.getElementById('Harga').value = harga || ''; // Format as Rupiah
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