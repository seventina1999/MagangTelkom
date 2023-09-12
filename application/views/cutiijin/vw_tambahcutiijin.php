<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-corner">
                    Cuti Ijin
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_nama" value="<?= $this->session->userdata('id'); ?>">
                        <div class="form-group">
                            <label for="nama">Nama Divisi</label>
                            <select id="inputStatus" class="form-control custom-select" name="id_divisi">
                                <option selected disabled>Nama Divisi</option>
                                <?php foreach ($divisi as $dv) : ?>
                                    <option value="<?= $dv['id'] ?>"><?= $dv['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe Cuti/Ijin</label>
                            <select name="tipe" value="<?= set_value('tipe'); ?>" class="form-control" id="tipe">
                                <option style="color:black" value="">Tipe</option>
                                <option style="color:black" value="Cuti">Cuti</option>
                                <option style="color:black" value="Ijin">Ijin</option>
                            </select>
                            <?= form_error('tipe', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        </br>
                        <div>
                            <label for="keterangan">Keterangan Cuti/Ijin</label>
                            <input type="text" name="keterangan" value="<?= set_value('keterangan'); ?>" class="form-control" id="keterangan" placeholder="Keterangan Cuti/Ijin">
                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        </br>
                        <div>
                            <label for="awl_tgl">Awal Cuti/Ijin</label>
                            <input type="date" name="awl_tgl" value="<?= set_value('awl_tgl'); ?>" class="form-control" id="awl_tgl" placeholder="Awal Cuti/Ijin">
                            <?= form_error('awl_tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        </br>
                        <div>
                            <label for="akhir_tgl">Akhir Cuti/Ijin</label>
                            <input type="date" name="akhir_tgl" value="<?= set_value('akhir_tgl'); ?>" class="form-control" id="akhir_tgl" placeholder="Akhir Cuti/Ijin">
                            <?= form_error('akhir_tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        </br>
                        <div>
                            <label for="lama_waktu">Lama Waktu Cuti/Ijin</label>
                            <input type="text" name="lama_waktu" value="<?= set_value('lama_waktu'); ?>" class="form-control" id="lama_waktu" placeholder="Isi dengan angka">
                            <?= form_error('lama_waktu', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        </br>
                        <a href=" <?= base_url(); ?>Cutiijin" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data Cuti/Ijin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>