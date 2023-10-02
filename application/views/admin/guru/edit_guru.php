<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center" style="margin-left:250px">
    <div class="card w-75 m-auto p-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <?php $this->load->view('admin/sidebar'); ?>
        <h3 class="text-center">Update Data Guru</h3>
        <hr>
        <br>
        <?php foreach ($guru as $data_guru): ?>
            <form method="post" class="row" action="<?php echo base_url('admin/aksi_ubah_guru') ?>"
                enctype="multipart/form-data">
                <input type="hidden" name="id" class="form-control" value="<?php echo $data_guru->id ?>">
                <div class="mb-3 col-6">
                    <label for="nama_guru" class="form-label">Nama Guru</label>
                    <!-- Input field untuk nama_guru -->
                    <input type="text" name="nama_guru" class="form-control" id="nama_guru"
                        value="<?php echo $data_guru->nama_guru ?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="nisn" class="form-label">nik</label>
                    <!-- Input field untuk nik -->
                    <input type="text" name="nik" class="form-control" id="nik" value="<?php echo $data_guru->nik ?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Mapel</label>
                    <select class="form-select" name="nama_mapel" id="kelas">
                        <option selected value="<?php echo $data_guru->id_mapel ?>">
                            <?php echo get_all_mapel($data_guru->id_mapel) ?>
                        </option>
                        <?php foreach ($mapel as $row): ?>
                            <option value="<?php echo $row->id ?>">
                                <?php echo $row->nama_mapel ?>
                            <?php endforeach; ?>
                        </option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="gender" class="form-label">Gender</label>
                    <!-- Input field untuk gender -->
                    <div class="d-flex" style="gap:10px">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="laki-laki"
                                checked>
                            <label class="form-check-label" for="gender1">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="perempuan">
                            <label class="form-check-label" for="gender2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Tombol "Submit" untuk mengirim data ke server -->
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        <?php endforeach; ?>
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