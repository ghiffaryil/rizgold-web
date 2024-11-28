<?php include "controller/pengaturan/function/controller_pengaturan_rekening.php"; ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Pengaturan Rekening</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pengaturan Rekening</li>
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
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="required fw-semibold fs-6 mb-2">Nama Bank</label>
                                            <input type="text" name="Nama_Bank" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                echo $edit['Nama_Bank'];
                                                                                                                                            } ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="required fw-semibold fs-6 mb-2">Nomor Rekening</label>
                                            <input type="text" name="Nomor_Rekening" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                        echo $edit['Nomor_Rekening'];
                                                                                                                                                    } ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="required fw-semibold fs-6 mb-2">Nama Pemilik Rekening</label>
                                            <input type="text" name="Nama_Pemilik_Rekening" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                            echo $edit['Nama_Pemilik_Rekening'];
                                                                                                                                                        } ?>">
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