<?php include "controller/konten/controller_konten.php"; ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Data Konten</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Konten</li>
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
                                            <h4>Tambah Konten</h4>
                                        <?php } elseif (isset($_GET["edit"])) { ?>
                                            <h4>Edit Konten</h4>
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
                                                        <a href="#" onclick="konfirmasi_arsip_data()"><i class="fa fa-archive fa-md"> ARSIPKAN</i></a>
                                                    <?php } elseif ($edit['Status'] == "Terarsip") { ?>
                                                        <a href="#" onclick="konfirmasi_restore_data_dari_arsip()"><i class="fa fa-archive fa-md"> AKTIFKAN</i></a>
                                                    <?php } elseif ($edit['Status'] == "Terhapus") { ?>
                                                        <a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah()"><i class="fa fa-archive fa-md"> RESTORE</i></a>
                                                    <?php } ?>

                                                </li>
                                                <li class="list-inline-item"> | </li>
                                                <li class="list-inline-item">
                                                    <?php if ($edit['Status'] == "Terhapus") { ?>
                                                        <a href="#" onclick="konfirmasi_hapus_data_permanen()"><i class="fa fa-trash fa-md"> HAPUS </i></a>
                                                    <?php } elseif (($edit['Status'] == "Aktif") or ($edit['Status'] == "Terarsip")) { ?>
                                                        <a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah()"><i class="fa fa-trash fa-md"> HAPUS </i></a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>


                                <form method="POST" enctype="multipart/form-data">
                                    <fieldset class="content-group">
                                        <div class="row">
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
                                                        $folder_konten = "media/konten/konten_foto/";
                                                    } else if ($edit['Kategori'] == "Video") {
                                                        $folder_konten = "media/konten/konten_video/";
                                                    } else if ($edit['Kategori'] == "File") {
                                                        $folder_konten = "media/konten/konten_file/";
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
                                        </div>
                                    </fieldset>

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
                    <?php } ?>

                    <?php if (!((isset($_GET["tambah"])) or (isset($_GET["edit"])))) { ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <a href="<?php echo $kehalaman ?>&tambah" class="btn btn-primary">Tambah Baru</a>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Aktif">AKTIF (<?php echo $hitung_Aktif ?>)</a></li>
                                            <li class="list-inline-item"> | </li>
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terarsip">TERARSIP (<?php echo $hitung_Terarsip ?>)</a></li>
                                            <li class="list-inline-item"> | </li>
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terhapus">SAMPAH (<?php echo $hitung_Terhapus ?>)</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered" style="width:100%">
                                        <thead class="bg-light">
                                            <tr class="">
                                                <th class="min-w-20px">No</th>
                                                <th class="min-w-20px">Id Konten</th>
                                                <th class="min-w-30px">Judul</th>
                                                <th class="min-w-60px">Kategori</th>
                                                <th class="min-w-50px">Link Eksternal</th>
                                                <th class="min-w-70px">Media</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-semibold">
                                            <?php

                                            $search_controller = new Search_Controller_Konten();
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
                                                    <td >
                                                        <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
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

                                                    <td><a href="<?php echo $data['Link_Eksternal'] ?>" target="_blank" class=""><?php echo substr($data['Link_Eksternal'], 0, 20) ?> ... <i class="fa fa-external-link"></i> </a></td>
                                                    <td>
                                                        <?php
                                                        if ($data['Kategori'] == "Foto") {
                                                            $folder_konten = "media/konten/konten_foto/";
                                                        } else if ($data['Kategori'] == "Video") {
                                                            $folder_konten = "media/konten/konten_video/";
                                                        } else if ($data['Kategori'] == "File") {
                                                            $folder_konten = "media/konten/konten_file/";
                                                        }
                                                        ?>

                                                        <?php if ($data['File_Konten'] != "") { ?>
                                                            <a href="<?php echo $folder_konten . $data['File_Konten'] ?>" class="btn btn-success btn-sm" target="_blank"><i class="ki-solid ki-eye"></i>Lihat</a>
                                                            <a href="<?php echo $folder_konten . $data['File_Konten'] ?>" class="btn btn-info btn-sm" download="<?php echo $edit['File_Konten'] ?>"><i class="ki-solid ki-cloud-download"></i>Download</a>
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
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
</div>