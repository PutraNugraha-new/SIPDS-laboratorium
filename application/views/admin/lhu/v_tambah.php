<!-- <?= $breadcrumbs ?> -->
<div class="card my-4 w-75">
    <div class="card-header">
        <h3>Tambah Lembar Hasil Uji</h3>
    </div>
    <div class="card-body">
    <?php if ($this->session->flashdata('flash_message')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('flash_message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php 
            echo form_open_multipart('lhu/add');
        ?>
            <div class="form-row d-flex">
                <div class="form-group col-md-12 me-1">
                    <label for="no_lhu" class="my-2">No LHU</label>
                    <?php echo form_input(array('name'=>'no_lhu', 'id'=> 'no_lhu', 'placeholder'=>'Nomor LHU', 'class'=>'form-control', 'value' => set_value('no_lhu'))); ?>
                    <?php echo form_error('no_lhu');?>
                    
                    <label for="no_sampel" class="my-2">No Sampel</label>
                    <select name="no_sampel" id="no_sampel" class="form-control">
                        <option selected>-- Pilih No Sampel --</option>
                        <?php foreach($list_sampel as $ls): ?>
                            <option value="<?= $ls->no_sampel ?>"><?= $ls->no_sampel ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('no_sampel');?>
                    
                    <label for="nama_perusahaan" class="my-2">Nama Perusahaan</label>
                   <input type="text" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" class="form-control">
                    <?php echo form_error('nama_perusahaan');?>
                    
                    <label for="tanggal_selesai" class="my-2">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai">
                    <?php echo form_error('tanggal_selesai');?>
                    
                    <label for="file_lhu" class="my-2">Pilih File LHU</label>
                    <input type="file" name="file_lhu" id="file_lhu" class="form-control" accept=".doc, .docx, .pdf, .jpg, .png">
                    <?php echo form_error('file_lhu');?>
                </div>

            </div>
            <div class="row my-3">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" id="reset" class="btn btn-danger">Batal</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#no_sampel').change(function () {
            var noSampel = $(this).val();
            $.ajax({
                url: '<?php echo base_url("lhu/getDataSampel"); ?>',
                type:'GET',
                data:{no_sampel:noSampel},
                success: function (data) {
                    console.log(data);
                    var sampelData = JSON.parse(data);
                    $('#nama_perusahaan').val(sampelData.nama_perusahaan);
                    $('#tgl_selesai').val(sampelData.tgl_selesai);
                    
                },
            })

            
        })
    })

</script>