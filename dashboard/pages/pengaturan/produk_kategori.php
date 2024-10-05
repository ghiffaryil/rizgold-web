<?php include "controller/pengaturan/function/controller_produk_kategori.php"; ?>

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
                <h1>Data Produk Kategori</h1>
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
                        <th class="">Nama Kategori</th>
                        <th class="">Deskripsi</th>
                        <th class="d-none">Tambah</th>
                        <th class="d-none">Hapus</th>
                        <th class="d-none">Ubah</th>
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
                        $encode_id = $a_hash->encode($data['Id_Produk_Kategori'], $_GET['menu']);
                    ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td class="align-items-center">
                                <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>" data-id="<?php echo $encode_id; ?>" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user" class="text-gray-800 text-hover-primary mb-1"><?php echo $data['Nama_Kategori'] ?></a>
                                <br>
                            </td>
                            <td class=""><?php echo $data['Deskripsi'] ?></td>
                            <td class="d-none">&nbsp;</td>
                            <td class="d-none">&nbsp;</td>
                            <td class="d-none">&nbsp;</td>
                            <td class="d-flex fv-row">
                                <div class="">
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

<!-- MODAL ADD Produk Kategori -->
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">Tambah Produk Kategori Baru</h2>
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

                        <input readonly type="hidden" name="Id_Produk_Kategori" id="Id_Produk_Kategori">

                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Nama Kategori</label>
                            <input required type="text" name="Nama_Kategori" id="Nama_Kategori" class="form-control form-control-solid mb-3 mb-lg-0" />
                        </div>

                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                            <textarea name="Deskripsi" id="Deskripsi" class="form-control form-control-solid mb-3 mb-lg-0" rows="2"></textarea>
                        </div>

                    </div>

                    <div class=" pt-15">
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
            var id = button.getAttribute('data-id');

            if (id == null) {
                document.getElementById("Id_Produk_Kategori").value = "";
                document.getElementById("Nama_Kategori").value = "";
                document.getElementById("Deskripsi").value = "";

                document.getElementById("btn-simpan").style.display = '';
                document.getElementById("btn-update").style.display = 'none';
            } else {
                // Fetch the data from the server based on the id
                fetch('controller/pengaturan/fetch/fetch_produk_kategori_data.php?id=' + id)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById("Id_Produk_Kategori").value = data.Id_Produk_Kategori;
                        document.getElementById("Nama_Kategori").value = data.Nama_Kategori;
                        document.getElementById("Deskripsi").value = data.Deskripsi || "";


                        document.getElementById("btn-simpan").style.display = 'none';
                        document.getElementById("btn-update").style.display = '';
                    })
                    .catch(error => {
                        console.error('Error fetching Produk Kategori data:', error);
                    });
            }
        });
    });
</script>