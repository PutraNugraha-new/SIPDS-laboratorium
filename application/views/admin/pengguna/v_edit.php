<!-- <?= $breadcrumbs ?> -->
<div class="card my-4 w-75">
    <div class="card-header">
        <h3>Ubah Data Pengguna</h3>
    </div>
    <div class="card-body">
        <?php 
            echo form_open('main/update');
        ?>
            <div class="form-row d-flex">
                <input type="hidden" name="id" value="<?= $cek->id ?>">
                <div class="form-group col-md-12 me-1">
                    <label for="email" class="my-2">Username</label>
                    <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'username', 'class'=>'form-control', 'value' => $cek->email)); ?>
                    <?php echo form_error('email');?>
                    
                    <label for="role" class="my-2">Status</label>
                    <select name="role" id="role" class="form-control">
                        <?php if($cek->role == '1'){
                            $role = 'Admin';
                        }else{
                            $role = 'User';
                        }
                        ?>
                        <option value="<?= $cek->role ?>"><?= $role ?></option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                    <?php echo form_error('status');?>
                    
                    <label for="first_name" class="my-2">Nama Pengguna</label>
                    <?php echo form_input(array('name'=>'first_name', 'id'=> 'first_name', 'placeholder'=>'Nama Pengguna', 'class'=>'form-control', 'value' => $cek->first_name)); ?>
                    <?php echo form_error('first_name');?>
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