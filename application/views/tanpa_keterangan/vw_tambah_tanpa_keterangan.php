<!-- Begin Page Content -->
<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800"><?= $judul; ?></h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-corner">
                    Tanpa Keterangan
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div>
                            <label for="id_nama">Nama</label>
                            <select name="id_nama" value="<?= set_value('id_nama'); ?>" class="form-control" id="id_nama">
                                <option style="color:black" value="">Pilih Nama</option>
                                <?php foreach ($magang as $m) : ?>
                                    <option style="color:red" value="<?= $m['id']; ?>"><?= $m['username']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        </br>
                        <div class="form-group">
                            <label for="jmlh_hari">Jumlah Hari</label>
                            <input type="text" name="jmlh_hari" value="<?= set_value('jmlh_hari'); ?>" class="form-control" id="jmlh_hari" placeholder="Isi jumlah hari dengan angka">
                            <?= form_error('jmlh_hari', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>