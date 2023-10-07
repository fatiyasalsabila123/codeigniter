<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Alokasi Mapel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center" style="margin-left:250px">
    <div class="card w-75 m-auto p-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <?php $this->load->view('admin/sidebar'); ?>
        <h3 class="text-center">Create Data Alokasi Mapel</h3>
        <hr>
        <br>
        <form method="post" class="row" action="<?php echo base_url('admin/aksi_tambah_alokasi_mapel') ?>"
            enctype="multipart/form-data">
            <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Mapel</label>
                    <select class="form-select" name="id_mapel" id="kelas">
                        <option selected>
                            Pilih Mapel
                        </option>
                        <?php foreach ($mapel as $row): ?>
                            <option value="<?php echo $row->id ?>">
                                <?php echo $row->nama_mapel ?>
                            <?php endforeach; ?>
                        </option>
                    </select>
                </div>
            <div class="mb-3 col-6">
                <label for="id_kelas" class="form-label">Kelas</label>
                <!-- Input field untuk id_kelas -->
                <select class="form-select" name="id_kelas" id="kelas">
                        <option selected>
                            Pilih Kelas
                        </option>
                        <?php foreach ($kelas as $row): ?>
                            <option value="<?php echo $row->id ?>">
                                <?php echo $row->tingkat_kelas. ' ' . $row->jurusan_kelas  ?>
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