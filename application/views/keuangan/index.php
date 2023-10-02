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

<body>z
    <!-- <h1 class="fw-blod">Selamat Datang <?php echo $this->session->userData('username')?></h1>
    <a href="<?php echo base_url('auth/logout');?>" class="btn btn-sm btn-success">Logout</a> -->
    
<?php $this->load->view('admin/sidebar'); ?>
  <main style="margin-left:100px; margin-top:20px">
    <div>
    <div class="row d-flex justify-content-center" style="gap:56px">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">          
          <div class="card p-0 shadow" style="width:260px">
            <img style="height: 140px;" src="https://img.freepik.com/free-vector/tiny-students-sitting-near-books-getting-university-degree-paying-money-education-business-flat-vector-illustration-college-scholarship-finance-system-school-fee-economy-student-loan-concept_74855-21037.jpg?size=626&ext=jpg&ga=GA1.1.412734730.1693381219&semt=ais" class="card-img-top rounded-0" alt="Angular pro sidebar">
            <div class="card-body text-center" style="background:#6C7888">
                <h6 class="card-title text-white">SPP</h6>
                <a class="text-white fw-semibold" style="text-decoration:none">Jumlah Pembayaran</a>
                <a class="btn btn-success btn-sm"><i class="fas fa-dollar-sign"></i> 10</a>
            </div>
          </div>          
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">          
          <div class="card rounded-0 p-0 shadow" style="width:260px">
            <img style="height: 140px;" src="https://img.freepik.com/premium-photo/asian-elementary-school-girl-going-leave-with-book-isolated-white-background_378229-2077.jpg?size=626&ext=jpg&ga=GA1.1.412734730.1693381219&semt=ais" class="card-img-top rounded-0" alt="Angular pro sidebar">
            <div class="card-body text-center" style="background:#6C7888">
                <h6 class="card-title text-white">Uang Seragam</h6>
                <a class="text-white fw-semibold" style="text-decoration:none">Jumlah Pembayaran</a>
                <a class="btn btn-success btn-sm"><i class="fas fa-dollar-sign"></i> 12</a>
            </div>
          </div>          
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">          
          <div class="card rounded-0 p-0 shadow" style="width:260px">
            <img style="height: 140px;" src="https://img.freepik.com/premium-vector/mortgage-concept-person-holding-magnifying-glass-find-apartment-rent-sale-choosing-offer-rental-purchasing-home-real-estate-agent-searching-deal-taking-loan-vector_461812-1296.jpg?size=626&ext=jpg&ga=GA1.1.412734730.1693381219&semt=ais" class="card-img-top rounded-0" alt="Angular pro sidebar">
            <div class="card-bodyz text-center" style="background:#6C7888">
                <h6 class="card-title text-white">Uang Gedung</h6>
                <a style="text-decoration:none" class="text-white fw-semibold">Jumlah Pembayaran</a>
                <a target="_blank" class="btn btn-success btn-sm"><i class="fas fa-dollar-sign"></i> 12</a>
            </div>
          </div>          
        </div>
      </div>
    </div>

  </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>