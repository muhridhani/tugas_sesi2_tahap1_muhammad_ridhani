<?php
    if (isset($_GET['tampil'])) {
        $tampil = $_GET['tampil'];
    }else {
        if($role == 'Dokter'){
            $tampil = "pasien";
          }else{
            $tampil = "rekap_medis";
          }
    }

    if ($tampil == "pasien") include("pasien.php");
    elseif ($tampil == "data_penyakit") include("data_penyakit.php");
    elseif ($tampil == "rekap_medis") include("rekap_medis.php");
    elseif ($tampil == "rekap_medis_dokter") include("rekap_medis_dokter.php");
    elseif ($tampil == "rekap_medis_pasien") include("rekap_medis_pasien.php");
    elseif ($tampil == "rekap_medis_list_detail") include("rekap_medis_list_detail.php");
    elseif ($tampil == "pengaturan") include("pengaturan.php");
    elseif ($tampil == "pengaturan_reset") include("pengaturan.php");
    else echo " Tidak Ada konten";
