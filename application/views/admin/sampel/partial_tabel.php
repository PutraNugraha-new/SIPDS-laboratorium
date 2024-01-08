<?php foreach ($data_tabel as $row): ?>
    <tr>
        <td><?= $row->no_sampel ?></td>
        <td><?= $row->jenis_sampel ?></td>
        <td><?= $row->tgl_awal ?></td>
        <!-- tambahkan sel-sel lain sesuai kebutuhan -->
    </tr>
<?php endforeach; ?>
