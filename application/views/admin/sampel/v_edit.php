<!-- <?= $breadcrumbs ?> -->
<div class="card my-4">
    <div class="card-header">
        <h3>Ubah Data Sampel</h3>
    </div>
    <div class="card-body">
        <?php 
            echo form_open('sampel/update/'.$sampel->no_sampel);
        ?>
            <div class="form-row d-flex">
                <div class="form-group col-md-6 me-1">
                    <label for="jenis_sampel" class="my-2">Nomor Sampel</label>
                    <?php echo form_input(array('type'=>'text','readonly'=>'readonly','name'=>'no_sampel', 'id'=> 'no_sampel', 'placeholder'=>'Nomor Sampel', 'class'=>'form-control', 'value' => $sampel->no_sampel)); ?>
                    <?php echo form_error('no_sampel');?>
                    
                    <label for="jenis_sampel" class="my-2">Jenis Sampel</label>
                    <?php echo form_input(array('name'=>'jenis_sampel', 'id'=> 'jenis_sampel', 'placeholder'=>'Jenis Sampel', 'class'=>'form-control', 'value' => $sampel->jenis_sampel)); ?>
                    <?php echo form_error('jenis_sampel');?>
                    
                    <label for="parameter_diuji" class="my-2">Parameter Uji</label>
                    <?php echo form_input(array('name'=>'parameter_diuji', 'id'=> 'parameter_diuji', 'placeholder'=>'Parameter Uji', 'class'=>'form-control', 'value' => $sampel->parameter_diuji)); ?>
                    <?php echo form_error('parameter_diuji');?>
                    
                    <label for="nama_perusahaan" class="my-2">Nama Perusahaan</label>
                    <?php echo form_input(array('name'=>'nama_perusahaan', 'id'=> 'nama_perusahaan', 'placeholder'=>'Nama Perusahaan', 'class'=>'form-control', 'value' => $sampel->nama_perusahaan)); ?>
                    <?php echo form_error('nama_perusahaan');?>
                    
                    <label for="nama_pengantar" class="my-2">Nama Pengantar</label>
                    <?php echo form_input(array('name'=>'nama_pengantar', 'id'=> 'nama_pengantar', 'placeholder'=>'Nama Pengantar', 'class'=>'form-control', 'value' => $sampel->nama_pengantar)); ?>
                    <?php echo form_error('nama_pengantar');?>
                    
                    <label for="alamat" class="my-2">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="50" rows="5" class="form-control"><?= $sampel->alamat ?></textarea>
                    <?php echo form_error('alamat');?>
                </div>

                <div class="form-group col-md-6">
                    <label for="no_handphone" class="my-2">No Hp</label>
                    <?php echo form_input(array('type'=>'number','name'=>'no_handphone', 'id'=> 'no_handphone', 'placeholder'=>'Nomor Hp', 'class'=>'form-control', 'value' => $sampel->no_handphone)); ?>
                    <?php echo form_error('no_handphone');?>
                    
                    <label for="tgl_masuk" class="my-2">Tanggal Masuk</label>
                    <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" value="<?= $sampel->tgl_masuk ?>">
                    <?php echo form_error('tgl_masuk');?>
                    
                    <label for="tgl_selesai" class="my-2">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" value="<?= $sampel->tgl_selesai ?>">
                    <?php echo form_error('tgl_selesai');?>
                    
                    <label for="no_lhu" class="my-2">No LHU</label>
                    <select name="no_lhu" class="form-control" id="no_lhu">
                        <option value="<?= $sampel->no_lhu ?>"><?= str_replace('-', '/',$sampel->no_lhu) ?></option>
                        <?php foreach($lhu as $data): ?>
                        <option value="<?= $data->no_lhu ?>"><?= str_replace('-', '/',$data->no_lhu) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('no_lhu');?>
                    
                    <label for="keterangan" class="my-2">keterangan</label>
                    <select name="keterangan" id="keterangan" class="form-control">
                        <option value="<?= $sampel->keterangan ?>"><?= $sampel->keterangan ?></option>
                        <!-- <option value=""></option> -->
                        <option value="Belum Selesai">Belum Selesai</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                    <?php echo form_error('keterangan');?>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>