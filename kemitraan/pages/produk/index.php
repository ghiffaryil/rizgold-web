<?php include "controller/produk/function/crud_produk.php"; ?>

<div class="pt-lg-9">
    <div class="card">
        <div class="card-header">
            <div class="">
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
                                    <?php if (isset($_GET["edit"])) { ?>
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <li class="breadcrumb-item text-gray-500">Edit Produk</li>
                                    <?php } else if (isset($_GET["tambah"])) { ?>
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <li class="breadcrumb-item text-gray-500">Tambah Produk</li>
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

    <div class="card card-flush">
        <!-- FORM ADD -->
        <?php if ((isset($_GET["tambah"])) or (isset($_GET["edit"]))) { ?>
            <div class="card py-4">
                <div class="card-body">

                    <form id="" method="POST" enctype="multipart/form-data">
                        <div class="d-flex flex-column">
                            <div class="row">
                                <div class="text-end">
                                    <?php if (isset($_GET['edit'])) { ?>

                                        <?php $encode_id = $a_hash->encode($edit['Id_Produk'], $_GET['menu']); ?>


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

                            <div class="row mb-7">
                                <div class="col-lg-3">
                                    <label class="d-block fw-semibold fs-2 mb-5">Foto Produk</label>
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url('assets/media/svg/files/blank-image.svg');
                                        }

                                        [data-bs-theme="dark"] .image-input-placeholder {
                                            background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                        }
                                    </style>
                                    <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="false">

                                        <div class="image-input-wrapper w-250px h-250px" style="<?php if (isset($_GET['edit']) and ($edit['Foto_Produk'] != "")) { ?> background-image: url(assets/images/produk_foto/<?php echo $edit['Foto_Produk'] ?>); <?php } else { ?> background-image: url(assets/media/svg/files/blank-image.svg); <?php } ?>"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah Foto">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <input type="file" name="Foto_Produk" accept=".png, .jpg, .jpeg" />
                                        </label>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batal">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-text">File yang diizinkan types: png, jpg, jpeg.</div>

                                </div>

                                <div class="col-lg-9">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Nama Produk</label>
                                        <input required name="Nama_Produk" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                    echo $edit['Nama_Produk'];
                                                                                                                                                                                                                                                } ?>" />
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="fw-semibold fs-6 mb-2">SKU</label>
                                        <input name="SKU" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                echo $edit['SKU'];
                                                                                                                                                                                                                            } ?>" />
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="fw-semibold fs-6 mb-2">Kategori</label>

                                        <select name="Id_Produk_Kategori" class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                            <option value=""></option>
                                            <?php

                                            $search_field_where = array("Status");
                                            $search_criteria_where = array("=");
                                            $search_value_where = array("Aktif");
                                            $search_connector_where = array("");
                                            $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_produk_kategori", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                                            if ($result['Status'] == "Sukses") {
                                                $data_hasil_produk_kategori = $result['Hasil'];
                                                foreach ($data_hasil_produk_kategori as $data_produk_kategori) {
                                            ?>

                                                    <option <?php if (isset($_GET['edit'])) {
                                                                if ($edit['Id_Produk_Kategori'] == $data_produk_kategori['Id_Produk_Kategori']) {
                                                                    echo "selected";
                                                                }
                                                            } ?> value="<?php echo $data_produk_kategori['Id_Produk_Kategori'] ?>"><?php echo $data_produk_kategori['Nama_Kategori'] ?></option>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="fw-semibold fs-6 mb-2">Izin BPOM</label>
                                        <input name="Izin_BPOM" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                            echo $edit['Izin_BPOM'];
                                                                                                                                        } ?>" />
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Harga Distributor</label>
                                        <input required name="Harga_Distributor" type="number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                echo $edit['Harga_Distributor'];
                                                                                                                                                                                                                            } ?>" />
                                    </div>
                                   
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Harga Agen</label>
                                        <input required name="Harga_Agen" type="number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                echo $edit['Harga_Agen'];
                                                                                                                                                                                                                            } ?>" />
                                    </div>

                                    <div class="row mb-7">
                                        <div class="col-lg-6">
                                            <label class="required fw-semibold fs-6 mb-2">Stock</label>
                                            <input required name="Stock" type="number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                    echo $edit['Stock'];
                                                                                                                                                                                                                                } ?>" />
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="required fw-semibold fs-6 mb-2">Tanggal Kadaluwarsa</label>
                                            <input required name="Tanggal_Kadaluwarsa" type="date" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                    echo $edit['Tanggal_Kadaluwarsa'];
                                                                                                                                                                } ?>" />
                                        </div>
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                                        <textarea name="Deskripsi" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                        echo $edit['Deskripsi'];
                                                                                                                                    } ?></textarea>
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="fw-semibold fs-6 mb-2">Khasiat</label>
                                        <textarea name="Khasiat" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                    echo $edit['Khasiat'];
                                                                                                                                } ?></textarea>
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="fw-semibold fs-6 mb-2">Manfaat</label>
                                        <textarea name="Manfaat" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                    echo $edit['Manfaat'];
                                                                                                                                } ?></textarea>
                                    </div>


                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Link Shopee</label>
                                        <input required name="Link_Shopee" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                        echo $edit['Link_Shopee'];
                                                                                                                                                    } ?>" />
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-7">
                                <hr>
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

            <div class="card-header pt-4 text-end" style="min-height: 0;">
                <div class="card-title">
                    <h3>Data Produk</h3>
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
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search" />
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
                            <th class="min-w-20px">No</th>
                            <th class="min-w-50px">Nama Produk</th>
                            <th class="min-w-30px">Harga Distributor</th>
                            <th class="min-w-30px">Harga Agen</th>
                            <th class="min-w-20px">Stock</th>
                            <th class="min-w-30px">BPOM</th>
                            <th class="min-w-60px">Link Shopee</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <?php

                        $search_controller = new Search_Controller();
                        $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
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
                                <td><?php echo $a_format_angka->rupiah($data['Harga_Distributor']) ?></td>
                                <td><?php echo $a_format_angka->rupiah($data['Harga_Agen']) ?></td>
                                <td><?php echo $data['Stock'] ?></td>
                                <td><?php echo $data['Izin_BPOM'] ?></td>
                                <td><a href="<?php echo $data['Link_Shopee'] ?>" target="_blank"><?php echo substr($data['Link_Shopee'], 0, 20); ?>...</a></td>
                                <td class="text-center">
                                    <?php if ($filter_status == "Terhapus") { ?>
                                        <a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah('<?php echo $encode_id; ?>')"><i class="ki-solid ki-arrow-circle-left text-primary fs-2"> </i></a>
                                        <a href="#" onclick="konfirmasi_hapus_data_permanen('<?php echo $encode_id; ?>')"><i class="ki-solid ki-trash text-danger fs-2">
                                            </i></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
                                            <i class="ki-solid ki-notepad-edit text-warning fs-2">
                                            </i>
                                        </a>
                                        <a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah('<?php echo $encode_id; ?>')"><i class="ki-solid ki-trash text-danger fs-2">

                                            </i></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        <?php } ?>


    </div>
</div>