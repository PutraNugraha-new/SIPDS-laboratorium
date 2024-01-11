<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>

    <style>
        .cetakLaporan tr td{
            font-size:12pt;
        }

        .kop p{
            font-size:12pt;
            font-weight:bold;
            text-align:center;
            margin:0;
        }

        .judul{
            text-align:center;
            font-weight:bold;
        }

        /* Reset some default browser styles for the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        /* Add margin to the table headers */
        th {
            padding: 5px; /* Optional: Add padding for better appearance */
            text-align: left;
            background-color: #f2f2f2; /* Optional: Add background color for the headers */
            border:1px solid #000;
            margin-bottom: 10px; /* Add margin to the bottom of the headers */
        }

        /* Add some styles to the table data cells (optional) */
        td {
            padding: 10px; /* Optional: Add padding for better appearance */
            border: 1px solid #000; /* Optional: Add border to the cells */
        }

        /* Optional: Add some styles to the whole table for better appearance */
        .cetakLaporan {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; /* Add margin to the top of the table */
        }

    </style>
</head>
<body>
<div class="kop">
    <div class="row">
        <div class="col-md-6">
            <p>PEMERINTAH KOTA PALANGKARAYA</p>
            <P>DINAS LINGKUNGAN HIDUP</P>
            <P>UNIT PELAKSANA TEKNIS DAERAH (UPTD) LABORATORIUM LINGKUNGAN</P>
            <p>Email : lablingkungan@gmail.com</p>
            <p>Jl. Tjilik Riwut Km. 2,5 Palangka Raya</p>
        </div>
    </div>
</div>
<hr>
<p class="judul">Laporan Data Sampel</p>

<table class="table cetakLaporan" border="1" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>No Sampel</th>
            <th>Jenis Sampel</th>
            <th>Parameter Uji</th>
            <th>Perusahaan</th>
            <th>Nama Pengantar</th>
            <th>Alamat</th>
            <th>Tgl Masuk</th>
            <th>Tgl Selesai</th>
            <th>No LHU</th>
            <th>No Hp</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($sampel as $data): ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data->no_sampel; ?></td>
            <td><?= $data->jenis_sampel; ?></td>
            <td><?= $data->parameter_diuji; ?></td>
            <td><?= $data->nama_perusahaan; ?></td>
            <td><?= $data->nama_pengantar; ?></td>
            <td><?= $data->alamat; ?></td>
            <td><?= $data->tgl_masuk; ?></td>
            <td><?= $data->tgl_selesai; ?></td>
            <td><?= $data->no_lhu; ?></td>
            <td><?= $data->no_handphone; ?></td>
            <td><?= $data->keterangan; ?></td>
        </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>