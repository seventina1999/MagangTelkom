<div class="container-fluid">

    <!-- Page Heading -->
    <div class="table-responsive">
        <h2>
            LAPORAN ABSENSI
        </h2>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="text-white badge badge-info">
                <a href=" <?php echo base_url('LaporanAbsensi/export/') ?>" class="text-light">
                    <i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Laporan Cuti/Ijin </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-bordered border-danger table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-danger">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Divisi</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Total Kehadiran</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Total Keterlambatan Masuk</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Cuti Ijin</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanpa Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($laporan as $m) : ?>
                                    <tr>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?= $i++; ?>.</td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $m['username'] ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $m['divisi'] ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $m['total_kehadiran'] ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $m['telat'] ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $m['cutiijin'] ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?php echo $m['tanpaketerangan'] ?></td>
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