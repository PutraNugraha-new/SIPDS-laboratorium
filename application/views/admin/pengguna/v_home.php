<a href="<?= base_url() ?>main/tambahPengguna" class="btn btn-info text-light my-4">Tambah Data</a>
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
                    Data Pengguna
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Nama Pengguna</th>
                                <th>Role</th>
                                <th>Terakhir login</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
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
                                    $rolename = "User";
                                }
                                ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data->email ?></td>
                                <td><?= $data->password ?></td>
                                <td><?= $data->first_name ?></td>
                                <td><?= $rolename?></td>
                                <td><?= $data->last_login?></td>
                                <td>
                                    <a href="<?= base_url() ?>main/editPengguna/<?= $data->id; ?>" class="btn btn-info p-1 my-1 text-light"><i class="fas fa-pencil"></i></a>
                                    <a href="<?= base_url() ?>main/deleteuser/<?= $data->id ?>" onClick="return confirm('Yaking Ingin Menghapus?')" class="btn btn-danger p-1 my-1 text-light"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>