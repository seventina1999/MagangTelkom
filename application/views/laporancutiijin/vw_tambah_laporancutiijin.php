<!-- Begin Page Content-->
<div class="container-fluid py-4">
    <h2>
        <span class="badge badge-success" style="background-color: #008080"> <?= $judul; ?></span>
    </h2>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header justify-content-center">
                Form Tambah Data Cuti/Ijin
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
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
                                <label for="nama">Nama Divisi</label>
                                <select id="inputStatus" class="form-control custom-select" name="id_divisi">
                                    <option selected disabled>Nama Divisi</option>
                                    <?php foreach ($divisi as $dv) : ?>
                                        <option value="<?= $dv['id'] ?>"><?= $dv['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            </br>
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
                            <div class="form-group">
                                <label for="status">Status Cuti/Ijin</label>
                                <select name="status" value="<?= set_value('status'); ?>" class="form-control" id="status">
                                    <option style="color:black" value="">Status</option>
                                    <option style="color:black" value="Diterima">Diterima</option>
                                    <option style="color:black" value="Ditolak">Ditolak</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            </br>
                            <a href=" <?= base_url(); ?>LaporanCutiIjin" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data Cuti/Ijin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>