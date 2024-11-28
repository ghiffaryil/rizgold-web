<?php
$result_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", "$u_Id_Pengguna");
$data_pengguna = $result_pengguna['Hasil'];

$result_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$u_Organisasi_Kode");
$data_perusahaan = $result_perusahaan['Hasil'];
?>

<style>
    @media (max-width: 900px) {
        #display-profile {
            display: none;
        }
    }
</style>


<div class="app-main flex-column flex-row-fluid " id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content pb-0">
            <div class="d-flex flex-column flex-xl-row">

                <!-- PROFILE -->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10" id="display-profile">
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-body pt-15">
                            <div class="d-flex flex-center flex-column mb-5">
                                <div class="symbol symbol-150px symbol-circle mb-7">
                                    <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="false">
                                        <div class="image-input-wrapper w-250px h-250px" style="<?php if ($data_pengguna['Foto'] != "") { ?> background-image: url(../dashboard/media/kemitraan_foto/<?php echo $data_pengguna['Foto'] ?>); <?php } else { ?> background-image: url(assets/media/svg/files/blank-image.svg); <?php } ?>"></div>
                                    </div>
                                </div>
                                <h3><?php echo $data_pengguna['Nama_Depan'] . " " . $data_pengguna['Nama_Belakang'] ?></h3>
                                <span class="text-dark fs-6"><?php echo $data_perusahaan['Nama_Perusahaan'] ?></span>
                                <span class="text-muted fs-6"><?php echo $data_perusahaan['Organisasi_Kode'] ?></span>
                            </div>



                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold">
                                    Status Kemitraan
                                </div>
                                <span class="badge badge-light-primary">
                                    <?php echo $data_perusahaan['Status_Kemitraan'] ?>
                                </span>
                            </div>

                            <div class="separator separator-dashed my-3"></div>

                            <div class="pb-5 fs-6">
                                <div class="fw-bold mt-5">Email</div>
                                <div class="text-gray-600"><?php echo $data_pengguna['Email'] ?></div>

                                <div class="fw-bold mt-5">No. Handphone</div>
                                <div class="text-gray-600"><?php echo $data_pengguna['No_Handphone'] ?></div>

                                <div class="fw-bold mt-5">Alamat</div>
                                <div class="text-gray-600"><?php echo $data_pengguna['Alamat'] ?></div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- KONTEN -->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <?php include "controller/konten/controller_konten.php"; ?>
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="card-title">
                                <div id="kt_app_toolbar" class="app-toolbar py-4">
                                    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
                                        <div class="d-flex flex-stack flex-wrap gap-4 w-100">
                                            <div class="page-title d-flex flex-column gap-3 me-3">
                                                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Konten</h1>
                                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                                        <a href="index.php" class="text-gray-500">
                                                            <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                                    </li>
                                                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Konten</li>
                                                    <li class="breadcrumb-item">
                                                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                                    </li>
                                                    <li class="breadcrumb-item text-gray-500"><a href="<?php echo $kehalaman ?>" class="text-dark">Data Konten</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex align-items-center position-relative mx-1">
                                    <select name="filter" id="filterSelect" class="form-select form-select-solid">
                                        <option <?php if (!(isset($_GET['filter']))) {
                                                    echo "selected";
                                                } ?> value="All">Semua</option>
                                        <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Foto")) {
                                                    echo "selected";
                                                } ?> value="Foto">Foto</option>
                                        <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Video")) {
                                                    echo "selected";
                                                } ?> value="Video">Video</option>
                                        <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "File")) {
                                                    echo "selected";
                                                } ?> value="File">File</option>
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
                    <div class="card mt-5">
                        <div class="card-body py-4">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <thead>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-dark" style="width:5%">No</th>
                                        <th class="text-dark" style="width:30%">Judul</th>
                                        <th class="text-dark" style="width:30%">Kategori</th>
                                        <th class="text-dark" style="width:30%">Link Download</th>
                                        <th class="d-none text-dark" style="width:20%">Media</th>
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
                                        $encode_id = $a_hash->encode($data['Id_Konten'], $_GET['menu']);
                                        // echo $encode_id;
                                    ?>
                                        <tr>
                                            <td><?php echo $nomor ?></td>
                                            <td class="d-flex align-items-center"><?php echo $data['Judul']; ?></td>
                                            <td>
                                                <?php
                                                if ($data['Kategori'] == "Foto") {
                                                    $badge_kategori = "badge badge-info";
                                                } else if ($data['Kategori'] == "Video") {
                                                    $badge_kategori = "badge badge-danger";
                                                } else {
                                                    $badge_kategori = "badge badge-warning";
                                                }
                                                ?>
                                                <span class="badge badge-light"><?php echo $data['Kategori'] ?></span>
                                            </td>

                                            <td><a href="<?php echo $data['Link_Eksternal'] ?>" target="_blank" class="btn btn-success btn-sm text-white"> <i class="fa fa-external-link text-white"></i> Akses File </a></td>
                                            <td class="d-none">
                                                <?php
                                                if ($data['Kategori'] == "Foto") {
                                                    $folder_konten = "../dashboard/media/konten_foto/";
                                                } else if ($data['Kategori'] == "Video") {
                                                    $folder_konten = "../dashboard/media/konten_video/";
                                                } else if ($data['Kategori'] == "File") {
                                                    $folder_konten = "../dashboard/media/konten_file/";
                                                }
                                                ?>

                                                <?php if ($data['File_Konten'] != "") { ?>
                                                    <a href="<?php echo $folder_konten . $data['File_Konten'] ?>" class="btn btn-light-success btn-sm" target="_blank"><i class="ki-solid ki-eye"></i>Lihat</a>
                                                    <a href="<?php echo $folder_konten . $data['File_Konten'] ?>" class="btn btn-light-info btn-sm" download="<?php echo $edit['File_Konten'] ?>"><i class="ki-solid ki-cloud-download"></i>Download</a>
                                                <?php } else { ?>
                                                    <span class="badge badge-light">Konten ini tidak memiliki File</span>
                                                <?php } ?>
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
        </div>
    </div>
</div>