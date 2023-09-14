<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body class="min-vh-100 d-flex align-items-center">
<?php $this->load->view('admin/sidebar'); ?>
    <div class="card w-75 p-3" style="margin-left:20%">
        <div class="d-flex justify-content-between bg-gray">
        <h3 class="text-center">Data Siswa</h3>
        <button class="btn btn-sm btn-primary">Tambah Data</button>
    </div>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Siswa</th>
      <th scope="col">Gender</th>
      <th scope="col">Nisn</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach ($result as $row):
    ?>
    <tr>
      <th scope="row"><?= $row->id_siswa?></th>
      <td><?= $row->nama_siswa;?></td>
      <td><?= $row->gender;?></td>
      <td><?= $row->nisn;?></td>
      <td>
        <button class="btn btn-sm btn-primary">Edit</button>
        <button class="btn btn-sm btn-danger">Hapus</button>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
        </div>
</body>
</html>