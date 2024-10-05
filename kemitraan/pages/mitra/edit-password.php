<?php include "controller/mitra/function/controller_mitra.php"; ?>

<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid " id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content pb-0">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-150px symbol-circle mb-7">

                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="false">
                                            <div class="image-input-wrapper w-250px h-250px" style="<?php if (isset($_GET['edit']) and ($edit['Foto'] != "")) { ?> background-image: url(assets/images/kemitraan_foto/<?php echo $edit['Foto'] ?>); <?php } else { ?> background-image: url(assets/media/svg/files/blank-image.svg); <?php } ?>"></div>

                                            <!-- File Input -->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah Foto">
                                                <i class="ki-duotone ki-pencil fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="file" name="Foto" id="foto-input" accept=".png, .jpg, .jpeg" />
                                            </label>

                                            <!-- Cancel Button -->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batal">
                                                <i class="ki-duotone ki-cross fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>

                                        </div>
                                        <!-- Update Button (Initially Hidden) -->
                                        <div class="text-center mt-4" id="button-submit-update" style="display: none;">
                                            <button type="submit" class="btn btn-block btn-sm btn-primary" name="submit_update">
                                                <span class="text-white">Update Foto</span>
                                            </button>
                                        </div>
                                    </form>

                                    <script>
                                        // Get the file input and submit button elements
                                        const fileInput = document.getElementById('foto-input');
                                        const submitButton = document.getElementById('button-submit-update');

                                        // Add an event listener to check if the file input value changes
                                        fileInput.addEventListener('change', function() {
                                            // Check if a file is selected
                                            if (fileInput.files.length > 0) {
                                                submitButton.style.display = ''; // Show the submit button
                                            } else {
                                                submitButton.style.display = 'none'; // Hide the submit button if no file is selected
                                            }
                                        });
                                    </script>
                                </div>
                                <!--end::Avatar-->

                                <!--begin::Name-->
                                <h3>
                                    <?php echo $edit['Nama_Depan'] . " " . $edit['Nama_Belakang'] ?>
                                </h3>

                                <span class="text-dark fs-6"><?php echo $edit['Nama_Perusahaan'] ?></span>
                                <span class="text-muted fs-6"><?php echo $edit['Organisasi_Kode'] ?></span>
                                <!--end::Name-->
                            </div>
                            <!--end::Summary-->

                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold">
                                    Details
                                </div>
                                <span class="badge badge-light-primary">
                                    <?php echo $edit['Status_Kemitraan'] ?>
                                </span>
                            </div>
                            <!--end::Details toggle-->

                            <div class="separator separator-dashed my-3"></div>

                            <!--begin::Details content-->
                            <div class="pb-5 fs-6">
                                <div class="fw-bold mt-5">Email</div>
                                <div class="text-gray-600"><?php echo $edit['Email'] ?></div>

                                <div class="fw-bold mt-5">No. Handphone</div>
                                <div class="text-gray-600"><?php echo $edit['Nomor_Telepon'] ?></div>

                                <div class="fw-bold mt-5">Alamat</div>
                                <div class="text-gray-600"><?php echo $edit['Alamat'] ?></div>

                                <div class="fw-bold mt-5">Tempat, Tanggal Lahir</div>
                                <div class="text-gray-600"><?php echo $edit['Tempat_Lahir'] ?>, <?php echo tanggal_indonesia($edit['Tanggal_Lahir']) ?></div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-7">
                                <label class="fw-semibold fs-2 mb-5">Hak Akses</label>
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input disabled class="form-check-input me-3" name="Profile" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Profile'] == "Iya") {
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
                                        <input disabled class="form-check-input me-3" name="Pembelian" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Pembelian'] == "Iya") {
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
                                        <input disabled class="form-check-input me-3" name="Laporan" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Laporan'] == "Iya") {
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
                                        <input disabled class="form-check-input me-3" name="Konten" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Konten'] == "Iya") {
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
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->

                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Edit Profile</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0 pb-5">
                            <form action="" method="POST">
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Nama Depan</label>
                                    <input required name="Nama_Depan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                            echo $edit['Nama_Depan'];
                                                                                                                                                                                                                        } ?>" />
                                </div>
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Nama Belakang</label>
                                    <input required name="Nama_Belakang" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                            echo $edit['Nama_Belakang'];
                                                                                                                                                                                                                        } ?>" />
                                </div>
                                <div class="mb-7">

                                    <label class="required fw-semibold fs-6 mb-2">Nama Perusahaan</label>
                                    <input required name="Nama_Perusahaan" type="text" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                    echo $edit['Nama_Perusahaan'];
                                                                                                                                } ?>" />
                                </div>
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Email</label>
                                    <input readonly type="email" name="Email" id="email" class="form-control form-control-solid mb-3 mb-lg-0"
                                        oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9@._+-]/g, '')"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                        title="Masukkan email yang valid (e.g., example@domain.com)"
                                        required
                                        value="<?php if (isset($_GET["edit"])) {
                                                    echo $edit['Email'];
                                                } ?>" />
                                </div>
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Nomor Telepon</label>
                                    <input required name="Nomor_Telepon" type="text" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                    echo $edit['Nomor_Telepon'];
                                                                                                                                } ?>" />
                                </div>
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Tempat Lahir</label>
                                    <input required name="Tempat_Lahir" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                            echo $edit['Tempat_Lahir'];
                                                                                                                                                                                                                        } ?>" />
                                </div>
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Tanggal Lahir</label>
                                    <input required name="Tanggal_Lahir" type="date" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                    echo $edit['Tanggal_Lahir'];
                                                                                                                                } ?>" />
                                </div>
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">No KTP</label>
                                    <input required name="No_KTP" type="text" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                        echo $edit['No_KTP'];
                                                                                                                                                                                                    } ?>" />
                                </div>
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">No NPWP</label>
                                    <input required name="No_NPWP" type="text" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                            echo $edit['No_NPWP'];
                                                                                                                        } ?>" />
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Alamat</label>
                                    <textarea required name="Alamat" class="form-control mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                    echo $edit['Alamat'];
                                                                                                                } ?></textarea>
                                </div>
                                <div class="row mb-7">
                                    <div class="pt-5 col-lg-12 text-center">
                                        <a href="dashboard.php"><button type="button" class="btn btn-light-danger me-3">Kembali</button></a>
                                        <?php if (isset($_GET['edit'])) {
                                        ?>
                                            <button type="submit" class="btn btn-primary" name="submit_update">
                                                <span class="text-white">Ubah</span>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->

        </div>
        <!--end::Content-->

    </div>
    <!--end::Content wrapper-->
</div>
<!--end:::Main-->