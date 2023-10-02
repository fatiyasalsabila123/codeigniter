<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="min-vh-100 d-flex align-items-center" style="margin-left:250px">
<div class="card w-75 m-auto p-3">
<?php $this->load->view('admin/sidebar'); ?>
        <h3 class="text-center">Update Data</h3>
        <?php foreach ($pembayaran_id as $row_pembayaran):?>
        <form method="post" class="row" action="<?php echo base_url('keuangan/aksi_tambah_pembayaran')?>" enctype="multipart/form-data">
        <div class="mb-3 col-6">
                    <label for="id_siswa" class="form-label">Nama Siswa</label>
                    <select class="form-select" name="id_siswa" id="id_siswa">
                        <option selected>Pilih Siswa</option>
                        <option selected value="<?php echo $row_pembayaran->id_siswa ?>">
                            <?php echo get_all_siswa($row_pembayaran->id_siswa) ?>
                        </option>
                        <?php foreach ($siswa as $row): ?>
                            <option value="<?php echo $row->id_siswa ?>">
                                <?php echo $row->nama_siswa ?>
                            <?php endforeach; ?>
                        </option>
                    </select>
                </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Jenis Pembayaran</label>
                <!-- Input field untuk gender -->
                <select name="jenis_pembayaran" id="gender" class="form-select" value="<?php echo $row_pembayaran->jeniss_pembayaran?>">
                    <option selected><?php echo $row_pembayaran->jeniss_pembayaran?></option>
                    <option value="Pembayaran SPP">Pembayaran SPP</option>
                    <option value="Pembayaran Uang Gedung">Pembayaran Uang Gedung</option>
                    <option value="Pembayaran Seragam">Pembayaran Seragam</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label">Total Pembayaran</label>
                <!-- Input field untuk total_pembayaran -->
                <input type="text" name="total_pembayaran" class="form-control" id="total_pembayaran" value="<?php echo $row_pembayaran->totall_pembayaran?>">
            </div>
            <!-- Tombol "Submit" untuk mengirim data ke server -->
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <?php endforeach;?>
    </div>
</body>
</html>