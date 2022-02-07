    <?php
        
        if( isset($_POST["submit"]) ) {
            // cek apakah data berhasil di tambahkan atau tidak
            if(tambahRekapMedis($_POST) > 0 ) {
                echo "<script>
                        popup.alert(
                            {content : '<center>Data berhasil ditambah</center>'},
                            function(param){
                                if(param.proceed){
                                    window.location = '" . base_url('dashboard/index.php?tampil=rekap_medis') . "';
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
                                    window.location = '" . base_url('dashboard/index.php?tampil=pasien') . "';
                                }
                            }
                        );
                    </script>";
            }
            // var_dump(tambahRekapMedis($_POST));
        }

    ?>
    
    <h1><i class="fas fa-user-nurse"></i> Pasein</h1>
    <br><hr>
    <?php 
        $user =query("SELECT * FROM tb_pasein ORDER BY nama");
        $obat =query("SELECT * FROM tb_obat ORDER BY nama_obat");
    ?>

    <div class="login dashboard">
        <form action="" method="post">
            <input type="hidden" name="id_dokter" value="<?= $token ?>">
            <table class="tabel2 tbltidak">
                <tr>
                    <td>Pasien</td>
                    <td>:</td>
                    <td>
                        <select class="drop drop2" id="" name="pasien">
                            <option value="0" hidden>Pilih Pasien</option>
                            <?php foreach($user as $row) : ?> 
                                <option value="<?= $row['id_pasien'] ?>" > <?= $row['nama'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Keluhan</td>
                    <td>:</td>
                    <td><textarea id="keluahan" class="inTambah tt" value="" name="keluahan" required></textarea></td>
                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>:</td>
                    <td><textarea id="diagnosa" class="inTambah tt" value="" name="diagnosa" required></textarea></td>
                </tr>
                <td>Obat</td>
                    <td>:</td>
                    <td>
                        <select class="drop drop2" id="" name="obat[]" multiple>
                            <option value="0" hidden>Pilih Obat</option>
                            <?php foreach($obat as $row) : ?> 
                                <option value="<?= $row['id_obat'] ?>" > <?= $row['nama_obat'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><input id="tanggal" class="inTambah" type="date" value="<?= date('Y-m-d') ?>" name="tanggal" required></td>
                </tr>
            </table>
            <center>
                <button class="btn simpan" name="submit">Simpan</button>
            </center>
        </form>
    </div>