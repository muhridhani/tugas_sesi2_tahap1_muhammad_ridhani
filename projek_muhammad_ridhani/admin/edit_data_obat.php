<?php

    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil di tambahkan atau tidak
        if(ubahDataObat($_POST) > 0 ) {
            echo "<script>
                    popup.alert(
                        {content : '<center>Data berhasil diubah</center>'},
                        function(param){
                            if(param.proceed){
                                window.location = '" . base_url('admin/index.php?tampil=data_obat') . "';
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
                                window.location = '" . base_url('admin/index.php?tampil=data_obat') . "';
                            }
                        }
                    );
                </script>";
        }
    }

?>

    <h1><i class='bx bxs-capsule'></i> Edit Data Obat</h1>
    <br><hr><br>

    <a href="<?= base_url('admin/index.php?tampil=data_obat');?>" class="btn simpan" name="submit"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div style="clear:both"></div>
    <br>

    <br>
    <?php 
        $id_obat = $_GET['id'];
        $usernya =query("SELECT * FROM tb_obat WHERE id_obat='$id_obat';");
    ?>
    <div class="login dashboard tbltidak">
    <form action="" method="post">
        <input type="hidden" value="<?= $usernya[0]['id_obat'] ?>" name="id">
        <table class="tabel2">
            <tr>
                <td>Nama Obat</td>
                <td>:</td>
                <td><input id="nik" class="inTambah" type="text" value="<?= $usernya[0]['nama_obat'] ?>" name="nama" ></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><textarea id="alamat" class="inTambah" value="" name="ket" required><?= $usernya[0]['keterangan'] ?></textarea></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input id="nik" class="inTambah" type="number" value="<?= $usernya[0]['harga'] ?>" name="harga" ></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input id="nik" class="inTambah" type="number" value="<?= $usernya[0]['stok'] ?>" name="stok" ></td>
            </tr>
        </table>
        <center>
            <button class="btn simpan" name="submit">Ubah Data</button>
        </center>
    </form>
    </div>