<?php include "controller/pengaturan/function/controller_pengaturan_sk_kemitraan.php"; ?>

<div class="pt-lg-9">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Syarat & Ketentuan Kemitraan</h1>
            </div>
        </div>
    </div>
</div>


<div id="kt_app_content" class="app-content pb-0">

    <div class="card card-flush">
        <!-- FORM ADD -->
        <?php if ((isset($_GET["edit"]))) { ?>
            <div class="card py-4">
                <div class="card-body">

                    <form id="" method="POST" enctype="multipart/form-data">
                        <div class="d-flex flex-column">

                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Pengantar</label>
                                <textarea name="Pengantar" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                echo $edit['Pengantar'];
                                                                                                                            } ?></textarea>
                            </div>



                            <!-- FILE KONTEN YANG AKAN DIUPLOAD -->
                            <div class="fv-row mb-7">
                                <label class="fw-semibold fs-6 mb-2">File Konten (Opsional)</label>
                                <input name="File_Syarat_Dan_Ketentuan" type="file" class="form-control" accept=".png, .gif, .jpg, .jpeg, .mp4, .avi, .mov, .pdf, .ppt, .pptx, .doc, .docx, .xls, .xlsx, .zip, .rar" />

                                <?php if (isset($_GET['edit'])) { ?>
                                    <?php
                                    $folder_konten = "assets/konten/syarat_dan_ketentuan/";
                                    ?>

                                    <br>

                                    <?php if ($edit['File_Syarat_Dan_Ketentuan'] != "") { ?>
                                        <a href="<?php echo $folder_konten . $edit['File_Syarat_Dan_Ketentuan'] ?>" class="btn btn-light-primary btn-sm" target="_blank"><i class="ki-solid ki-eye"></i>Lihat</a>
                                        <a href="<?php echo $folder_konten . $edit['File_Syarat_Dan_Ketentuan'] ?>" class="btn btn-light-info btn-sm" download="<?php echo $edit['File_Syarat_Dan_Ketentuan'] ?>"><i class="ki-solid ki-cloud-download"></i>Download</a>
                                    <?php } else { ?>
                                        <span class="badge badge-light-danger">Konten ini tidak memiliki File</span>
                                    <?php } ?>
                                <?php } ?>
                            </div>



                            <div class="row mb-7">
                                <hr>
                                <div class="pt-5 col-lg-12 text-center">
                                    <?php if (isset($_GET['edit'])) {
                                    ?>
                                        <button type="submit" class="btn btn-primary" name="submit_update">
                                            <span class="indicator-label">Ubah</span>
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        <?php } ?>

    </div>
</div>