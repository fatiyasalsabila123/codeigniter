<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex">
    <?php $this->load->view('admin/sidebar'); ?>
    <div class="card w-75 p-3"
        style="margin-left:20%; height:fit-content; margin-top:10px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <div class="d-flex justify-content-between">
            <h3 class="text-center">Data Pembayaraan Spp</h3>
            <div class="d-flex" style="gap:10px">
                <button class="btn btn-sm btn-primary"><a href="export"
                        style="color:white; text-decoration:none">Export</a></button>
                <button class="btn btn-sm btn-primary"><a href="tambah_pembayaran"
                        style="color:white; text-decoration:none">Tambah Data</a></button>
            </div>
        </div>
        <hr>
        <br>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Jenis Pembayaraan</th>
                    <th scope="col">Total Pembayaraan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($pembayaran as $row):
                    $no++ ?>
                    <tr>
                        <td>
                            <?php echo $no ?>
                        </td>
                        <td>
                            <?php echo $row->nama_siswa ?>
                        </td>
                        <td>
                            <?php echo $row->jeniss_pembayaran ?>
                        </td>
                        <td>
                            <?php echo $row->totall_pembayaran ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('keuangan/edit_pembayaran/') . $row->id_pembayaran ?>"
                                class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger"
                                onclick="hapus(<?php echo $row->id_pembayaran ?>)">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    function hapus(id) { // Fungsi JavaScript untuk mengkonfirmasi dan mengarahkan ke halaman "delete.php" dengan id yang akan dihapus.
        var yes = confirm("Yakin Di Hapus?");
        if (yes == true) {
            window.location.href = "<?php echo base_url('keuangan/hapus_pembayaran/') ?>" + id; // Mengarahkan ke halaman "hapus_pembayaran.php" dengan mengirimkan id yang akan dihapus sebagai parameter.
        }
    }
</script>

</html>