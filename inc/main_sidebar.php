        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?= $_SESSION['user_type']; ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= ($_SESSION['user_type'] == 'User' ? $user['user_name'] : $admin['admin_name']); ?></a>
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

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link <?= $helper->menu_active('dashboard.php'); ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="category.php" class="nav-link <?= $helper->menu_active('category.php'); ?>">
                                <i class="nav-icon fa fa-tasks"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="author.php" class="nav-link <?= $helper->menu_active('author.php'); ?>">
                                <i class="nav-icon fa fa-user"></i>
                                <p>Author</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="location_rack.php" class="nav-link <?= $helper->menu_active('location_rack.php'); ?>">
                                <i class="nav-icon fa fa-cubes"></i>
                                <p>Location Rack</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="book.php" class="nav-link <?= $helper->menu_active('book.php'); ?>">
                                <i class="nav-icon fa fa-book"></i>
                                <p>Book</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="user.php" class="nav-link <?= $helper->menu_active('user.php'); ?>">
                                <i class="nav-icon fa fa-users"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="issue-book.php" class="nav-link <?= $helper->menu_active('issue-book.php'); ?>">
                                <i class="nav-icon fa fa-book-open"></i>
                                <p>Issue Book</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="setting.php" class="nav-link <?= $helper->menu_active('setting.php'); ?>">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="logout">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>