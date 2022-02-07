<?php
    include "../config/functions.php";

    $id= $_GET['id'];

    global $conn;
    mysqli_query($conn, "DELETE FROM tb_dokter WHERE id_dokter='$id'"); 
    header('Location: ' . base_url('admin/index.php?tampil=data_dokter'));

?>