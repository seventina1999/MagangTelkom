<?php if (is_it()) { ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Daftar Karyawan</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Karyawan</th>
                            <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach ($userdata as $i => $k) : ?>
                                <tr>
                                    <td class="text-center text-dark text-s"><?= ($i + 1) ?></td>
                                    <td class="text-dark text-s"><?= $k['username']; ?></td>
                                    <td class="text-center text-dark text-s">
                                        <a href="<?= base_url('absensi/detail_absensi/' . $k['id']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php } else { ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Karyawan</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Karyawan</th>
                            <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach ($divisi_user as $i => $k) : ?>
                                <tr>
                                    <td class="text-center text-dark text-s"><?= ($i + 1) ?></td>
                                    <td class="text-dark text-s"><?= $k['username']; ?></td>
                                    <td class="text-center text-dark text-s">
                                        <a href="<?= base_url('absensi/detail_absensi/' . $k['id']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php } ?>