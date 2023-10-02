<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center" style="margin-left:250px">
    <div class="card w-75 m-auto p-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <?php $this->load->view('admin/sidebar'); ?>
        <h3 class="text-center">Update Data Kelas</h3>
        <hr>
        <br>
        <?php foreach ($kelas as $data_kelas): ?>
            <form method="post" class="row" action="<?php echo base_url('admin/aksi_edit_kelas') ?>"
                enctype="multipart/form-data">
                <input type="hidden" name="id" class="form-control" value="<?php echo $data_kelas->id ?>">
                <div class="mb-3 col-6">
                    <label for="tingkat_kelas" class="form-label">Tingkat kelas</label>
                    <!-- Input field untuk nama_kelas -->
                    <input type="text" name="tingkat_kelas" class="form-control" id="tingkat_kelas"
                        value="<?php echo $data_kelas->tingkat_kelas ?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="nisn" class="form-label">Jurusan Kelas</label>
                    <!-- Input field untuk jurusam_kelas -->
                    <input type="text" name="jurusan_kelas" class="form-control" id="jurusan_kelas" value="<?php echo $data_kelas->jurusan_kelas ?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Nama Sekolah</label>
                    <select class="form-select" name="nama_sekolah" id="kelas">
                        <option selected value="<?php echo $data_kelas->id_sekolah ?>">
                            <?= get_all_sekolah($data_kelas->id_sekolah) ?>
                        </option>
                        <?php foreach ($sekolah as $row): ?>
                            <option value="<?php echo $row->id ?>">
                                <?php echo $row->nama_sekolah ?>
                            <?php endforeach; ?>
                        </option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Wali Kelas</label>
                    <select class="form-select" name="wali_kelas" id="kelas">
                        <option selected value="<?php echo $data_kelas->id_wali_kelas ?>">
                            <?php echo get_all_wali_kelas($data_kelas->id_wali_kelas) ?>
                        </option>
                        <?php foreach ($wali_kelas as $row): ?>
                            <option value="<?php echo $row->id ?>">
                                <?php echo $row->nama_wali_kelas ?>
                            <?php endforeach; ?>
                        </option>
                    </select>
                </div>
                <!-- Tombol "Submit" untuk mengirim data ke server -->
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        <?php endforeach; ?>
    </div>
</body>

</html>