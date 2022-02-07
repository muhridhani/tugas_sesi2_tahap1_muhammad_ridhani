    
    <h1><i class='bx bxs-capsule'></i> Data Obat</h1>
    <br><hr><br>
    <?php 
        $user =query("SELECT * FROM tb_obat ORDER BY nama_obat");
    ?>

    <a href="<?= base_url('admin/index.php?tampil=tambah_data_obat');?>" class="btn simpan" name="submit"><i class="fas fa-plus"></i> Tambah Obat</a>
    <div style="clear:both"></div>
    <br>

    <table cellpadding="10" cellspacing="0" style="width:100%; text-align:center; border-collapse: collapse; " >
        <tr>
            <th width="5%">No.</th>
            <th width="20%">Nama Obat</th>
            <th width="40%">Keterangan</th>
            <th width="10%">Harga</th>
            <th width="10%">Stok</th>
            <th width="30%">Aksi</th>
        </tr>

        <?php $i=1; ?>
        <?php foreach($user as $row) : ?> 
        <tr>
            <td><?= $i ?></td>
            <td><?= $row['nama_obat'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td>Rp. <?= $row['harga'] ?></td>
            <td><?= $row['stok'] ?></td>
            <td>
                <a href="<?= base_url('admin/index.php?tampil=edit_data_obat&id=' . $row['id_obat']);?>" class="btn simpan res1" name="submit"><i class="far fa-edit"></i> Edit</a>
                <a href="#" class="btn simpan res" name="submit" onclick="hapus('<?= $row['id_obat'] ?>')"><i class="far fa-trash-alt"></i> Hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>


    <script>
        function hapus(id){
            popup.confirm(
                { content : '<center>Yakin ingin Hapus?</center>'},
                function(param){
                    if(param.proceed){
                        
                        window.location.href = 'hapus_data_obat.php?id='+id;
                    }
                }
            );
            document.getElementById('btn_ok_1').innerHTML = `YA`;
            document.getElementById('btn_cancel_1').innerHTML = `TIDAK`;  
        }
    </script>