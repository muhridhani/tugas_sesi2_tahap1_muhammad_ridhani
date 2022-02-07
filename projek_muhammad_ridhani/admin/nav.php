<?php
    if (isset($_GET['tampil'])) {
        $tampil = $_GET['tampil'];
    }else {
      $tampil = "data_dokter";
    };
?>


  <div class="sidebar">
    <div class="logo-details">
        <i class="fas fa-user-nurse iconn"></i>
        <div class="logo_name">Poliklinik</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="<?= base_url('admin/index.php?tampil=data_dokter');?>" class="<?php if($tampil == 'data_dokter' || $tampil == 'tambah_data_dokter' || $tampil == 'edit_data_dokter'){echo "aktif";} ?>">
          <i class="fas fa-user-nurse"></i>
          <span class="links_name">Data Dokter</span>
        </a>
        <span class="tooltip">Data Dokter</span>
      </li>
      <li>
      <a href="<?= base_url('admin/index.php?tampil=data_pasien');?>" class="<?php if($tampil == 'data_pasien' || $tampil == 'tambah_data_pasien' || $tampil == 'edit_data_pasien'){echo "aktif";} ?>">
        <i class='bx bx-user' ></i>
        <span class="links_name">Data Pasien</span>
      </a>
      <span class="tooltip">Data Pasien</span>
    </li>
    <li>
    <a href="<?= base_url('admin/index.php?tampil=data_penyakit');?>" class="<?php if($tampil == 'data_penyakit'){echo "aktif";} ?>">
      <i class='bx bx-pie-chart-alt-2' ></i>
        <span class="links_name">Data Penyakit</span>
      </a>
      <span class="tooltip">Data Penyakit</span>
    </li>
    <li>
    <a href="<?= base_url('admin/index.php?tampil=data_obat');?>" class="<?php if($tampil == 'data_obat' || $tampil == 'tambah_data_obat' || $tampil == 'edit_data_obat'){echo "aktif";} ?>">
        <i class='bx bxs-capsule'></i>
        <span class="links_name">Data Obat</span>
      </a>
      <span class="tooltip">Data Obat</span>
    </li>
    <li>
    <a href="<?= base_url('admin/index.php?tampil=data_penjualan');?>" class="<?php if($tampil == 'data_penjualan' || $tampil == 'rekap_medis_list_detail'){echo "aktif";} ?>">
        <i class='bx bx-cart-alt' ></i>
        <span class="links_name">Penjualan Obat</span>
      </a>
      <span class="tooltip">Penjualan Obat</span>
    </li>
    <li>
    <a href="<?= base_url('admin/index.php?tampil=pengaturan');?>" class="<?php if($tampil == 'pengaturan' || $tampil== 'pengaturan_reset'){echo "aktif";} ?>">
        <i class='bx bx-cog' ></i>
        <span class="links_name">Pengaturan</span>
      </a>
      <span class="tooltip">Pengaturan</span>
    </li>
    <li class="profile">
        <div class="profile-details">
          <div class="name_job">
            <div class="name">Admin</div>
          </div>
        </div>
          <i class='bx bx-log-out' id="log_out" onclick="logout()"></i>
    </li>
    </ul>
  </div>
  <section class="home-section">
      <div class="content">
        <?php include("konten.php") ?>
      </div>
  </section>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("open");
      sidebar.classList.toggle("full");
      menuBtnChange();//calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
    if(sidebar.classList.contains("open")){
      closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
    }else {
      closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
    }
    }

    function logout(){
      <?php 
        echo "window.location='".base_url('admin/logout.php')."';";  
      ?>
    }
  </script>

