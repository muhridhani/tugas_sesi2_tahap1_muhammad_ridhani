    <h1><i class='bx bx-folder' ></i> Rekap Medis Detail</h1>
    <br><hr>

    <?php 
        $id= $_GET['id'];
        $rm =query("SELECT * FROM tb_rekammedis WHERE id_rm='$id'");

        $id_pasien= $rm[0]['id_pasien'];
        $pasien =query("SELECT * FROM tb_pasein WHERE id_pasien='$id_pasien'");

        $bayar =query("SELECT * FROM tb_pembayaran WHERE id_rm='$id'");
        $obat =query("SELECT * FROM tb_obat_rm WHERE id_rm='$id'");
    ?>

    <br>
    <a href="<?= base_url('dashboard/index.php?tampil=rekap_medis');?>" class="btn simpan" name="submit"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            <tr>
                <td>STATUS</td>
                <td>:</td>
                <td><?= $bayar[0]['status'] ?></td>
            </tr>


        </table>
    </div>
