<?php include "controller/transaksi/function/crud_transaksi.php"; ?>

<div id="kt_app_content" class="app-content pb-0">

    <?php if ((isset($_GET["view"]))) { ?>
        <div class="card">
            <card class="card-header border-0">
                <div class="card-title">
                    <?php
                    if ($edit['Status_Transaksi'] == "Proses") {
                        $badge_class = "badge-warning";
                    } else if ($edit['Status_Transaksi'] == "Baru") {
                        $badge_class = "badge-primary";
                    } else {
                        $badge_class = "badge-success";
                    }
                    ?>
                    <h1 class="fs-4">Transaksi <b>#<?php echo $edit['Nomor_Transaksi']; ?> </b> &nbsp;
                        <span class="badge <?php echo $badge_class; ?> fs-5"><?php echo $edit['Status_Transaksi'] ?></span>
                    </h1>
                </div>
                <div class="card-toolbar">
                    <div class="fv-row">
                        <button class="btn btn-light-primary btn-sm">
                            <i class="ki-duotone ki-cheque fs-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                                <span class="path7"></span>
                            </i> <span>Download Invoice</span>
                        </button>
                        <a href=" <?php echo $kehalaman ?>"><button type="button" class="btn btn-sm btn-light-danger me-3">Kembali</button></a>
                    </div>
                </div>
            </card>
        </div>

        <div class="card mt-6">
            <div class="card-body">
                <form id="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="fv-row mb-4">
                                    <h3>Identitas Pembeli</h3>
                                </div>
                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Nama</label>
                                    <?php
                                    $result_mitra = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", "$edit[Id_Pengguna]");
                                    $data_mitra = $result_mitra['Hasil'];
                                    ?>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo "$data_mitra[Nama_Depan] $data_mitra[Nama_Belakang]"; ?></p>
                                </div>

                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Perusahaan</label>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo "$data_mitra[Nama_Perusahaan] - $data_mitra[Organisasi_Kode]" ?></p>
                                </div>

                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Status Kemitraan</label>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo $data_mitra['Status_Kemitraan']; ?></p>
                                </div>
                            </div>

                            <div class=" col-lg-6">
                                <div class="fv-row mb-4">
                                    <h3>Identitas Transaksi</h3>
                                </div>
                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Nomor Transaksi</label>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo $edit['Nomor_Transaksi']; ?></p>
                                </div>

                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Tanggal Transaksi</label>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo $edit['Tanggal_Transaksi']; ?></p>
                                </div>

                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Status Transaksi</label>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo $edit['Status_Transaksi'] ?></p>
                                </div>
                            </div>

                        </div>

                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="fv-row mb-4">
                                    <h3>Informasi Produk</h3>
                                </div>


                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Produk</label>
                                    <?php
                                    $result_produk = $a_tambah_baca_update_hapus->baca_data_id("tb_produk", "Id_Produk", "$edit[Id_Produk]");
                                    $data_produk = $result_produk['Hasil'];
                                    ?>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo $data_produk['Nama_Produk']; ?></p>
                                </div>

                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Harga</label>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo $edit['Harga']; ?></p>
                                </div>

                                <div class=" fv-row mb-4">
                                    <label class="fs-7 text-gray-700">QTY</label>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo $edit['QTY']; ?></p>
                                </div>

                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Total</label>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo $edit['Total']; ?></p>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="fv-row mb-4">
                                    <h3>Informasi Pembayaran & Barang</h3>
                                </div>

                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Metode Pembelian</label>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo $edit['Metode_Pembelian']; ?></p>
                                </div>

                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Metode Pembayaran</label>
                                    <p class="fs-5 fw-semibold text-dark"><?php echo $edit['Metode_Pembayaran']; ?></p>
                                    </select>
                                </div>

                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Status Pembayaran</label>
                                    <p class="fs-5 fw-semibold text-dark">
                                        <?php echo $edit['Status_Pembayaran']; ?>

                                    </p>
                                </div>

                                <div class="fv-row mb-4">
                                    <label class="fs-7 text-gray-700">Status Barang</label>
                                    <p class="fs-5 fw-semibold text-dark">
                                        <?php echo $edit['Status_Barang']; ?>

                                    </p>
                                </div>
                            </div>
                        </div>


                        <hr class="mb-4">
                        <div class="fv-row mb-4">
                            <label class="required fs-7 text-gray-700">Bukti Transaksi</label>
                            <?php if ($edit['Status_Transaksi'] == "Baru") { ?>
                                <input name="File_Bukti_Transaksi" type="file" class="form-control" accept=".png, .jpg, .jpeg" required />
                            <?php } ?>
                            <?php if (isset($_GET['view'])) {
                                $folder_konten = "assets/images/bukti_transaksi/";
                            ?>
                                <br>
                                <?php if ($edit['File_Bukti_Transaksi'] != "") { ?>
                                    <a href="<?php echo $folder_konten . $edit['File_Bukti_Transaksi'] ?>" target="_blank"><img src="<?php echo $folder_konten . $edit['File_Bukti_Transaksi'] ?>" alt="" style="height: 400px; width:auto"></a>
                                    <br>
                                    <br>
                                    <a href="<?php echo $folder_konten . $edit['File_Bukti_Transaksi'] ?>" class="btn btn-light-success btn-sm" target="_blank"><i class="ki-solid ki-eye"></i>Lihat</a>
                                    <a href="<?php echo $folder_konten . $edit['File_Bukti_Transaksi'] ?>" class="btn btn-light-info btn-sm" download="<?php echo $edit['File_Bukti_Transaksi'] ?>"><i class="ki-solid ki-cloud-download"></i>Download</a>
                                <?php } else { ?>
                                    <span class="badge badge-light-danger">Konten ini tidak memiliki File</span>
                                <?php } ?>
                            <?php } ?>
                        </div>

                        <div class="fv-row mb-4">
                            <label class="fs-7 text-gray-700">Catatan</label>
                            <textarea <?php if ($edit['Status_Transaksi'] != "Baru") { ?> disabled <?php } ?> name="Catatan" class="form-control mb-3 mb-lg-0" rows="3"><?php if (isset($_GET['view'])) {
                                                                                                                                                                            echo $edit['Catatan'];
                                                                                                                                                                        } ?></textarea>
                        </div>

                        <div class="row mb-4 text-end">
                            <div class="pt-5 col-lg">
                                <?php if ($edit['Status_Transaksi'] == "Baru") { ?>
                                    <button type="submit" class="btn btn-primary" name="submit_update">
                                        <span class="indicator-label">Ubah</span>
                                    </button>
                                <?php } else if ($edit['Status_Transaksi'] == "Proses") {
                                    echo "<span class='fs-4 badge badge-light-warning'> Transaksi anda sedang diproses oleh admin </span>";
                                } else {
                                    echo "<span class='fs-4 badge badge-light-success'> Transaksi anda sudah selesai </span>";
                                } ?>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    <?php } ?>


    <?php if (!((isset($_GET['view'])))) { ?>
        <div class="card py-0">
            <div class="card-header border-0">

                <?php
                $search_controller = new Search_Controller();
                $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                $filter_status_kemitraan = isset($_POST['submit_filter']) ? $_POST['filter_status_kemitraan'] : "";
                $filter_tanggal_dari = isset($_POST['submit_filter']) ? $_POST['filter_tanggal_dari'] : "";
                $filter_tanggal_sampai = isset($_POST['submit_filter']) ? $_POST['filter_tanggal_sampai'] : "";
                $filter_metode_pembelian = isset($_POST['submit_filter']) ? $_POST['filter_metode_pembelian'] : "";
                $filter_metode_pembayaran = isset($_POST['submit_filter']) ? $_POST['filter_metode_pembayaran'] : "";
                $filter_status_transaksi = isset($_POST['submit_filter']) ? $_POST['filter_status_transaksi'] : "";
                $filter_status_pembayaran = isset($_POST['submit_filter']) ? $_POST['filter_status_pembayaran'] : "";
                $filter_status_barang = isset($_POST['submit_filter']) ? $_POST['filter_status_barang'] : "";
                ?>

                <div class="card-title">
                    <div id="kt_app_toolbar" class="app-toolbar py-4">
                        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
                            <div class="d-flex flex-stack flex-wrap gap-4 w-100">
                                <div class="page-title d-flex flex-column gap-3 me-3">
                                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Produk</h1>
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                            <a href="index.php" class="text-gray-500">
                                                <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Pembelian</li>
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <li class="breadcrumb-item text-gray-500"><a href="<?php echo $kehalaman ?>" class="text-dark">Data Pembelian</a></li>
                                    </ul>
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                        <div class="">
                                            <?php if (isset($_POST['submit_filter'])) {
                                            ?>
                                                <div class="text-muted fs-2">
                                                    <span class="badge badge-light-info mx-1"> Filter : </span>
                                                    <?php
                                                    if ($filter_tanggal_dari != "" or $filter_tanggal_sampai != "") {
                                                        echo "<span class='badge badge-light mx-1'>  Tanggal : " . tanggal_indonesia($filter_tanggal_dari) . " - " . tanggal_indonesia($filter_tanggal_sampai) . " </span>";
                                                    }
                                                    if ($filter_status_transaksi != "All") {
                                                        echo "<span class='badge badge-light mx-1'> Status Transaksi : $filter_status_transaksi </span>";
                                                    }
                                                    if ($filter_metode_pembelian != "All") {
                                                        echo "<span class='badge badge-light mx-1'> Pembelian : $filter_metode_pembelian </span>";
                                                    }
                                                    if ($filter_metode_pembayaran != "All") {
                                                        echo "<span class='badge badge-light mx-1'> Pembayaran : $filter_metode_pembayaran </span>";
                                                    }
                                                    if ($filter_status_pembayaran != "All") {
                                                        echo "<span class='badge badge-light mx-1'> Status : $filter_status_pembayaran </span>";
                                                    }
                                                    if ($filter_status_barang != "All") {
                                                        echo "<span class='badge badge-light mx-1'> Barang : $filter_status_barang </span>";
                                                    }
                                                    ?>
                                                </div>
                                            <?php
                                            } ?>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <?php if (isset($_POST['submit_filter'])) { ?>
                            <span class=""> <a href="?menu=transaksi" class="btn btn-sm btn-danger"><i class="ki-solid ki-cross text-white fs-2"></i></a></span>
                        <?php } ?> &nbsp;
                        <button type="button" class="text-hover-white btn btn-sm <?php if (isset($_POST['submit_filter'])) {
                                                                                        echo 'btn-primary';
                                                                                    } else {
                                                                                        echo 'btn-light-primary';
                                                                                    } ?> me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_filter">
                            <i class="ki-duotone ki-filter fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <span class="">Filter</span>
                        </button>
                    </div>

                    <div class="d-flex align-items-center position-relative mx-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search" />
                    </div>

                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-row-dashed fs-6 gy-5" id="kt_table_users" style="overflow-x:scroll">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th style="width:2%; vertical-align: top;" class="text-dark">No</th>
                            <th style="width:12%; vertical-align: top;" class="text-dark">Tanggal</th>
                            <th style="width:10%; vertical-align: top;" class="text-dark">Kode</th>
                            <th style="width:15%; vertical-align: top;" class="text-dark">Produk</th>
                            <th style="width:5%; vertical-align: top;" class="text-dark">QTY</th>
                            <th style="width:10%; vertical-align: top;" class="text-dark">Total</th>
                            <th style="width:10%; vertical-align: top;" class="text-dark">Pembelian</th>
                            <th style="width:10%; vertical-align: top;" class="text-dark">Pembayaran</th>
                            <th style="width:5%; vertical-align: top;" class="text-dark">Status</th>
                            <th style="width:5%; vertical-align: top;" class="text-dark">Barang</th>
                            <th style="width:10%; vertical-align: top;" class="text-dark">Transaksi</th>
                        </tr>
                    </thead>
                    <tbody class="fs-7">
                        <?php

                        $data_hasil = $search_controller->select_search_filter(
                            filter_status: $filter_status,
                            filter_status_kemitraan: $filter_status_kemitraan,
                            filter_tanggal_dari: $filter_tanggal_dari,
                            filter_tanggal_sampai: $filter_tanggal_sampai,
                            filter_metode_pembelian: $filter_metode_pembelian,
                            filter_metode_pembayaran: $filter_metode_pembayaran,
                            filter_status_transaksi: $filter_status_transaksi,
                            filter_status_pembayaran: $filter_status_pembayaran,
                            filter_status_barang: $filter_status_barang,
                            filter_id_pengguna: $u_Id_Pengguna
                        );
                        $nomor = 0;

                        foreach ($data_hasil as $data) {
                            $nomor++;
                            $encode_id = $a_hash->encode($data['Id_Transaksi_Penjualan'], $_GET['menu']); ?>

                            <tr>
                                <td><?php echo $nomor ?></td>
                                <td>
                                    <a class="" href="<?php echo $kehalaman ?>&view&id=<?php echo $encode_id ?>">
                                        <?php echo tanggal_indonesia($data['Tanggal_Transaksi']) ?>
                                    </a>
                                </td>
                                <td>
                                    <a class="" href="<?php echo $kehalaman ?>&view&id=<?php echo $encode_id ?>">
                                        <?php echo $data['Nomor_Transaksi'] ?>
                                    </a>
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
                                    }
                                    ?>
                                </td>
                                <td class=""><?php echo $data['QTY'] ?></td>
                                <td><?php echo $data['Total'] ?>,-</td>
                                <td><?php echo $data['Metode_Pembelian'] ?></td>
                                <td><?php echo $data['Metode_Pembayaran'] ?></td>
                                <td>
                                    <div class="badge badge-<?php if ($data['Status_Pembayaran'] == "Sudah Bayar") {
                                                                echo 'light-success';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Status_Pembayaran'] ?></div>
                                </td>
                                <td>
                                    <div class="badge badge-<?php if ($data['Status_Barang'] == "Diterima") {
                                                                echo 'light-success';
                                                            } else if ($data['Status_Barang'] == "Sedang Dikirim") {
                                                                echo 'light-info';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Status_Barang'] ?></div>
                                </td>
                                <td>
                                    <div class="badge badge-<?php if ($data['Status_Transaksi'] == "Baru") {
                                                                echo 'light-primary';
                                                            } else if ($data['Status_Transaksi'] == "Proses") {
                                                                echo 'light-warning';
                                                            } else {
                                                                echo 'light-success';
                                                            } ?> fw-bold"><?php echo $data['Status_Transaksi'] ?></div>
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



<!-- MODAL FILTER -->
<div class="modal fade" id="kt_modal_filter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="" id="kt_modal_filter_form" method="POST">
                <!-- MODAL HEADER -->
                <div class="modal-header" id="kt_modal_filter_header">
                    <h2 class="fw-bold">Filter Transaksi</h2>
                    <div data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-danger">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <!-- MODAL BODY -->
                <div class="modal-body py-5">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_filter_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_filter_header" data-kt-scroll-wrappers="#kt_modal_filter_scroll" data-kt-scroll-offset="300px">

                        <div class="mb-3">
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

                        <div class="mb-3 row">
                            <div class="col-lg-6">

                                <label for="filterMetodePembelian" class="form-label">Metode Pembelian</label>
                                <select name="filter_metode_pembelian" class="form-select form-select-solid" data-allow-clear="true">
                                    <option value="All"> Semua </option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_metode_pembelian'] == "Shopee")) {
                                                echo "selected";
                                            } ?> value="Shopee">Shopee</option>
                                    <option <?php if ((isset($_POST['submit_filter']) && $_POST['filter_metode_pembelian'] == "Whatsapp")) {
                                                echo "selected";
                                            } ?> value="Whatsapp">Whatsapp</option>
                                </select>

                            </div>
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
                        </div>

                        <div class="row mb-3">
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
                <div class="modal-footer flex-center">
                    <button type="reset" id="" data-bs-dismiss="modal" class="btn btn-sm btn-light me-3">Batal</button>
                    <button type="submit" name="submit_filter" id="kt_modal_add_customer_submit" class="btn btn-sm btn-primary">
                        <span class="text-white">Submit</span>
                    </button>
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