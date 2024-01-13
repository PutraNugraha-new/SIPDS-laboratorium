<!-- <?= $breadcrumbs ?> -->
<div class="card my-4">
    <div class="card-header">
        <h3>Tambah Data Sampel</h3>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('flash_message')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('flash_message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php 
            echo form_open('sampel/add');
        ?>
            <div class="form-row d-flex">
                <div class="form-group col-md-6 me-1">
                    <label for="no_sampel" class="my-2">No Sampel</label>
                    <?php echo form_input(array('name'=>'no_sampel', 'id'=> 'no_sampel', 'placeholder'=>'Nomor Sampel', 'class'=>'form-control', 'value' => set_value('no_sampel'))); ?>
                    <div class="text-danger">
                        <?php echo form_error('no_sampel');?>
                    </div>
                    
                    <label for="jenis_sampel" class="my-2">Jenis Sampel</label>
                    <select name="jenis_sampel" id="jenis_sampel" class="form-control">
                        <option selected>Pilih Jenis Sampel</option>
                        <option value="Air Minum">Air Minum</option>
                        <option value="Air Limbah">Air Limbah</option>
                        <option value="Air Permukaan">Air Permukaan</option>
                    </select>
                    <?php echo form_input(array('name'=>'jenis_sampel_lainnya', 'id'=> 'jenis_sampel', 'placeholder'=>'Lainnya', 'class'=>'form-control mt-2', 'value' => set_value('jenis_sampel_lainnya'))); ?>
                    <div class="text-danger">
                        <?php echo form_error('jenis_sampel');?>
                    </div>
                    
                    <label for="parameter_diuji" class="my-2">Parameter Uji</label>
                    <?php echo form_input(array('name'=>'parameter_diuji', 'id'=> 'parameter_diuji', 'placeholder'=>'Parameter Uji', 'class'=>'form-control', 'value' => set_value('parameter_diuji'))); ?>
                    <div class="text-danger">
                        <?php echo form_error('parameter_diuji');?>
                    </div>
                    
                    <label for="nama_perusahaan" class="my-2">Nama Perusahaan</label>
                    <?php echo form_input(array('name'=>'nama_perusahaan', 'id'=> 'nama_perusahaan', 'placeholder'=>'Nama Perusahaan', 'class'=>'form-control', 'value' => set_value('nama_perusahaan'))); ?>
                    <div class="text-danger">
                        <?php echo form_error('nama_perusahaan');?>
                    </div>
                    
                    <label for="nama_pengantar" class="my-2">Nama Pengantar</label>
                    <?php echo form_input(array('name'=>'nama_pengantar', 'id'=> 'nama_pengantar', 'placeholder'=>'Nama Pengantar', 'class'=>'form-control', 'value' => set_value('nama_pengantar'))); ?>
                    <div class="text-danger">
                        <?php echo form_error('nama_pengantar');?>
                    </div>
                    
                    <label for="alamat" class="my-2">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="50" rows="5" class="form-control"></textarea>
                    <div class="text-danger">
                        <?php echo form_error('alamat');?>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="no_handphone" class="my-2">No Hp</label>
                    <?php echo form_input(array('name'=>'no_handphone', 'id'=> 'no_handphone', 'placeholder'=>'Nomor Hp', 'class'=>'form-control', 'value' => set_value('no_handphone'))); ?>
                    <div class="text-danger">
                        <?php echo form_error('no_handphone');?>
                    </div>
                    
                    <label for="tgl_masuk" class="my-2">Tanggal Masuk</label>
                    <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control">
                    <div class="text-danger">
                        <?php echo form_error('tgl_masuk');?>
                    </div>
                    
                    <label for="tgl_selesai" class="my-2">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control">
                    <div class="text-danger">
                        <?php echo form_error('tgl_selesai');?>
                    </div>
                    
                    <label for="no_lhu" class="my-2">No LHU</label>
                    <select name="no_lhu" class="form-control" id="no_lhu">
                        <option selected>Pilih No LHU</option>
                        <?php foreach($lhu as $data): ?>
                        <option value="<?= $data->no_lhu ?>"><?= $data->no_lhu ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="text-danger">
                        <?php echo form_error('no_lhu');?>
                    </div>
                    
                    <label for="keterangan" class="my-2">keterangan</label>
                    <select name="keterangan" id="keterangan" class="form-control" required>
                        <option value="">Pilih Keterangan</option>
                        <option value="Belum Selesai">Belum Selesai</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                    <div class="text-danger">
                        <?php echo form_error('keterangan');?>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>