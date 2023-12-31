<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Alokasi Mapel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex">
  <?php $this->load->view('admin/sidebar'); ?>
  <div class="card w-75 p-3"
    style="margin-left:20%; height:fit-content; margin-top:10px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
    <div class="d-flex justify-content-between bg-gray">
      <h3 class="text-center">Data Alokasi Mapel</h3>
      <button class="btn btn-sm btn-primary"><a href="tambah_alokasi_mapel" style="color:white; text-decoration:none">Tambah Data</a></button>
    </div>
    <hr>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Mapel</th>
          <th scope="col">Kelas</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 0;
        foreach ($alokasi_mapel as $row):
          $no++
            ?>
          <tr>
            <th scope="row">
              <?= $no?>
            </th>
            <td>
              <?= $row->nama_mapel; ?>
            </td>
            <td>
              <?= $row->tingkat_kelas. ' ' . $row->jurusan_kelas; ?>
            </td>
            <td>
              <a href="<?php echo base_url('admin/edit_alokasi_mapel/') . $row->id ?>"
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
      window.location.href = "<?php echo base_url('admin/hapus_alokasi_mapel/') ?>" + id; // Mengarahkan ke halaman "hapus_guru.php" dengan mengirimkan id yang akan dihapus sebagai parameter.
    }
  }
</script>

</html>