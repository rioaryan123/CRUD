<?php
include 'koneksi.php';
$query = "SELECT * FROM tb_mahasiswa;";
$sql = mysqli_query($conn,$query);
$no = 0;
?>
<!DOCTYPE html>
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
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                CRUD
              </a>
            </div>
          </nav>
          <!---judul-->
          <div class="container">
            <h1 class="mt-4">Data Siswa</h1>
          <figure>
            <blockquote class="blockquote">
              <p>Berisi Data Yang Telah Disimpan Di Database</p>
            </blockquote>
            <figcaption class="blockquote-footer">
            CRUD <cite title="Source Title">Create.Read.Update.Delete</cite>
            </figcaption>
          </figure>
            <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-plus" aria-hidden="true"></i>
                Tambah data
            </a>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>NO</th>
                        <th><center>NIM</center></th>
                        <th>NAMA</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>FOTO</th>
                        <th><center>AKSI</center></th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                      while($result = mysqli_fetch_assoc($sql)){
                  ?>
                    <tr>
                        <td><center><?php echo $result['no'];?>.</center></td>
                        <td><?php echo $result['nim'];?></td>
                        <td><?php echo $result['nama_mahasiswa'];?></td>
                        <td><?php echo $result['jenis_kelamin'];?></td>
                        <td><?php echo $result['alamat'];?></td>
                        <td><img src="img/<?php echo $result['foto'];?>" style="width:113px;height:151px;"></td>
                        <td><center>
                            <a href="kelola.php?ubah=<?php echo $result['no']; ?>" type="button" class="btn btn-success">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Rubah
                            </a>
                            <a href="proses.php?hapus=<?php echo $result['no']; ?>" type="button" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                Hapus
                            </a>
                            </center>
                        </td>
                    </tr>
                  <?php
                      }
                    ?>
                </tbody>
                </table>
            </div>
          </div>
    </body>
</html>