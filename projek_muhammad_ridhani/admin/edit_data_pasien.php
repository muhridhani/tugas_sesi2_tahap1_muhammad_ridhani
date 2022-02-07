<?php

    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil di tambahkan atau tidak
        if(ubahDataDiri($_POST) > 0 ) {
            echo "<script>
                    popup.alert(
                        {content : '<center>Data berhasil diubah</center>'},
                        function(param){
                            if(param.proceed){
                                window.location = '" . base_url('admin/index.php?tampil=data_pasien') . "';
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
                                window.location = '" . base_url('admin/index.php?tampil=data_pasien') . "';
                            }
                        }
                    );
                </script>";
        }
    }

?>

    <h1><i class="far fa-edit"></i> Edit Data Pasien</h1>
    <br><hr><br>

    <a href="<?= base_url('admin/index.php?tampil=pasien');?>" class="btn simpan" name="submit"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div style="clear:both"></div>
    <br>

    <br>
    <?php 
        $id_pasien = $_GET['id'];
        $usernya =query("SELECT * FROM tb_pasein WHERE id_pasien='$id_pasien';");
    ?>
    <div class="login dashboard tbltidak">
    <form action="" method="post">
        <input type="hidden" value="Pasien" name="role">
        <input type="hidden" value="<?= $usernya[0]['nik'] ?>" name="nik">
        <input type="hidden" value="<?= $usernya[0]['id_pasien'] ?>" name="id">
        <table class="tabel2">
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><input id="nik" class="inTambah" type="text" value="<?= $usernya[0]['nik'] ?>" name="nikk" disabled></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input id="nama" class="inTambah" type="text" value="<?= $usernya[0]['nama'] ?>" name="nama" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea id="alamat" class="inTambah" value="" name="alamat" required><?= $usernya[0]['alamat'] ?></textarea></td>
            </tr>
            <tr id="isiakt">
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select class="drop drop2" id="" name="jenis">
                        <option value="Laki-laki" <?php if($usernya[0]['jenis_kelamin'] == 'Laki-laki'){echo 'selected';}  ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if($usernya[0]['jenis_kelamin'] == 'Perempuan'){echo 'selected';}  ?>>Perempuan</option>
                    </select>
                </td>
            </tr>
        </table>
        <center>
            <button class="btn simpan" name="submit">Ubah Data</button>
        </center>
    </form>
    </div>