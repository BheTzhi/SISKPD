<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SISKPD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/images/users/' . $user['foto']) ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['namapengguna'] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php
        if ($title == 'Dashboard') :
            $active = 'active';
        else :
            $active = '';
        endif;
        ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $active ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php
                $this->db->select('a.id, a.menu');
                $this->db->join('user_access b', 'b.menu_id=a.id');
                $this->db->where('b.role_id', $user['role_id']);
                $menu = $this->db->get('user_menu a')->result_array();
                foreach ($menu as $m) :
                ?>
                    <li class="nav-header"><?= strtoupper($m['menu']) ?></li>
                    <?php
                    $subMenu = $this->db->get_where('user_sub_menu', ['menu_id' => $m['id']])->result_array();
                    foreach ($subMenu as $sm) :

                        if ($title == $sm['title']) :
                            $active = 'active';
                        else :
                            $active = '';
                        endif;

                    ?>
                        <li class="nav-item">
                            <a href="<?= base_url($sm['url']) ?>" class="nav-link <?= $active ?>">
                                <i class="<?= $sm['icon'] ?>"></i>
                                <p>
                                    <?= $sm['title'] ?>
                                    <!-- <span class="badge badge-info right">2</span> -->
                                </p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>

                <hr>
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout/') ?>" onclick="return confirm('Yakin ingin keluar ?')" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>