<?php include "controller/transaksi/function/controller_transaksi.php"; ?>

<div id="kt_app_content" class="app-content pb-0">

    <?php if ((isset($_GET["view"]))) { ?>

        <div class="card mb-6">
            <card class="card-header border-0">
                <div class="card-title">
                    <?php
                    if ($edit['Status_Transaksi'] == "Proses") {
                        $badge_class = "badge-warning text-dark";
                    } else if ($edit['Status_Transaksi'] == "Baru") {
                        $badge_class = "badge-primary text-white";
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

        <!--begin::Order summary-->
        <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
            <!--begin::Order details-->
            <div class="card card-flush py-4 flex-row-fluid">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Order Details (#<?php echo $edit['Nomor_Transaksi']; ?>)</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                            <tbody class="fw-semibold text-gray-600">
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-calendar fs-2 me-2"><span class="path1"></span><span class="path2"></span></i> Tanggal Transaksi
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark">
                                        <?php echo tanggal_indonesia($edit['Tanggal_Transaksi']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-dollar fs-2 me-2 ">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            Metode Pembayaran
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark">
                                        <?php echo $edit['Metode_Pembayaran']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Order details-->

            <!--begin::Customer details-->
            <div class="card card-flush py-4  flex-row-fluid">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Identitas Pembeli</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <?php
                        $result_mitra = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", "$edit[Id_Pengguna]");
                        $data_mitra = $result_mitra['Hasil'];
                        
                        $result_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$data_mitra[Organisasi_Kode]");
                        $data_perusahaan = $result_perusahaan['Hasil'];
                        ?>
                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">

                            <tbody class="fw-semibold text-gray-600">
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-profile-circle fs-2 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Pembeli
                                        </div>
                                    </td>

                                    <td class="fw-bold text-end text-dark">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <?php echo "$data_mitra[Nama_Depan] $data_mitra[Nama_Belakang]"; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-office-bag fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                            Perusahaan
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark">
                                        
                                        <?php echo "$data_perusahaan[Nama_Perusahaan]" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-profile-user fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                            Kemitraan
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark"><?php echo $data_perusahaan['Status_Kemitraan']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Customer details-->
            <!--begin::Documents-->
            <div class="card card-flush py-4  flex-row-fluid">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Pembayaran</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                            <tbody class="fw-semibold text-gray-600">
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-wallet fs-2 me-2 ">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                            Status Pembayaran
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark">
                                        <?php echo $edit['Status_Pembayaran']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-truck fs-2 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> Status Barang
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark">
                                        <?php echo $edit['Status_Barang']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-cheque fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                                <span class="path6"></span>
                                                <span class="path7"></span>
                                            </i>
                                            Status Transaksi
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark"><?php echo $edit['Status_Transaksi']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Documents-->
        </div>
        <!--end::Order summary-->

        <br>

        <!--begin::Order summary-->
        <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
            <!--begin::Order details-->
            <div class="card card-flush py-4 flex-row-fluid">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Informasi Produk</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="table-responsive">

                        <?php
                        $result_produk = $a_tambah_baca_update_hapus->baca_data_id("tb_produk", "Id_Produk", "$edit[Id_Produk]");
                        $data_produk = $result_produk['Hasil'];
                        ?>
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                            <tbody class="fw-semibold text-gray-600">
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-profile-user fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                            Nama Produk
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark">
                                        <?php echo $data_produk['Nama_Produk']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-tablet-book fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            SKU
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark">
                                        <?php echo $data_produk['SKU']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-note-2 fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                            Kategori
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark">
                                        <?php
                                        $result_produk_kategori = $a_tambah_baca_update_hapus->baca_data_id("tb_produk_kategori", "Id_Produk_Kategori", "$data_produk[Id_Produk_Kategori]");
                                        $data_produk_kategori = $result_produk_kategori['Hasil'];
                                        ?>
                                        <?php echo $data_produk_kategori['Nama_Kategori']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-dollar fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                            Harga
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark">
                                        <?php echo $edit['Harga']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-text-number fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                                <span class="path6"></span>
                                            </i>
                                            Qty
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark">
                                        <?php echo $edit['QTY']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-dollar fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                            Total
                                        </div>
                                    </td>
                                    <td class="fw-bold text-end text-dark">
                                        <?php echo $edit['Total']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Order details-->

            <!--begin::Documents-->
            <div class="card card-flush py-4  flex-row-fluid">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Bukti Transaksi</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-muted">
                                            <?php if ($edit['Status_Transaksi'] == "Baru") { ?>
                                                <input name="File_Bukti_Transaksi" type="file" class="form-control" accept=".png, .jpg, .jpeg" required />

                                            <?php } ?>
                                            <?php if (isset($_GET['view'])) {
                                                $folder_konten = "../dashboard/media/bukti_transaksi/";
                                            ?>
                                                <?php if ($edit['File_Bukti_Transaksi'] != "") { ?>
                                                    <a href="<?php echo $folder_konten . $edit['File_Bukti_Transaksi'] ?>" class="btn btn-light-success btn-sm" target="_blank"><i class="ki-solid ki-eye"></i>Lihat</a>
                                                    <a href="<?php echo $folder_konten . $edit['File_Bukti_Transaksi'] ?>" class="btn btn-light-primary btn-sm" download="<?php echo $edit['File_Bukti_Transaksi'] ?>"><i class="ki-solid ki-cloud-download"></i>Download</a>
                                                <?php } else { ?>
                                                    <span class="fs-7 text-danger">Silahkan upload bukti transaksi jika anda sudah melakukan pembayaran</span>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold fs-1">
                                            <label for="">Catatan</label>
                                            <textarea <?php if ($edit['Status_Transaksi'] != "Baru") { ?> disabled <?php } ?> name="Catatan" class="form-control mb-3 mb-lg-0" rows="3"><?php if (isset($_GET['view'])) {
                                                                                                                                                                                            echo $edit['Catatan'];
                                                                                                                                                                                        } ?></textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            <?php if ($edit['Status_Transaksi'] == "Baru") { ?>
                                                <button type="submit" class="btn btn-primary" name="submit_update_bukti_transaksi">
                                                    <span class="text-white">Upload Bukti Transaksi</span>
                                                </button>
                                            <?php } else if ($edit['Status_Transaksi'] == "Proses") {
                                                echo "<span class='fs-4 badge badge-light-warning'> Transaksi anda sedang diproses oleh admin </span>";
                                            } else {
                                                echo "<span class='fs-4 badge badge-light-success'> Transaksi anda sudah selesai </span>";
                                            } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Documents-->
        </div>
    <?php } ?>


    <?php if (!((isset($_GET['view'])))) { ?>
        <div class="card py-0">
            <div class="card-header border-0">

                <?php
                $search_controller = new Search_Controller_Transaksi();
                $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                $filter_status_kemitraan = isset($_POST['submit_filter']) ? $_POST['filter_status_kemitraan'] : "";
                $filter_tanggal_dari = isset($_POST['submit_filter']) ? $_POST['filter_tanggal_dari'] : "";
                $filter_tanggal_sampai = isset($_POST['submit_filter']) ? $_POST['filter_tanggal_sampai'] : "";
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