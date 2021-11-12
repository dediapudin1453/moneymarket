<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title><?= $this->CI->meta_title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured money market international" name="description" />
  <meta content="LinggaFX.com" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?php echo favicon(); ?>">

  <!-- third party css -->
  <link href="<?= content_url('plugins/linggafx.com/hyper/assets/css/jquery-jvectormap-1.2.2.css') ?> " rel="stylesheet" type="text/css" />
  <!-- third party css end -->

  <!-- App css -->
  <link href="<?= content_url('plugins/linggafx.com/hyper/assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
  <link href="<?= content_url('plugins/linggafx.com/hyper/assets/css/app-modern.min.css') ?>" rel="stylesheet" type="text/css" id="light-style" />
  <link href="<?= content_url('plugins/linggafx.com/hyper/assets/css/app-modern-dark.min.css') ?>" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>

  <!-- Topbar Start -->
  <div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

      <!-- LOGO -->
      <a href="index.html" class="topnav-logo">
        <span class="topnav-logo-lg">
          <img src="assets/images/logo-light.png" alt="" height="16">
        </span>
        <span class="topnav-logo-sm">
          <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
      </a>

      <ul class="list-unstyled topbar-menu float-end mb-0">

        <li class="dropdown notification-list d-xl-none">
          <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <i class="dripicons-search noti-icon"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
            <form class="p-3">
              <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
            </form>
          </div>
        </li>

        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="dripicons-bell noti-icon"></i>
            <span class="noti-icon-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg" aria-labelledby="topbar-notifydrop">

            <!-- item-->
            <div class="dropdown-item noti-title">
              <h5 class="m-0">
                <span class="float-end">
                  <a href="javascript: void(0);" class="text-dark">
                    <small>Clear All</small>
                  </a>
                </span>Notification
              </h5>
            </div>

            <div style="max-height: 230px;" data-simplebar>
              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-primary">
                  <i class="mdi mdi-comment-account-outline"></i>
                </div>
                <p class="notify-details">Caleb Flakelar commented on Admin
                  <small class="text-muted">1 min ago</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-info">
                  <i class="mdi mdi-account-plus"></i>
                </div>
                <p class="notify-details">New user registered.
                  <small class="text-muted">5 hours ago</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon">
                  <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" />
                </div>
                <p class="notify-details">Cristina Pride</p>
                <p class="text-muted mb-0 user-msg">
                  <small>Hi, How are you? What about our next meeting</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-primary">
                  <i class="mdi mdi-comment-account-outline"></i>
                </div>
                <p class="notify-details">Caleb Flakelar commented on Admin
                  <small class="text-muted">4 days ago</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon">
                  <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" />
                </div>
                <p class="notify-details">Karen Robinson</p>
                <p class="text-muted mb-0 user-msg">
                  <small>Wow ! this admin looks good and awesome design</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-info">
                  <i class="mdi mdi-heart"></i>
                </div>
                <p class="notify-details">Carlos Crouch liked
                  <b>Admin</b>
                  <small class="text-muted">13 days ago</small>
                </p>
              </a>
            </div>

            <!-- All-->
            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
              View All
            </a>

          </div>
        </li>

        <li class="notification-list">
          <a class="nav-link end-bar-toggle" href="javascript: void(0);">
            <i class="dripicons-gear noti-icon"></i>
          </a>
        </li>

        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="account-user-avatar">
              <img src="<?= user_photo(data_login('member', 'photo')); ?>" alt="user-image" class="rounded-circle">
            </span>
            <span>
              <span class="account-user-name"> <?= data_login('member', 'name'); ?></span>
              <span class="account-position">Verify</span>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
            <!-- item-->
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome !</h6>
            </div>

            <!-- item-->
            <a href="<?= member_url('account') ?>;" class="dropdown-item notify-item">
              <i class="mdi mdi-account-circle me-1"></i>
              <span>My Account</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="mdi mdi-lock-outline me-1"></i>
              <span>Lock Screen</span>
            </a>

            <!-- item-->
            <a href="<?= member_url('logout') ?>" class="dropdown-item notify-item">
              <i class="mdi mdi-logout me-1"></i>
              <span>Logout</span>
            </a>

          </div>
        </li>

      </ul>
      <a class="button-menu-mobile disable-btn">
        <div class="lines">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </a>

    </div>
  </div>
  <!-- end Topbar -->

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- Begin page -->
    <div class="wrapper">

      <!-- ========== Left Sidebar Start ========== -->
      <div class="leftside-menu leftside-menu-detached">

        <div class="leftbar-user">
          <a href="javascript: void(0);">
            <img src="<?= user_photo(data_login('member', 'photo')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
            <span class="leftbar-user-name"> <?= data_login('member', 'name'); ?></span>
          </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

          <li class="side-nav-title side-nav-item">Navigation</li>



          <li class="side-nav-item">
            <a href="<?= member_url('home') ?>" class="side-nav-link">
              <i class="uil-home-alt"></i>
              <span> Dashboard </span>
            </a>
          </li>

          <li class="side-nav-title side-nav-item">Apps</li>

          <li class="side-nav-item">
            <a href="<?php echo base_url('l-member/account'); ?>" class="side-nav-link">
              <i class="uil uil-user"></i>
              <span> My Profile </span>
            </a>
          </li>

          <li class="side-nav-item">
            <a href="<?= member_url('referral') ?>" class="side-nav-link">
              <i class="uil uil-users-alt"></i>
              <span> Referral </span>
            </a>
          </li>

          <li class="side-nav-item">
            <a href="<?= member_url('deposit') ?>" class="side-nav-link">
              <i class="uil uil-money-insert"></i>
              <span> Deposit </span>
            </a>
          </li>

          <li class="side-nav-item">
            <a href="<?= member_url('account_trading') ?>" class="side-nav-link">
              <i class="mdi mdi-chart-timeline-variant-shimmer"></i>
              <span> Trade Account </span>
            </a>
          </li>



          <li class="side-nav-item">
            <a href="<?= member_url('internal_transfer') ?>" class="side-nav-link">
              <i class="mdi mdi-sync-alert"></i>
              <span> Internal Transfer </span>
            </a>
          </li>

          <li class="side-nav-item">
            <a href="<?= member_url('withdrawal') ?>" class="side-nav-link">
              <i class="uil uil-money-withdrawal"></i>
              <span> Withdrawal </span>
            </a>
          </li>


          <li class="side-nav-item">
            <a href="<?= member_url('logout') ?>" class=" side-nav-link">
              <i class="mdi mdi-logout me-1"></i>
              <span> Log Out </span>
            </a>
          </li>


        </ul>

        <!-- End Sidebar -->

        <div class="clearfix"></div>
        <!-- Sidebar -left -->

      </div>
      <!-- Left Sidebar End -->

      <div class="content-page">
        <div class="content">
          <?php $this->CI->load_content(); ?>





          <!-- end row -->
        </div> <!-- End Content -->

        <!-- Footer Start -->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <script>
                  document.write(new Date().getFullYear())
                </script> © Money Market International
              </div>
              <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-md-block">
                  <a href="javascript: void(0);">About</a>
                  <a href="javascript: void(0);">Support</a>
                  <a href="javascript: void(0);">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <!-- end Footer -->

      </div>
      <!-- content-page -->

    </div> <!-- end wrapper-->
  </div>
  <!-- END Container -->


  <!-- Right Sidebar -->
  <div class="end-bar">

    <div class="rightbar-title">
      <a href="javascript:void(0);" class="end-bar-toggle float-end">
        <i class="dripicons-cross noti-icon"></i>
      </a>
      <h5 class="m-0">Settings</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar>

      <div class="p-3">
        <div class="alert alert-warning" role="alert">
          <strong>Scheme </strong> light mode or dark mode
        </div>

        <!-- Settings -->
        <h5 class="mt-3">Color Scheme</h5>
        <hr class="mt-1" />

        <div class="form-check form-switch mb-1">
          <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light" id="light-mode-check" checked />
          <label class="form-check-label" for="light-mode-check">Light Mode</label>
        </div>

        <div class="form-check form-switch mb-1">
          <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark" id="dark-mode-check" />
          <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
        </div>

        <!-- Left Sidebar-->
        <h5 class="mt-4">Left Sidebar</h5>
        <hr class="mt-1" />

        <div class="form-check form-switch mb-1">
          <input type="checkbox" class="form-check-input" name="compact" value="fixed" id="fixed-check" checked />
          <label class="form-check-label" for="fixed-check">Scrollable</label>
        </div>

        <div class="form-check form-switch mb-1">
          <input type="checkbox" class="form-check-input" name="compact" value="condensed" id="condensed-check" />
          <label class="form-check-label" for="condensed-check">Condensed</label>
        </div>
      </div> <!-- end padding-->

    </div>
  </div>

  <div class="rightbar-overlay"></div>
  <!-- /End-bar -->


  <!-- bundle -->
  <script src="<?= content_url('plugins/linggafx.com/hyper/assets/js/vendor.min.js') ?>"></script>
  <script src="<?= content_url('plugins/linggafx.com/hyper/assets/js/app.min.js') ?>"></script>

  <!-- third party js -->
  <script src="<?= content_url('plugins/linggafx.com/hyper/assets/js/apexcharts.min.js') ?>"></script>
  <script src="<?= content_url('plugins/linggafx.com/hyper/assets/js/jquery-jvectormap-1.2.2.min.js') ?>"></script>
  <script src="<?= content_url('plugins/linggafx.com/hyper/assets/js/jquery-jvectormap-world-mill-en.js') ?>"></script>
  <!-- third party js ends -->

  <!-- demo app -->
  <script src="<?= content_url('plugins/linggafx.com/hyper/assets/js/demo.dashboard.js') ?> "></script>
  <script src="<?= content_url('modjs/hitung.js') ?>"></script>


  <!-- end demo js-->

</body>

</html>