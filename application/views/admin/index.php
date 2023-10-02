<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="index.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!-- <h1 class="fw-blod">Selamat Datang <?php echo $this->session->userData('username') ?></h1>
    <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-sm btn-primary">Logout</a> -->

  <?php $this->load->view('admin/sidebar'); ?>
  <main style="margin-left:100px; margin-top:20px">
    <div class="row d-flex justify-content-center">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
        <div class="card p-0 shadow" style="width:200px">
          <img style="height: 132px;"
            src="https://img.freepik.com/free-vector/teacher-collection-concept_52683-37601.jpg?w=740&t=st=1695796859~exp=1695797459~hmac=04a283bb3fa623ced08d4ef15a15225cbfc49e1d27e1c9e4727d3072abf23a4a"
            class="card-img-top rounded-0" alt="Angular pro sidebar">
          <div class="card-body text-center" style="background:#6C7888">
            <h6 class="card-title text-white">Guru</h6>
            <a class="text-white fw-semibold" style="text-decoration:none">Jumlah Data</a>
            <a class="btn btn-primary btn-sm">10</a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
        <div class="card rounded-0 p-0 shadow" style="width:200px">
          <img style="height: 132px;"
            src="https://img.freepik.com/free-vector/focused-tiny-people-reading-books_74855-5836.jpg?w=740&t=st=1695797469~exp=1695798069~hmac=88a9dd3862cc9b36960ceae121fb751b6066ea766c2356e7ea7b9170f1a48463"
            class="card-img-top rounded-0" alt="Angular pro sidebar">
          <div class="card-body text-center" style="background:#6C7888">
            <h6 class="card-title text-white">Siswa</h6>
            <a style="text-decoration:none" class="text-white fw-semibold">Jumlah Data</a>
            <a target="_blank" class="btn btn-primary btn-sm">12</a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
        <div class="card rounded-0 p-0 shadow" style="width:200px">
          <img style="height: 132px;"
            src="https://media.istockphoto.com/id/521082252/id/foto/ruang-kelas-kosong.jpg?s=612x612&w=0&k=20&c=X0ghcxQPKXH0jR7aBwRPJtbmBCQdUTyfEgNsQj-Qk1g="
            class="card-img-top rounded-0" alt="Angular pro sidebar">
          <div class="card-body text-center" style="background:#6C7888">
            <h6 class="card-title text-white">Kelas</h6>
            <a class="text-white fw-semibold" style="text-decoration:none">Jumlah Data</a>
            <a class="btn btn-primary btn-sm">12</a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
        <div class="card rounded-0 p-0 shadow" style="width:200px">
          <img style="height: 132px;"
            src="https://img.freepik.com/free-vector/hand-drawn-flat-design-stack-books_23-2149331952.jpg?w=740&t=st=1695798370~exp=1695798970~hmac=2c60680fdadeb73fe27f87d1a9a5d639e73764a22f7252e068443563719564ff"
            class="card-img-top rounded-0" alt="Angular pro sidebar">
          <div class="card-body text-center" style="background:#6C7888">
            <h6 class="card-title text-white">Mapel</h6>
            <a style="text-decoration:none" class="text-white fw-semibold">Jumlah Data</a>
            <a class="btn btn-primary btn-sm">12</a>
          </div>
        </div>
      </div>
    </div>

    <h3 style="margin-left:17%; margin-top: 30px;">Guru</h3>
    <table class="table table-striped table-hover" style="margin-left:220px; width:67%">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Guru</th>
          <th scope="col">Gender</th>
          <th scope="col">NIK</th>
          <th scope="col">Mapel</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0;
        foreach ($guru_ as $row):
          $no++ ?>
          <tr>
            <td>
              <?php echo $no ?>
            </td>
            <td>
              <?php echo $row->nama_guru ?>
            </td>
            <td>
              <?php echo $row->gender ?>
            </td>
            <td>
              <?php echo $row->nik ?>
            </td>
            <td>
              <?php echo $row->nama_mapel ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <h3 style="margin-left:17%; margin-top: 30px;">Siswa</h3>
    <table class="table table-striped table-hover" style="margin-left:220px; width:67%">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Foto</th>
          <th scope="col">Nama Siswa</th>
          <th scope="col">Gender</th>
          <th scope="col">NISN</th>
          <th scope="col">Kelas</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0; foreach ($data_siswa as $row): $no++?>
        <tr>
          <td><?php echo $no?></td>
          <td><img style="width:100px" src="<?php echo base_url('images/siswa/'. $row->foto)?>" alt=""></td>
          <td><?php echo $row->nama_siswa?></td>
          <td><?php echo $row->gender?></td>
          <td><?php echo $row->nisn?></td>
          <td><?php echo $row->tingkat_kelas . ' ' . $row->jurusan_kelas?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>