<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center" style="margin-left:250px">
<?php foreach($admin as $admins):?>
<div class="card w-75 m-auto p-3">
    <?php $this->load->view('admin/sidebar'); ?>
    <form method="post" class="row" action="<?php echo base_url("admin/aksi_ubah_akun")?>" enctype="multipart/form-data">
                <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $admins->id ?>">
            <div class="mb-3 col-6">
                <label for="username" class="form-label">Username</label>
                <!-- Input field untuk username admin -->
                <input type="text" name="username" class="form-control" id="username" value="<?= $admins->username?>">
                <!-- <input type="text" name="username" class="form-control" id="username" value="<?= $this->fungsi->admin_login()->username?>"> -->
            </div>
            <div class="mb-3 col-6">
                <label for="email" class="form-label">Email</label>
                <!-- Input field untuk email admin -->
                <input type="text" name="email" class="form-control" id="email" value="<?=$admins->email?>">
                <!-- <input type="text" name="email" class="form-control" id="email" value="<?= $this->fungsi->admin_login()->email?>"> -->
            </div>
            <div class="mb-3 col-6">
                <label for="password" class="form-label">Password Baru</label>
                <!-- Input field untuk password_baru (biarkan kosong jika tidak ingin mengubahnya) -->
                <input type="password" name="password_baru" class="form-control" id="password_baru">
            </div>
            <div class="mb-3 col-6">
                <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
                <!-- Input field untuk konfirmasi password (biarkan kosong jika tidak ingin mengubahnya) -->
                <input type="password" name="konfirmasi_password" class="form-control" id="konfirmasi_password">
            </div>
            <div class="mb-3 col-6">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control" id="foto">
            </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form> 
</div>
    <?php endforeach;?>

</body>
</html>
