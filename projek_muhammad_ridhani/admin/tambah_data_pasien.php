<?php
    
    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil di tambahkan atau tidak
        if(tambahDataPasien($_POST) > 0 ) {
            echo "<script>
                    popup.alert(
                        {content : '<center>Data berhasil ditambah</center>'},
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
                        {content : '<center>Data gagal ditambah</center>'},
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


<h1><i class='bx bx-user' ></i> Tambah Data Pasien</h1>
<br><hr><br>

<a href="<?= base_url('admin/index.php?tampil=data_pasien');?>" class="btn simpan" name="submit"><i class="fas fa-arrow-left"></i> Kembali</a>
<div style="clear:both"></div>
<br>

<br>
<div class="login dashboard tbltidak">
    <form action="" method="post">
        <input type="hidden" value="Pasien" name="role">
        <input type="hidden" value="123456" name="password">
        <table class="tabel2">
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><input id="nik" class="inTambah" type="text" value="" name="nik"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input id="nama" class="inTambah" type="text" value="" name="nama" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea id="alamat" class="inTambah" value="" name="alamat" required></textarea></td>
            </tr>
            <tr id="isiakt">
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select class="drop drop2" id="" name="jenis">
                        <option value="Laki-laki" >Laki-laki</option>
                        <option value="Perempuan" >Perempuan</option>
                    </select>
                </td>
            </tr>
        </table>
        <center>
            <button class="btn simpan" name="submit">Tambah Data</button>
        </center>
    </form>
</div>