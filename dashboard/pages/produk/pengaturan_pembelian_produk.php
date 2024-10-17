<?php include "controller/produk/function/controller_pengaturan_pembelian.php"; ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Pengaturan Pembelian</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pengaturan Pembelian</li>
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

                            <form id="" method="POST">
                                <div class="d-flex flex-column">

                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="required fw-semibold fs-6 mb-2">Nomor Admin Teknis</label>
                                            <input required name="Nomor_Admin_Teknis" type="number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                echo $edit['Nomor_Admin_Teknis'];
                                                                                                                                                                                                                                            } ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="required fw-semibold fs-6 mb-2">Nomor Admin Pembelian</label>
                                            <input required name="Nomor_Admin_Pembelian" type="number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                    echo $edit['Nomor_Admin_Pembelian'];
                                                                                                                                                                                                                                                } ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="required fw-semibold fs-6 mb-2">Pesan Otomatis Pembelian</label>
                                            <textarea name="Pesan_Otomatis_Pembelian" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                                        echo $edit['Pesan_Otomatis_Pembelian'];
                                                                                                                                                    } ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-gruop row">
                                        <div class="pt-5 col-lg-12 text-center">
                                            <button type="submit" class="btn btn-primary" name="submit_update">
                                                <span class="indicator-label">Ubah</span>
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