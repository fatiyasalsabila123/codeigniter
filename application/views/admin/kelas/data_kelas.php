<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data kelas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex">
  <?php $this->load->view('admin/sidebar'); ?>
  <div class="card w-75 p-3"
    style="margin-left:20%; height:fit-content; margin-top:10px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
    <div class="d-flex justify-content-between bg-gray">
      <h3 class="text-center">Data kelas</h3>
      <button class="btn btn-sm btn-primary"> <a href="tambah_kelas" style="color:white; text-decoration:none">Tambah Data</a></button>
    </div>
    <hr>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tingkat kelas</th>
          <th scope="col">Jurusan kelas</th>
          <th scope="col">Nama Sekolah</th>
          <th scope="col">Nama Wali Kelas</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 0;
        foreach ($kelas as $row):
          $no++
            ?>
          <tr>
            <th scope="row">
              <?= $no ?>
            </th>
            <td>
              <?= $row->tingkat_kelas; ?>
            </td>
            <td>
              <?= $row->jurusan_kelas; ?>
            </td>
            <td>
              <?= $row->nama_sekolah; ?>
            </td>
            <td>
              <?= $row->nama_guru; ?>
            </td>
            <td>
              <a href="<?php echo base_url('admin/edit_kelas/') . $row->id ?>"
                class="btn btn-sm btn-primary">Edit</a>
              <button class="btn btn-sm btn-danger" onclick="hapus(<?php echo $row->id ?>)">Hapus</button>
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
      window.location.href = "<?php echo base_url('admin/hapus_kelas/') ?>" + id; // Mengarahkan ke halaman "hapus_guru.php" dengan mengirimkan id yang akan dihapus sebagai parameter.
    }
  }
</script>

</html>