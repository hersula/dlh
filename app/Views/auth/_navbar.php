<nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-dark bg-primary ">
        <div class="container-fluid">
            <div class="row ml-2">
                <a class="navbar-brand" href="./pages/dashboards/dashboard.html">
                    <img src="<?= base_url('')?>/assets/icon/icon_dlh.png">
                </a>
                <div class="text-logo mt-2">
                    <h4 class="d-md-flex d-none flex-column text-white m-0 font-weight-bold">Dinas Lingkungan Hidup
                        Kabupaten Bekasi</h4>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse" style="flex: none;">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./pages/dashboards/dashboard.html">
                                <img src="<?= base_url('')?>/assets/img/brand/blue.png">
                            </a>

                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item">
                        <a href="<?= base_url('')?>" class="nav-link">
                            <span class="nav-link-inner--text">Halaman Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('register')?>" class="nav-link">
                            <span class="nav-link-inner--text">Pendaftaran</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <?php if(logged_in()){?>
                            <a href="<?= base_url('admin/dashboard')?>" class="nav-link">
                                <span class="nav-link-inner--text">Masuk</span>
                            </a>
                        <?php }else{?>
                            <a href="<?= base_url('login')?>" class="nav-link">
                                <span class="nav-link-inner--text">Masuk</span>
                            </a>
                        <?php }?>
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>