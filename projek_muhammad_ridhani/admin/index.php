<?php

    $_SESSION['judul']='Admin | Sistem Informasi Poliklinik';
    include ("header.php");

    session_start ();
    if( !isset($_SESSION["admin"])) {
        echo "<script>window.location='".base_url('admin/login.php')."';</script>";
        exit;
    }

    $role = 'admin';
    $token = $_SESSION['token'];

    $user =query("SELECT * FROM tb_admin WHERE id='$token'");

    include ("nav.php");
?>
    
    </body>
</html>