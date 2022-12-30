<?php
    include 'koneksi.php';

    if(isset($_POST['aksi'])){
    if ($_POST['aksi'] == "add"){
        //var_dump($_POST);
        //var_dump($_FILES);
        //die();

        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $foto = $_FILES['foto']['name'];
        $alamat = $_POST['alamat'];

        $dir = "img/";
        $tmpFile = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmpFile, $dir . $foto);

        $query = "INSERT INTO tb_mahasiswa VALUES(null,'$nim','$nama','$jenis_kelamin','$alamat','$foto')";
        $sql = mysqli_query($conn, $query);
        if($sql){
            header("location: index.php");
        }
        else{
            echo $query;
        } 
        
        //echo $nim . " | " . $nama . " | " . $jenis_kelamin . " | " . $foto . " | " . $alamat;
        //echo "Tambah data <a href = 'index.php'>[home]</a>";
    } 
    else if($_POST['aksi'] =="edit"){
        echo "Edit data <a href = 'index.php'>[home]</a>";
        }
    }
    if (isset($_GET['hapus'])) {
        $no = $_GET['hapus'];
        $queryShow = "SELECT*FROM tb_mahasiswa WHERE no ='$no';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);
        //var_dump($result);
        unlink("img/" . $result['foto']);
        

        $query = "DELETE FROM tb_mahasiswa WHERE no ='$no';";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            header("location: index.php");
        } else {
            echo $query;

            //echo "Hapus data <a href='index.php'>[home]</a>";
        }
    }
?>