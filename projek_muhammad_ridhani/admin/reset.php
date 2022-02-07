<?php
    include "../config/functions.php";

    $id= $_GET['id'];
    $role = $_GET['jenis'];


    $password = '123456';

    $password = password_hash($password, PASSWORD_DEFAULT);

    if($role == 'Dokter'){
        $query = "UPDATE tb_dokter SET password='$password' WHERE id_dokter='$id'";
    }else{
        $query = "UPDATE tb_pasein SET password='$password' WHERE id_pasien='$id'";
    }

    
    mysqli_query ($conn, $query);
    // if(mysqli_affected_rows($conn)>0){
        echo "<script>window.location='".base_url('admin/index.php?tampil=pengaturan&pesan=berhasil')."';</script>";
    // }else{
    //     echo "<script>window.location='".base_url('admin/index.php?tampil=pengaturan&pesan=gagal')."';</script>";
    // }

?>