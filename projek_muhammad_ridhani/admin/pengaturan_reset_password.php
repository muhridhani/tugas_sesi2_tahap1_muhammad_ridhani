<?php

    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil di tambahkan atau tidak
        if(ubahPassword($_POST) > 0 ) {
            echo "<script>
                    popup.alert(
                        {content : '<center>Password berhasil diubah</center>'},
                        function(param){
                            if(param.proceed){
                                window.location = '" . base_url('admin/index.php?tampil=pengaturan_reset') . "';
                            }
                        }
                    );
                </script>";
        } else {
            echo "<script>
                    popup.alert(
                        {content : '<center>Password gagal diubah</center>'},
                        function(param){
                            if(param.proceed){
                                window.location = '" . base_url('admin/index.php?tampil=pengaturan_reset') . "';
                            }
                        }
                    );
                </script>";
        }
    }

?>

<center>
    <nav>
        <a class="active btn" href="<?= base_url('admin/index.php?tampil=pengaturan')?>"><h3  >Reset Password Pengguna</h3></a>
        <a class="btn" href="<?= base_url('admin/index.php?tampil=pengaturan_reset')?>"><h3  >Ganti Password</h3></a>
    </nav>
    <hr>
</center>

<br>

<form action="" method="post">
    <?php 
        $id = $user[0]['id'];
    ?>
    <input type="hidden" value="<?= $id; ?>" name="id">
    <input type="hidden" value="Admin" name="role">
    <table class="tabel2">
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input id="password" class="inTambah" type="text" name="password" placeholder="" required></td>
        </tr>
        <tr>
            <td>Password Confirm</td>
            <td>:</td>
            <td><input id="password" class="inTambah" type="text" name="password_confirm" placeholder="" required></td>
        </tr>
    </table>
    <center>
        <button class="btn simpan" name="submit">ganti Password</button>
    </center>
</form>