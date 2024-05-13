         <!-- Sidebar -->
         <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

              <!-- Sidebar - Brand -->
              <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url($user['role']); ?>">
                   <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-signature"></i>
                   </div>
                   <div class="sidebar-brand-text mx-3">TAMANTIRTO<sup>fm</sup></div>
              </a>

              <!-- Divider -->
              <hr class="sidebar-divider my-0">

              <!-- Nav Item - Dashboard -->
              <li class="nav-item <?= $title == "Dashboard" ? "active" : ""; ?>">
                   <a class="nav-link" href="<?= base_url($user['role']) ?>/index">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
              </li>
              <?php if ($user['role'] == 'super_user') { ?>
                   <!-- Nav Item - Manajemen User -->
                   <li class="nav-item <?= $title == "Manajemen User" ? "active" : ""; ?>">
                        <a class="nav-link" href="<?= base_url($user['role']); ?>/manajemen_user">
                             <i class="fas fa-fw fa-users-cog"></i>
                             <span>Manajemen User</span></a>
                   </li>

                   <!-- Nav Item - Manajemen Data Collapse Menu -->
                   <li class="nav-item <?= $title == "Manajemen Data" ? "active" : ""; ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                             <i class="fas fa-fw fa-database"></i>
                             <span>Manajemen Data</span>
                        </a>
                        <div id="collapseUtilities" class="collapse <?= $title == "Manajemen Data" ? "show" : ""; ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                             <div class="bg-white py-2 collapse-inner rounded">
                                  <h6 class="collapse-header">Data Master:</h6>
                                  <a class="collapse-item <?= $this->uri->segment(2) == "padukuhan" ? "active" : ""; ?>" href="<?= base_url('manajemen_data/padukuhan'); ?>">Padukuhan</a>
                                  <a class="collapse-item" href="#">Kategori</a>
                                  <a class="collapse-item" href="#">Indikator</a>
                                  <a class="collapse-item" href="#">Survey</a>
                                  <a class="collapse-item" href="#">Pertanyaan</a>
                             </div>
                        </div>
                   </li>

              <?php } else if ($user['role'] == 'admin') { ?>
                   <!-- Nav Item - Manajemen Data Collapse Menu -->
                   <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                             <i class="fas fa-fw fa-wrench"></i>
                             <span>Manajemen Data</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                             <div class="bg-white py-2 collapse-inner rounded">
                                  <h6 class="collapse-header">Custom Utilities:</h6>
                                  <a class="collapse-item" href="utilities-color.html">Colors</a>
                                  <a class="collapse-item" href="utilities-border.html">Borders</a>
                                  <a class="collapse-item" href="utilities-animation.html">Animations</a>
                                  <a class="collapse-item" href="utilities-other.html">Other</a>
                             </div>
                        </div>
                   </li>

                   <!-- Nav Item - Kategori -->
                   <li class="nav-item">
                        <a class="nav-link" href="charts.html">
                             <i class="fas fa-fw fa-chart-area"></i>
                             <span>Kategori</span></a>
                   </li>

              <?php } else { ?>
                   <!-- Nav Item - Hasil Keputusan -->
                   <li class="nav-item">
                        <a class="nav-link" href="charts.html">
                             <i class="fas fa-fw fa-chart-area"></i>
                             <span>Hasil Keputusan</span></a>
                   </li>

              <?php } ?>

              <!-- Nav Item - Hasil Keputusan -->
              <li class="nav-item">
                   <a class="nav-link" href="charts.html">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Hasil Keputusan</span></a>
              </li>

              <!-- Nav Item - Profile -->
              <li class="nav-item <?= $title == "My Profile" ? "active" : ""; ?>">
                   <a class="nav-link" href="<?= base_url('user/myprofile'); ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>My Profile</span></a>
              </li>

              <!-- Nav Item - Logout -->
              <li class="nav-item">
                   <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span></a>
              </li>

              <!-- Divider -->
              <hr class="sidebar-divider d-none d-md-block">

              <!-- Sidebar Toggler (Sidebar) -->
              <div class="text-center d-none d-md-inline">
                   <button class="rounded-circle border-0" id="sidebarToggle"></button>
              </div>

         </ul>
         <!-- End of Sidebar -->