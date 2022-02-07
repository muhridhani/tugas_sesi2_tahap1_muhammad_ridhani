<?php
    require '../config/functions.php';

    $keyword = $_GET["keyword"];
    $jenis = $_GET["jenis"];
    
    if($jenis == 'Dokter'){
        $query= "SELECT * FROM tb_dokter WHERE 
                nama LIKE '%$keyword%' OR
                nik LIKE '%$keyword%'
            ";
        $user = query ($query);
    }else{
        $query= "SELECT * FROM tb_pasein WHERE 
                nama LIKE '%$keyword%' OR
                nik LIKE '%$keyword%'
            ";
        $user = query ($query);
    }
    
?>

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
    <?php
        if($jenis == 'Dokter'){
    ?>
        <td><a href="reset.php?id=<?= $row['id_dokter'] ?>&jenis=Dokter" class="btn simpan res" name="submit"><i class='bx bx-reset'></i> Reset Password</a></td>
    <?php
        }else{
    ?>
        <td><a href="reset.php?id=<?= $row['id_pasien'] ?>&jenis=Pasien" class="btn simpan res" name="submit"><i class='bx bx-reset'></i> Reset Password</a></td>
    <?php
        }
    ?>
        
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>