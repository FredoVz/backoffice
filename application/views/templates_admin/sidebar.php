<style>
    /* Ukuran default logo */
    .sidebar-brand-icon img {
        transition: all 0.3s ease; /* Smooth transition */
        height: 30px;
        width: auto;
    }

    /* Saat sidebar dalam keadaan collapse */
    .sidebar.collapsed .sidebar-brand-icon img {
        height: 15px; /* Logo lebih kecil */
        width: auto;
    }

    /* Mobile view: Logo lebih kecil */
    @media (max-width: 768px) {
        .sidebar-brand-icon img {
            height: 15px;
        }
    }

    .fixed-top-custom {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1030; /* 1030 Pastikan di atas konten lainnya */
    }

    /* Sidebar tetap terlihat saat di-scroll */
    .sidebar {
        position: sticky;
        top: 0;
        left: 0;
        height: 100%; /* Penuh sampai bawah */
        width: auto; /* Lebar default */
        transition: width 0.3s;
        z-index: 1020; /* 1020 */
    }
</style>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
         <!-- #b18cc2 -->
        <ul class="navbar-nav bg-gradient-light sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('importdigital') ?>">
                <!-- Logo -->
                <!--div class="sidebar-brand-icon">
                    <img src="< ?php echo base_url('assets/img/logo1-removebg-preview.png') ?>" alt="Logo"></img>
                </div-->
            </a>

            <!-- Divider -->
            <!--hr class="sidebar-divider my-0" style="border-color: #D3D3D3;"--> <!-- #D3D3D3 -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'aktivasi') ? 'active' : ''; ?>">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#aktivasiDropdown" aria-expanded="true" aria-controls="aktivasiDropdown">
                    <i class="fas fa-fw fa-database" style="color: black;"></i>
                    <span style="color: black;">Aktivasi</span>
                </a>
                <!-- Dropdown Menu -->
                <div id="aktivasiDropdown" class="collapse <?php echo ($this->uri->segment(1) == 'aktivasi') ? 'show' : ''; ?>" aria-labelledby="aktivasiHeading" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--h6 class="collapse-header">Akun Aktivasi:</h6-->
                        <a class="collapse-item <?php echo ($this->uri->segment(2) == 'akun') ? 'active' : ''; ?>" href="<?php echo base_url('aktivasi/akun'); ?>"><i class="bi bi-person-fill"></i> Account</a>
                        <a class="collapse-item <?php echo ($this->uri->segment(2) == 'album') ? 'active' : ''; ?>" href="<?php echo base_url('aktivasi/album'); ?>"><i class="bi bi-person-fill"></i> Album</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'importdigital') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url('importdigital') ?>">
                <!--i class="fas fa-fw fa-tachometer-alt"></i-->
                <i class="fas fa-fw fa-database" style="color: black;"></i>
                <span style="color: black;">Import Digital</span></a>
            </li>

            <li class="nav-item <?php echo ($this->uri->segment(1) == 'laporan') ? 'active' : ''; ?>">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#laporanDropdown" aria-expanded="true" aria-controls="laporanDropdown">
                    <i class="fas fa-fw fa-database" style="color: black;"></i>
                    <span style="color: black;">Laporan</span>
                </a>
                <!-- Dropdown Menu -->
                <div id="laporanDropdown" class="collapse <?php echo ($this->uri->segment(1) == 'laporan') ? 'show' : ''; ?>" aria-labelledby="laporanHeading" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--h6 class="collapse-header">Akun Aktivasi:</h6-->
                        <a class="collapse-item <?php echo ($this->uri->segment(2) == 'user') ? 'active' : ''; ?>" href="<?php echo base_url('laporan/user'); ?>"><i class="bi bi-clipboard-data-fill"></i> Account</a>
                        <a class="collapse-item <?php echo ($this->uri->segment(2) == 'album') ? 'active' : ''; ?>" href="<?php echo base_url('laporan/album'); ?>"><i class="bi bi-clipboard-data-fill"></i> Album</a>
                        <a class="collapse-item <?php echo ($this->uri->segment(2) == 'track') ? 'active' : ''; ?>" href="<?php echo base_url('laporan/track'); ?>"><i class="bi bi-clipboard-data-fill"></i> Track</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle" 
                style="background-color: gray; color: white;"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column"> <!-- style="margin-left: 250px;" -->
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed-top-custom"> <!-- sticky-top, fixed-top-custom -->
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Logo -->
                    <div class="sidebar-brand-icon">
                        <!--img src="< ?php echo base_url('assets/img/logo1-removebg-preview.png') ?>" alt="Logo" style="height: 30px; width: auto;"></img-->
                        <img src="<?php echo base_url('assets/img/logo1-removebg-preview.png') ?>" alt="Logo"></img>
                    </div>

                    <!-- Topbar Search -->
                    <!--form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search Track"
                            aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button" style="background-color: #b18cc2;">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form-->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <!--a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                            </a-->
                            <!-- Dropdown - Messages -->
                            <!--div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search Track" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" type="button" style="background-color: #b18cc2;">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div-->
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <ul class="na navbar-nav navbar-right d-flex align-items-center">
                            <!--?php if ($this->session->userdata('logged_in')) { ?>
                                <li class="nav-item">
                                    <div>Selamat Datang, < ?php echo $this->session->userdata('username'); ?></div>
                                </li>
                            < ?php } else { ?>
                                <li class="nav-item">
                                    < ?php echo anchor('login/index', 'Login', ['class' => 'nav-link']); ?>
                                </li>
                            < ?php } ?-->
                            <li class="nav-item">
                                <div>Selamat Datang, <?php echo $this->session->userdata('username_pusatmusik_backoffice'); ?></div>
                            </li>
                        </ul>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/img/undraw_profile.svg'); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!--a class="dropdown-item" href="< ?= base_url('user'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Profile
                                </a>
                                <div class="dropdown-divider"></div-->
                                <a class="dropdown-item" href="<?= base_url('login/logout'); ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            <!--/div-->
            <!-- End of Topbar -->
        <!--/div-->
        <!-- End of Content Wrapper -->

<!-- SIDEBAR TOGGLE -->
<script>
    // Mendapatkan elemen sidebar dan tombol toggle
    var sidebar = document.getElementById('accordionSidebar');
    var sidebarToggle = document.getElementById('sidebarToggle');

    // Event listener untuk toggle sidebar
    sidebarToggle.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
    });

    // Event listener untuk toggle sidebar
    sidebarToggleTop.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
    });
</script>