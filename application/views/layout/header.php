<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Days</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <img src="<?= base_url('assets/') ?>img/logoKP.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">E-Days</span>
            </a>

            <li class="nav-item">
                <a class="nav-link text-white">
                    <h2 class="my-0 text-center"><label id="hours"><?= date('H') ?></label>:<label id="minutes"><?= date('i') ?></label>:<label id="seconds"><?= date('s') ?></label></h2>
                </a>
            </li>

            <?php if (is_it()) { ?>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <div class="sidebar-heading">
                    Admin
                </div>

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('Dashboard/') ?>">
                        <i class="fa fa-laptop"></i>
                        <span>Dashboard</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('Magang/') ?>">
                        <i class="fa fa-users"></i>
                        <span>Data Karyawan</span></a>
                </li>


                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item active">

                    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog text-white"></i>
                        <span>Divisi</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-danger py-2 collapse-inner rounded">
                            <?php foreach ($divisi as $data) : ?>
                                <a class="collapse-item text-wrap text-white active" href="<?= base_url('dashboard/divisi/') . $data['id'] ?>">
                                    <i class="fa fa-lock text-dark text-sm opacity-10"></i>
                                    <span class="nav-link-text ms-1">
                                        <?= $data['nama'] ?> </a>
                                </span>
                            <?php endforeach; ?>
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Absensi
                </div>

                <!-- Nav Item - Pengaturan Absensi -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('Jam/') ?>">
                        <i class="fa fa-cogs text-white"></i>
                        <span>Pengaturan Absensi</span></a>
                </li>

                <!-- Nav Item - Riwayat Absensi -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('absensi/list_karyawan') ?>">
                        <i class="fa fa-calendar text-white"></i>
                        <span>Riwayat Absen</span></a>
                </li>

                <!-- Nav Item - Tanpa Keterangan -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('TanpaKeterangan/') ?>">
                        <i class="fa fa-minus-square text-white"></i>
                        <span> Tanpa Keterangan </span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Laporan
                </div>

                <!-- Nav Item - Laporan Cuti/Izin -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('LaporanCutiIjin/') ?>">
                        <i class="fa fa-address-card text-white"></i>
                        <span>Laporan Cuti/Izin</span></a>
                </li>

                <!-- Nav Item - Laporan Absensi -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('LaporanAbsensi/') ?>">
                        <i class="fa fa-window-restore text-white"></i>
                        <span>Laporan Absensi</span></a>
                </li>

            <?php } else if ($user['role'] == 'User') {
            ?>
                <div class="sidebar-heading">
                    User
                </div>

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('absensi/check_absen') ?>">
                        <i class="fa fa-laptop"></i>
                        <span>Absensi
                            <?php if ($this->session->absen_warning == 'true') : ?>
                                <span class="float-right ml-auto notification p-0 badge badge-danger"><i class="fa fa-exclamation"></i></span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('absensi/detail_absensi') ?>">
                        <i class="fa fa-users"></i>
                        <span>Riwayat Absensi</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('cutiijin') ?>">
                        <i class="fa fa-users"></i>
                        <span>Form Cuti/zin</span></a>
                </li>

            <?php } else { ?>


                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('Dashboard/') ?>">
                        <i class="fa fa-laptop"></i>
                        <span>Dashboard</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('Magang/') ?>">
                        <i class="fa fa-users"></i>
                        <span>Data Karyawan</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('absensi/list_karyawan') ?>">
                        <i class="fa fa-users"></i>
                        <span>Riwayat Absensi</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('LaporanCutiIjin/') ?>">
                        <i class="fa fa-users"></i>
                        <span>Riwayat Cuti/Izin</span></a>
                </li>


            <?php } ?>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-primary big"><?= $user['username']; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/magang/') . $user['gambar']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= site_url('Profil/editprofil/') . $user['id']  ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= site_url('Profil/ubahpassword') ?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ubah Password
                                </a>
                                <!-- <a class="dropdown-item" href="<?= site_url('Profil/editprofil/') . $user['id']  ?>">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ubah Data Diri
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Custom Script -->
                <script>
                    var hoursLabel = document.getElementById("hours");
                    var minutesLabel = document.getElementById("minutes");
                    var secondsLabel = document.getElementById("seconds");
                    setInterval(setTime, 1000);

                    function setTime() {
                        secondsLabel.innerHTML = pad(Math.floor(new Date().getSeconds()));
                        minutesLabel.innerHTML = pad(Math.floor(new Date().getMinutes()));
                        hoursLabel.innerHTML = pad(Math.floor(new Date().getHours()));
                    }

                    function pad(val) {
                        var valString = val + "";
                        if (valString.length < 2) {
                            return "0" + valString;
                        } else {
                            return valString;
                        }
                    }

                    <?php if (@$this->session->absen_needed) : ?>
                        var absenNeeded = '<?= json_encode($this->session->absen_needed) ?>';
                        <?php $this->session->sess_unset('absen_needed') ?>
                    <?php endif; ?>
                </script>