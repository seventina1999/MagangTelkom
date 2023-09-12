<?php if (is_it()) { ?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="table-responsive">
            <h2>
                Data Magang
            </h2>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
                <div class="col-md-6"><a href="<?= base_url(); ?>Magang/tambah" class="btn btn-info mb-2">Tambah Magang</a></div>
            </div> -->

            <div class="card-body">
                <div class="table-responsive">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table align-items-center mb-0 table-bordered border-danger table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-danger">
                            <tr>
                                <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7">No</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">gambar </th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Jurusan</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Nama Divisi</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Awal Magang</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Akhir Magang</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php $i = 1; ?>
                            <?php foreach ($magang as $m) : ?>
                                <tr>
                                    <td class="text-center text-uppercase text-dark text-xs font-weight-bolder"><?= $i; ?>.</td>
                                    <td class="text-center text-dark text-xs font-weight-bolder"><img src="<?= base_url('assets/img/magang/') . $m['gambar']; ?>" style="width: 100px" class="img-thumbnail"></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder"><?= $m['username']; ?></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder"><?= $m['jurusan']; ?></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder">
                                        <?php foreach ($divisi as $u) : ?>
                                            <?php if ($m['id_divisi'] == $u['id']) { ?>
                                                <?= $u['nama']; ?>
                                            <?php } ?>
                                        <?php endforeach; ?></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder"><?php echo date('d-m-Y', strtotime($m['awal_magang'])) ?></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder"><?php echo date('d-m-Y', strtotime($m['akhir_magang'])) ?></td>
                                    <td>
                                        <a class="float-right">
                                            <?php if ($m['status'] == 'Active') { ?>
                                                <?php if ($_SESSION['id'] == $m['username']) { ?>
                                                    <a href="<?php echo base_url(); ?>magang/update_status/<?php echo $m['id']; ?>/<?php echo $m['status']; ?>" class="btn btn-success btn-sm disabled">Active</a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url(); ?>magang/update_status/<?php echo $m['id']; ?>/<?php echo $m['status']; ?>" class="btn btn-success btn-sm">Active</a>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url(); ?>magang/update_status/<?php echo $m['id']; ?>/<?php echo $m['status']; ?>" class="btn btn-warning btn-sm">Inactive</a>
                                            <?php } ?>
                                        </a>
                                    </td>
                                    <td class="text-center text-dark text-xs font-weight-bolder">
                                        <a href="<?= base_url('Magang/detail/') . $m['id']; ?>" class="text-white badge badge-pill badge-info">Detail</a>
                                        <a href="<?= base_url('Magang/edit/') . $m['id']; ?>" class="text-white badge badge badge-pill badge-warning">Edit</a>
                                        <a href="<?= base_url('Magang/hapus/') . $m['id']; ?>" class="text-white badge badge-pill badge-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- untuk menampilkan data berdasarkan divisi -->
    <?php } else { ?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="table-responsive">
                <h1>
                    <spann class="badge badge-success" style="background-color: #008080">Data Magang</span>
                </h1>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <!-- <div class="card-header py-3">
                    <div class="col-md-6"><a href="<?= base_url(); ?>Magang/tambah" class="btn btn-info mb-2">Tambah Magang</a></div>
                </div> -->

                <div class="card-body">
                    <div class="table-responsive">
                        <?= $this->session->flashdata('message'); ?>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">gambar </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Jurusan</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Divisi</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Awal Magang</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Akhir Magang</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($divisi_user as $m) : ?>
                                    <tr>
                                        <td class="text-center text-uppercase text-dark text-xs font-weight-bolder"><?= $i; ?>.</td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><img src="<?= base_url('assets/img/magang/') . $m['gambar']; ?>" style="width: 100px" class="img-thumbnail"></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?= $m['username']; ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?= $m['jurusan']; ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder">
                                            <?php foreach ($divisi as $u) : ?>
                                                <?php if ($m['id_divisi'] == $u['id']) { ?>
                                                    <?= $u['nama']; ?>
                                                <?php } ?>
                                            <?php endforeach; ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?= $m['awal_magang']; ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?= $m['akhir_magang']; ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder">
                                            <a href="<?= base_url('Magang/detail/') . $m['id']; ?>" class="text-white badge badge-pill badge-info">Detail</a>
                                            <a href="<?= base_url('Magang/edit/') . $m['id']; ?>" class="text-white badge badge badge-pill badge-warning">Edit</a>
                                            <a href="<?= base_url('Magang/hapus/') . $m['id']; ?>" class="text-white badge badge-pill badge-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>