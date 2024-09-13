<?php include "controller/produk/function/crud_produk.php"; ?>

<div id="" class="app-content">
    <div class="card">
        <div class="card-header">
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
                                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Produk</li>
                                    <li class="breadcrumb-item">
                                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                    </li>
                                    <li class="breadcrumb-item text-gray-500"><a href="<?php echo $kehalaman ?>" class="text-dark">Data Produk</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex align-items-center position-relative my-1">
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
        <div class="card-body py-4">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-dark" style="width: 5%;">No</th>
                        <th class="text-dark" style="width: 20%;">Nama Produk</th>
                        <th class="text-dark" style="width: 15%;">Harga</th>
                        <th class="d-none">pelengkap</th>
                        <th class="text-dark" style="width: 10%;">Stock</th>
                        <th class="d-none">pelengkap</th>
                        <th class="d-none">pelengkap</th>
                        <th class="text-dark" style="width: 10%;">BPOM</th>
                        <th class="text-dark" style="width: 20%;">Link Shopee</th>
                        <th class="text-dark" style="width: 10%;">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    <?php

                    $search_controller = new Search_Controller();
                    $filter_status = "Aktif";
                    $data_hasil = $search_controller->select_search_filter($filter_status);
                    $nomor = 0;

                    foreach ($data_hasil as $data) {
                        $nomor++;
                        $encode_id = $a_hash->encode($data['Id_Produk'], $_GET['menu']);
                    ?>

                        <tr>
                            <td>
                                <?php echo $nomor ?>
                            </td>
                            <td class="d-flex align-items-center">
                                <div class="symbol symbol-50px overflow-hidden me-3">
                                    <div class="symbol-label bg-warning">
                                        <img src="assets/images/produk_foto/<?php echo $data['Foto_Produk'] ?>" class="w-100" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <a class="text-gray-800 text-hover-primary mb-1" href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
                                        <?php echo $data['Nama_Produk']; ?>
                                    </a>
                                    <span><?php echo $data['SKU'] ?></span>
                                </div>
                            </td>
                            <td>
                                <?php
                                if ($u_Status_Kemitraan == "Distributor") {
                                    echo $a_format_angka->rupiah($data['Harga_Distributor']);
                                } else if ($u_Status_Kemitraan == "Agen") {
                                    echo $a_format_angka->rupiah($data['Harga_Agen']);
                                } else {
                                    echo "Anda belum terdaftar sebagai Agen / Distributor";
                                }
                                ?>
                            </td>
                            <td class="d-none">pelengkap</td>
                            <td><?php echo $data['Stock'] ?></td>
                            <td class="d-none">pelengkap</td>
                            <td class="d-none">pelengkap</td>
                            <td><?php echo $data['Izin_BPOM'] ?></td>
                            <td><a class="text-danger" href="<?php echo $data['Link_Shopee'] ?>" target="_blank"><?php echo substr(string: $data['Link_Shopee'], offset: 0, length: 30); ?>...</a></td>
                            <td class="text-center">
                                <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>" class="btn btn-sm btn-light-primary text-hover-dark">
                                    <span class="fs-6">Beli</span>
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
</div>