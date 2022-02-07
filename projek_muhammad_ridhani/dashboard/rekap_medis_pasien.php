<?php 
    $user =query("SELECT * FROM tb_rekammedis WHERE id_pasien='$token' ORDER BY tanggal DESC");
?>
    <br>
    <center>
        <table cellpadding="10" cellspacing="0" style="width:80%; text-align:center; border-collapse: collapse; " >
            <tr>
                <th width="5%">No.</th>
                <th width="40%">Diagnosa</th>
                <th width="30%">Tanggal</th>
                <th width="25%">Aksi</th>
            </tr>

            <?php $i=1; ?>
            <?php foreach($user as $row) : ?> 
            <tr>
                <td><?= $i ?></td>
                <td><?= $row['diagnosa'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>
                    <a href="<?= base_url('dashboard/index.php?tampil=rekap_medis_list_detail&id=' . $row['id_rm']);?>" class="btn simpan res1" name="submit"><i class='bx bxs-user-detail'></i> Detail</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </center>