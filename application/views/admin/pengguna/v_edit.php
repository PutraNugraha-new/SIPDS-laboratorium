<!-- <?= $breadcrumbs ?> -->
<div class="card my-4 w-75">
    <div class="card-header">
        <h3>Ubah Data Pengguna</h3>
    </div>
    <div class="card-body">
        <?php 
            echo form_open('users/adduser');
        ?>
            <div class="form-row d-flex">
                <div class="form-group col-md-12 me-1">
                    <label for="username" class="my-2">Username</label>
                    <?php echo form_input(array('name'=>'username', 'id'=> 'username', 'placeholder'=>'Username', 'class'=>'form-control', 'value' => $cek)); ?>
                    <?php echo form_error('username');?>
                    
                    <label for="password" class="my-2">Password</label>
                    <?php echo form_input(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
                    <?php echo form_error('password');?>
                    
                    <label for="status" class="my-2">Status</label>
                    <?php echo form_input(array('name'=>'status', 'id'=> 'status', 'placeholder'=>'Status', 'class'=>'form-control', 'value' => set_value('status'))); ?>
                    <?php echo form_error('status');?>
                    
                    <label for="nama_pengguna" class="my-2">Nama Pengguna</label>
                    <?php echo form_input(array('name'=>'nama_pengguna', 'id'=> 'nama_pengguna', 'placeholder'=>'nama_pengguna', 'class'=>'form-control', 'value' => set_value('nama_pengguna'))); ?>
                    <?php echo form_error('nama_pengguna');?>
                </div>

            </div>
            <div class="row my-3">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>