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
                            <form action="<?= base_url('profil/saveprofil/') . $user['id']; ?>" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div>
                                            <label for="username">Nama</label>
                                            <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" id="username" placeholder="username">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div>
                                            <label for="status_pendidikan">Status Pendidikan</label>
                                            <input type="text" name="status_pendidikan" value="<?= $user['status_pendidikan']; ?>" class="form-control" id="status_pendidikan" placeholder="status_pendidikan">
                                            <?= form_error('status_pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div>
                                            <label for="sekolah">Nama Instansi Pendidikan</label>
                                            <input type="text" name="sekolah" value="<?= $user['sekolah']; ?>" class="form-control" id="sekolah" placeholder="sekolah">
                                            <?= form_error('sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div>
                                            <label for="jurusan">Jurusan</label>
                                            <input type="text" name="jurusan" value="<?= $user['jurusan']; ?>" class="form-control" id="jurusan" placeholder="jurusan">
                                            <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        </br>
                                        <div class="form-group">
                                            <label for="inputStatus">Nama Divisi</label>
                                            <select id="inputStatus" name="id_divisi" class="form-control custom-select">
                                                <?php foreach ($divisi as $udt) : ?>
                                                    <option <?php if ($udt['id'] == $user['id_divisi']) {
                                                                echo 'selected="selected"';
                                                            } ?> value="<?= $udt['id']; ?>"><?= $udt['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
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
                                        <input type="date" name="awal_magang" value="<?= $user['awal_magang']; ?>" class="form-control" id="awal_magang" placeholder="awal_magang">
                                        <?= form_error('awal_magang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </br>
                                    <div>
                                        <label for="akhir_magang">Akhir Magang</label>
                                        <input type="date" name="akhir_magang" value="<?= $user['akhir_magang']; ?>" class="form-control" id="akhir_magang" placeholder="akhir_magang">
                                        <?= form_error('akhir_magang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </br>
                                    <div>
                                        <label for="no_hp">Nomor Telepon</label>
                                        <input type="text" name="no_hp" value="<?= $user['no_hp']; ?>" class="form-control" id="no_hp" placeholder="no_hp">
                                        <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </br>
                                    <div class="form-group">
                                        <img src="<?= base_url('assets/img/magang/') . $user['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                            <label for="gambar" class="custom-file-label"><?= $user['gambar']; ?> </label>
                                        </div>
                                    </div>
                                    </br>
                                    <a href="<?= base_url('user') ?>" class="btn btn-danger">Tutup</a>
                                    <button type="submit" name="edit" class="btn btn-primary float-right">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>