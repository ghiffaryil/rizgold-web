<?php include "controller/saldo/controller_tarik_saldo.php"; ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Tarik saldo</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?menu=saldo"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data saldo</li>
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
                    <?php if (isset($_GET["edit"])) { ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="form-group row">
                                            <label class=" col-lg-12 control-label">
                                                Tanggal : <span class="text-muted"><?php echo tanggal_dan_waktu_24_jam_indonesia($edit['Waktu_Simpan_Data']); ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group row">
                                            <label class=" col-lg-3 control-label">Status</label>
                                            <div class="col-lg-9 ">
                                                <?php if ($edit['Status_Saldo'] == 'Pending'): ?>
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                <?php elseif ($edit['Status_Saldo'] == 'Approved'): ?>
                                                    <span class="badge bg-success">Approved</span>
                                                <?php elseif ($edit['Status_Saldo'] == 'Void'): ?>
                                                    <span class="badge bg-danger">Void</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <fieldset class="content-group">
                                    <div class="row">
                                        <hr>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-5 control-label">Nama</label>
                                                <div class="col-lg-7">
                                                    <?php
                                                    $result_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", "$edit[Id_Pengguna]");
                                                    $edit_pengguna = $result_pengguna['Hasil'];
                                                    ?>
                                                    <?php echo $edit_pengguna['Nama_Depan'] . " " . $edit_pengguna['Nama_Belakang']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-lg-5 control-label">Saldo User saat ini</label>
                                                <div class="col-lg-7">
                                                    
                                                <?php echo $a_format_angka->rupiah($edit_pengguna['Saldo']);?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-5 control-label">Pengajuan Tarik Saldo</label>
                                                <div class="col-lg-7 ">
                                                    <span class="badge badge-warning fs-5"><?php echo $a_format_angka->rupiah($edit['Saldo']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>

                                <?php if ($edit['Status_Saldo'] == "Pending") { ?>
                                    <div class="text-center mt-5">
                                        <form method="POST">
                                            <input type="hidden" readonly name="Id_Pengguna_Saldo" class="form-control" value="<?php echo $edit['Id_Pengguna'] ?>">
                                            <input type="hidden" readonly name="Id_Tarik_Saldo" class="form-control" value="<?php echo $edit['Id_Tarik_Saldo'] ?>">
                                            <input type="hidden" readonly name="Saldo" class="form-control" value="<?php echo $edit['Saldo'] ?>">
                                            <div class="form-group ">
                                                <button type="submit" name="submit_approve_tarik_saldo" class="btn btn-success" onclick="return confirm('Anda yakin akan menyetujui Tarik saldo ini?')"> <i class="fa fa-check"></i> Approve </button>
                                                &nbsp;
                                                <button type="submit" name="submit_reject_tarik_saldo" class="btn btn-danger" onclick="return confirm('Anda yakin akan menolak Tarik saldo ini?')"> <i class="fa fa-close"> </i> Reject </button>
                                            </div>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <br>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <a href="?menu=tarik-saldo" class="btn btn-secondary"> Kembali </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="box">
                            <div class="box-body">
                                <div class="container">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <h4>Log History Saldo</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <?php
                                                    include "controller/saldo/controller_log_saldo.php";
                                                    $search_controller = new Search_Controller_Log_Saldo();
                                                    $data_hasil = $search_controller->select_search_filter($edit['Id_Pengguna']);
                                                    $nomor_log = 0;
                                                    foreach ($data_hasil as $data) {
                                                        $nomor_log++;
                                                        if ($data['Aktor'] == "Kemitraan") {
                                                            $read_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", "$data[Id_Aktor]");
                                                            $data_pengguna = $read_pengguna['Hasil'];
                                                            $nama_pengguna = $data_pengguna['Nama_Depan'] . " " . $data_pengguna['Nama_Belakang'];
                                                        } else {
                                                            $read_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_admin", "Id_Admin", "$data[Id_Aktor]");
                                                            $data_pengguna = $read_pengguna['Hasil'];
                                                            $nama_pengguna = $data_pengguna['Nama_Lengkap'];
                                                        }
                                                    ?>
                                                        <div class="form-group"> <?php echo tanggal_dan_waktu_24_jam_indonesia($data['Waktu_Simpan_Data']) . " - " . $nama_pengguna . " - " . $data['Aktivitas'] . " - " . $a_format_angka->rupiah($data['Saldo']) ?> </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (!((isset($_GET["tambah"])) or (isset($_GET["edit"])))) { ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        &nbsp;
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
                                    <ul class="list-inline">
											<li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Pending">Pending (<?php echo $hitung_pending ?>)</a></li>
											<li class="list-inline-item"> | </li>
											<li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Approved">Approved (<?php echo $hitung_approved ?>)</a></li>
											<li class="list-inline-item"> | </li>
											<li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Rejected">Rejected (<?php echo $hitung_rejected ?>)</a></li>
										</ul>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr class="bg-light">
                                                <th style="width:5%;">No</th>
                                                <th style="width:20%;">Tanggal</th>
                                                <th style="width:25%;">Mitra</th>
                                                <th style="width:15%;">Saldo</th>
                                                <th style="width:15%;">Status Saldo</th>
                                                <th style="width:5%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Pending";
                                            $search_controller = new Search_Controller_Saldo();
                                            $data_hasil = $search_controller->select_search_filter(filter_status: $filter_status);
                                            $nomor = 0;

                                            foreach ($data_hasil as $data) {
                                                $nomor++;

                                                $result_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", "$data[Id_Pengguna]");
                                                $data_pengguna = $result_pengguna['Hasil'];

                                            ?>
                                                <tr>
                                                    <td><?php echo $nomor ?></td>
                                                    <td>
                                                        <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data["Id_Tarik_Saldo"], $_GET['menu']); ?>">
                                                            <?php echo tanggal_dan_waktu_24_jam_indonesia($data['Waktu_Simpan_Data']); ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $data_pengguna['Nama_Depan'] . " " . $data_pengguna['Nama_Belakang']; ?></td>
                                                    <td><?php echo $a_format_angka->rupiah($data['Saldo']); ?></td>
                                                    <td>
                                                        <?php if ($data['Status_Saldo'] == 'Pending'): ?>
                                                            <span class="badge bg-warning text-dark">Pending</span>
                                                        <?php elseif ($data['Status_Saldo'] == 'Approved'): ?>
                                                            <span class="badge bg-success">Approved</span>
                                                        <?php elseif ($data['Status_Saldo'] == 'Rejected'): ?>
                                                            <span class="badge bg-danger">Rejected</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data["Id_Tarik_Saldo"], $_GET['menu']); ?>" class="btn btn-dark btn-sm">
                                                                Lihat
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
</div>