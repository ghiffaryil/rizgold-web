<?php include "controller/pengaturan/function/controller_pengaturan_sk_kemitraan.php"; ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Pengaturan Kemitraan</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pengaturan Kemitraan</li>
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
                    <div class="box">
                        <div class="box-body">
                            <form id="" method="POST" enctype="multipart/form-data">
                                <div class="d-flex flex-column">
                                    <div class="form-group row d-none">
                                        <div class="col-lg-12">
                                            <label class="required fw-semibold fs-6 mb-2">Pengantar</label>
                                            <textarea name="Pengantar" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                            echo $edit['Pengantar'];
                                                                                                                                        } ?></textarea>
                                        </div>
                                    </div>

                                    <!-- FILE KONTEN YANG AKAN DIUPLOAD -->
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="fw-semibold fs-6">File Syarat & Ketentuan</label>
                                            <input name="File_Syarat_Dan_Ketentuan" type="file" class="form-control" accept=".png, .gif, .jpg, .jpeg, .mp4, .avi, .mov, .pdf, .ppt, .pptx, .doc, .docx, .xls, .xlsx, .zip, .rar" />
                                            <?php if ($edit['File_Syarat_Dan_Ketentuan'] != "") {
                                                $folder_konten = "media/konten/syarat_dan_ketentuan/";
                                                // Check if the file is a PDF
                                                $file_extension = pathinfo($edit['File_Syarat_Dan_Ketentuan'], PATHINFO_EXTENSION);
                                                if (strtolower($file_extension) == "pdf") {
                                            ?>
                                                    <br>
                                                    <i>File Saat ini </i>
                                                    <iframe src="<?php echo $folder_konten . $edit['File_Syarat_Dan_Ketentuan']; ?>" width="100%" height="600px">
                                                        Your browser does not support PDFs. <a href="<?php echo $folder_konten . $edit['File_Syarat_Dan_Ketentuan']; ?>">Download the PDF</a>.
                                                    </iframe>
                                                    <br>
                                                    <a href="<?php echo $folder_konten . $edit['File_Syarat_Dan_Ketentuan'] ?>" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-external-link"></i>&nbsp; Lihat di Tab Baru</a>
                                                    <a href="<?php echo $folder_konten . $edit['File_Syarat_Dan_Ketentuan'] ?>" class="btn btn-warning btn-sm" download="<?php echo $edit['File_Syarat_Dan_Ketentuan'] ?>"><i class="fa fa-cloud-download"></i> &nbsp; Download</a>

                                                <?php
                                                }
                                                ?>
                                            <?php } else { ?>
                                                <br>
                                                <span class="badge badge-danger">Konten ini tidak memiliki File</span>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="pt-5 col-lg-12 text-center">
                                            <hr>
                                            <button type="submit" class="btn btn-primary" name="submit_update">
                                                <span class="indicator-label">Update</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>