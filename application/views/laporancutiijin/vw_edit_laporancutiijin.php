<!-- Begin Page Content-->
<div class="container-fluid py-4">
    <h2>
        <span class="badge badge-success" style="background-color: #008080"> <?= $title; ?></span>
    </h2>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header justify-content-center">
                Form Edit Data Cuti/Ijin
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $cutiijin['id']; ?>">
                            <div>
                                <label for="id_nama">Nama</label>
                                <select name="id_nama" class="form-control" id="id_nama">
                                    <option style="color:red" value="">Pilih Nama</option>
                                    <?php foreach ($magang as $m) : ?>
                                        <option style="color:red" value="<?= $m['id']; ?>" <?php if ($cutiijin['id_nama'] == $m['id']) {
                                                                                                echo "selected";
                                                                                            } ?>> <?= $m['username']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            </br>
                            <div class="form-group">
                                <label for="inputStatus">Nama Divisi</label>
                                <select id="inputStatus" name="id_divisi" class="form-control custom-select">
                                    <?php foreach ($divisi as $udt) : ?>
                                        <option <?php if ($udt['id'] == $cutiijin['id_divisi']) {
                                                    echo 'selected="selected"';
                                                } ?> value="<?= $udt['id']; ?>"><?= $udt['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            </br>
                            <div>
                                <label for="tipe">Tipe Cuti/Ijin</label>
                                <select name="tipe" class="form-control" id="tipe">
                                    <option style="color:red" value="Cuti" <?php if ($cutiijin['tipe'] == "Cuti") {
                                                                                echo "selected";
                                                                            } ?>> Cuti</option>
                                    <option style="color:red" value="Ijin" <?php if ($cutiijin['tipe'] == "Ijin") {
                                                                                echo "selected";
                                                                            } ?>> Ijin</option>
                                </select>
                            </div>
                            </br>
                            <div>
                                <label for="keterangan">Keterangan Cuti/Ijin</label>
                                <input type="text" name="keterangan" value="<?= $cutiijin['keterangan']; ?>" class="form-control" id="keterangan" placeholder="keterangan">
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            </br>
                            <div>
                                <label for="awl_tgl">Awal Cuti/Ijin</label>
                                <input type="date" name="awl_tgl" value="<?= $cutiijin['awl_tgl']; ?>" class="form-control" id="awl_tgl" placeholder="awl_tgl">
                                <?= form_error('awl_tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            </br>
                            <div>
                                <label for="akhir_tgl">Akhir Cuti/Ijin</label>
                                <input type="date" name="akhir_tgl" value="<?= $cutiijin['akhir_tgl']; ?>" class="form-control" id="akhir_tgl" placeholder="akhir_tgl">
                                <?= form_error('akhir_tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            </br>
                            <div>
                                <label for="lama_waktu">Lama Waktu Cuti/Ijin</label>
                                <input type="text" name="lama_waktu" value="<?= $cutiijin['lama_waktu']; ?>" class="form-control" id="lama_waktu" placeholder="lama_waktu">
                                <?= form_error('lama_waktu', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            </br>
                            <div>
                                <label for="status">Status Cuti/Ijin</label>
                                <select name="status" class="form-control" id="status">
                                    <option style="color:red" value="Diterima" <?php if ($cutiijin['status'] == "Diterima") {
                                                                                    echo "selected";
                                                                                } ?>> Diterima</option>
                                    <option style="color:red" value="Ditolak" <?php if ($cutiijin['status'] == "Ditolak") {
                                                                                    echo "selected";
                                                                                } ?>> Ditolak</option>
                                </select>
                            </div>
                            </br>
                            <a href="<?= base_url('LaporanCutiIjin') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data Cuti/Ijin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>