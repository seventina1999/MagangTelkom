<html>

<head>
    <link rel="stylesheet" href="http://code.jquery.com/ ui/ 1.10.3/ themes/ smoothness/ jquery-ui.css" type="text/css" />
    <title>Input Tanggal</title>
    <script type="text/javascript" src="http:// code.jquery.com/ jquery-1.9.1.js"></script>
    <script type="text/javascript" src="http:// code.jquery.com/ ui/ 1.10.3/ jquery-ui.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#input").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
</head>

<!-- Begin Page Content-->
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h2><?= $judul; ?></h2>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <div id="main-content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div>
                                            <label for="id_nama">Nama</label>
                                            <select id="inputStatus" class="form-control custom-select" name="id_nama">
                                                <option selected disabled>Nama</option>
                                                <?php foreach ($magang as $m) : ?>
                                                    <option value="<?= $m['id'] ?>"><?= $m['username'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div>
                                            <label for="status_pendidikan">Status Pendidikan</label>
                                            <input type="text" name="status_pendidikan" value="<?= set_value('status_pendidikan'); ?>" class="form-control" id="status_pendidikan" placeholder="Masukkan Status Pendidikan">
                                            <?= form_error('status_pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div>
                                            <label for="sekolah">Nama Instansi Pendidikan</label>
                                            <input type="text" name="sekolah" value="<?= set_value('sekolah'); ?>" class="form-control" id="sekolah" placeholder="Masukkan Asal Sekolah">
                                            <?= form_error('sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div>
                                            <label for="jurusan">Jurusan</label>
                                            <input type="text" name="jurusan" value="<?= set_value('jurusan'); ?>" class="form-control" id="jurusan" placeholder="Masukkan Jurusan">
                                            <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div class="form-group">
                                            <label for="nama">Nama Divisi</label>
                                            <select id="inputStatus" class="form-control custom-select" name="id_divisi">
                                                <option selected disabled>Nama Divisi</option>
                                                <?php foreach ($divisi as $dv) : ?>
                                                    <option value="<?= $dv['id'] ?>"><?= $dv['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>


                                    </div>
                                    </br>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-body">
                                <div class="form-group">
                                    <div>
                                        <label for="awal_magang">Awal Magang</label>
                                        <input type="date" name="awal_magang" value="<?php echo date("d-m-Y"); ?>" class="form-control" id="awal_magang" placeholder="awal_magang">
                                        <?= form_error('awal_magang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </br>
                                    <div>
                                        <label for="akhir_magang">Akhir Magang</label>
                                        <input type="date" name="akhir_magang" value="<?php echo date("d-m-Y"); ?>" class="form-control" id="akhir_magang" placeholder="akhir_magang">
                                        <?= form_error('akhir_magang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </br>
                                    <div>
                                        <label for="no_hp">Nomor Telepon</label>
                                        <input type="text" name="no_hp" value="<?= set_value('no_hp'); ?>" class="form-control" id="no_hp" placeholder="Masukkan Nomor Handphone">
                                        <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </br>
                                    <div class="form-group">
                                        <label for="nama">Gambar</label>
                                        <div class="custom-file">
                                            <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                            <label for="gambar" class="custom-file-label">Choose File</label>
                                        </div>
                                    </div>
                                    </br>
                                    <a href="<?= base_url('Magang') ?>" class="btn btn-danger">Tutup</a>
                                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data Magang</button>
                                    <br><br>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <!-- /.card -->
                            </form>
                        </div>
                        <div class="col-lg-12">

                            <!-- /# column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>