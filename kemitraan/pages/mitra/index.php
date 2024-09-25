<?php if (!((isset($_COOKIE['Cookie_1_Admin_Rizgold'])) or (isset($_COOKIE['Cookie_2_Admin_Rizgold'])) or (isset($_COOKIE['Cookie_3_Admin_Rizgold'])))) {
    echo "<script>
	alert('Anda tidak berhak mengakses halaman ini !!!');
	document.location.href = 'dashboard.php';
</script>";
    exit();
} ?>

<?php include "controller/mitra/function/crud_mitra_admin.php"; ?>

<div class="pt-lg-9">
    <div class="card">
        <div class="card-header">
            <div class="">
                <div id="kt_app_toolbar" class="app-toolbar py-4">
                    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
                        <div class="d-flex flex-stack flex-wrap gap-4 w-100">
                            <div class="page-title d-flex flex-column gap-3 me-3">
                                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Mitra</h1>
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                        <a href="index.php" class="text-gray-500">
                                            <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                    </li>
                                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Mitra</li>
                                    <li class="breadcrumb-item">
                                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                    </li>
                                    <li class="breadcrumb-item text-gray-500"><a href="<?php echo $kehalaman ?>" class="text-gray-800 text-hover-primary">Data Mitra</a></li>
                                    <?php if (isset($_GET["edit"])) { ?>
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <li class="breadcrumb-item text-gray-500">Edit Mitra</li>
                                    <?php } else if (isset($_GET["tambah"])) { ?>
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <li class="breadcrumb-item text-gray-500">Tambah Mitra</li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <?php if ((isset($_GET['edit']))) { ?>
                    <span class="badge badge-<?php if ((isset($_GET['edit'])) and ($edit['Status'] == "Aktif")) {
                                                    echo "success";
                                                } else {
                                                    echo "danger";
                                                } ?> fs-6"><?php echo $edit['Status'] ?></span>
                <?php } ?>
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

                        <div class="row mb-7">
                            <div class="col-lg-3">
                                <label class="d-block fw-semibold fs-2 mb-5">Foto Mitra</label>
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image.svg');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                    }
                                </style>
                                <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="false">

                                    <div class="image-input-wrapper w-250px h-250px" style="<?php if (isset($_GET['edit']) and ($edit['Foto'] != "")) { ?> background-image: url(assets/images/kemitraan_foto/<?php echo $edit['Foto'] ?>); <?php } else { ?> background-image: url(assets/media/svg/files/blank-image.svg); <?php } ?>"></div>
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah Foto">
                                        <i class="ki-duotone ki-pencil fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="file" name="Foto" accept=".png, .jpg, .jpeg" />
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
                                <div class="row mb-7">
                                    <div class="col-lg-6" <?php if (isset($_GET['edit'])) { ?> style="display:none" <?php } ?>>
                                        <label class="required fw-semibold fs-6 mb-2">Username</label>
                                        <input <?php if (isset($_GET['tambah'])) { ?>required <?php } ?> name="Username" type="text" pattern="[a-z0-9_]*" oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9_]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                                                        echo $edit['Username'];
                                                                                                                                                                                                                                                                                                    } ?>" />
                                    </div>
                                    <div class="col-lg-6" <?php if (isset($_GET['edit'])) { ?> style="display:none" <?php } ?>>
                                        <label class="required fw-semibold fs-6 mb-2">Password</label>
                                        <input <?php if (isset($_GET['tambah'])) { ?>required <?php } ?> name="Password" type="password" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                            echo $edit['Password'];
                                                                                                                                                                                                        } ?>" />
                                    </div>
                                </div>

                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="required fw-semibold fs-6 mb-2">Nama Depan</label>
                                        <input required name="Nama_Depan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                echo $edit['Nama_Depan'];
                                                                                                                                                                                                                                            } ?>" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="required fw-semibold fs-6 mb-2">Nama Belakang</label>
                                        <input required name="Nama_Belakang" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                    echo $edit['Nama_Belakang'];
                                                                                                                                                                                                                                                } ?>" />
                                    </div>
                                </div>

                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="required fw-semibold fs-6 mb-2">Email</label>
                                        <input type="email" name="Email" id="email" class="form-control form-control-solid mb-3 mb-lg-0"
                                            oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9@._+-]/g, '')"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                            title="Masukkan email yang valid (e.g., example@domain.com)"
                                            required
                                            value="<?php if (isset($_GET["edit"])) {
                                                        echo $edit['Email'];
                                                    } ?>" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="required fw-semibold fs-6 mb-2">Nomor Handphone</label>
                                        <input name="No_Handphone" type="text" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                            echo $edit['No_Handphone'];
                                                                                                                                                                                                                        } ?>" />
                                    </div>
                                </div>

                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-semibold fs-6 mb-2">Tempat Lahir</label>
                                        <input name="Tempat_Lahir" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                            echo $edit['Tempat_Lahir'];
                                                                                                                                                                                                                                        } ?>" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-semibold fs-6 mb-2">Tanggal Lahir</label>
                                        <input name="Tanggal_Lahir" type="date" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                echo $edit['Tanggal_Lahir'];
                                                                                                                                            } ?>" />
                                    </div>
                                </div>

                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="fw-semibold fs-6 mb-2">No KTP</label>
                                        <input name="No_KTP" type="text" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                    echo $edit['No_KTP'];
                                                                                                                                                                                                                } ?>" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="fw-semibold fs-6 mb-2">No NPWP</label>
                                        <input name="No_NPWP" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                            echo $edit['No_NPWP'];
                                                                                                                                        } ?>" />
                                    </div>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Alamat</label>
                                    <textarea name="Alamat" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                echo $edit['Alamat'];
                                                                                                                            } ?></textarea>
                                </div>

                                <hr>

                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-5">Hak Akses</label>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="Akses_Profile" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Akses_Profile'] == "Iya") {
                                                                                                                                echo "checked";
                                                                                                                            } ?> />
                                            <label class="form-check-label">
                                                <div class="fw-bold text-gray-800">Edit Profile</div>
                                                <div class="text-gray-600">User mendapat hak akses untuk mengedit profile</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="Akses_Pembelian" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Akses_Pembelian'] == "Iya") {
                                                                                                                                    echo "checked";
                                                                                                                                } ?> />
                                            <label class="form-check-label">
                                                <div class="fw-bold text-gray-800">Pembelian</div>
                                                <div class="text-gray-600">User mendapat hak akses untuk melakukan pembelian produk</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="Akses_Laporan" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Akses_Laporan'] == "Iya") {
                                                                                                                                echo "checked";
                                                                                                                            } ?> />
                                            <label class="form-check-label">
                                                <div class="fw-bold text-gray-800">Laporan</div>
                                                <div class="text-gray-600">User mendapat hak akses untuk mendownload laporan</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="Akses_Konten" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Akses_Konten'] == "Iya") {
                                                                                                                                echo "checked";
                                                                                                                            } ?> />
                                            <label class="form-check-label">
                                                <div class="fw-bold text-gray-800">Konten</div>
                                                <div class="text-gray-600">User mendapat hak akses untuk mengambil file-file konten</div>
                                            </label>
                                        </div>
                                    </div>
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
        <div class="card py-0">
            <div class="card-header pt-4 text-end" style="min-height: 0;">
                <div class="card-title">
                    <h1>Data Mitra</h1>
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

                        <select name="filter" id="filterSelect" class="form-select form-select-solid">
                            <option <?php if (!(isset($_GET['filter']))) {
                                        echo "selected";
                                    } ?> value="All">Semua</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Distributor")) {
                                        echo "selected";
                                    } ?> value="Distributor">Distributor</option>
                            <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Agen")) {
                                        echo "selected";
                                    } ?> value="Agen">Agen</option>
                        </select>

                        <script>
                            document.getElementById('filterSelect').addEventListener('change', function() {
                                var selectedValue = this.value;
                                var baseUrl = "<?php echo $kehalaman; ?>"; // Your base URL
                                if (selectedValue == "All") {
                                    window.location.href = baseUrl;
                                } else if (selectedValue) {
                                    <?php if (isset($_GET['filter_status'])) { ?>
                                        window.location.href = baseUrl + "&filter_status=<?php echo $_GET['filter_status'] ?>&filter=" + encodeURIComponent(selectedValue);
                                    <?php } else { ?>
                                        window.location.href = baseUrl + "&filter=" + encodeURIComponent(selectedValue);
                                    <?php } ?>
                                }
                            });
                        </script>
                    </div>

                    &nbsp;&nbsp;

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
                            <th class="">No</th>
                            <th class="">Nama</th>
                            <th class="">Nomor Handphone</th>
                            <th class="">Email</th>
                            <th class="">Kemitraan</th>
                            <th class="text-center">Akses Profile</th>
                            <th class="text-center">Akses Pembelian</th>
                            <th class="text-center">Akses Laporan</th>
                            <th class="text-center">Akses Konten</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <?php

                        $search_controller = new Search_Controller();
                        $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                        $filter = isset($_GET['filter']) ? $_GET['filter'] : "";
                        $data_hasil = $search_controller->select_search_filter($filter_status, $filter);
                        $nomor = 0;

                        foreach ($data_hasil as $data) {
                            $nomor++;
                            $encode_id = $a_hash->encode($data['Id_Pengguna'], $_GET['menu']);

                            $result_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$data[Organisasi_Kode]");
                            $data_perusahaan = $result_perusahaan['Hasil'];
                        ?>
                            <tr>
                                <td>
                                    <?php echo $nomor ?>
                                </td>
                                <td class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">

                                        <?php if ($data['Foto'] == "") {
                                            // Array of random background colors
                                            $colors = [
                                                'bg-primary',
                                                'bg-success',
                                                'bg-danger',
                                                'bg-info',
                                                'bg-dark',
                                                'bg-warning',
                                                'bg-secondary',
                                                'bg-light-primary',
                                                'bg-light-success',
                                                'bg-light-danger',
                                                'bg-light-info',
                                                'bg-light-dark',
                                                'bg-light-warning',
                                                'bg-light-secondary'
                                            ];

                                            // Pick a random color from the array
                                            $randomColor = $colors[array_rand($colors)];
                                        ?>
                                            <div class="symbol-label <?php echo $randomColor ?>">
                                                <?php // Get the first letter of 'Nama_Depan' and 'Nama_Belakang'
                                                $initials = strtoupper(substr($data['Nama_Depan'], 0, 1)) . strtoupper(substr($data['Nama_Belakang'], 0, 1));
                                                // Display the initials
                                                echo $initials;
                                                ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="symbol-label bg-warning">
                                                <img src="assets/images/kemitraan_foto/<?php echo $data['Foto'] ?>" class="w-100" />
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="">
                                        <a class="text-gray-800 text-hover-primary" href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
                                            <?php echo $data['Nama_Depan'] . " " . $data['Nama_Belakang'] ?>
                                            <br>
                                            <span class="text text-muted fs-6" style="font-size:smaller"> <?php echo $data_perusahaan['Nama_Perusahaan'] ?></span>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo $data['No_Handphone'] ?></td>
                                <td><?php echo $data['Email'] ?></td>
                                <td><?php echo $data_perusahaan['Status_Kemitraan']; ?></td>
                                <td class="text-center">
                                    <div class="badge badge-<?php if ($data['Akses_Profile'] == "Iya") {
                                                                echo 'light-success';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Akses_Profile'] ?></div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-<?php if ($data['Akses_Pembelian'] == "Iya") {
                                                                echo 'light-success';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Akses_Pembelian'] ?></div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-<?php if ($data['Akses_Laporan'] == "Iya") {
                                                                echo 'light-success';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Akses_Laporan'] ?></div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-<?php if ($data['Akses_Konten'] == "Iya") {
                                                                echo 'light-success';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Akses_Konten'] ?></div>
                                </td>

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
                                        <a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah('<?php echo $encode_id; ?>')"><i class="ki-solid ki-trash text-danger fs-2"></i></a>
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
        </div>
    <?php } ?>
</div>