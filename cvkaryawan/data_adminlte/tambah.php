<?php
// Koneksi ke DB & Pilih Database
require 'koneksi.php';


//jika tombol simpan diklik
if (isset($_POST["tambah"])) 
{

   // cek apakah data berhasil ditambah atau tidak
   if (tambah($_POST) > 0  ) {
     echo "
          <script>
              alert('Data sukses ditambahkan!');
              document.location.href = 'index.php';
          </script>
          ";
   } else {
    echo "
          <script>
              alert('Data gagal ditambahkan!');
              document.location.href = 'index.php';
          </script>
          ";
   }
   
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
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
    <div class="card-body">
<!-- Awal Card Form -->
<div class="card mt-3" style="background-color:   #F5F5DC;">
  <div class="card-header text-white" style="background-color: #696969;">
   <h3 class="text-center">Form Tambah Data Karyawan</h3>
  </div>
  <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data">
      <p ><h3 class="text-center">Data Diri</h3></p>
      <div class="row">
        <div class="col">
            <label for="nama">Nama</label>
            <input type="text"   name="nama" id="nama" class="form-control" placeholder="input nama anda" required>
        </div>
        <div class="col">
            <label for="nik">NIK</label>
            <input type="text"  name="nik" id="nik" class="form-control" placeholder="input nik anda" required >
        </div>
        <div class="col">
            <label for="jenisKelamin">Jenis Kelamin</label>
            <select class="form-control"  name="jenisKelamin" id="jenisKelamin" required>
          <option  ></option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
        </div>
        </div>
        <div class="col">
            <label for="gambar">Gambar :</label>
        <input type="file" name="gambar" id="gambar" class="form-control btn btn-sm">
        </div>
        <div class="col mt-2">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control"  name="tanggal_lahir" id="tanggal_lahir" required> 
        </div>
        <div class="col mt-2">
            <label for="alamat">Alamat</label>
            <textarea class="form-control"  name="alamat" id="alamat" placeholder="input alamat anda" required></textarea> 
        </div>
        <div class="col">
            <label for="agama">Agama</label>
            <select class="form-control"  name="agama" id="agama" required>
          <option  ></option>
          <option value="islam">Islam</option>
          <option value="kristen protestan">Kristen Protestan</option> 
          <option value="kristen katholik">Kristen Katholik</option>
          <option value="konghucu">Konghucu</option>
          <option value="hindu">Hindu</option>
          <option value="buddha">Buddha</option>
        </select>
        </div> 
        
        <p ><h4 class="text-center">Data Keahlian</h4></p> 
    <div class="row">
    <div class="col">      
        <label>Keahlian</label>
      <input type="text"  name="nama_keahlian1" class="form-control" placeholder="input nama keahlian anda">
    </div>
    <div class="col mt-2">
      <label></label>
      <input type="text"  name="nama_keahlian2" class="form-control" placeholder="input nama keahlian anda">
    </div>
    <div class="col mt-2">
      <label></label>
      <input type="text"  name="nama_keahlian3" class="form-control" placeholder="input nama keahlian anda">
    </div>
  </div>
    <div class="col">
      <label>Prestasi</label>
      <input type="text"  name="prestasi1" class="form-control" placeholder="input prestasi anda">
    </div>
    <div class="col">
      <label></label>
      <input type="text"  name="prestasi2" class="form-control" placeholder="input prestasi anda">
    </div>
    <div class="col">
      <label></label>
      <input type="text"  name="prestasi3" class="form-control" placeholder="input prestasi anda">
    </div>
  
        <p ><h4 class="text-center">Data Pendidikan</h4></p>
      
  <div class="row">
    <div class="col">
      <label>Riwayat Pendidikan</label>
      <input type="text"  name="riwayat_pendik1" class="form-control" placeholder="input nama tk/ra anda">
    </div>
    <div class="col">
      <label>Tahun Lulus</label>
      <input type="date"  name="tahun_lulus1" class="form-control" placeholder="input tahun lulus anda">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label></label>
      <input type="text"  name="riwayat_pendik2" class="form-control" placeholder="input nama sd/mi anda">
    </div>
    <div class="col">
      <label></label>
      <input type="date"  name="tahun_lulus2" class="form-control" placeholder="input tahun lulus anda">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label></label>
      <input type="text"  name="riwayat_pendik3" class="form-control" placeholder="input nama smp/mts anda">
    </div>
    <div class="col">
      <label></label>
      <input type="date"  name="tahun_lulus3" class="form-control" placeholder="input tahun lulus anda">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label></label>
      <input type="text"  name="riwayat_pendik4" class="form-control" placeholder="input nama sma/smk/ma anda">
    </div>
    <div class="col">
      <label></label>
      <input type="date"  name="tahun_lulus4" class="form-control" placeholder="input tahun lulus anda">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label></label>
      <input type="text"  name="riwayat_pendik5" class="form-control" placeholder="input nama perguruan tinggi anda">
    </div>
    <div class="col">
      <label></label>
      <input type="date"  name="tahun_lulus5" class="form-control" placeholder="input tahun lulus anda">
    </div>
  </div>

        <div class="container mt-4">
        <button type="submit" class="btn btn-default" style="background-color:  #98FB98;" name="tambah">Simpan</button>
        <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
        </div>

    </form>
  </div>
</div>
<!-- Akhir Card Form -->
           
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
