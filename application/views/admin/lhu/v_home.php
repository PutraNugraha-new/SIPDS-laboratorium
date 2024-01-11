<a href="<?= base_url() ?>lhu/tambah" class="btn btn-info text-light mt-4">Tambah Data</a>
<?php if ($this->session->flashdata('success_message')): ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success_message'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error_message')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error_message'); ?>
    </div>
<?php endif; ?>
    <div class="row my-4">
        <div class="col-md-12">
        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Lembar Hasil Uji
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No LHU</th>
                                            <th>No Sampel</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Tgl Selesai</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No LHU</th>
                                            <th>No Sampel</th>
                                            <th>Nama perusahaan</th>
                                            <th>Tgl Selesai</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach($lhu as $data) :?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data->no_lhu; ?></td>
                                            <td><?= $data->no_sampel; ?></td>
                                            <td><?= $data->nama_perusahaan; ?></td>
                                            <td><?= $data->tgl_selesai; ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>lhu/edit/<?= $data->no_lhu; ?>" class="btn btn-info p-1 my-1 text-light"><i class="fas fa-pencil"></i></a>
                                                <a href="<?= base_url() ?>lhu/hapus/<?= $data->no_lhu ?>" class="btn btn-danger p-1 my-1 text-light" onClick="return confirm('Ingin Menghapus?')"><i class="fas fa-trash"></i></a>
                                                <a href="<?= base_url() ?>lhu/unduh/<?= $data->file_lhu ?>" class="btn btn-success p-1 my-1 text-light"><i class="fas fa-print"></i></a>
                                            </td>
                                        </tr>
                                        <?php $no++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
    </div>