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

?>
<center>
    <nav>
        <a class="active btn" href="<?= base_url('dashboard/index.php?tampil=pengaturan')?>"><h3  >Data Diri</h3></a>
        <a class="btn" href="<?= base_url('dashboard/index.php?tampil=pengaturan_reset')?>"><h3  >Ganti Password</h3></a>
    </nav>
    <hr>
</center>

<br>
<form action="" method="post">
    <?php 
        if($role=='Pasien'){
            $id = $user[0]['id_pasien'];
        }else{
            $id = $user[0]['id_dokter'];
        }
    ?>
    <input type="hidden" value="<?= $id; ?>" name="id">
    <input type="hidden" value="<?= $role; ?>" name="role">
    <input type="hidden" value="<?= $user[0]['nik']; ?>" name="nik">
    <table class="tabel2 tbltidak">
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><input id="nik" class="inTambah" type="text" value="<?= $user[0]['nik']; ?>" name="nikk"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input id="nama" class="inTambah" type="text" value="<?= $user[0]['nama']; ?>" name="nama" required></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea id="alamat" class="inTambah" value="" name="alamat" required><?= $user[0]['alamat']; ?></textarea></td>
        </tr>
        <tr id="isiakt">
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <select class="drop drop2" id="" name="jenis">
                    <option value="Laki-laki" <?php if($user[0]['jenis_kelamin'] == 'Laki-laki'){echo 'selected';} ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($user[0]['jenis_kelamin'] == 'Perempuan'){echo 'selected';} ?>>Perempuan</option>
                </select>
            </td>
        </tr>
    </table>
    <center>
        <button class="btn simpan" name="submit">Simpan Perubahan</button>
    </center>
</form>
