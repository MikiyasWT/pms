  <!-- ========== Left Sidebar Start ========== -->
  <div class="left-side-menu">

      <div class="h-100" data-simplebar>

          <!-- User box -->
          <div class="user-box text-center">
              <img src="<?php echo base_url(); ?>assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
              <div class="dropdown">
                  <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"><?= $this->session->user->full_name ?></a>
                  <div class="dropdown-menu user-pro-dropdown">

                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item notify-item">
                          <i class="fe-user me-1"></i>
                          <span>My Account</span>
                      </a>

                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item notify-item">
                          <i class="fe-settings me-1"></i>
                          <span>Settings</span>
                      </a>

                      <!-- item-->
                      <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock me-1"></i>
                    <span>Lock Screen</span>
                </a> -->

                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item notify-item">
                          <i class="fe-log-out me-1"></i>
                          <span>Logout</span>
                      </a>

                  </div>
              </div>
              <p class="text-muted"><?= $this->session->user->role_type ?></p>
          </div>

          <!--- Sidemenu -->
          <div id="sidebar-menu">

              <ul id="side-menu">

                  <li class="menu-title">Navigation</li>

                  <li>
                      <a href="<?= base_url('dashboard'); ?>">
                          <i class="mdi mdi-view-dashboard-outline"></i>
                          <!-- <span class="badge bg-success rounded-pill float-end">4</span> -->
                          <span> Dashboard </span>
                      </a>

                  </li>
                  <li>
                      <a href="#sidebarClient" data-bs-toggle="collapse">
                          <i class="mdi mdi-account-group-outline"></i>
                          <span> Clients </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarClient">
                          <ul class="nav-second-level">
                              <li>
                                  <a href="<?= base_url('dashboard/client_create'); ?>">Create Client</a>
                              </li>
                              <li>
                                  <a href="<?= base_url('dashboard/clients'); ?>">View</a>
                              </li>
                              <!-- <li>
                                  <a href="project-detail.html">Detail</a>
                              </li> -->
                          </ul>
                      </div>
                  </li>
                  <li>
                      <a href="#sidebarProjects" data-bs-toggle="collapse">
                          <i class="mdi mdi-briefcase-check-outline"></i>
                          <span> Projects </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarProjects">
                          <ul class="nav-second-level">
                              <!-- <li>
                                  <a href="project-detail.html">Detail</a>
                                </li> -->
                                <li>
                                    <a href="<?= base_url('dashboard/create_project'); ?>">Create Project</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('dashboard/projects'); ?>">View</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('dashboard/add_Category'); ?>">Add Categories</a>
                                </li>
                          </ul>
                      </div>
                  </li>
                  <li>
                      <a href="#sidebarAuth" data-bs-toggle="collapse">
                          <i class="material-symbols-outlined">badge</i>
                          <span> Users Management </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarAuth">
                          <ul class="nav-second-level">
                              <li>
                                  <a href="<?= base_url('dashboard/users'); ?>">Users</a>
                              </li>
                              <li>
                                  <a href="<?= base_url('dashboard/roles'); ?>">Roles</a>
                              </li>
                              <li>
                                  <a href="<?= base_url('dashboard/client_types'); ?>">Clients</a>
                              </li>
                          </ul>
                      </div>
                  </li>
              </ul>

          </div>
          <!-- End Sidebar -->

          <div class="clearfix"></div>

      </div>
      <!-- Sidebar -left -->

  </div>
  <!-- Left Sidebar End -->