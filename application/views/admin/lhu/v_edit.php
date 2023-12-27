<!-- <?= $breadcrumbs ?> -->
<div class="card my-4 w-75">
    <div class="card-header">
        <h3>Ubah Lembar Hasil Uji</h3>
    </div>
    <div class="card-body">
        <?php 
            echo form_open('users/adduser');
        ?>
            <div class="form-row d-flex">
                <div class="form-group col-md-12 me-1">
                    <label for="no_lhu" class="my-2">No LHU</label>
                    <?php echo form_input(array('name'=>'no_lhu', 'id'=> 'no_lhu', 'placeholder'=>'Nomor Sampel', 'class'=>'form-control', 'value' => $cek)); ?>
                    <?php echo form_error('no_lhu');?>
                    
                    <label for="no_sampel" class="my-2">No Sampel</label>
                    <?php echo form_input(array('name'=>'no_sampel', 'id'=> 'no_sampel', 'placeholder'=>'No Sampel', 'class'=>'form-control', 'value' => set_value('no_sampel'))); ?>
                    <?php echo form_error('no_sampel');?>
                    
                    <label for="nama_perusahaan" class="my-2">Nama Perusahaan</label>
                    <?php echo form_input(array('name'=>'nama_perusahaan', 'id'=> 'nama_perusahaan', 'placeholder'=>'Nama Perusahaan', 'class'=>'form-control', 'value' => set_value('nama_perusahaan'))); ?>
                    <?php echo form_error('nama_perusahaan');?>
                    
                    <label for="tanggal_selesai" class="my-2">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" id="tanggal_selesai">
                    <?php echo form_error('tanggal_selesai');?>
                    
                    <label for="file_lhu" class="my-2">Pilih File LHU</label>
                    <input type="file" name="file_lhu" id="file_lhu" class="form-control">
                    <?php echo form_error('file_lhu');?>
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