<?php

    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil di tambahkan atau tidak
        if(ubahDataDiri($_POST) > 0 ) {
            echo "<script>
                    popup.alert(
                        {content : '<center>Data berhasil diubah</center>'},
                        function(param){
                            if(param.proceed){
                                window.location = '" . base_url('dashboard/index.php?tampil=pengaturan') . "';
                            }
                        }
                    );
                </script>";
        } else {
            echo "<script>
                    popup.alert(
                        {content : '<center>Data gagal diubah</center>'},
                        function(param){
                            if(param.proceed){
                                window.location = '" . base_url('dashboard/index.php?tampil=pengaturan') . "';
                            }
                        }
                    );
                </script>";
        }
    }

    if( isset($_GET["pesan"]) ) {
        echo "<script>
            popup.alert(
                {content : '<center>Password berhasil direset dengan sandi=123456</center>'},
            );
        </script>";
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
    <input type="hidden" value="<?= base_url() ?>" id="url">
    <select class="drop drop2" id="jenis" name="jenis">
        <option value="Dokter" >Dokter</option>
        <option value="Pasien" >Pasien</option>
    </select>
    <br>
    <input type="text" class="inTambah" id="keyword" name="keyword" size="40" autofocus="true" style="margin-top:10px" placeholder="Masukkan keyword pencarian" autocomplete="true">
</form>

<div id="datanya"></div>


<script src="<?= base_url('assert/js/cari_user.js') ?>"></script>
