<?php if (is_it()) { ?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="table-responsive">
            <h2>
                Data Magang
            </h2>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="col-md-6 text-left mb-2">
                    <a href="<?= base_url(); ?>LaporanCutiIjin/tambah" class="btn btn-info mb-2">Tambah Data Cuti/Ijin</a>
                </div>
                <div class="col-xs-12 col-sm-6 ml-auto text-right mb-2">
            <form action="" method="GET">
                    <div class="row">
                        <div class="col">
                            <select name="bulan" id="bulan" class="form-control">
                                <option value="" disabled selected>-- Pilih Bulan --</option>
                                <?php foreach ($all_bulan as $bn => $bt) : ?>
                                    <option value="<?= $bn ?>" <?= ($bn == $bulan) ? 'selected' : '' ?>><?= $bt ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col ">
                            <button type="submit" class="btn btn-primary btn-fill btn-block">Tampilkan</button>
                        </div>
            </form>
                        <div>
                            <button class="btn btn-secondary" type="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i>
                                <a class="text-light" href=" <?php echo base_url('LaporanCutiIjin/export/'.$bulan) ?>">Export Laporan</a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?= $this->session->flashdata('message'); ?>
                        <table class="table align-items-center mb-0 table-bordered border-danger table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-danger">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Divisi</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tipe Cuti/Ijin</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Keterangan</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Awal Cuti/Ijin</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Akhir Cuti/Ijin</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Lama Cuti/Ijin</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status Cuti/Ijin</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($bulany as $c) : ?>
                                    <tr>
                                        <td class="text-center text-uppercase text-dark text-xs font-weight-bolder"><?= $i++; ?>.</td>
                                        <td class="text-center text-dark text-xs font-weight-bolder">
                                            <?php foreach ($magang as $m) : ?>
                                                <?php if ($c['id_nama'] == $m['id']) { ?>
                                                    <?= $m['username']; ?>
                                                <?php } ?>
                                            <?php endforeach; ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder">
                                            <?php foreach ($divisi as $d) : ?>
                                                <?php if ($c['id_divisi'] == $d['id']) { ?>
                                                    <?= $d['nama']; ?>
                                                <?php } ?>
                                            <?php endforeach; ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['tipe'] ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['keterangan'] ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo date('d-m-Y', strtotime($c['awl_tgl']))?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo date('d-m-Y', strtotime($c['akhir_tgl']))?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['lama_waktu'] ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['status'] ?></td>
                                        <td>
                                            <a href="<?php echo base_url('LaporanCutiIjin/edit/' . $c['id']) ?>" class="text-white badge badge-pill badge-warning">Edit</a>
                                            <a href="<?php echo base_url('LaporanCutiIjin/hapus/' . $c['id']) ?>" class="text-white badge badge-pill badge-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php } else { ?>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="table-responsive">
            <h2>
                Data Magang
            </h2>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="col-md-6"><a href="<?= base_url(); ?>LaporanCutiIjin/tambah" class="btn btn-info mb-2">Tambah Data Cuti/Ijin</a>
                    <a href="<?php echo base_url('LaporanAbsensi/export/') ?>" class="fa fa-print"></i>&nbsp;&nbsp;Cetak Laporan Cuti/Ijin </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table align-items-center mb-0 table-bordered border-danger table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-danger">
                            <tr>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Divisi</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tipe Cuti/Ijin</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Keterangan</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Awal Cuti/Ijin</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Akhir Cuti/Ijin</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Lama Cuti/Ijin</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status Cuti/Ijin</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($divisi_user as $c) : ?>
                                <tr>
                                    <td class="text-center text-uppercase text-dark text-xs font-weight-bolder"><?= $i++; ?>.</td>
                                    <td class="text-center text-dark text-xs font-weight-bolder">
                                        <?php foreach ($magang as $m) : ?>
                                            <?php if ($c['id_nama'] == $m['id']) { ?>
                                                <?= $m['username']; ?>
                                            <?php } ?>
                                        <?php endforeach; ?></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder">
                                        <?php foreach ($divisi as $d) : ?>
                                            <?php if ($c['id_divisi'] == $d['id']) { ?>
                                                <?= $d['nama']; ?>
                                            <?php } ?>
                                        <?php endforeach; ?></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['tipe'] ?></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['keterangan'] ?></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['awl_tgl'] ?></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['akhir_tgl'] ?></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['lama_waktu'] ?></td>
                                    <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['status'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url('LaporanCutiIjin/edit/' . $c['id']) ?>" class="text-white badge badge-pill badge-warning">Edit</a>
                                        <a href="<?php echo base_url('LaporanCutiIjin/hapus/' . $c['id']) ?>" class="text-white badge badge-pill badge-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

<?php } ?>