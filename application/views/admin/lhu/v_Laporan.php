    <div class="row my-4">
        <div class="col-md-12">
        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Cetak Laporan Data LHU
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url() ?>lhu/getData" method="get">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="start_date">Tanggal Awal:</label>
                                            <input type="date" id="start_date" class="form-control" name="tgl_awal">
                                            <span class="text-warning">Rentang Berdasarkan Tanggal Selesai</span>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="end_date">Tanggal Akhir:</label>
                                            <input type="date" id="end_date" class="form-control" name="tgl_akhir">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="end_date">Perusahaan:</label>
                                            <select name="nama_perusahaan" id="nama_perusahaan" class="form-control">
                                                <option value="" selected>Perusahaan</option>
                                                <?php foreach($perusahaan as $np): ?>
                                                    <option value="<?= $np->nama_perusahaan ?>"><?= $np->nama_perusahaan ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <br>
                                            <button type="submit" id="filter_button" class="btn btn-primary">Tampilkan</button>
                                            <button type="reset" class="btn btn-danger">Batal</button>
                                        </div>
                                    </div>
                                </form>
                                <a href="<?= base_url() ?>lhu/cetakLaporan?tgl_awal=<?= $this->input->get('tgl_awal') ?>&tgl_akhir=<?= $this->input->get('tgl_akhir') ?>&nama_perusahaan=<?= $this->input->get('nama_perusahaan') ?>" class="btn btn-success my-2">Cetak</a>

                                <table id="datatablesSimple" class="print-visible">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No LHU</th>
                                            <th>No Sampel</th>
                                            <th>Perusahaan</th>
                                            <th>Tgl Selesai</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No LHU</th>
                                            <th>No Sampel</th>
                                            <th>Perusahaan</th>
                                            <th>Tgl Selesai</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; foreach($lhu as $data): ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= str_replace('-', '/', $data->no_lhu); ?></td>
                                            <td><?= $data->no_sampel; ?></td>
                                            <td><?= $data->nama_perusahaan; ?></td>
                                            <td><?= $data->tgl_selesai; ?></td>
                                        </tr>
                                        <?php $no++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
    </div>