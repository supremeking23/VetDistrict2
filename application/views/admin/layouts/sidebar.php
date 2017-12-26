  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo site_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo site_url();?>admin/dashboard"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo site_url();?>admin/admins"><i class="fa fa-user-secret"></i> <span>Admins</span></a></li>
        <li><a href="<?php echo site_url();?>admin/employees"><i class="fa fa-user"></i> <span>Employees</span></a></li>
        
       <!-- <li><a href="<?php echo site_url();?>admin/products"><i class="fa  fa-th-list"></i> <span>Products</span></a></li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th-list"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Medicines</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Items</a></li>
          </ul>
        </li>


        <li><a href="<?php echo site_url();?>admin/customers"><i class="fa fa-users"></i> <span>Customers</span></a></li>
        <li><a href="<?php echo site_url();?>admin/pets"><i class="fa fa-user"></i> <span>Pets</span></a></li>

       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>