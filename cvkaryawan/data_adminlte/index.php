<?php

require 'koneksi.php';

$datadiri_ = query("SELECT * FROM datadiris order by idnama desc");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
  $datadiri_ = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Karyawan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="asets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color:   #eeefe6;">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <span class="text-center"><b>PT. Java</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/iconprofile.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
      <div class="info" class="mt-3">
          <a href="#" class="d-block">Admin Java</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          </li>
          <li class="nav nav-tabs" style="background-color:   #dcdcdc;">
            <a href="index.php" class="nav-link warning">
              <p>
                Home
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DAFTAR DATA KARYAWAN </h1>
            
            <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus placeholder="Search in here" autocomplete="off" class="btn btn-default">
            <button type="submit" name="cari" class="btn btn-default"><i class="fa fa-search"></i></button>
           </form>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="tambah.php" ><img src="assets/dist/img/tambah.png" width="50px" align="right"></a>
                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                <thead>
      <tr style="background-color: #DCDCDC;">
        <th>No.</th>
        <th>Nama</th>
        <th>Gambar</th>
        <th>NIK</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Agama</th>
        <th class="text-center">Aksi</th>
      </tr>
                </thead>
                <tbody>
     <?php $i = 1; 
     foreach( $datadiri_ as $data ) : ?>                                       
      <tr >
        <td><?=$i++;?></td>
        <td><?=$data['nama']?></td>
        <td><img src="img/<?= $data["gambar"]; ?>" width="50px"></td>
        <td><?=$data['nik']?></td>
        <td><?=$data['jenisKelamin']?></td>
        <td><?=$data['tanggal_lahir']?></td>
        <td><?=$data['alamat']?></td>
        <td><?=$data['agama']?></td>
        <td>
        <a href="detail.php?hal=detail&id=<?=$data['idnama'];?>" class="btn btn-default"><i class="fa fa-search-plus" ></i></a>
         <a href="edit.php?hal=edit&id=<?=$data['idnama'];?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
         <a href="hapus.php?id=<?= $data["idnama"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="btn btn-default"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
  <?php endforeach; ?>
                 </tbody>
    </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
