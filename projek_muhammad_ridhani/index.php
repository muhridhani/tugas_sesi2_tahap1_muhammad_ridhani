<?php
    require_once "config/functions.php";

    session_start ();
    if(isset($_SESSION["user"])) {
        echo "<script>window.location='".base_url('dashboard/')."';</script>";
        exit;
    }else{
        echo "<script>window.location='".base_url('auth/login.php')."';</script>";
        exit;
    }

?>
