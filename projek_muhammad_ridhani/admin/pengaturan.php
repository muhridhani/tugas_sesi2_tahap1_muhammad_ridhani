
<?php 
    $tampil = $_GET['tampil'];
?>
    
    <h1><i class='bx bx-cog' ></i> Pengaturan</h1>
    <br><hr><br>

    <div class="login dashboard">

        <?php
        if($tampil=='pengaturan'){
            include ("pengaturan_reset_pengguna.php");
        }else{
            include ("pengaturan_reset_password.php");
        }
        ?>
    </div>