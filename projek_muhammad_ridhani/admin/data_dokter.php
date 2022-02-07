    
    <h1><i class="fas fa-user-nurse"></i> Data Dokter</h1>
    <br><hr><br>
    <?php 
        $user =query("SELECT * FROM tb_dokter ORDER BY nama");
    ?>

    <a href="<?= base_url('admin/index.php?tampil=tambah_data_dokter');?>" class="btn simpan" name="submit"><i class="fas fa-plus"></i> Tambah Dokter</a>
    <div style="clear:both"></div>
    <br>

    <table cellpadding="10" cellspacing="0" style="width:100%; text-align:center; border-collapse: collapse; " >
        <tr>
            <th width="5%">No.</th>
            <th width="40%">Nama</th>
            <th width="30%">Nik</th>
            <th width="35%">Aksi</th>
        </tr>

        <?php $i=1; ?>
        <?php foreach($user as $row) : ?> 
        <tr>
            <td><?= $i ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['nik'] ?></td>
            <td>
                <a href="<?= base_url('admin/index.php?tampil=edit_data_dokter&id=' . $row['id_dokter']);?>" class="btn simpan res1" name="submit"><i class="far fa-edit"></i> Edit</a>
                <a href="#" class="btn simpan res" name="submit" onclick="hapus('<?= $row['id_dokter'] ?>')"><i class="far fa-trash-alt"></i> Hapus</a>
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
                        
                        window.location.href = 'hapus_data_dokter.php?id='+id;
                    }
                }
            );
            document.getElementById('btn_ok_1').innerHTML = `YA`;
            document.getElementById('btn_cancel_1').innerHTML = `TIDAK`;  
        }
    </script>