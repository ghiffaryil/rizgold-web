<?php include "controller/pengaturan/function/controller_pengaturan.php"; ?>

<div class="pt-lg-9">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Pengaturan Pembelian</h1>
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

                    <form id="" method="POST">
                        <div class="d-flex flex-column">

                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Nomor Admin Teknis</label>
                                <input required name="Nomor_Admin_Teknis" type="number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                        echo $edit['Nomor_Admin_Teknis'];
                                                                                                                                                                                                                                    } ?>" />
                            </div>
                            
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Nomor Admin Pembelian</label>
                                <input required name="Nomor_Admin_Pembelian" type="number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                        echo $edit['Nomor_Admin_Pembelian'];
                                                                                                                                                                                                                                    } ?>" />
                            </div>

                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Pesan Otomatis Pembelian</label>
                                <textarea name="Pesan_Otomatis_Pembelian" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                            echo $edit['Pesan_Otomatis_Pembelian'];
                                                                                                                                        } ?></textarea>
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