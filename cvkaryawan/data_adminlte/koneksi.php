<?php

// koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'testingnew');




function query($query) {
  global $conn;

  $result = mysqli_query($conn, $query);
  
  $rows = [];
  
  while( $row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
  }
  
  return $rows;

}
//akhir function koneksi





//awal tambah data

function tambah($data) {
     
     global $conn;

   $nama              = htmlspecialchars($data['nama']);
   $nik               = htmlspecialchars($data['nik']);
   $jenisKelamin      = htmlspecialchars($data['jenisKelamin']); 
   $tanggal_lahir     = htmlspecialchars($data['tanggal_lahir']);
   $alamat            = htmlspecialchars($data['alamat']);
   $agama             = htmlspecialchars($data['agama']);
   
   // $ayah           = htmlspecialchars($data['ayah']);
   // $ibu            = htmlspecialchars($data['ibu']);
   // $saudara        = htmlspecialchars($data['saudara']);
   // $riwayat_pendik = htmlspecialchars($data['riwayat_pendik']);
   // $tahun_lulus    = htmlspecialchars($data['tahun_lulus']);

   $gambar = upload();
  if( !$gambar ) {
    return false;
  }

   // query insert data tabel 1
   $simpan1 ="INSERT INTO datadiris
                VALUES
                (null, '$nama', '$nik', '$jenisKelamin', '$tanggal_lahir', '$alamat', 
                  '$agama', '$gambar')"; 
                                                                                  
    
   if ($conn->query($simpan1) == true) {
     $last_id = $conn->insert_id;
     for ($i = 1; $i <= 3 ; $i++) { 
       $keahlian = htmlspecialchars($data['nama_keahlian'.$i]);
       $prestasi = htmlspecialchars($data['prestasi'.$i]);

       if ($keahlian != '' || $prestasi != '') {
         
         $simpan2 ="INSERT INTO keahlians
                VALUES (null, '$last_id', '$keahlian', '$prestasi')";
                mysqli_query($conn, $simpan2);

                if (mysqli_affected_rows($conn)) {
        $result = mysqli_affected_rows($conn);}

       }
     }

     for ($i= 1; $i <= 5; $i++) { 
       $riwayat_pendik = htmlspecialchars($data['riwayat_pendik'.$i]);
       $tahun_lulus    = htmlspecialchars($data['tahun_lulus'.$i]);


       if ($riwayat_pendik != '' || $tahun_lulus != '') {
         
       $simpan3 ="INSERT INTO pendidikans
                VALUES(null, '$last_id', '$riwayat_pendik', '$tahun_lulus')";
       mysqli_query($conn, $simpan3);
       
       if (mysqli_affected_rows($conn)) {
        $result = mysqli_affected_rows($conn);}  

       }

     }

      }
       if (mysqli_affected_rows($conn)) {
        $result = mysqli_affected_rows($conn);}

   $conn->close();
   return $result;
}

//akhir tambah data



//awal function upload

 function upload() {

  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if( $error === 4 ) {
    echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
    echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if( $ukuranFile > 1000000 ) {
    echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  move_uploaded_file($tmpName, 'img/' . $namaFile);

  return $namaFile;
}

//akhir function upload


//awal hapus data

function hapus($id) {
  global $conn;

  //query hapus data tabel 3
  mysqli_query($conn, "DELETE FROM pendidikans WHERE idnama = $id " ) or die
  (mysqli_error($conn));

  //query hapus data tabel 2
  mysqli_query($conn, "DELETE FROM keahlians WHERE idnama = $id " ) or die 
  (mysqli_error($conn));

  //query hapus data tabel 1
  mysqli_query($conn, "DELETE FROM datadiris WHERE idnama = $id" ) or die
  (mysqli_error($conn));

  if (mysqli_affected_rows($conn)) {
        $result = mysqli_affected_rows($conn);
      }
      return $result;
   $conn->close();
}

//akhir hapus data



//awal edit data

function ubah($data) {

 global $conn;

   $id             = $data['idnama'];
   $nama           = htmlspecialchars($data['nama']);
   $nik            = htmlspecialchars($data['nik']);
   $jenisKelamin   = htmlspecialchars($data['jenisKelamin']); 
   $tanggal_lahir  = htmlspecialchars($data['tanggal_lahir']);
   $alamat         = htmlspecialchars($data['alamat']);
   $agama          = htmlspecialchars($data['agama']);
   
   $id_keahlian    = $data['id_keahlian'];
   $keahlian       = $data['nama_keahlian'];
   $prestasi       = $data['prestasi'];
   $id_pendik      = $data['id_pendik'];
   $riwayat_pendik = $data['riwayat_pendik'];
   $tahun_lulus    = $data['tahun_lulus'];

   $gambarLama     = htmlspecialchars($data['gambarLama']);
  
  // cek apakah user pilih gambar baru atau tidak
  if( $_FILES['gambar']['error'] === 4 ) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }

   // query update data tabel 1
   $edit1 = "UPDATE datadiris SET 
                   nama          = '$nama',
                   nik           = '$nik',
                   jenisKelamin  = '$jenisKelamin',
                   tanggal_lahir = '$tanggal_lahir',
                   alamat        = '$alamat',
                   agama         = '$agama',
                   gambar        = '$gambar'
             WHERE datadiris.idnama = $id";
             mysqli_query($conn, $edit1);
            $result = mysqli_affected_rows($conn);
        if ($result > 0) {
          return $result;
        }
         
      

   if ($conn->query($edit1) == true) {
     for ($i = 0; $i < 3; $i++) {

      if ($keahlian[$i] == null || $prestasi[$i] == null) {
        if ($id_keahlian[$i] > 0) {

      
        $delete = "DELETE FROM keahlians 
                   WHERE id_keahlian = $id_keahlian[$i]";
                   mysqli_query($conn, $delete) or die(mysqli_error($conn));

                   // var_dump($delete);
                   // die();
                   
                   $result = mysqli_affected_rows($conn);
                   if ($result > 0) {
                   return $result;
        }
         }
      }
      elseif ($id_keahlian[$i] > 0) {        
         // query update data tabel 2
      $edit2 = "UPDATE keahlians SET 
                    nama_keahlian = '$keahlian[$i]',
                    prestasi      = '$prestasi[$i]'
                WHERE keahlians.id_keahlian = $id_keahlian[$i]";
             mysqli_query($conn, $edit2) ;

             // var_dump($edit2);
             // die();

             $result = mysqli_affected_rows($conn);
            if ($result > 0) {
            return $result;
            } 
      }
       else {
        if (trim($keahlian[$i]) != '' ||trim($prestasi[$i]) != '') {
         
         $create ="INSERT INTO keahlians
                VALUES (null, '$id', '$keahlian[$i]', '$prestasi[$i]')";
                mysqli_query($conn, $create) or die(mysqli_error($conn));

                // var_dump($create);
                // die();

                $result = mysqli_affected_rows($conn);
                if ($result > 0) {
                return $result;
        }     

       }
      }   
     }

     for ($i = 0; $i   < sizeof($riwayat_pendik); $i++) { 

       $edit3 = "UPDATE pendidikans SET 
                    riwayat_pendik = '$riwayat_pendik[$i]',
                    tahun_lulus    = '$tahun_lulus[$i]'
                 WHERE pendidikans.id_pendik = $id_pendik[$i]"; 
        mysqli_query($conn, $edit3);


        $result = mysqli_affected_rows($conn);
        if ($result > 0) {
          return $result;
        }
      
     }
   }

        
   $result = mysqli_affected_rows($conn);
   if ($result) {
       return $result;
     }  
   $conn->close();
 
}

//akhir edit data 



//awal function cari


function cari($keyword) {
  $query1 = "SELECT * FROM datadiris
        WHERE
        nama LIKE '%$keyword%' OR
        nik LIKE '%$keyword%' OR
        jenisKelamin LIKE '%$keyword%' OR
        tanggal_lahir LIKE '%$keyword%' OR
        alamat LIKE '%$keyword%' OR
        agama LIKE '%$keyword%'
        ";    

  return query($query1);
}


//akhir function cari
      

?>