<?php
    include "../config/functions.php";

    $id= $_GET['id'];

    global $conn;
    mysqli_query($conn, "DELETE FROM tb_obat WHERE id_obat='$id'"); 
    header('Location: ' . base_url('admin/index.php?tampil=data_obat'));

?>