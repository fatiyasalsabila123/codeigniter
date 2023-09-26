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
        <?php foreach($siswa as $data_siswa): ?>
        <form method="post" class="row" action="<?php echo base_url('admin/aksi_ubah_siswa')?>" enctype="multipart/form-data">
                <input type="hidden" name="id_siswa" class="form-control" id="nama" value="<?php echo $data_siswa->id_siswa ?>">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama Siswa</label>
                <!-- Input field untuk nama sekolah -->
                <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $data_siswa->nama_siswa?>">
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label">NISN</label>
                <!-- Input field untuk nisn -->
                <input type="text" name="nisn" class="form-control" id="nisn" value="<?php echo $data_siswa->nisn?>">
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Gender</label>
                <!-- Input field untuk gender -->
                <select name="gender" id="gender" class="form-select">
                    <option selected value="<?php echo $data_siswa->gender?>">
                    <?php echo $data_siswa->gender?>
                </option>
                    <option value="laki_laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" name="kelas" id="kelas">
                <option selected>Pilih Kelas</option>
                <option selected value="<?php echo $data_siswa->id_kelas?>">
                    <?php echo tampil_full_kelas_byid($data_siswa->id_kelas)?>
                </option>
                    <?php foreach($kelas as $row):?>
                        <option value="<?php echo $row->id?>">
                        <?php echo $row->tingkat_kelas. ' ' . $row->jurusan_kelas?>
                        <?php endforeach;?></option>
            </select>
            </div>
            <!-- Tombol "Submit" untuk mengirim data ke server -->
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <?php endforeach;?>
    </div>
</body>
</html>