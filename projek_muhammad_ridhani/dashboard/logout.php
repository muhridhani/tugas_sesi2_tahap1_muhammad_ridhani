<?php
    require_once "../config/functions.php";

    session_start();
    session_unset ();
    $_SESSION = [];
    session_destroy();

    setcookie('id', '', time() -360000);
    setcookie('key', '', time () - 360000);

    header ("Location:" . base_url('auth/login.php'));
    exit;

?>