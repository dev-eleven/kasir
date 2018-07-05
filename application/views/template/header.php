<header class="main-header">
  <a href="#" class="logo">
    <span class="logo-mini"><b>P</b>OS</span>
    <span class="logo-lg"><b>Point</b> Of Sales</span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li>
          <a href="<?php echo base_url(); ?>kasir"><i class="fa fa-refresh"></i> Switch to kasir</a>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url(); ?>assets/img/admin.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs">Admin</span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="<?php echo base_url(); ?>assets/img/admin.jpg" class="img-circle" alt="User Image">
              <p>
                Admin - Super Admin
                <small>Member since 2018</small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-right">
                <a href="<?php echo base_url() ?>logout" class="btn btn-danger btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/admin.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="<?php echo base_url(); ?>inventaris">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
       </a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>users"><i class="fa fa-users"></i> <span>Users</span></a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>products"><i class="fa fa-sitemap"></i> <span>Products</span></a>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>suppliers"><i class="fa fa-users"></i> <span>Suppliers</span></a>
      </li>
    </ul>
  </section>
</aside>