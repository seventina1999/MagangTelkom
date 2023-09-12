<!-- Begin Page Content-->
<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h2>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header justify-content-center">
                Detail Magang
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $magang['id']; ?>">
                <div>
                    <div class="card-body">
                        <div class="card-title"><img src="<?= base_url('assets/img/magang/') . $magang['gambar']; ?>" style="width: 100px" class="img-thumbnail"></div>
                        <div class="row">
                            <div class="col-md-4">Nama Lengkap</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $magang['username']; ?></div>
                        </div>

                        <!-- <div class="row">
                            <div class="col-md-4">Divisi</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?php foreach ($divisi as $udt) : ?>
                                    <option <?php if ($udt['id'] == $magang['id_divisi']) {
                                                            echo 'selected="selected"';
                                                        } ?> value="<?= $udt['id']; ?>"><?= $udt['nama']; ?></option>
                                <?php endforeach; ?></option>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-md-4">Status Pendidikan</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $magang['status_pendidikan']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Nama Instansi Pendidikan</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $magang['sekolah']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Jurusan</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $magang['jurusan']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Awal Magang</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $magang['awal_magang']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Akhir Magang</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $magang['akhir_magang']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Nomor Telepon</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $magang['no_hp']; ?></div>
                        </div>


                    </div>
                    <div class="card-footer justify-content-center">
                        <a href="<?= base_url('Magang') ?>" class="btn btn-danger">Tutup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>