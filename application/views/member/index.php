<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img//apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img//favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?=$this->CI->meta_title;?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?=content_url('plugins/linggafx.com/css/bootstrap.min.css')?>" rel="stylesheet" />
  <link href="<?=content_url('plugins/linggafx.com/css/custom.css')?>" rel="stylesheet" />
  <link href="<?=content_url('plugins/linggafx.com/css/paper-dashboard.css?v=2.1.1')?> " rel="stylesheet" />

  <?php if ($this->mod==='account_trading') { ?> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  <?php } ?>
    

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="primary" data-active-color="primary">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color=" default | primary | info | success | warning | danger |"
    -->
      <div class="logo">
        <a href="<?= base_url() ?>" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?= content_url('favicon/'.$this->settings->website('logo')); ?>">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="<?= base_url() ?>" class="simple-text logo-normal">
          <?= $this->settings->website('web_name') ?>
          <!--  <div class="logo-image-big">
            <img src="<?=user_photo(data_login('member','photo'));?>">
          </div>  -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?=user_photo(data_login('member','photo'));?>" />
          </div>
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                <?=data_login('member', 'name');?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="clearfix"></div>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li>
                  <a href="<?=member_url('account')?>">
                    <span class="sidebar-mini-icon">MP</span>
                    <span class="sidebar-normal">My <?=lang_line('menu_account')?></span>
                  </a>
                </li>
                <li>
                  <a href="<?=member_url('referral')?>">
                    <span class="sidebar-mini-icon">MP</span>
                    <span class="sidebar-normal">My Partner</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
			<li class="nav-item <?=$this->CI->menu_class('home')?>">
				<a href="<?=member_url('home')?>" class="nav-link">
					<i class="nc-icon nc-bank"></i>
					<p><?=lang_line('menu_dashboard')?></p>
				</a>
			</li>
			<li class="nav-item <?=$this->CI->menu_class('payments')?>">
				<a href="<?=member_url('deposit')?>" class="nav-link">
					<i class="nc-icon nc-money-coins"></i>
					<p>Deposit</p>
				</a>
			</li>
			<li class="nav-item <?=$this->CI->menu_class('withdrawal')?>">
				<a href="<?=member_url('withdrawal')?>" class="nav-link">
					<i class="nc-icon nc-money-coins"></i>
					<p>Withdrawal</p>
				</a>
			</li>
			<li class="nav-item <?=$this->CI->menu_class('internal_transfer')?>">
				<a href="<?=member_url('internal_transfer')?>" class="nav-link">
					<i class="nc-icon nc-refresh-69"></i>
					<p>Internal Transfer</p>
				</a>
			</li>
			<li class="nav-item <?=$this->CI->menu_class('account_trading')?>">
				<a href="<?=member_url('account_trading')?>" class="nav-link">
					<i class="nc-icon nc-single-02"></i>
					<p>Account Trading</p>
				</a>
			</li>
			<li class="nav-item mobile-logoutx">
				<a href="<?=member_url('logout')?>" class="nav-link">
					<i class="nc-icon nc-button-power"></i>
					<p><?=lang_line('menu_logout')?></p>
				</a>
			</li>
		</ul>

      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-icon btn-round">
                <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
              </button>
            </div>
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;"> <?= $this->settings->website('web_name') ?> Cabinet</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify"  target="_blank" href="<?php echo base_url(); ?>">
                  <i class="nc-icon nc-tap-01"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Go to website</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-circle-10"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Profile</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?php echo base_url('l-member/account'); ?>">Profile</a>
                  <a class="dropdown-item" href="<?php echo base_url('l-member/change-password'); ?>">Change Password</a>
                  <a class="dropdown-item" href="<?php echo base_url('l-member/logout'); ?>">Sign out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        	<?php $this->CI->load_content(); ?>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by <?= $this->settings->website('web_name') ?>
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?=content_url('plugins/linggafx.com/js/jquery.min.js')?> "></script>
  <script src="<?=content_url('plugins/linggafx.com/js/popper.min.js')?>  "></script>
  <script src="<?=content_url('plugins/linggafx.com/js/bootstrap.min.js')?> "></script>
  <script src="<?=content_url('plugins/linggafx.com/js/perfect-scrollbar.jquery.min.js')?> "></script>
  <script src="<?=content_url('plugins/linggafx.com/js/moment.min.js')?> "></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="<?=content_url('plugins/linggafx.com/js/bootstrap-switch.js')?> "></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?=content_url('plugins/linggafx.com/js/sweetalert2.min.js')?>"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?=content_url('plugins/linggafx.com/js/jquery.validate.min.js')?> "></script>
  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?=content_url('plugins/linggafx.com/js/jquery.bootstrap-wizard.js')?> "></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?=content_url('plugins/linggafx.com/js/bootstrap-selectpicker.js')?> "></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?=content_url('plugins/linggafx.com/js/bootstrap-datetimepicker.js')?> "></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
  <script src="<?=content_url('plugins/linggafx.com/js/jquery.dataTables.min.js')?> "></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?=content_url('plugins/linggafx.com/js/bootstrap-tagsinput.js')?> "></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?=content_url('plugins/linggafx.com/js/jasny-bootstrap.min.js')?>"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?=content_url('plugins/linggafx.com/js/fullcalendar.min.js')?> "></script>
  <script src="<?=content_url('plugins/linggafx.com/js/daygrid.min.js')?> "></script>
  <script src="<?=content_url('plugins/linggafx.com/js/timegrid.min.js')?> "></script>
  <script src="<?=content_url('plugins/linggafx.com/js/interaction.min.js')?> "></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?=content_url('plugins/linggafx.com/js/jquery-jvectormap.js')?> "></script>
  <!--  Plugin for the Bootstrap Table -->
  <script src="<?=content_url('plugins/linggafx.com/js/nouislider.min.js')?> "></script>

  <!-- Chart JS -->
  <script src="<?=content_url('plugins/linggafx.com/js/chartjs.min.js')?> "></script>
  <!--  Notifications Plugin    -->
  <script src="<?=content_url('plugins/linggafx.com/js/bootstrap-notify.js')?> "></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=content_url('plugins/linggafx.com/js/paper-dashboard.js')?> " type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?=content_url('plugins/linggafx.com/js/demo.js')?>"></script>
  <script src="<?=content_url('modjs/hitung.js')?>"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();


      demo.initVectorMap();

    });
  </script>
  <script type="text/javascript"> 
  		<?php if ($this->mod==='referral') { ?>
		<script type="text/javascript">
			$(document).ready( function () {
			    $('#table_referral').DataTable();
			} );
		</script>
	<?php } ?>

  </script>
  
</body>

</html>