<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center" style="margin-left:250px">
    <div class="card w-75 m-auto p-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <?php $this->load->view('admin/sidebar'); ?>
        <h3 class="text-center">Create Data Kelas</h3>
        <hr>
        <br>
            <form method="post" class="row" action="<?php echo base_url('admin/aksi_ubah_kelas') ?>"
                enctype="multipart/form-data">
                <input required type="hidden" name="id" class="form-control">
                <div class="mb-3 col-6">
                    <label for="nama_kelas" class="form-label">Tingkat kelas</label>
                    <!-- Input field untuk tingkat_kelas -->
                    <input required type="text" name="tingkat_kelas" class="form-control" id="tingkat_kelas"
                ">
                </div>
                <div class="mb-3 col-6">
                    <label for="nisn" class="form-label">Jurusan Kelas</label>
                    <!-- Input field untuk jurusan_kelas -->
                    <input required type="text" name="jurusan_kelas" class="form-control" id="jurusan_kelas">
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Sekolah</label>
                    <select class="form-select" name="nama_sekolah">
                        <option selected>
                            Pilih Sekolah
                    </option>
                        <?php foreach ($sekolahh as $row): ?>
                            <optio">
                                <?php echo $row->nama_sekolah ?>
                            <?php endforeach; ?>
                        </option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Wali Kelas</label>
                    <select class="form-select" name="wali_kelas">
                        <option selected>
                            Pilih Wali Kelas
                        </option>
                        <?php foreach ($guru_walikelas as $row): ?>
                            <optio">
                                <?php echo $row->nama_guru ?>
                            <?php endforeach; ?>
                        </option>
                    </select>
                </div>
                <!-- Tombol "Submit" untuk mengirim data ke server -->
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
    </div>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.all.min.js"></script>
    <!-- <script> -->
    <?php if ($this->session->flashdata('berhasil')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '<?php echo $this->session->flashdata('berhasil'); ?>',
            });
        </script>
    <?php elseif ($this->session->flashdata('gagal')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '<?php echo $this->session->flashdata('gagal'); ?>',
            });
        </script>
    <?php endif; ?>
    // </script>
</body>

</html>