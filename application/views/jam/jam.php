<div class="row">
    <div class="col-12 ml-2 mr-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Waktu Jam Kerja</h2>
                <!-- <p class="card-category"></p> -->
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Keterangan</th>
                            <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Jam Mulai</th>
                            <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Jam Selesai</th>
                            <th class="text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach ($jam as $i => $j) : ?>
                                <tr id="<?= 'jam-' . $j->id_jam ?>">
                                    <td class="text-center text-dark text-s font-weight-bolder"><?= ($i + 1) ?></td>
                                    <td class="text-center text-dark text-s font-weight-bolder"><?= $j->keterangan ?></td>
                                    <td class="text-center text-dark text-s font-weight-bolder jam-masuk"><?= $j->masuk ?></td>
                                    <td class="text-center text-dark text-s font-weight-bolder jam-pulang"><?= $j->pulang ?></td>

                                    <td class="text-center text-dark text-s font-weight-bolder">
                                        <!-- Trigger Edit -->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-success<?php echo $j->id_jam; ?>">
                                            Edit
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-success<?php echo $j->id_jam; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-content">
                                                        <form id="form-edit-jam" action="<?= base_url('jam/update') ?>" method="post" onsubmit="return true">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="edit-jam-label">Edit Jam <span id="edit-keterangan"></span></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="masuk">Jam Mulai :</label>
                                                                    <input type="hidden" name="id_jam" value="<?= $j->id_jam ?>" id="edit-id-jam">
                                                                    <input type="time" name="masuk" id="edit-masuk" value="<?php echo $j->masuk; ?>" class="form-control" placeholder="Jam Mulai" required="reuired" />
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="pulang">Jam Selesai :</label>
                                                                    <input type="time" name="pulang" id="edit-pulang" value="<?php echo $j->pulang; ?>" class="form-control" placeholder="Jam Selesai" required="reuired" />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>