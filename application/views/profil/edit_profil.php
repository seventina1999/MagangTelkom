<div class="row">
    <div class="col-12 col-md-4">
        <div class="card">
            <form action="<?= base_url('profil/update_foto') ?>" method="post" enctype="multipart/form-data">
                <div class="card-header">
                    <h4 class="card-title">Foto Profil</h4>
                </div>
                <div class="card-body text-center">
                    <img src="<?= base_url('assets/img/magang/' . $user['gambar']) ?>" alt="Foto Profil" class="d-fluid w-75">
                </div>
                <div class="card-footer">
                    <div class="custom-file mb-3">
                        <input type="file" name="gambar" class="custom-file-input" id="input-foto" aria-describedby="input-foto" accept="image/*">
                        <label class="custom-file-label" for="input-foto">Pilih Gambar</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-2">Simpan <i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="card">
            <form action="" method="post">
                <div class="card-header">
                    <h4 class="card-title">Edit Profil</h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Profil</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="username">username : </label>
                                <input type="hidden" name="id" value="<?= ($this->session->userdata('id')) ?>">
                                <input type="text" name="username" id="username" value="<?= $user['username'] ?>" class="form-control" placeholder="Masukan username Karyawan" required="reuqired" />
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="email">E-mail : </label>
                                <input type="email" name="email" id="email" value="<?= $user['email'] ?>" class="form-control" placeholder="Masukan Email" required="reuqired" />
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="status_pendidikan">Status Pendidikan : </label>
                                <input type="text" name="status_pendidikan" id="status_pendidikan" value="<?= $user['status_pendidikan'] ?>" class="form-control" placeholder="Masukan Status Pendidikan" required="reuqired" />
                                <?= form_error('status_pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="sekolah">Sekolah : </label>
                                <input type="sekolah" name="sekolah" id="sekolah" value="<?= $user['sekolah'] ?>" class="form-control" placeholder="Masukan Nama Sekolah" required="reuqired" />
                                <?= form_error('sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="jurusan">Jurusan : </label>
                                <input type="text" name="jurusan" id="jurusan" value="<?= $user['jurusan'] ?>" class="form-control" placeholder="Masukan Jurusan" required="reuqired" />
                                <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="no_hp">No Hp : </label>
                                <input type="text" name="no_hp" id="no_hp" value="<?= $user['no_hp'] ?>" class="form-control" placeholder="Masukan No Hp" required="reuqired" />
                                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
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
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row w-100">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <button type="submit" class="btn btn-primary btn-block">Simpan <i class="fa fa-save"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>