  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">


           <?php 

            foreach($current_admin_login as $admin_login){
               $first_name = $admin_login->first_name;
               $middle_name = $admin_login->middle_name;
               $last_name = $admin_login->last_name;
               $image = $admin_login->image;
            }
          ?>

           <?php if(empty($image)){ ?>
                    <img src="<?php echo site_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                     <?php }else{ ?>
                     <img src="<?php echo site_url()?>uploads/admin_image/<?php echo $image;?>" class="img-circle" alt="User Image">
                     <?php } ?>

         
        </div>


        <?php //temporary

                      function limit_text($text, $limit) {
                          if (str_word_count($text, 0) > $limit) {
                              $words = str_word_count($text, 2);
                              $pos = array_keys($words);
                              $text = substr($text, 0, $pos[$limit]) . '...';
                          }
                          return $text;
                     }
                     ?>

        <div class="pull-left info">
          <p><?php echo limit_text($first_name . " " . $last_name,3);?></p>
          
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
        <li class="treeview" id="prod_family">
          <a href="#">
            <i class="fa fa-th-list"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="med"><a href="<?php echo site_url();?>admin/medicines"><i class="fa fa-circle-o"></i> Medicines</a></li>
            <li id="item"><a href="<?php echo site_url();?>admin/items"><i class="fa fa-circle-o"></i> Items</a></li>
          </ul>
        </li>


        <li><a href="<?php echo site_url();?>admin/customers"><i class="fa fa-users"></i> <span>Customers</span></a></li>
        <li><a href="<?php echo site_url();?>admin/pets"><i class="fa fa-user"></i> <span>Pets</span></a></li>

       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>