<?php
    if (isset($_GET['tampil'])) {
        $tampil = $_GET['tampil'];
    }else $tampil = "data_dokter";

    if ($tampil == "data_dokter") include("data_dokter.php");
    elseif ($tampil == "tambah_data_dokter") include("tambah_data_dokter.php");
    elseif ($tampil == "edit_data_dokter") include("edit_data_dokter.php");
    elseif ($tampil == "data_pasien") include("data_pasien.php");
    elseif ($tampil == "tambah_data_pasien") include("tambah_data_pasien.php");
    elseif ($tampil == "edit_data_pasien") include("edit_data_pasien.php");
    elseif ($tampil == "data_penyakit") include("data_penyakit.php");
    elseif ($tampil == "data_obat") include("data_obat.php");
    elseif ($tampil == "tambah_data_obat") include("tambah_data_obat.php");
    elseif ($tampil == "edit_data_obat") include("edit_data_obat.php");
    elseif ($tampil == "data_penjualan") include("data_penjualan.php");
    elseif ($tampil == "rekap_medis_list_detail") include("rekap_medis_list_detail.php");
    elseif ($tampil == "pengaturan") include("pengaturan.php");
    elseif ($tampil == "pengaturan_reset") include("pengaturan.php");
    else echo " Tidak Ada konten";
