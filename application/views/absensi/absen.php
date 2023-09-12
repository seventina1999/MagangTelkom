<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Absen Harian</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Tanggal</th>
                        <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Absen Masuk</th>
                        <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Absen Pulang</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if (is_weekend()) : ?>
                                <td class="bg-light text-danger" colspan="4">Hari ini libur. Tidak Perlu absen</td>
                            <?php else : ?>
                                <td class="text-center text-dark text-s font-weight-bolder"><i class="fas fa-2xl fa-<?= ($absen < 2) ? "exclamation-triangle" : "check" ?>"></i></td>
                                <td class="text-center text-dark text-s font-weight-bolder"><?= tgl_hari(date('d-m-Y')) ?></td>
                                <td class="text-center text-dark text-s font-weight-bolder">
                                    <a href="<?= base_url('absensi/absen/masuk') ?>" class="btn btn-primary btn-sm btn-fill" <?= ($absen == 1) ? 'disabled style="cursor:not-allowed"' : '' ?>>Absen Masuk</a>
                                </td>
                                <td class="text-center text-dark text-s font-weight-bolder">
                                    <a href="<?= base_url('absensi/absen/pulang') ?>" class="btn btn-success btn-sm btn-fill" <?= ($absen !== 1 || $absen == 2) ? 'disabled style="cursor:not-allowed"' : '' ?>>Absen Pulang</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>