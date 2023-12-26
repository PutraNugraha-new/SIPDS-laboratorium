<a href="<?= base_url() ?>lhu/tambah" class="btn btn-info text-light mt-4">Tambah Data</a>
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
                                            <th>Nama Pengantar</th>
                                            <th>Tgl Selesai</th>
                                            <th>File LHU</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No LHU</th>
                                            <th>No Sampel</th>
                                            <th>Nama Pengantar</th>
                                            <th>Tgl Selesai</th>
                                            <th>File LHU</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>Tiger Nixon</td>
                                            <td>Tiger Nixon</td>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>System Architect</td>
                                            <td>
                                                <a href="<?= base_url() ?>lhu/edit/<?= 20; ?>" class="btn btn-info p-1 my-1 text-light"><i class="fas fa-pencil"></i></a>
                                                <a href="" class="btn btn-danger p-1 my-1 text-light"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
    </div>