<?php
// Koneksi ke DB & Pilih Database
require 'koneksi.php';



//tampilkan data yang akan diedit
$id = $_GET["id"];

$dt = query( "SELECT * FROM datadiris WHERE idnama = $id")[0];
$fam = query("SELECT * FROM keahlians WHERE idnama = $id");
$pen = query("SELECT * FROM pendidikans WHERE idnama = $id");


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["ubah"]) ) {
  
  // cek apakah data berhasil diubah atau tidak
  if( ubah($_POST) > 0 ) {
    echo "
      <script>
        alert('data berhasil diubah!');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('data gagal diubah!');
        document.location.href = 'index.php';
      </script>
    ";
  }


}
    
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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

<!-- Awal Card Form -->
<div class="card mt-3">
  <div class="card-header text-white" style="background-color:  #696969;">
   <h3 class="text-center">Form Update Data Karyawan</h3>
  </div>
  <div class="card-body" style="background-color:   #F5F5DC;">
    <form method="post" action="" enctype="multipart/form-data">
      <p ><h4 class="text-center">Data Diri</h4></p>
      <input type="hidden" name="idnama" value="<?= $dt["idnama"];?>">
      <input type="hidden" name="gambarLama" value="<?= $dt["gambar"];?>">
      <div class="row">     
      <div class="col">
        <label>Nama</label>
        <input type="text"  name="nama" class="form-control" placeholder="input nama anda" required value="<?= $dt["nama"];?>">
      </div>
      <div class="col">
        <label>NIK</label>
        <input type="text"  name="nik" class="form-control" placeholder="input nik anda" required value="<?= $dt["nik"];?>">
      </div>
      <div class="col">
        <label>Jenis Kelamin</label> * <?= $dt['jenisKelamin'];?>
        <select class="form-control"  name="jenisKelamin">
          <option value="<?= $dt["jenisKelamin"];?>" ><?= $dt['jenisKelamin'];?></option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      </div>
      <div class="row ">
        <label>Tanggal Lahir</label>
        <input type="date" value="<?= $dt["tanggal_lahir"];?>" name="tanggal_lahir" class="form-control" required>
      </div>
      <div class="row ">
        <label>Alamat</label>
        <textarea class="form-control" value="<?= $dt["alamat"];?>" name="alamat" placeholder="input alamat anda"><?= $dt['alamat']?></textarea> 
      </div>
      <div class="row">
            <label>Agama</label>
            <select class="form-control"  name="agama" required>
          <option value="<?= $dt["agama"];?>" ><?= $dt['agama'];?></option>
          <option value="islam">Islam</option>
          <option value="kristen protestan">Kristen Protestan</option> 
          <option value="kristen katholik">Kristen Katholik</option>
          <option value="konghucu">Konghucu</option>
          <option value="hindu">Hindu</option>
          <option value="buddha">Buddha</option>
        </select>
        </div>
      <br>
      <div class="form-group row">
      <label for="gambar">Gambar </label> <br>
        <img src="img/<?= $dt["gambar"]; ?>" width="150px" class="btn btn-sm"> <br>
        <input type="file" name="gambar" id="gambar" class="form-control btn btn-sm ">
        </div>
        <p ><h4 class="text-center">Data Keahlian</h4></p>

      <div class="row">
    <div class="col" style="padding-left: 50px;">
      <label>Keahlian</label>
      <?php for ($i = 0; $i < 3; $i++) { ?>
      <p><input type="hidden" class="form-control" style="background-color: #bcd3c7;" name="id_keahlian[]" value="<?= isset ($fam[$i]['id_keahlian'] ) ? $fam[$i]['id_keahlian'] : '' ; ?>"></p>
      <p><input type="text" class="form-control" name="nama_keahlian[]" 
        value="<?= isset ($fam[$i]['nama_keahlian']) ? $fam[$i]['nama_keahlian']  : '' ; ?>" placeholder="input nama keahlian anda"></p> 
      <?php } ?> 
   
    </div>

    <div class="col" style="padding-left: 50px;">
      <label>Prestasi</label>
      <p><input type="hidden" class="form-control"></p>
      <?php for ($i = 0; $i < 3; $i++) { ?>
      <p><input type="text" class="form-control" name="prestasi[]" 
        value="<?= isset ($fam[$i]['prestasi'] ) ? $fam[$i]['prestasi'] : '' ; ?>" placeholder="input prestasi anda"></p>   
      <?php } ?>
    </div>

  </div>

      <p ><h4 class="text-center">Data Pendidikan</h4></p>

  <div class="row">
    <div class="col" style="padding-left: 50px;">
      <label>Riwayat Pendidikan</label>
      <?php for ($i = 0; $i < sizeof($pen); $i++) { ?>
      <p><input type="hidden" class="form-control" style="background-color: #bcd3c7;" name="id_pendik[]" value="<?= isset ($pen[$i]['id_pendik'] ) ? $pen[$i]['id_pendik']: '' ; ; ?>"></p>
      <p><input type="text" class="form-control" name="riwayat_pendik[]" 
        value="<?= isset ($pen[$i]['riwayat_pendik'] ) ? $pen[$i]['riwayat_pendik']: '' ; ; ?>" required></p>  
      <?php } ?>  
    </div>

    <div class="col" style="padding-left: 50px;">
      <label>Tahun Lulus</label>
      <p><input type="hidden" class="form-control"></p>
      <?php for ($i = 0; $i < sizeof($pen); $i++) { ?>
      <p><input type="date" class="form-control" name="tahun_lulus[]" 
        value="<?= isset ($pen[$i]['tahun_lulus'] ) ? $pen[$i]['tahun_lulus']: '' ; ; ?>" required></p>  
      <?php } ?>  
    </div>

  </div>


  
      <div class="container mt-4">
      <button type="submit" class="btn btn-default" style="background-color:  #98FB98;" name="ubah">Simpan</button>
      <a href="index.php" class="btn btn-danger">Back</a>
      </div>

    </form>
    </div>
  </div>
</div>
<!-- Akhir Card Form -->
      </div><!-- /.container-fluid -->
    </div>
      
    </div>

</div>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>

