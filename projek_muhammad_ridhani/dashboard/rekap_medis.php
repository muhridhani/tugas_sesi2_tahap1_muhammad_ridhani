    <h1><i class='bx bx-folder' ></i> Rekap Medis</h1>
    <br><hr>

    <?php
    if($role=='Dokter'){
        include ("rekap_medis_dokter.php");
    }else{
        include ("rekap_medis_pasien.php");
    }
    ?>