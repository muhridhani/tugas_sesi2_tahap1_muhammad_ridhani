<?php
    session_start ();
    require_once "../config/functions.php";

    $_SESSION['judul']='Sistem Informasi Poliklinik';
    include ("header.php");
    
    $role = $_SESSION['role'];
    $token = $_SESSION['token'];

    if($role == 'Pasien'){
        $user =query("SELECT * FROM tb_pasein WHERE id_pasien='$token'");
    }else{
        $user =query("SELECT * FROM tb_dokter WHERE id_dokter='$token';");
    }

    
    if( !isset($_SESSION["user"])) {
        echo "<script>window.location='".base_url('auth/login.php')."';</script>";
        exit;
    }

    include ("nav.php");
?>
    
    </body>
</html>