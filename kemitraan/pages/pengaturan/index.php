<?php
#-----------------------------------------------------------------------------------
#GET PAGE
if (isset($_GET['url_kembali'])) {
    $url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
    $kehalaman = "$url_kembali";
} else {
    $kehalaman = "?menu=" . $_GET['menu'];
}

if (isset($_GET['id'])) {
    $Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
}

#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {

    if (!isset($_POST['Hak_Akses_Tambah'])) {
        $_POST['Hak_Akses_Tambah'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Baca'])) {
        $_POST['Hak_Akses_Baca'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Ubah'])) {
        $_POST['Hak_Akses_Ubah'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Hapus'])) {
        $_POST['Hak_Akses_Hapus'] = "Tidak";
    }

    $form_field = array(
        "Nama_Role",
        "Deskripsi",
        "Tambah",
        "Baca",
        "Ubah",
        "Hapus",
        "Waktu_Simpan_Data",
        "Waktu_Update_Data",
        "Status"
    );
    $form_value = array(
        "$_POST[Nama_Role]",
        "$_POST[Deskripsi]",
        "$_POST[Hak_Akses_Tambah]",
        "$_POST[Hak_Akses_Baca]",
        "$_POST[Hak_Akses_Ubah]",
        "$_POST[Hak_Akses_Hapus]",
        $Waktu_Sekarang,
        $Waktu_Sekarang,
        "Aktif"
    );

    $result = $a_tambah_baca_update_hapus->tambah_data("tb_role", $form_field, $form_value);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)

if (isset($_GET['edit'])) {
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_role", "Id_Role", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}
#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {

    $Get_Id_Primary = $_POST['Id_Role'];

    if (!isset($_POST['Hak_Akses_Tambah'])) {
        $_POST['Hak_Akses_Tambah'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Baca'])) {
        $_POST['Hak_Akses_Baca'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Ubah'])) {
        $_POST['Hak_Akses_Ubah'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Hapus'])) {
        $_POST['Hak_Akses_Hapus'] = "Tidak";
    }

    $form_field = array(
        "Nama_Role",
        "Deskripsi",
        "Baca",
        "Tambah",
        "Ubah",
        "Hapus",
        "Waktu_Update_Data"
    );

    $form_value = array(
        "$_POST[Nama_Role]",
        "$_POST[Deskripsi]",
        "$_POST[Hak_Akses_Baca]",
        "$_POST[Hak_Akses_Tambah]",
        "$_POST[Hak_Akses_Ubah]",
        "$_POST[Hak_Akses_Hapus]",
        $Waktu_Sekarang
    );

    $form_field_where = array("Id_Role");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_role", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
    }
}
#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['hapus_data_ke_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_role", "Id_Role", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI ARCHIVE DATA (ARCHIVE)
if (isset($_GET['arsip_data'])) {

    $result = $a_tambah_baca_update_hapus->arsip_data("tb_role", "Id_Role", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['restore'])) {

    $result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_role", "Id_Role", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI DELETE PREMANENT DATA (DELETE PREMANENT)
if (isset($_GET['hapus_data_permanen'])) {

    $result = $a_tambah_baca_update_hapus->hapus_data_permanen("tb_role", "Id_Role", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI HITUNG DATA (COUNT)
$count_field_where = array("Status");
$count_criteria_where = array("=");
$count_connector_where = array("");

#-----------------------------------------------------------------------------------
#HITUNG AKTIF
$count_value_where = array("Aktif");
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERARSIP
$count_value_where = array("Terarsip");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERHAPUS
$count_value_where = array("Terhapus");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------
?>



<div class="pt-lg-9">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Pengaturan</h1>

            </div>
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content pb-0">

    <div class="card py-0">
        <div class="card-header pt-4 text-end" style="min-height: 0;">
            <div class="fs-6">
                <div class="d-flex align-items-center position-relative">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Aktif">AKTIF (<?php echo $hitung_Aktif ?>)</a></li>
                        <li class="list-inline-item text-primary"> | </li>
                        <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terhapus">SAMPAH (<?php echo $hitung_Terhapus ?>)</a></li>
                    </ul>
                </div>
            </div>
        </div>





        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search user" />
                </div>

            </div>


            <div class="card-toolbar">

                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">


                    <button type="button" class="btn btn-sm btn-light me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                        <i class="ki-duotone ki-exit-up fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>Export</button>


                    <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                        <i class="ki-duotone ki-plus fs-2"></i>Tambah</button>
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

            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="">No</th>
                        <th class="">Nama Role</th>
                        <th class="text-center">Baca</th>
                        <th class="text-center">Tambah</th>
                        <th class="text-center">Hapus</th>
                        <th class="text-center">Ubah</th>
                        <th class="">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    <?php
                    if (isset($_GET['filter_status'])) {
                        $filter_status = $_GET['filter_status'];
                    } else {
                        $filter_status = "Aktif";
                    }

                    $search_field_where = array("Status");
                    $search_criteria_where = array("=");
                    $search_value_where = array("$filter_status");
                    $search_connector_where = array("");

                    $nomor = 0;

                    $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_role", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                    if ($result['Status'] == "Sukses") {
                        $data_hasil = $result['Hasil'];

                        foreach ($data_hasil as $data) {
                            $nomor++; ?>

                            <?php $encode_id = $a_hash->encode($data['Id_Role'], $_GET['menu']); ?>

                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td class="align-items-center">
                                    <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>" data-id="<?php echo $encode_id; ?>" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user" class="text-gray-800 text-hover-primary mb-1"><?php echo $data['Nama_Role'] ?></a>
                                    <br>
                                    <font class="fs-6 text-muted"><?php echo $data['Deskripsi'] ?></font>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-<?php if ($data['Tambah'] == "Iya") {
                                                                echo 'light-success';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Tambah'] ?></div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-<?php if ($data['Baca'] == "Iya") {
                                                                echo 'light-success';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Baca'] ?></div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-<?php if ($data['Ubah'] == "Iya") {
                                                                echo 'light-success';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Ubah'] ?></div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-<?php if ($data['Hapus'] == "Iya") {
                                                                echo 'light-success';
                                                            } else {
                                                                echo 'light-danger';
                                                            } ?> fw-bold"><?php echo $data['Hapus'] ?></div>
                                </td>
                                <td class="d-flex fv-row">
                                    <div class="text-center">
                                        <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>" data-id="<?php echo $encode_id; ?>" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                                            <i class="ki-solid ki-notepad-edit text-warning fs-2">
                                            </i>
                                        </a>
                                        <?php if ($filter_status == "Terhapus") { ?>
                                            <a href="#" onclick="konfirmasi_hapus_data_permanen('<?php echo $encode_id; ?>')"><i class="ki-solid ki-trash text-danger fs-2">
                                                </i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah('<?php echo $encode_id; ?>')"><i class="ki-solid ki-trash text-danger fs-2">

                                                </i></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>

                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL EXPORT -->
<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-450px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Export Data</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-danger" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body scroll-y">
                <form id="kt_modal_export_users_form" class="form" action="">
                    <div class="fv-row mb-10">
                        <label class="required fs-6 fw-semibold form-label mb-2">Pilih Format:</label>
                        <select name="format" data-control="select2" data-placeholder="Pilih format export" data-hide-search="true" class="form-select form-select-solid fw-bold">
                            <option></option>
                            <option value="excel">Excel</option>
                            <option value="pdf">PDF</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-sm btn-light me-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Export</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ADD ROLE -->
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">Tambah Role Baru</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-danger" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-4">
                <form id="kt_modal_add_user_form" class="form" method="POST">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                        <input readonly type="hidden" name="Id_Role" id="Id_Role">

                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Nama Role</label>
                            <input required type="text" name="Nama_Role" id="Nama_Role" class="form-control form-control-solid mb-3 mb-lg-0" />
                        </div>

                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                            <textarea name="Deskripsi" id="Deskripsi" class="form-control form-control-solid mb-3 mb-lg-0" rows="2"></textarea>
                        </div>

                        <div class="mb-7 row">

                            <label class="required fw-semibold fs-6 mb-5">Hak Akses</label>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input name="Hak_Akses_Tambah" id="Hak_Akses_Tambah" class="form-check-input" type="checkbox" value="Iya" />
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                        <div class="fw-bold text-gray-800">Tambah</div>
                                        <div class="text-gray-600">User dapat melakukan Tambah Data</div>
                                    </label>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input name="Hak_Akses_Baca" id="Hak_Akses_Baca" class="form-check-input" type="checkbox" value="Iya" />
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="fw-bold text-gray-800">Baca</div>
                                        <div class="text-gray-600">User dapat melakukan Baca Data</div>
                                    </label>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input name="Hak_Akses_Ubah" id="Hak_Akses_Ubah" class="form-check-input" type="checkbox" value="Iya" />
                                    <label class="form-check-label" for="kt_modal_update_role_option_2">
                                        <div class="fw-bold text-gray-800">Ubah</div>
                                        <div class="text-gray-600">User dapat melakukan Ubah Data</div>
                                    </label>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input name="Hak_Akses_Hapus" id="Hak_Akses_Hapus" class="form-check-input" type="checkbox" value="Iya" />
                                    <label class="form-check-label" for="kt_modal_update_role_option_3">
                                        <div class="fw-bold text-gray-800">Hapus</div>
                                        <div class="text-gray-600">User dapat melakukan Hapus Data</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center pt-15">
                        <button type="button" class="btn btn-sm btn-light me-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary" name="submit_simpan" id="btn-simpan" style="display:none">
                            <span class="indicator-label">Simpan</span>
                        </button>
                        <button type="submit" class="btn btn-sm btn-warning" name="submit_update" id="btn-update" style="display:none">
                            <span class="indicator-label">Ubah</span>
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Reference to the modal form
        var form = document.getElementById('kt_modal_add_user_form');
        var formModal = document.getElementById('kt_modal_add_user');

        // Prevent form submission when pressing "Enter"
        form.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent the default form submission
            }
        });

        formModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            var roleId = button.getAttribute('data-id');

            if (roleId == null) {
                document.getElementById("Id_Role").value = "";
                document.getElementById("Nama_Role").value = "";
                document.getElementById("Deskripsi").value = "";
                document.getElementById("Hak_Akses_Tambah").checked = false;
                document.getElementById("Hak_Akses_Baca").checked = false;
                document.getElementById("Hak_Akses_Ubah").checked = false;
                document.getElementById("Hak_Akses_Hapus").checked = false;

                document.getElementById("btn-simpan").style.display = '';
                document.getElementById("btn-update").style.display = 'none';
            } else {
                // Fetch the data from the server based on the roleId
                fetch('pages/pengaturan/fetch/fetch_role_data.php?id=' + roleId)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById("Id_Role").value = data.Id_Role;
                        document.getElementById("Nama_Role").value = data.Nama_Role;
                        document.getElementById("Deskripsi").value = data.Deskripsi || "";

                        // Set checkboxes
                        document.getElementById("Hak_Akses_Tambah").checked = (data.Tambah === 'Iya');
                        document.getElementById("Hak_Akses_Baca").checked = (data.Baca === 'Iya');
                        document.getElementById("Hak_Akses_Ubah").checked = (data.Ubah === 'Iya');
                        document.getElementById("Hak_Akses_Hapus").checked = (data.Hapus === 'Iya');

                        document.getElementById("btn-simpan").style.display = 'none';
                        document.getElementById("btn-update").style.display = '';
                    })
                    .catch(error => {
                        console.error('Error fetching role data:', error);
                    });
            }
        });
    });
</script>