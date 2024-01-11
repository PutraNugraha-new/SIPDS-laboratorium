<!-- <h1 class="mt-4 mb-4">Dashboard</h1> -->
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> -->
                        <div class="row my-5">
                            <div class="col-md-3 align-content-center d-flex">
                                <img src="<?= base_url() ?>public/image/pemkot.png" alt="logo-dlh" class="mx-auto img-fluid" width="140">
                            </div>
                            <div class="col-md-6 text-center font-weight-bold">
                                <p class="m-0 font-weight-bold">PEMERINTAH KOTA PALANGKARAYA</p>
                                <P class="m-0 font-weight-bold">DINAS LINGKUNGAN HIDUP</P>
                                <P class="m-0 font-weight-bold">UNIT PELAKSANA TEKNIS DAERAH (UPTD) LABORATORIUM LINGKUNGAN</P>
                                <p class="m-0 font-weight-bold">Email : lablingkungan@gmail.com</p>
                                <p class="m-0 font-weight-bold">Jl. Tjilik Riwut Km. 2,5 Palangka Raya</p>
                            </div>
                            <div class="col-md-3 align-content-center d-flex">
                                <img src="<?= base_url() ?>public/image/logo-dlh.png" alt="logo-dlh" class="mx-auto" width="140">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-evenly">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary p-2 text-white mb-4">
                                    <div class="card-body d-flex justify-content-between">
                                        <h2><?= $jumlah_sampel ?></h2> 
                                        <h2><i class="fas fa-vials me-2"></i></h2>
                                    </div>
                                    <h4>Jumlah Sampel</h4>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning p-2 text-white mb-4">
                                    <div class="card-body d-flex justify-content-between">
                                        <h2><?= $jumlah_lhu ?></h2> 
                                        <h2><i class="far fa-file-alt me-2"></i></h2>
                                    </div>
                                    <h4>Jumlah Lembar Hasil Uji</h4>
                                </div>
                            </div><div class="col-xl-3 col-md-6">
                                <div class="card bg-success p-2 text-white mb-4">
                                    <div class="card-body d-flex justify-content-between">
                                        <h2><?= $jumlah_pengguna ?></h2> 
                                        <h2><i class="fas fa-users me-2"></i></h2>
                                    </div>
                                    <h4>Jumlah Pengguna</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Pengambilan Sampel
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myChart" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Pengambilan Sampel
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myBarChart" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
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