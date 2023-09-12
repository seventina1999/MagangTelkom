<?php if (is_it()) { ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>
                            <center>CUTI/IJIN</center>
                        </h4>
                        <center>
                            <div class="text-white badge badge-pill badge-info">
                                <a href="<?php echo base_url('LaporanCutiIjin/export/') ?>">
                                    <i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Laporan Cuti/Ijin </a>
                            </div>
                        </center>
                        <a class="text-white badge badge-pill badge-success" href=" <?= base_url(); ?>Cutiijin/tambah" class="fas fa-plus">Tambah Data Cuti/Ijin</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table align-items-center mb-0">
                                <thead>
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
                                    <?php foreach ($cutiijin as $c) : ?>
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
                                            <td class="text-center text-dark text-xs font-weight-bolder"><?php echo date('d-m-Y', strtotime($c['awl_tgl'])) ?></td>
                                            <td class="text-center text-dark text-xs font-weight-bolder"><?php echo date('d-m-Y', strtotime($c['akhir_tgl'])) ?></td>
                                            <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['lama_waktu'] ?></td>
                                            <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $c['status'] ?></td>
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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>
                            <center>LAPORAN CUTI/IJIN</center>
                        </h4>
                        <center>
                            <div class="text-white badge badge-pill badge-info">
                                <a href="<?php echo base_url('LaporanAbsensi/export/') ?>">
                                    <i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Laporan Cuti/Ijin </a>
                            </div>
                        </center>
                        <a class="text-white badge badge-pill badge-success" href=" <?= base_url(); ?>Cutiijin/tambah" class="fas fa-plus">Tambah Data Cuti/Ijin</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table align-items-center mb-0">
                                <thead>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($nama_user as $n) : ?>
                                        <tr>
                                            <td class="text-center text-uppercase text-dark text-xs font-weight-bolder"><?= $i++; ?>.</td>
                                            <td class="text-center text-dark text-xs font-weight-bolder">
                                                <?php foreach ($magang as $m) : ?>
                                                    <?php if ($n['id_nama'] == $m['id']) { ?>
                                                        <?= $m['username']; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?></td>
                                            <td class="text-center text-dark text-xs font-weight-bolder">
                                                <?php foreach ($divisi as $d) : ?>
                                                    <?php if ($n['id_divisi'] == $d['id']) { ?>
                                                        <?= $d['nama']; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?></td>
                                            <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $n['tipe'] ?></td>
                                            <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $n['keterangan'] ?></td>
                                            <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $n['awl_tgl'] ?></td>
                                            <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $n['akhir_tgl'] ?></td>
                                            <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $n['lama_waktu'] ?></td>
                                            <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $n['status'] ?></td>
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