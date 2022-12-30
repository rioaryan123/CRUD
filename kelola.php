<!DOCTYPE html>

<?php
    include 'koneksi.php';

    $no = '';
    $nim = '';
    $nama_mahasiswa = '';
    $jenis_kelamin = '';
    $alamat = '';
    
    if(isset($_GET['ubah'])){
        $no=$_GET['ubah'];
        $query="SELECT * FROM tb_mahasiswa WHERE no = '$no';";
        $sql=mysqli_query($conn, $query);
        $result=mysqli_fetch_assoc($sql);
        $nim=$result['nim'];
        $nama_mahasiswa=$result['nama_mahasiswa'];
        $jenis_kelamin=$result['jenis_kelamin'];
        $alamat=$result['alamat'];
    }

?>

<html>
    <head>
        <meta charset="utf-8">
        <!-----bootstrap-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-----bootstrap-->
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
        <title>
            Tugas CRUD
        </title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light mb-5">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                CRUD
              </a>
            </div>
        </nav>
            <div class="container">
                <form method="POST" action="proses.php" enctype="multipart/form-data">
                    <input type="text" value="<?php echo $no;?>" name="no">
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label"> NIM </label>
                    <div class="col-sm-10">
                      <input type="text" required name="nim" class="form-control" id="nim" placeholder="ex : 312110471" value="<?php echo $nim; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label"> NAMA SISWA </label>
                    <div class="col-sm-10">
                      <input type="text" required name="nama"class="form-control" id="nama" placeholder="ex : JONATAN" value="<?php echo $nama_mahasiswa; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jkel" class="col-sm-2 col-form-label"> JENIS KELAMIN </label>
                    <div class="col-sm-10">
                        <select id="jkel" required name="jenis_kelamin" class="form-select">
                            <option <?php if($jenis_kelamin=='LAKI-LAKI'){echo"selected";}?>value="LAKI-LAKI">LAKI-LAKI</option>
                            <option <?php if($jenis_kelamin=='LAKI-LAKI'){echo"selected";}?>value="PEREMPUAN">PEREMPUAN</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">ALAMAT</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" required name="alamat" id="alamat" rows="3" placeholder="ex : BEKASI" value="<?php echo $alamat; ?>"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="foto" class="col-sm-2 col-form-label"> FOTO MAHASISWA </label>
                    <div class="col-sm-10">
                    <input class="form-control" required name="foto" type="file" id="foto" accept="image/*">
                    </div>
                </div>

                <div class="mb-3 row mt-4 container text-center ">
                    <div class="col ce">
                        <?php
                            if(isset($_GET['ubah'])){
                        ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-success">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Simpan perubahan</button>
                        <?php
                            } else {
                        ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-success">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Tambahkan</button>
                        <?php
                            }
                        ?>
                        <a href="index.php" type="button" class="btn btn-warning">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        Batal</a>
                    </div>
                </div>
                </form>
            </div>

    </body>
</html>