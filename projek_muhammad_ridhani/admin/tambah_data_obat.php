<?php
    
    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil di tambahkan atau tidak
        if(tambahDataObat($_POST) > 0 ) {
            echo "<script>
                    popup.alert(
                        {content : '<center>Data berhasil ditambah</center>'},
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
                        {content : '<center>Data gagal ditambah</center>'},
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


<h1><i class='bx bxs-capsule'></i> Tambah Data Obat</h1>
<br><hr><br>

<a href="<?= base_url('admin/index.php?tampil=data_obat');?>" class="btn simpan" name="submit"><i class="fas fa-arrow-left"></i> Kembali</a>
<div style="clear:both"></div>
<br>

<br>
<div class="login dashboard tbltidak">
    <form action="" method="post">
        
        <table class="tabel2">
            <tr>
                <td>Nama Obat</td>
                <td>:</td>
                <td><input id="nik" class="inTambah" type="text" value="" name="nama"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><textarea id="alamat" class="inTambah" value="" name="ket" required></textarea></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input id="nama" class="inTambah" type="number" value="" name="harga" required></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input id="nama" class="inTambah" type="number" value="" name="stok" required></td>
            </tr>
        </table>
        <center>
            <button class="btn simpan" name="submit">Tambah Data</button>
        </center>
    </form>
</div>