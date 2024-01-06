    <a href="<?= base_url() ?>sampel/tambah" class="btn btn-info text-light mt-4">Tambah Data</a>
    <?php if ($this->session->flashdata('success_message')): ?>
        <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
            <?= $this->session->flashdata('success_message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('flash_message')): ?>
        <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
            <?= $this->session->flashdata('flash_message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="row my-4">
        <div class="col-md-12">
        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Sampel
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Sampel</th>
                                            <th>Jenis Sampel</th>
                                            <th>Parameter Uji</th>
                                            <th>Perusahaan</th>
                                            <th>Nama Pengantar</th>
                                            <th>Alamat</th>
                                            <th>Tgl Masuk</th>
                                            <th>Tgl Selesai</th>
                                            <th>No LHU</th>
                                            <th>No Hp</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Sampel</th>
                                            <th>Jenis Sampel</th>
                                            <th>Parameter Uji</th>
                                            <th>Perusahaan</th>
                                            <th>Nama Pengantar</th>
                                            <th>Alamat</th>
                                            <th>Tgl Masuk</th>
                                            <th>Tgl Selesai</th>
                                            <th>No LHU</th>
                                            <th>No Hp</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; foreach($sampel as $data): ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $data->no_sampel; ?></td>
                                            <td><?= $data->jenis_sampel; ?></td>
                                            <td><?= $data->parameter_diuji; ?></td>
                                            <td><?= $data->nama_perusahaan; ?></td>
                                            <td><?= $data->nama_pengantar; ?></td>
                                            <td><?= $data->alamat; ?></td>
                                            <td><?= $data->tgl_masuk; ?></td>
                                            <td><?= $data->tgl_selesai; ?></td>
                                            <td><?= $data->no_lhu; ?></td>
                                            <td><?= $data->no_handphone; ?></td>
                                            <td><?= $data->keterangan; ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>sampel/edit/<?= $data->no_sampel; ?>" class="btn btn-info p-1 my-1 text-light"><i class="fas fa-pencil"></i></a>
                                                <a href="<?= base_url() ?>sampel/hapus/<?= $data->no_sampel; ?>" class="btn btn-danger p-1 my-1 text-light"><i class="fas fa-trash" onclick="return confirm('yakin?')"></i></a>
                                            </td>
                                        </tr>
                                        <?php $no++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
    </div>