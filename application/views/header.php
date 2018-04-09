  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SurplexPlus Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Alertify style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/alertifyjs/css/alertify.min.css">
  <script src="<?php echo base_url() ?>assets/alertifyjs/alertify.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">
  .navbar-nav>.notifications-menu>.dropdown-menu>li.header
  {
    border-radius: 0px;
    background-color: #3c8dbc;
    color: #ffffff;
    font-size: 17px;
  }
</style>
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('indexcontroller/index');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SAP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">SurplexPlus ADMIN</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="ntf" ></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" align="center">Notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#" >
                      <i class="fa fa-users text-aqua"></i> 
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo site_url('indexcontroller/notification_view'); ?>" id="ntff">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ($this->session->userdata('adminname')); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo ($this->session->userdata('adminname')); ?><!--  - Web Developer -->
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              <!-- </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div  align="center">
                  <a href="<?php echo site_url('indexcontroller/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ($this->session->userdata('adminname')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>

        <li>
          <a href="<?php echo site_url('indexcontroller/index'); ?>">
            <i class="fa fa-dashboard"></i> 
            <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users "></i>
            <span>Buyers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('buyercontroller/addbuyer'); ?>"><i class="fa fa-arrow-circle-right"></i> Add Buyer</a></li>
            <li><a href="<?php echo site_url('buyercontroller/viewbuyer'); ?>"><i class="fa fa-arrow-circle-right"></i> View Buyers</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users  "></i>
            <span>Sellers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('sellercontroller/addseller'); ?>"><i class="fa fa-arrow-circle-right"></i> Add Seller</a></li>
            <li><a href="<?php echo site_url('sellercontroller/viewseller'); ?>"><i class="fa fa-arrow-circle-right"></i> View Sellers</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-bag"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('productcontroller/newproducts'); ?>"><i class="fa fa-arrow-circle-right"></i> New Products</a></li>
            <li><a href="<?php echo site_url('productcontroller/activeproducts'); ?>"><i class="fa fa-arrow-circle-right"></i> Approved Products</a></li>
            <!-- <li><a href="<?php echo site_url('productcontroller/inactiveproducts'); ?>"><i class="fa fa-arrow-circle-right"></i> Inactive Products</a></li>
 -->            <li><a href="<?php echo site_url('productcontroller/rejectedproducts'); ?>"><i class="fa fa-arrow-circle-right"></i> Rejected Products</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo site_url('salecontroller/viewsale'); ?>">
            <i class="fa fa-truck"></i> 
            <span>View Orders</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gavel"></i>
            <span>Auctions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('auctioncontroller/viewpendingauction'); ?>"><i class="fa fa-arrow-circle-right"></i> Pending Auctions</a></li>
            <li><a href="<?php echo site_url('auctioncontroller/viewactiveauction'); ?>"><i class="fa fa-arrow-circle-right"></i> Approved Auctions</a></li>
            <li><a href="<?php echo site_url('auctioncontroller/viewliveauction'); ?>"><i class="fa fa-arrow-circle-right"></i> Live Auctions</a></li>
            <li><a href="<?php echo site_url('auctioncontroller/viewclosedauction'); ?>"><i class="fa fa-arrow-circle-right"></i> Closed Auctions</a></li>
            <li><a href="<?php echo site_url('auctioncontroller/viewrejectedauction'); ?>"><i class="fa fa-arrow-circle-right"></i> Rejected Auctions</a></li>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Auction Settings</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo site_url('indexcontroller/notification_view'); ?>">
            <i class="fa fa-bell-o"></i> 
            <span>Notifications</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-th-list"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> View Category</a></li>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Add Category</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('indexcontroller/addadmin'); ?>"><i class="fa fa-arrow-circle-right"></i> Add Admin</a></li>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Email Settings</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('indexcontroller/orderreport'); ?>"><i class="fa fa-arrow-circle-right"></i> Orders Report</a></li>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Commission Report</a></li>
            <li><a href="<?php echo site_url('indexcontroller/sellerreport'); ?>"><i class="fa fa-arrow-circle-right"></i> Seller Report</a></li>
            <li><a href="<?php echo site_url('indexcontroller/'); ?>"><i class="fa fa-arrow-circle-right"></i> Buyer Report</a></li>
            <li><a href="<?php echo site_url('indexcontroller/'); ?>"><i class="fa fa-arrow-circle-right"></i> Seller Product Report</a></li>
            <li><a href="<?php echo site_url('indexcontroller/'); ?>"><i class="fa fa-arrow-circle-right"></i> Buyer Order Report</a></li>
            <li><a href="<?php echo site_url('indexcontroller/'); ?>"><i class="fa fa-arrow-circle-right"></i> Product Report</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->