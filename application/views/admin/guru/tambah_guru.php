<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center" style="margin-left:250px">
    <div class="card w-75 m-auto p-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <?php $this->load->view('admin/sidebar'); ?>
        <h3 class="text-center">Create Data Guru</h3>
        <hr>
        <br>
        <form method="post" class="row" action="<?php echo base_url('admin/aksi_tambah_guru') ?>"
            enctype="multipart/form-data">
            <div class="mb-3 col-6">
                <label for="nama_guru" class="form-label">Nama Guru</label>
                <!-- Input field untuk nama_guru -->
                <input type="text" name="nama_guru" class="form-control" id="nama_guru">
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label">nik</label>
                <!-- Input field untuk nik -->
                <input type="text" name="nik" class="form-control" id="nik">
            </div>
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Mapel</label>
                <select class="form-select" name="mapel" id="mapel">
                    <option selected>Pilih mapel</option>
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
    </div>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.all.min.js"></script>
        <?php if ($this->session->flashdata('tambah_mapel')): ?>
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: '<?php echo $this->session->flashdata('tambah_mapel'); ?>',
                });
        </script>
    <?php elseif ($this->session->flashdata('gagal_tambah_mapel')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '<?php echo $this->session->flashdata('gagal_tambah_mapel'); ?>',
            });
        </script>
    <?php endif; ?>
    <script>
 function hapus(id) {
        swal.fire({
            title: 'Yakin Untuk Menghapus Data Ini?',
            text: "Data Ini Akan Terhapus Permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Dihapus Yeyyyyyyyy',
                    showConfirmButton: false,
                    timer: 1500,

                }).then(function() {
                    window.location.href = "<?php echo base_url('admin/hapus_guru/')?>" + id;
                });
            }
        });
    }
</script>

</body>

</html>