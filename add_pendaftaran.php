<?php

include_once("connection.php");

if ($_POST) {
    $file_upload = $_FILES['berkas'];

    if($file_upload['name'] != "") {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $hp = $_POST['hp'];
        $semester = $_POST['semester'];
        $ipk = $_POST['ipk'];
        $beasiswa = $_POST['beasiswa'];
        $status = "belum di verifikasi";
        $berkas = $file_upload['name'];

        //perintah sql tambah data

        $result = mysqli_query($conn, "INSERT INTO pendaftar_beasiswa(nama,email,hp,semester,ipk,beasiswa,berkas,status) values ('$nama','$email','$hp','$semester','$ipk','$beasiswa','$berkas','$status')");

        //built in function php untuk upload 
        move_uploaded_file(
            $file_upload['tmp_name'],
            __DIR__ . "/upload/" . $berkas
        );

        header("Location: index.php?link_page=3");
    }
}