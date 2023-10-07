<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center" style="margin-left:250px">
    <div class="card w-75 m-auto p-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <?php $this->load->view('admin/sidebar'); ?>
        <h3 class="text-center">Create Data Sekolah</h3>
        <hr>
        <br>
        <?php foreach ($edit_sekolah as $row):?>
        <form method="post" class="row" action="<?php echo base_url('admin/aksi_edit_sekolah') ?>"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row->id?>">
            <div class="mb-3 col-6">
                <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                <!-- Input field untuk nama_sekolah -->
                <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah" value="<?php echo $row->nama_sekolah?>">
            </div>
            <div class="mb-3 col-6">
                <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
                <!-- Input field untuk alamat_sekolah -->
                <input type="text" name="alamat_sekolah" class="form-control" id="alamat_sekolah" value="<?php echo $row->alamat_sekolah?>">
            </div>
            <!-- Tombol "Submit" untuk mengirim data ke server -->
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <?php endforeach;?>
    </div>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.all.min.js"></script>
    <!-- <script> -->
        <!-- <?php if ($this->session->flashdata('berhasil')): ?>
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
    <?php endif; ?> -->
    // </script>
</body>

</html>