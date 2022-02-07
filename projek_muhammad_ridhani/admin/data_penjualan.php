    <h1><i class='bx bx-cart-alt' ></i> Data Penjualan</h1>
    <br><hr>

    <?php 
        $user =query("SELECT * FROM tb_rekammedis ORDER BY tanggal DESC");
    ?>
    <br>
    <center>
        <table cellpadding="10" cellspacing="0" style="width:80%; text-align:center; border-collapse: collapse; " >
            <tr>
                <th width="5%">No.</th>
                <th width="40%">Nama</th>
                <th width="30%">Tanggal</th>
                <th width="25%">Aksi</th>
            </tr>

            <?php $i=1; ?>
            <?php foreach($user as $row) : ?> 
            <tr>
                <td><?= $i ?></td>
                <?php 
                    $id_pasien = $row['id_pasien'];
                    $nama =query("SELECT * FROM tb_pasein WHERE id_pasien='$id_pasien'");
                ?>
                <td><?= $nama[0]['nama'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>
                    <a href="<?= base_url('admin/index.php?tampil=rekap_medis_list_detail&id=' . $row['id_rm']);?>" class="btn simpan res1" name="submit"><i class='bx bxs-user-detail'></i> Detail</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </center>