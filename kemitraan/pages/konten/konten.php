<?php include "controller/konten/function/crud_konten.php"; ?>
<div id="kt_app_content" class="app-content pb-0">
    <?php if ((isset($_GET["view"]))) { ?>
        <div class="card card-flush">
            <div class="card py-4">
                <div class="card-body">
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Judul</label>
                        <p><?php echo $edit['Judul']; ?></p>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Kategori</label>
                        <p><?php echo $edit['Kategori']; ?></p>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Link Eksternal</label>
                        <p><?php echo $edit['Link_Eksternal']; ?></p>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                        <p><?php echo $edit['Deskripsi']; ?></p>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">File Konten</label>
                        <?php
                        if ($edit['Kategori'] == "Foto") {
                            $folder_konten = "assets/konten/konten_foto/";
                        } else if ($edit['Kategori'] == "Video") {
                            $folder_konten = "assets/konten/konten_video/";
                        } else if ($edit['Kategori'] == "File") {
                            $folder_konten = "assets/konten/konten_file/";
                        }
                        ?>

                        <br>

                        <?php if ($edit['File_Konten'] != "") { ?>
                            <a href="<?php echo $folder_konten . $edit['File_Konten'] ?>" class="btn btn-light-success btn-sm" target="_blank"><i class="ki-solid ki-eye"></i>Lihat</a>
                            <a href="<?php echo $folder_konten . $edit['File_Konten'] ?>" class="btn btn-light-info btn-sm" download="<?php echo $edit['File_Konten'] ?>"><i class="ki-solid ki-cloud-download"></i>Download</a>
                        <?php } else { ?>
                            <span class="badge badge-light-danger">Konten ini tidak memiliki File</span>
                        <?php } ?>
                    </div>


                </div>
            </div>
        </div>
    <?php } ?>

    <!-- FORM DATA TABLE -->
    <?php if (!((isset($_GET["view"])))) { ?>
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
                            <th class="text-dark" style="width:20%">Judul</th>
                            <th class="text-dark" style="width:10%">Kategori</th>
                            <th class="text-dark" style="width:20%">Link</th>
                            <th class="text-dark" style="width:20%">Media</th>
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
                        ?>
                            <tr>
                                <td><?php echo $nomor ?></td>
                                <td class="d-flex align-items-center">
                                    <a class="text-gray-800 text-hover-primary mb-1" href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
                                        <?php echo $data['Judul']; ?>
                                    </a>
                                </td>
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
                                    <span class="<?php echo $badge_kategori ?>"><?php echo $data['Kategori'] ?></span>
                                </td>

                                <td><a href="<?php echo $data['Link_Eksternal'] ?>" target="_blank" class=""><?php echo substr(string: $data['Link_Eksternal'], offset: 0, length: 50) ?>...</a></td>
                                <td>
                                    <?php
                                    if ($data['Kategori'] == "Foto") {
                                        $folder_konten = "assets/konten/konten_foto/";
                                    } else if ($data['Kategori'] == "Video") {
                                        $folder_konten = "assets/konten/konten_video/";
                                    } else if ($data['Kategori'] == "File") {
                                        $folder_konten = "assets/konten/konten_file/";
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
    <?php } ?>
</div>