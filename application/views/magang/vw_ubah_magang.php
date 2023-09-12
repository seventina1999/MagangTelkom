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
                            <form action="" enctype="multipart/form-data" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= $magang['id']; ?>">
                                        <div>
                                            <label for="username">Nama</label>
                                            <input type="text" name="username" value="<?= $magang['username']; ?>" class="form-control" id="username" placeholder="username">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div>
                                            <label for="status_pendidikan">Status Pendidikan</label>
                                            <input type="text" name="status_pendidikan" value="<?= $magang['status_pendidikan']; ?>" class="form-control" id="status_pendidikan" placeholder="status_pendidikan">
                                            <?= form_error('status_pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div>
                                            <label for="sekolah">Nama Instansi Pendidikan</label>
                                            <input type="text" name="sekolah" value="<?= $magang['sekolah']; ?>" class="form-control" id="sekolah" placeholder="sekolah">
                                            <?= form_error('sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div>
                                            <label for="jurusan">Jurusan</label>
                                            <input type="text" name="jurusan" value="<?= $magang['jurusan']; ?>" class="form-control" id="jurusan" placeholder="jurusan">
                                            <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div class="form-group">
                                            <label for="inputStatus">Nama Divisi</label>
                                            <select name="id_divisi" class="form-control" id="id_divisi">
                                                <option style="color:black" value="">Pilih Jabatan</option>
                                                <?php foreach ($divisi as $udt) : ?>
                                                    <option <?php if ($udt['id'] == $magang['id_divisi']) {
                                                                echo 'selected="selected"';
                                                            } ?> value="<?= $udt['id']; ?>"><?= $udt['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('id_divisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                        </div>
                    </div>

                    <!--/.col (right) -->
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-body">
                                <div class="form-group">
                                    <div>
                                        <label for="awal_magang">Awal Magang</label>
                                        <input type="date" name="awal_magang" value="<?= $magang['awal_magang']; ?>" class="form-control" id="awal_magang" placeholder="awal_magang">
                                        <?= form_error('awal_magang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </br>
                                    <div>
                                        <label for="akhir_magang">Akhir Magang</label>
                                        <input type="date" name="akhir_magang" value="<?= $magang['akhir_magang']; ?>" class="form-control" id="akhir_magang" placeholder="akhir_magang">
                                        <?= form_error('akhir_magang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </br>
                                    <div>
                                        <label for="no_hp">Nomor Telepon</label>
                                        <input type="text" name="no_hp" value="<?= $magang['no_hp']; ?>" class="form-control" id="no_hp" placeholder="no_hp">
                                        <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </br>
                                    <div class="form-group">
                                        <img src="<?= base_url('assets/img/magang/') . $magang['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                            <label for="gambar" class="custom-file-label" value="<?= $magang['gambar']; ?>"> </label>
                                        </div>
                                    </div>
                                    </br>
                                    <a href="<?= base_url('Magang') ?>" class="btn btn-danger">Tutup</a>
                                    <button type="submit" name="edit" class="btn btn-primary float-right">Edit Magang</button>
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
<!-- /# row -->