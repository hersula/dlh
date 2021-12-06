 <!-- Sidenav -->


 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="<?= base_url('')?>/assets/icon/icon_dlh.png" class="navbar-brand-img" alt="...">
          <span> DLH Kab Bekasi</span>
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item border ">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="navbar-examples">
                <i class="ni ni-circle-08 text-primary"></i>
                <span class="nav-link-text"><?= user()->name?></span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url('logout')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> L </span>
                      <span class="sidenav-normal"> Logout </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item <?= $menu == 'pengumuman' ? 'active' : ''?>">
              <a class="nav-link" href="<?= base_url('pengumuman')?>">
                <i class="ni ni-notification-70 text-primary"></i>
                <span class="nav-link-text">Pengumuman</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="<?= $menu == 'dashboard' ? 'true' : 'false'?>"
                aria-controls="navbar-forms">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
              <div class="collapse <?= $menu == 'dashboard' ? 'show' : ''?>" id="navbar-forms">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item <?= $submenu == 'maps' ? 'active' : ''?>">
                    <a href="<?= base_url('maps')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> M </span>
                      <span class="sidenav-normal"> Maps </span>
                    </a>
                  </li>
                  <?php
                
                  if(in_groups('development') || in_groups('superadmin') || in_groups('admin_dlh')){?>
                  <li class="nav-item <?= $submenu == 'overview' ? 'active' : ''?>">
                    <a href="<?= base_url('admin/dashboard')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> O </span>
                      <span class="sidenav-normal"> Overview </span>
                    </a>
                  </li>
                  <?php }else{?>
                    <li class="nav-item <?= $submenu == 'overview' ? 'active' : ''?>">
                    <a href="<?= base_url('user/dashboard')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> O </span>
                      <span class="sidenav-normal"> Overview </span>
                    </a>
                  </li>
                  <?php }?>
                </ul>
              </div>
            </li>

            <?php 
              if(!in_groups('admin_dlh')){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="<?= $menu == 'data masuk' ? 'true' : 'false'?>"
                aria-controls="navbar-tables">
                <i class="ni ni-collection text-default"></i>
                <span class="nav-link-text">Data Pelaporan Harian</span>
              </a>
              <div class="collapse <?= $menu == 'data masuk' ? 'show' : ''?>" id="navbar-tables">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item <?= $submenu == 'data harian' ? 'active' : ''?>">
                    <a href="<?=base_url('data-harian')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> H </span>
                      <span class="sidenav-normal"> Data Harian </span>
                    </a>
                  </li>

                </ul>
              </div>
            </li>
            

           
            <li class="nav-item">
              <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="<?= $menu == 'data analisa' ? 'true' : 'false'?>"
                aria-controls="navbar-maps">
                <i class="ni ni-map-big text-primary"></i>
                <span class="nav-link-text">Data Pelaporan Bulanan</span>
              </a>
              <div class="collapse <?= $menu == 'data analisa' ? 'show' : ''?>" id="navbar-maps">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item <?= $submenu == 'data inlet' ? 'active' : ''?>">
                    <a href="<?= base_url('analisa-inlet')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> IN </span>
                      <span class="sidenav-normal"> INLET </span>
                    </a>
                  </li>
                  <li class="nav-item <?= $submenu == 'data outlet' ? 'active' : ''?>">
                    <a href="<?= base_url('analisa-outlet')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> OUT </span>
                      <span class="sidenav-normal"> OUTLET </span>
                    </a>
                  </li>
                  <li class="nav-item <?= $submenu == 'data outfall' ? 'active' : ''?>">
                    <a href="<?= base_url('analisa-outfall')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> OUTF </span>
                      <span class="sidenav-normal"> OUTFALL </span>
                    </a>
                  </li>
                  
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="<?= $menu == 'data analisa' ? 'true' : 'false'?>"
                aria-controls="navbar-maps">
                <i class="ni ni-map-big text-primary"></i>
                <span class="nav-link-text">Data Analisa Badan Air Permukaan</span>
              </a>
              <div class="collapse <?= $menu == 'data analisa' ? 'show' : ''?>" id="navbar-maps">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item <?= $submenu == 'data upstream' ? 'active' : ''?>">
                    <a href="<?= base_url('analisa-upstream')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> UPS </span>
                      <span class="sidenav-normal"> UPSTREAM </span>
                    </a>
                  </li>
                  <li class="nav-item <?= $submenu == 'data downstream' ? 'active' : ''?>">
                    <a href="<?= base_url('analisa-downstream')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> DOWN </span>
                      <span class="sidenav-normal"> DOWNSTREAM </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item <?= $submenu == 'pengajuan pelaporan' ? 'active' : ''?>">
              <a class="nav-link"
                href="<?= base_url('pengajuan-pelaporan')?>">
                <i class="ni ni-paper-diploma text-primary"></i>
                <span class="nav-link-text">Pengajuan Pelaporan</span>
              </a>
            </li>
            <li class="nav-item <?= $submenu == 'User WWTP' ? 'active' : ''?>">
              <a class="nav-link"
                href="<?= base_url('admin/titik_penaatan')?>">
                <i class="ni ni-paper-diploma text-primary"></i>
                <span class="nav-link-text">Perizinan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-early" data-toggle="collapse" role="button" aria-expanded="<?= $menu == 'peringatan industri' ? 'true' : 'false'?>"
                aria-controls="navbar-early">
                <i class="ni ni-sound-wave text-primary"></i>
                <span class="nav-link-text">Peringatan Industri</span>
              </a>
              <div class="collapse <?= $menu == 'peringatan industri' ? 'show' : ''?>" id="navbar-early">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item <?= $submenu == 'pelaporan peringatan' ? 'active' : ''?>">
                    <a href="<?= base_url('pelaporan-peringatan')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal"> Waktu Pelaporan </span>
                    </a>
                  </li>
                  <li class="nav-item <?= $submenu == 'bml peringatan' ? 'active' : ''?>">
                    <a href="<?= base_url('bml-peringatan')?>" class="nav-link">
                      <span class="sidenav-mini-icon"> BML </span>
                      <span class="sidenav-normal"> BML </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/tables/sortable.html" class="nav-link">
                      <span class="sidenav-mini-icon"> VOL </span>
                      <span class="sidenav-normal"> Volume </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/tables/sortable.html" class="nav-link">
                      <span class="sidenav-mini-icon"> PAB </span>
                      <span class="sidenav-normal"> Pemakain Air Bersih </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <?php }?>
          </ul>
          <?php 
          
            if(in_groups('development') || in_groups('admin_dlh') || in_groups('superadmin')):
          ?>
          <!-- HALAMAN ADMIN -->
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Admin Panel</span>
            <span class="docs-mini">AP</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item <?= $submenu == 'data user' ? 'active' : ''?>">
              <a class="nav-link"
                href="<?= base_url('data_user')?>">
                <i class="ni ni-single-02 text-primary"></i>
                <span class="nav-link-text">Data User</span>
              </a>
            </li>

            <li class="nav-item <?= $submenu == 'data industri' ? 'active' : ''?>">
              <a class="nav-link" href="<?= base_url('data-industri')?>">
                <i class="ni ni-ui-04 text-primary"></i>
                <span class="nav-link-text">Industri</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-validasiData" data-toggle="collapse" role="button" aria-expanded="<?= $menu == 'validasi data' ? 'true' : 'false'?>"
                aria-controls="navbar-validasiData">
                <i class="ni ni-check-bold text-primary"></i>
                <span class="nav-link-text">Validasi Data</span>
              </a>
              <div class="collapse <?= $menu == 'validasi data' ? 'show' : ''?>" id="navbar-validasiData">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item <?= $submenu == 'validasi pendaftaran' ? 'active' : ''?>">
                    <a class="nav-link"
                      href="<?= base_url('admin/validasi-pendaftaran')?>"
                      >
                      <span class="sidenav-mini-icon">P </span>
                      <span class="nav-link-text">Pendaftaran</span>
                    </a>
                  </li>

                  <li class="nav-item <?= $submenu == 'validasi pendaftaran wwtp' ? 'active' : ''?>">
                    <a class="nav-link"
                      href="<?= base_url('admin/validasi-pendaftaran-wwtp')?>"
                      >
                      <span class="sidenav-mini-icon">PW </span>
                      <span class="nav-link-text">Pendaftaran WWTP</span>
                    </a>
                  </li>

                  <li class="nav-item <?= $submenu == 'validasi data laporan' ? 'active' : ''?>">
                    <a class="nav-link"
                      href="<?= base_url('validasi-laporan')?>"
                      >
                      <span class="sidenav-mini-icon">P </span>
                      <span class="nav-link-text">Laporan Industri</span>
                    </a>
                  </li>
                  
                </ul>
              </div>
            </li>
          </ul>
          <!-- END HALAMAN ADMIN -->
          <?php endif;?>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Dokumentasi Dan Support</span>
            <span class="docs-mini">D&S</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link"
                href="https://demos.creative-tim.com/argon-dashboard-pro/docs/getting-started/overview.html"
                target="_blank">
                <i class="ni ni-spaceship text-primary"></i>
                <span class="nav-link-text">Getting started</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard-pro/docs/foundation/colors.html"
                target="_blank">
                <i class="ni ni-send text-primary"></i>
                <span class="nav-link-text">Support</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
