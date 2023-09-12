<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Karyawan Magang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $userdata ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $masuk->t_masuk; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class=" col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pulang
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $pulang->t_pulang; ?></div>
                                </div>
                                <!-- <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">REKAP DATA</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <table class="table align-items-center mb-0 table-bordered border-danger table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-danger">
                                <tr>
                                    <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-8">Nama Divisi</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Jumlah Pegawai</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Absen Masuk</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Absen Pulang</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php $i = 1; ?>
                                <?php foreach ($jumlahdiv as $m) : ?>
                                    <tr>
                                        <td class="text-center text-uppercase text-dark text-xs font-weight-bolder"><?= $i; ?>.</td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?= $m['nama']; ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?= $m['jumlah']; ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?= $m['t_masuk']; ?></td>
                                        <td class="text-center text-dark text-xs font-weight-bolder"><?= $m['t_pulang']; ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">DATA DIVISI</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-danger"></i> WANF
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> GS
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> SSH
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-secondary"></i> CS
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-warning"></i> ES
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color:#d63384;"></i> ASO
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color:#006400;"></i> AOCS
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color:#8A2BE2;"></i> CC
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color:#0000FF;"></i> BS
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color:#F08080;"></i> LGS
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color:#fd7e14;"></i> ADM
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color:#9ACD32;"></i> NAIO
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color:#FF0000;"></i> DSW
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

            </div>
            <!-- End of Main Content -->