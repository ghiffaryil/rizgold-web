<?php if (!((isset($_COOKIE['Cookie_1_Admin_Rizgold'])) or (isset($_COOKIE['Cookie_2_Admin_Rizgold'])) or (isset($_COOKIE['Cookie_3_Admin_Rizgold'])))) {
    echo "<script>
	alert('Anda tidak berhak mengakses halaman ini !!!');
	document.location.href = 'dashboard.php';
</script>";
    exit();
} ?>


<?php include "controller/konten/function/crud_konten.php"; ?>

<div class="pt-lg-9">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Konten</h1>
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

                                        <?php $encode_id = $a_hash->encode($edit['Id_Konten'], $_GET['menu']); ?>


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


                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Judul Konten</label>
                                <input required name="Judul" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                            echo $edit['Judul'];
                                                                                                                                        } ?>" />
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fw-semibold fs-6 mb-2">Kategori</label>
                                <select name="Kategori" class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                    <option value=""></option>
                                    <option <?php if (isset($_GET['edit'])) {
                                                if ($edit['Kategori'] == "Foto") {
                                                    echo "selected";
                                                }
                                            } ?> value="Foto">Foto</option>
                                    <option <?php if (isset($_GET['edit'])) {
                                                if ($edit['Kategori'] == "Video") {
                                                    echo "selected";
                                                }
                                            } ?> value="Video">Video</option>
                                    <option <?php if (isset($_GET['edit'])) {
                                                if ($edit['Kategori'] == "File") {
                                                    echo "selected";
                                                }
                                            } ?> value="File">File</option>
                                </select>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fw-semibold fs-6 mb-2">Link Eksternal</label>
                                <input name="Link_Eksternal" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                            echo $edit['Link_Eksternal'];
                                                                                                                                        } ?>" />
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                                <textarea name="Deskripsi" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                echo $edit['Deskripsi'];
                                                                                                                            } ?></textarea>
                            </div>


                            <!-- FILE KONTEN YANG AKAN DIUPLOAD -->
                            <div class="fv-row mb-7">
                                <label class="fw-semibold fs-6 mb-2">File Konten (Opsional)</label>
                                <input name="File_Konten" type="file" class="form-control" accept=".png, .gif, .jpg, .jpeg, .mp4, .avi, .mov, .pdf, .ppt, .pptx, .doc, .docx, .xls, .xlsx, .zip, .rar" />

                                <?php if (isset($_GET['edit'])) { ?>
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
                                <?php } ?>
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
                            <th class="min-w-20px">No</th>
                            <th class="min-w-20px">Id Konten</th>
                            <th class="min-w-30px">Judul</th>
                            <th class="min-w-60px">Kategori</th>
                            <th class="min-w-50px">Link</th>
                            <th class="min-w-70px">Media</th>
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
                            $encode_id = $a_hash->encode($data['Id_Konten'], $_GET['menu']);
                        ?>
                            <tr>
                                <td>
                                    <?php echo $nomor ?>
                                </td>
                                <td><?php echo $data['Kode_Konten'] ?></td>
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

                                <td><a href="<?php echo $data['Link_Eksternal'] ?>" target="_blank" class=""><?php echo substr($data['Link_Eksternal'], 0, 20) ?>...</a></td>
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