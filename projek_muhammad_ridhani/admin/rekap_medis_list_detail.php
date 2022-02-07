    <?php
    
    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil di tambahkan atau tidak
        if(bayar($_POST) > 0 ) {
            echo "<script>
                    popup.alert(
                        {content : '<center>Pembayaran berhasil</center>'},
                        function(param){
                            if(param.proceed){
                                window.location = '" . base_url('admin/index.php?tampil=data_penjualan') . "';
                            }
                        }
                    );
                </script>";
        } else {
            echo "<script>
                    popup.alert(
                        {content : '<center>Pembayaran gagal</center>'},
                        function(param){
                            if(param.proceed){
                                window.location = '" . base_url('admin/index.php?tampil=data_penjualan') . "';
                            }
                        }
                    );
                </script>";
        }
        // var_dump(bayar($_POST));
    }

?>
    
    <h1><i class='bx bx-folder' ></i> Rekap Medis Detail</h1>
    <br><hr>

    <?php 
        $id= $_GET['id'];
        $rm =query("SELECT * FROM tb_rekammedis WHERE id_rm='$id'");

        $id_pasien= $rm[0]['id_pasien'];
        $pasien =query("SELECT * FROM tb_pasein WHERE id_pasien='$id_pasien'");

        $bayar =query("SELECT * FROM tb_pembayaran WHERE id_rm='$id'");
        $obat =query("SELECT * FROM tb_obat_rm WHERE id_rm='$id'");

        $status = $bayar[0]['status'];
    ?>

    <br>
    <a href="<?= base_url('admin/index.php?tampil=data_penjualan');?>" class="btn simpan" ><i class="fas fa-arrow-left"></i> Kembali</a>
    <div style="clear:both"></div>
    <br>


    <div class="login dashboard gg">
        <table class="tabel2 bb" >
            <tr>
                <td width=32%>NAMA</td>
                <td width=4%>:</td>
                <td width=64%><?= $pasien[0]['nama'] ?></td>
            </tr>
            <tr>
                <td>TANGGAL</td>
                <td>:</td>
                <td><?= $rm[0]['tanggal'] ?></td>
            </tr>
            <tr>
                <td>KELUHAN</td>
                <td>:</td>
                <td><?= $rm[0]['keluhan'] ?></td>
            </tr>
            <tr>
                <td>DIAGNOSA</td>
                <td>:</td>
                <td><?= $rm[0]['diagnosa'] ?></td>
            </tr>
            <tr>
                <td>OBAT</td>
                <td>:</td>
                <td>
                    <?php foreach($obat as $ob){
                        $id_obt = $ob['id_obat'];
                        $obat =query("SELECT * FROM tb_obat WHERE id_obat='$id_obt'");
                        echo $obat[0]['nama_obat'] . '<br>';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>TEBUSAN</td>
                <td>:</td>
                <td>Rp. <?= $bayar[0]['harga'] ?></td>
            </tr>
            <?php
            if($status == 'Sudah Dibayar'){
            ?>
                <tr>
                    <td>PEMBAYARAN</td>
                    <td>:</td>
                    <td>Rp. <?= $bayar[0]['penbayaran'] ?></td>
                </tr>
                <tr>
                    <td>KEMBALIAN</td>
                    <td>:</td>
                    <td>Rp. <?= $bayar[0]['kembalian'] ?></td>
                </tr>
            <?php
                }
            ?>
            <tr>
                <td>STATUS</td>
                <td>:</td>
                <td><?= $bayar[0]['status'] ?></td>
            </tr>
            
        </table>
    </div>
    <br>
    <?php
        
        if($status == 'Belum dibayar'){
    ?>
            <center>
                <form action="" method="post">
                    <button type="submit" id="tmb_simpan" name="bayar" class="btn simpan">Bayar</button>
                </form>
            </center>
    <?php
        }
    ?>


    <?php 
        if(isset($_POST['bayar'])){
    ?>
        <script>
            let btn = document.getElementById('tmb_simpan');
            btn.style.display ="none";
        </script>
        <div class="login dashboard">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <table class="tabel2 tbltidak">
                    <tr>
                        <td>Pembayaran</td>
                        <td>:</td>
                        <td><input id="nik" class="inTambah" type="number" value="" name="uangnya"></td>
                    </tr>
                </table>
                <center>
                    <button class="btn simpan" name="submit">Bayar</button>
                </center>
            </form>
        </div>
    <?php
        }
    ?>