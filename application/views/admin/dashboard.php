<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Keuangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="index.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- <h1 class="fw-blod">Selamat Datang <?php echo $this->session->userData('username')?></h1>
    <a href="<?php echo base_url('auth/logout');?>" class="btn btn-sm btn-primary">Logout</a> -->
    
<?php $this->load->view('admin/sidebar'); ?>
  <main>
    <div>
      <div class="row d-flex justify-content-center" style="margin-left:100px; margin-top:20px">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">          
          <div class="card rounded-0 p-0 shadow" style="width:200px">
            <!-- <img src="https://user-images.githubusercontent.com/25878302/53659076-e2204680-3c5a-11e9-8c00-0c10bcd945e6.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar"> -->
            <div class="card-body text-center bg-primary">
                <h6 class="card-title text-white">Angular Pro Sidebar</h6>
                <!-- <a href="https://github.com/azouaoui-med/angular-pro-sidebar" target="_blank" class="btn btn-primary btn-sm">Github</a>
                <a href="https://azouaoui-med.github.io/angular-pro-sidebar/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a> -->
            </div>
          </div>          
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">          
          <div class="card rounded-0 p-0 shadow" style="width:200px">
            <!-- <img src="https://user-images.githubusercontent.com/25878302/53659076-e2204680-3c5a-11e9-8c00-0c10bcd945e6.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar"> -->
            <div class="card-body text-center bg-primary">
                <h6 class="card-title text-white">Angular Pro Sidebar</h6>
                <!-- <a href="https://github.com/azouaoui-med/angular-pro-sidebar" target="_blank" class="btn btn-primary btn-sm">Github</a>
                <a href="https://azouaoui-med.github.io/angular-pro-sidebar/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a> -->
            </div>
          </div>          
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">          
          <div class="card rounded-0 p-0 shadow" style="width:200px">
            <!-- <img src="https://user-images.githubusercontent.com/25878302/53659076-e2204680-3c5a-11e9-8c00-0c10bcd945e6.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar"> -->
            <div class="card-body text-center bg-primary">
                <h6 class="card-title text-white">Angular Pro Sidebar</h6>
                <!-- <a href="https://github.com/azouaoui-med/angular-pro-sidebar" target="_blank" class="btn btn-primary btn-sm">Github</a>
                <a href="https://azouaoui-med.github.io/angular-pro-sidebar/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a> -->
            </div>
          </div>          
        </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">          
          <div class="card rounded-0 p-0 shadow" style="width:200px">
            <!-- <img src="https://user-images.githubusercontent.com/25878302/53659497-016ba380-3c5c-11e9-8dfd-4901ddaf090b.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar"> -->
            <div class="card-body text-center bg-primary">
                <h6 class="card-title text-white">Angular Dashboard</h6>
                <!-- <a href="https://github.com/azouaoui-med/lightning-admin-angular" target="_blank" class="btn btn-primary btn-sm">Github</a>
                <a href="https://azouaoui-med.github.io/lightning-admin-angular/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a> -->
            </div>
          </div>          
        </div>
      </div>
    </div>

  </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>