<?php include "controller/pengaturan/function/controller_role.php"; ?>

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

    <div class="card py-0">
        <div class="card-header pt-4 text-end" style="min-height: 0;">
            <div class="card-title">
                <h1>Data Role</h1>
            </div>
            <div class="card-toolbar">
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
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search" />
                </div>
            </div>
            
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
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

                    $search_controller = new Search_Controller();
                    $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                    $data_hasil = $search_controller->select_search_filter($filter_status);
                    $nomor = 0;

                    foreach ($data_hasil as $data) {
                        $nomor++;
                        $encode_id = $a_hash->encode($data['Id_Role'], $_GET['menu']);
                    ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td class="align-items-center">
                                <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>" data-id="<?php echo $encode_id; ?>" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user" class="text-gray-800 text-hover-primary mb-1"><?php echo $data['Nama_Role'] ?></a>
                                <br>
                                <font class="fs-6 text-muted"><?php echo $data['Deskripsi'] ?></font>
                            </td>
                            <td class="text-center">
                                <div class="badge badge-<?php echo $data['Tambah'] == "Iya" ? 'light-success' : 'light-danger'; ?> fw-bold">
                                    <?php echo $data['Tambah']; ?>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="badge badge-<?php echo $data['Baca'] == "Iya" ? 'light-success' : 'light-danger'; ?> fw-bold">
                                    <?php echo $data['Baca']; ?>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="badge badge-<?php echo $data['Ubah'] == "Iya" ? 'light-success' : 'light-danger'; ?> fw-bold">
                                    <?php echo $data['Ubah']; ?>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="badge badge-<?php echo $data['Hapus'] == "Iya" ? 'light-success' : 'light-danger'; ?> fw-bold">
                                    <?php echo $data['Hapus']; ?>
                                </div>
                            </td>
                            <td class="d-flex fv-row">
                                <div class="text-center">
                                    <?php if ($filter_status == "Terhapus") { ?>
                                        <a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah('<?php echo $encode_id; ?>')"><i class="ki-solid ki-arrow-circle-left text-primary fs-2"> </i></a>
                                        <a href="#" onclick="konfirmasi_hapus_data_permanen('<?php echo $encode_id; ?>')">
                                            <i class="ki-solid ki-trash text-danger fs-2"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>" data-id="<?php echo $encode_id; ?>" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                                            <i class="ki-solid ki-notepad-edit text-warning fs-2"></i>
                                        </a>
                                        <a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah('<?php echo $encode_id; ?>')">
                                            <i class="ki-solid ki-trash text-danger fs-2"></i>
                                        </a>
                                    <?php } ?>
                                </div>
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
                fetch('controller/pengaturan/fetch/fetch_role_data.php?id=' + roleId)
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