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
        <?php if ($_SESSION['level'] == 1 ): ?>
          <li>
              <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-refresh"></i> Switch to inventories</a>
          </li>
        <?php endif ?>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url(); ?>assets/img/admin.png" class="user-image" alt="User Image">
            <span class="hidden-xs">Cashier</span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="<?php echo base_url(); ?>assets/img/admin.png" class="img-circle" alt="User Image">
              <p>
                Cashier
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
      </ul>
    </div>
  </nav>
</header>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/admin.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Cashier</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
       <a href="<?php echo base_url(); ?>cashier">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
       </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Members</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url() ?>members"><i class="fa fa-circle-o  text-blue"></i> Show Data</a></li>
          <li><a href="<?php echo base_url() ?>members/add"><i class="fa fa-circle-o  text-yellow"></i> Add Data</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url(); ?>order_mobile">
          <i class="fa fa-reorder"></i> <span>Order Mobile</span>
        </a>
      </li>
    </ul>
  </section>
</aside>