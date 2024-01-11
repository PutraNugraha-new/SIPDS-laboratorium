<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIPDS</title>
        <!-- <link href="<?= base_url() ?>assets/user/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="<?= base_url() ?>public/css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

        <!-- datatables -->
        <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/css/pages/fontawesome.css"> -->
        <link rel="stylesheet" href="<?= base_url() ?>/public/extensions/simple-datatables/style.css">
        <link rel="stylesheet" href="<?= base_url() ?>/public/css/simple-datatables.css">

    </head>
<body>
    <div class="sampel">
        <h4>Status Sampel</h4>
        <table class="table table-striped bg-light" id="table1">
            <thead>
                <tr>
                    <th>No Sampel</th>
                    <th>Nama Perusahaan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($sampel as $data): ?>
                    <tr>
                        <td><?= $data->no_sampel ?></td>
                        <td><?= $data->nama_perusahaan ?></td>
                        <td><?= $data->keterangan ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="goBack()" class="btn btn-info">Kembali</button>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- datatable -->
    <script src="<?= base_url() ?>/public/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="<?= base_url() ?>/public/js/simple-datatables.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>


