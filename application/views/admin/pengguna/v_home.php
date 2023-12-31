<a href="<?= base_url() ?>main/tambahPengguna" class="btn btn-info text-light mt-4">Tambah Data</a>
    <div class="row my-4">
        <div class="col-md-12">
        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pengguna
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Nama Pengguna</th>
                                            <th>Role</th>
                                            <th>Terakhir login</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Nama Pengguna</th>
                                            <th>Role</th>
                                            <th>Terakhir Login</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($users as $data): 
                                            if($data->role == 1){
                                                $rolename = "Admin";
                                            }elseif($data->role == 2){
                                                $rolename = "Operator";
                                            }
                                            ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data->email ?></td>
                                            <td><?= $data->first_name ?> <?= $data->last_name ?></td>
                                            <td><?= $rolename?></td>
                                            <td><?= $data->last_login?></td>
                                            <td>
                                                <a href="<?= base_url() ?>main/editPengguna/<?= 20; ?>" class="btn btn-info p-1 my-1 text-light"><i class="fas fa-pencil"></i></a>
                                                <a href="" class="btn btn-danger p-1 my-1 text-light"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $no++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
    </div>