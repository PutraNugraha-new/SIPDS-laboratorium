<!-- <?= $breadcrumbs ?> -->
<div class="card my-4">
    <div class="card-header">
        <h3>Tambah Data Sampel</h3>
    </div>
    <div class="card-body">
        <?php 
            echo form_open('users/adduser');
        ?>
            <div class="form-row d-flex">
                <div class="form-group col-md-6 me-1">
                    <label for="no_sampel" class="my-2">No Sampel</label>
                    <?php echo form_input(array('name'=>'no_sampel', 'id'=> 'no_sampel', 'placeholder'=>'Nomor Sampel', 'class'=>'form-control', 'value' => set_value('no_sampel'))); ?>
                    <?php echo form_error('no_sampel');?>
                    
                    <label for="jenis_sampel" class="my-2">Jenis Sampel</label>
                    <?php echo form_input(array('name'=>'jenis_sampel', 'id'=> 'jenis_sampel', 'placeholder'=>'Jenis Sampel', 'class'=>'form-control', 'value' => set_value('jenis_sampel'))); ?>
                    <?php echo form_error('jenis_sampel');?>
                    
                    <label for="parameter_diuji" class="my-2">Parameter Uji</label>
                    <?php echo form_input(array('name'=>'parameter_diuji', 'id'=> 'parameter_diuji', 'placeholder'=>'Parameter Uji', 'class'=>'form-control', 'value' => set_value('parameter_diuji'))); ?>
                    <?php echo form_error('parameter_diuji');?>
                    
                    <label for="nama_perusahaan" class="my-2">Nama Perusahaan</label>
                    <?php echo form_input(array('name'=>'nama_perusahaan', 'id'=> 'nama_perusahaan', 'placeholder'=>'Nama Perusahaan', 'class'=>'form-control', 'value' => set_value('nama_perusahaan'))); ?>
                    <?php echo form_error('nama_perusahaan');?>
                    
                    <label for="nama_pengantar" class="my-2">Nama Pengantar</label>
                    <?php echo form_input(array('name'=>'nama_pengantar', 'id'=> 'nama_pengantar', 'placeholder'=>'Nama Pengantar', 'class'=>'form-control', 'value' => set_value('nama_pengantar'))); ?>
                    <?php echo form_error('nama_pengantar');?>
                    
                    <label for="alamat" class="my-2">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="50" rows="5" class="form-control"></textarea>
                    <?php echo form_error('alamat');?>
                </div>

                <div class="form-group col-md-6">
                    <label for="no_handphone" class="my-2">No Hp</label>
                    <?php echo form_input(array('name'=>'no_handphone', 'id'=> 'no_handphone', 'placeholder'=>'Nomor Hp', 'class'=>'form-control', 'value' => set_value('no_handphone'))); ?>
                    <?php echo form_error('no_handphone');?>
                    
                    <label for="tgl_masuk" class="my-2">Tanggal Masuk</label>
                    <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control">
                    <?php echo form_error('tgl_masuk');?>
                    
                    <label for="tgl_selesai" class="my-2">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control">
                    <?php echo form_error('tgl_selesai');?>
                    
                    <label for="no_lhu" class="my-2">No LHU</label>
                    <?php echo form_input(array('name'=>'no_lhu', 'id'=> 'no_lhu', 'placeholder'=>'No LHU', 'class'=>'form-control', 'value' => set_value('no_lhu'))); ?>
                    <?php echo form_error('no_lhu');?>
                    
                    <label for="keterangan" class="my-2">keterangan</label>
                    <?php echo form_input(array('name'=>'keterangan', 'id'=> 'keterangan', 'placeholder'=>'keterangan', 'class'=>'form-control', 'value' => set_value('keterangan'))); ?>
                    <?php echo form_error('keterangan');?>
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