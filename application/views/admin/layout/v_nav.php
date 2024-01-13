<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard' ? 'active' : '') ?>" href="<?= base_url() ?>" href="<?= base_url() ?>dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'sampel' ? 'active' : '') ?>" href="<?= base_url() ?>sampel">
                                <div class="sb-nav-link-icon"><i class="fas fa-vials"></i></div>
                                Data Sampel
                            </a>
                            <?php if($this->session->userdata['role'] == "1") : ?>
                            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'lhu' ? 'active' : '') ?>" href="<?= base_url() ?>lhu">
                                <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                                Lembar Hasil Uji
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url() ?>sampel/laporan">
                                        <i class="fas fa-vials me-2"></i>
                                        Data Sampel
                                    </a>
                                    <a class="nav-link" href="<?= base_url() ?>lhu/laporan">
                                        <i class="far fa-file-alt me-2"></i>
                                        Lembar Hasil Uji
                                    </a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Option</div>
                            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'pengguna' ? 'active' : '') ?>" href="<?= base_url() ?>main/pengguna">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Data Pengguna
                            </a>
                            <?php endif; ?>
                            <a class="nav-link text-danger" href="<?php echo base_url().'main/logout' ?>" onClick="return confirm('Apakah Anda Ingin Keluar Aplikasi ?')">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt text-danger"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Login Sebagai:</div>
                        <?= $user; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">