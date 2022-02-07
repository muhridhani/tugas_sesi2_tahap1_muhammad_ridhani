<?php
    require_once "../config/functions.php";

    session_start();
    session_unset ();
    $_SESSION = [];
    session_destroy();

    setcookie('id', '', time() -36000);
    setcookie('key', '', time () - 36000);

    header ("Location:" . base_url('admin/login.php'));
    exit;

?>