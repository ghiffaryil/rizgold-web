<?php include "controller/produk/function/crud_produk.php"; ?>
<div class="app-content">
    <?php if ((isset($_GET["view"]))) { ?>
        <div id="kt_app_toolbar" class="app-toolbar ">
            <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack flex-wrap ">
                <div class="d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-3 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-2x my-0">
                            Detail Product
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="/oswald-html-pro/index.html" class="text-gray-500 text-hover-primary">
                                    <i class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">eCommerce </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1"> Catalog </li>

                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-500"> Edit Product </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-6">
            <div class="card-body">
                <div class="d-flex">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="assets/images/produk_foto/<?php echo $edit['Foto_Produk'] ?>" class="w-100" />
                        </div>

                        <div class="col-lg-8">
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="fs-6 text-gray-700">Produk</label>
                                        <h1 class=""><?php echo $edit['Nama_Produk']; ?></h1>
                                    </div>
                                </div>
                                <div class="row mt-6">
                                    <div class="col-lg-4">
                                        <label class="fs-6 text-gray-700">Kategori</label>
                                        <p class="fs-4 fw-semibold text-dark"><?php echo  $a_format_angka->rupiah($Harga_Produk); ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="fs-6 text-gray-700">SKU</label>
                                        <p class="fs-4 fw-semibold text-dark"><?php echo  $edit['SKU']; ?></p>
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="fs-6 text-gray-700">Stock</label>
                                        <p class="fs-4 fw-semibold text-dark"><?php echo  $edit['Stock']; ?></p>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-lg-8">
                                        <label class="fs-6 text-gray-700">Harga</label>
                                        <?php
                                        if ($u_Status_Kemitraan == "Distributor") {
                                            $Harga_Produk = $edit['Harga_Distributor'];
                                        } else {
                                            $Harga_Produk = $edit['Harga_Agen'];
                                        }
                                        ?>
                                        <h2 class="fs-3x fw-bold text-danger"><?php echo  $a_format_angka->rupiah($Harga_Produk); ?></h2>
                                    </div>
                                    <div class="col-lg-4">
                                        <br class="">
                                        <button
                                            data-id="<?php echo $encode_id; ?>"
                                            data-id-pengguna="<?php echo $encode_id_pengguna; ?>"
                                            data-status-kemitraan="<?php echo $u_Status_Kemitraan; ?>"
                                            data-nama-produk="<?php echo $edit['Nama_Produk']; ?>"
                                            data-foto-produk="<?php echo $edit['Foto_Produk']; ?>"
                                            data-harga-produk="<?php echo $Harga_Produk; ?>"
                                            data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_user"
                                            class="btn btn-primary">
                                            <i class="ki-duotone ki-handcart fs-3 text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="mb-4">
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <label class="fs-6 text-gray-700">Deskripsi</label>
                                        <p class="fs-6 fw-semibold text-dark"><?php echo $edit['Deskripsi']; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <hr>
                                    <div class="col-lg-6">
                                        <div class="fv-row mb-4">
                                            <label class="fs-6 text-gray-700">Manfaat</label>
                                            <p class="fs-6 fw-semibold text-dark"><?php echo $edit['Manfaat']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="fv-row mb-4">
                                            <label class="fs-6 text-gray-700">Khasiat</label>
                                            <p class="fs-6 fw-semibold text-dark"><?php echo $edit['Khasiat']; ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-6">
            <div class="card-body">
                <div class="">
                    <div class="fv-row text-center">
                        <div class="">
                            <a href="?menu=belanja" class="btn btn-light-danger btn-block"> Kembali </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <?php if (!((isset($_GET['view'])))) { ?>
            <div class="card">
                <div class="card-header border-0">
                    <div class="card-title">
                        <div id="kt_app_toolbar" class="app-toolbar py-4">
                            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
                                <div class="d-flex flex-stack flex-wrap gap-4 w-100">
                                    <div class="page-title d-flex flex-column gap-3 me-3">
                                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Produk</h1>
                                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                                <a href="index.php" class="text-gray-500">
                                                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <i class="ki-duotone ki-right fs-6 text-gray-700 mx-n1"></i>
                                            </li>
                                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Produk</li>
                                            <li class="breadcrumb-item">
                                                <i class="ki-duotone ki-right fs-6 text-gray-700 mx-n1"></i>
                                            </li>
                                            <li class="breadcrumb-item text-gray-500"><a href="<?php echo $kehalaman ?>" class="text-dark">Data Produk</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search" />
                        </div>
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-7 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="text-dark" style="width: 5%;">No</th>
                                <th class="text-dark" style="width: 20%;">Foto Produk</th>
                                <th class="text-dark" style="width: 20%;">Nama Produk</th>
                                <th class="text-dark" style="width: 20%;">SKU</th>
                                <th class="text-dark" style="width: 15%;">Harga</th>
                                <th class="text-dark" style="width: 10%;">Stock</th>
                                <th class="text-dark" style="width: 10%;">BPOM</th>
                                <th class="text-dark" style="width: 10%;">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray">
                            <?php

                            $search_controller = new Search_Controller();
                            $filter_status = "Aktif";
                            $data_hasil = $search_controller->select_search_filter($filter_status);
                            $nomor = 0;

                            foreach ($data_hasil as $data) {
                                $nomor++;
                                $encode_id = $a_hash->encode($data['Id_Produk'], $_GET['menu']);
                                $encode_id_pengguna = $a_hash->encode($u_Id_Pengguna, $_GET['menu']);
                            ?>

                                <tr>
                                    <td>
                                        <?php echo $nomor ?>
                                    </td>
                                    <td class="text-left">
                                        <img src="assets/images/produk_foto/<?php echo $data['Foto_Produk'] ?>" style=" object-fit: cover; width: 50px; height: 50px;" />
                                    </td>
                                    <td>
                                        <a class="" href="<?php echo $kehalaman ?>&view&id=<?php echo $encode_id ?>">
                                            <?php echo $data['Nama_Produk']; ?>
                                        </a>
                                    </td>
                                    <td><span><?php echo $data['SKU'] ?></span></td>
                                    <td>
                                        <?php
                                        if ($u_Status_Kemitraan == "Distributor") {
                                            $Harga_Produk = $data['Harga_Distributor'];
                                            echo $a_format_angka->rupiah($data['Harga_Distributor']);
                                        } else if ($u_Status_Kemitraan == "Agen") {
                                            $Harga_Produk = $data['Harga_Agen'];
                                            echo $a_format_angka->rupiah($data['Harga_Agen']);
                                        } else {
                                            echo "Anda belum terdaftar sebagai Agen / Distributor";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $data['Stock'] ?></td>
                                    <td><?php echo $data['Izin_BPOM'] ?></td>
                                    <td class="text-center">
                                        <button
                                            data-id="<?php echo $encode_id; ?>"
                                            data-id-pengguna="<?php echo $encode_id_pengguna; ?>"
                                            data-status-kemitraan="<?php echo $u_Status_Kemitraan; ?>"
                                            data-nama-produk="<?php echo $data['Nama_Produk']; ?>"
                                            data-foto-produk="<?php echo $data['Foto_Produk']; ?>"
                                            data-harga-produk="<?php echo $Harga_Produk; ?>"
                                            data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_user"
                                            class="btn btn-sm btn-light-primary text-hover-dark">
                                            <span class="fs-7">Beli</span>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>

        </div>
        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-750px">
                <div class="modal-content">
                    <div class="modal-header pb-1 pt-5" id="kt_modal_add_user_header">
                        <h2 class="fw-bold">Beli Produk</h2>
                        <div class="btn btn-icon btn-sm btn-active-icon-danger" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <form id="kt_modal_add_user_form" class="form" method="POST" action="controller/transaksi/fetch/fetch_pembelian_produk.php">
                        <div class="modal-body scroll-y mx-5 mx-xl-4">
                            <div class="d-flex flex-column scroll-y me-n7 pe-4" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="245px">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img class="" style="height: 275px; width: 100%; object-fit:cover" id="modal-form-foto-produk">
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <input readonly type="hidden" name="Id_Produk" id="modal-form-id-produk">
                                                <input readonly type="hidden" name="Id_Pengguna" id="modal-form-id-pengguna">
                                                <label class="required fs-7">Nama Produk</label>
                                                <input readonly required type="text" name="Nama_Produk" id="modal-form-nama-produk" class="form-control form-control-solid fs-7" />
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="required fs-7">Harga</label>
                                                <input readonly placeholder="Harga akan terisi otomatis" name="Harga" id="modal-form-harga-produk" type="text" class="form-control form-control-solid fs-7" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label class="required fs-7">QTY</label>
                                                <input required name="QTY" id="modal-form-qty-produk" min="0" max="100" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" type="number" class="form-control" onchange="hitung_total();" onkeyup="hitung_total()" />
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="required fs-7">Total</label>
                                                <input readonly required placeholder="Total akan terisi otomatis" name="Total" id="modal-form-total-harga-produk" type="text" class="form-control form-control-solid fs-7" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label class="required fs-7">Metode Pembelian</label>
                                                <select name="Metode_Pembelian" id="modal-form-metode-pembelian" required class="form-select fs-7" data-kt-select2="true" data-placeholder="Pilih Metode Pembelian" data-allow-clear="true" data-hide-search="true" onchange="ubah_metode_pembelian()">
                                                    <option value=""> </option>
                                                    <option value="Shopee">Shopee</option>
                                                    <option value="Whatsapp">Whatsapp</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="required fs-7">Metode Pembayaran</label>
                                                <select name="Metode_Pembayaran" id="modal-form-metode-pembayaran" required class="form-select fs-7" data-kt-select2="true" data-placeholder="Pilih Metode Pembayaran" data-allow-clear="true" data-hide-search="true" onchange="ubah_metode_pembayaran()">
                                                    <option value=""> </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <label class="fs-7">Catatan (Opsional)</label>
                                                <input placeholder="Tulis jika ada informasi tambahan" name="Catatan" id="modal-form-catatan" type="text" class="form-control fs-7" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <div class="alert bg-light-primary"> <i class="ki-duotone ki-information text-primary fs-5">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i> Silahkan pilih metode pembelian dan klik tombol <b class="text-primary">"Proses"</b>, maka anda akan dilanjutkan ke halaman <b class="text-success">Whatsapp</b> / <b style="color: #EE4D2D;">Link Shopee</b> untuk melanjutkan transaksi </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-center">
                                <button type="button" class="btn btn-sm btn-light-danger me-3" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-sm btn-primary" name="submit_simpan" id="btn-simpan">
                                    <span class="text-white">Proses</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function ubah_metode_pembelian() {
                var metodePembelian = document.getElementById('modal-form-metode-pembelian').value;
                var metodePembayaran = document.getElementById('modal-form-metode-pembayaran');

                // Clear existing options in Metode Pembayaran
                metodePembayaran.innerHTML = "";

                // Create default "choose" option
                var defaultOption = document.createElement('option');
                defaultOption.value = "";
                defaultOption.text = "Pilih Metode Pembayaran";
                metodePembayaran.appendChild(defaultOption);

                // Check the selected metodePembelian and add relevant options
                if (metodePembelian === "Shopee") {
                    // Only add Transfer option for Shopee
                    var transferOption = document.createElement('option');
                    transferOption.value = "Transfer";
                    transferOption.text = "Transfer";
                    metodePembayaran.appendChild(transferOption);
                } else if (metodePembelian === "Whatsapp") {
                    // Add both Tunai and Transfer for Whatsapp
                    var tunaiOption = document.createElement('option');
                    tunaiOption.value = "Tunai";
                    tunaiOption.text = "Tunai";
                    metodePembayaran.appendChild(tunaiOption);

                    var transferOption = document.createElement('option');
                    transferOption.value = "Transfer";
                    transferOption.text = "Transfer";
                    metodePembayaran.appendChild(transferOption);
                }
            }

            function ubah_metode_pembayaran() {
                var metodePembelian = document.getElementById('modal-form-metode-pembelian').value;
                if (metodePembelian === "") {
                    alert('Pilih metode pembelian terlebih dahulu');
                }
            }
        </script>

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
                    var idPengguna = button.getAttribute('data-id-pengguna');
                    var statusKemitraan = button.getAttribute('data-status-kemitraan');
                    var idProduk = button.getAttribute('data-id');
                    var fotoProduk = button.getAttribute('data-foto-produk');
                    var namaProduk = button.getAttribute('data-nama-produk');
                    var hargaProduk = button.getAttribute('data-harga-produk');

                    // Fetch the data from the server based on the roleId
                    document.getElementById("modal-form-id-pengguna").value = idPengguna;
                    document.getElementById("modal-form-foto-produk").src = "assets/images/produk_foto/" + fotoProduk;
                    document.getElementById("modal-form-id-produk").value = idProduk;
                    document.getElementById("modal-form-nama-produk").value = namaProduk;
                    document.getElementById("modal-form-harga-produk").value = formatRupiah(hargaProduk);
                });
            });
        </script>

        <script>
            function formatRupiah(value) {
                if (!value) return '';
                return 'Rp ' + parseInt(value).toLocaleString('id-ID');
            }

            function hitung_total() {
                var hargaProduk = document.getElementById('modal-form-harga-produk').value.replace(/\D/g, '');
                var qtyProduk = document.getElementById('modal-form-qty-produk').value;

                if (qtyProduk > 100) {
                    alert('Maksimal pembelian produk adalah 100 pcs');
                    document.getElementById('modal-form-qty-produk').value = 100;
                } else {
                    if (hargaProduk && qtyProduk) {
                        var totalHargaProduk = hargaProduk * qtyProduk;
                        document.getElementById('modal-form-total-harga-produk').value = formatRupiah(totalHargaProduk); // Format total as Rupiah
                    } else {
                        document.getElementById('modal-form-total-harga-produk').value = '';
                    }
                }
            }
        </script>