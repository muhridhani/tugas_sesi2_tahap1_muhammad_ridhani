<?php
    include "../config/functions.php";

    $id= $_GET['id'];

    global $conn;
    mysqli_query($conn, "DELETE FROM tb_pasein WHERE id_pasien='$id'"); 
    header('Location: ' . base_url('admin/index.php?tampil=data_pasien'));

?>