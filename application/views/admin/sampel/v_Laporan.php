    <div class="row my-4">
        <div class="col-md-12">
        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Cetak Laporan Data Sampel
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url() ?>sampel/getData" method="get">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="start_date">Tanggal Awal:</label>
                                            <input type="date" id="start_date" class="form-control" name="tgl_awal">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="end_date">Tanggal Akhir:</label>
                                            <input type="date" id="end_date" class="form-control" name="tgl_akhir">
                                        </div>
                                        <div class="col-md-2">
                                            <br>
                                            <button type="submit" id="filter_button" class="btn btn-primary">Tampilkan</button>
                                            <button type="submit" class="btn btn-danger">Batal</button>
                                        </div>
                                    </div>
                                </form>
                                <a href="<?= base_url() ?>sampel/cetakLaporan?tgl_awal=<?= $this->input->get('tgl_awal') ?>&tgl_akhir=<?= $this->input->get('tgl_akhir') ?>" class="btn btn-success my-2">Cetak</a>

                                <table id="datatablesSimple" class="print-visible">
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
                                        </tr>
                                        <?php $no++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
    </div>