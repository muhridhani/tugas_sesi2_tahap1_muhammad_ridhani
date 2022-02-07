<?php

    if (isset($_GET['tampil'])) {
        $tampil = $_GET['tampil'];
    }else {
      if($role == 'Dokter'){
        $tampil = "pasien";
      }else{
        $tampil = "rekap_medis";
      }
    };

?>




  <div class="sidebar">
    <div class="logo-details">
        <i class="fas fa-user-nurse iconn"></i>
        <div class="logo_name">Poliklinik</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <?php if($role == 'Dokter') : ?>
      <li>
        <a href="<?= base_url('dashboard/index.php?tampil=pasien');?>" class="<?php if($tampil == 'pasien'){echo "aktif";} ?>">
        <i class="fas fa-user-nurse"></i>
          <span class="links_name">Pasien</span>
        </a>
        <span class="tooltip">Pasien</span>
      </li>
      <li>
      <a href="<?= base_url('dashboard/index.php?tampil=data_penyakit');?>" class="<?php if($tampil == 'data_penyakit'){echo "aktif";} ?>">
        <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="links_name">Data Penyakit</span>
        </a>
        <span class="tooltip">Data Penyakit</span>
      </li>
      <?php endif ?>
      <li>
      <a href="<?= base_url('dashboard/index.php?tampil=rekap_medis');?>" class="<?php if($tampil == 'rekap_medis' || $tampil == 'rekap_medis_pasien' || $tampil == 'rekap_medis_dokter' || $tampil == 'rekap_medis_list_detail'){echo "aktif";} ?>">
        <i class='bx bx-folder' ></i>
          <span class="links_name">Rekap Medis</span>
        </a>
        <span class="tooltip">Rekap Medis</span>
      </li>
      <li>
      <a href="<?= base_url('dashboard/index.php?tampil=pengaturan');?>" class="<?php if($tampil == 'pengaturan'|| $tampil == 'pengaturan_reset' ){echo "aktif";} ?>">
          <i class='bx bx-cog' ></i>
          <span class="links_name">Pengaturan</span>
        </a>
        <span class="tooltip">Pengaturan</span>
      </li>
      <li class="profile">
          <div class="profile-details">
            <div class="name_job">
              <div class="name"><?= $user[0]['nama']; ?></div>
              <div class="job"><?= $role ?></div>
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
        echo "window.location='".base_url('dashboard/logout.php')."';";  
      ?>
    }
  </script>

