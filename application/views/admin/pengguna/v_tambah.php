<!-- <?= $breadcrumbs ?> -->
<div class="card my-4 w-75">
    <div class="card-header">
        <h3>Tambah Data Pengguna</h3>
    </div>
    <div class="card-body">
        <?php 
            echo form_open('/main/adduser');
        ?>
            <div class="form-row d-flex">
                <div class="form-group col-md-12 me-1">
                    <label for="username" class="my-2">Username</label>
                    <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Username', 'class'=>'form-control', 'value'=> set_value('email'))); ?>
                    <?php echo form_error('email');?>
                    
                    <label for="password" class="my-2">Password</label>
                    <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
                    <?php echo form_error('password') ?>

                    <label for="password" class="my-2">Konfirmasi Password</label>
                    <?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Confirm Password', 'class'=>'form-control', 'value'=> set_value('passconf'))); ?>
                    <?php echo form_error('passconf') ?>
                    
                    <label for="firstname" class="my-2">Nama Awal</label>
                    <?php echo form_input(array('name'=>'firstname', 'id'=> 'firstname', 'placeholder'=>'firstname', 'class'=>'form-control', 'value' => set_value('firstname'))); ?>
                    <?php echo form_error('firstname');?>
                    
                    <label for="lastname" class="my-2">Nama Akhir</label>
                    <?php echo form_input(array('name'=>'lastname', 'id'=> 'lastname', 'placeholder'=>'lastname', 'class'=>'form-control', 'value' => set_value('lastname'))); ?>
                    <?php echo form_error('lastname');?>

                    <label for="lastname" class="my-2">Role</label>
                    <?php
                        $dd_list = array(
                                '1'   => 'Admin',
                                '2'   => 'User',
                                );
                        $dd_name = "role";
                        echo form_dropdown($dd_name, $dd_list, set_value($dd_name),'class = "form-control" id="role"');
                    ?>
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