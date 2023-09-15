<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="min-vh-100 d-flex align-items-center" style="margin-left:250px">
<div class="card w-75 m-auto p-3">
<?php $this->load->view('admin/sidebar'); ?>
        <h3 class="text-center">Update</h3>
        <form method="post" class="row">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama Siswa</label>
                <!-- Input field untuk nama sekolah -->
                <input type="text" name="nama" class="form-control" id="nama">
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label">NISN</label>
                <!-- Input field untuk nisn -->
                <input type="text" name="nisn" class="form-control" id="nisn">
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Gender</label>
                <!-- Input field untuk gender -->
                <select name="gender" id="gender" class="form-select">
                    <option selected>Pilih Gender</option>
                    <option value="laki_laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" name="kelas" id="kelas">
                <option selected>Pilih Kelas</option>
                    <?php foreach($kelas as $row):?>
                        <option value="<?php echo $row->id ?>">
                        <?php echo $row->tingkat_kelas. ' ' . $row->jurusan_kelas?>
                        <?php endforeach;?></option>
            </select>
            </div>
            <!-- Tombol "Submit" untuk mengirim data ke server -->
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>