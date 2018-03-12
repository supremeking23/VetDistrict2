  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">


           <?php 

            foreach($current_employee_login as $employee_login){
               $first_name = $employee_login->first_name;
               $middle_name = $employee_login->middle_name;
               $last_name = $employee_login->last_name;
               $image = $employee_login->image;
            }
          ?>

           <?php if(empty($image)){ ?>
                    <img src="<?php echo site_url()?>assets/dist/img/guest2.jpg" class="img-circle" alt="User Image">
                     <?php }else{ ?>
                     <img src="<?php echo site_url()?>uploads/employee_image/<?php echo $image;?>" class="img-circle" alt="User Image">
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
        <li class="header">MAIN NAVIGATION</li><?php  ucfirst($employee_login->employee_type);?>

       
        <?php if($employee_login->employee_type == "staff"){ ?>
        
        <li><a href="<?php echo site_url();?>employee/pos"> <i class="fa fa-th"></i> <span>POS</span></a></li>

         <li><a href="<?php echo site_url();?>employee/customers"><i class="fa fa-users"></i> <span>Customers </span></a></li>
        <li><a href="<?php echo site_url();?>employee/pets"><i class="fa fa-firefox"></i> <span>Pets</span></a></li>
        
       <!-- <li><a href="<?php echo site_url();?>admin/products"><i class="fa  fa-th-list"></i> <span>Products</span></a></li> -->
        <li class="treeview" id="prod_family">
          <a href="#">
            <i class="fa fa-th-list"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="med"><a href="<?php echo site_url();?>employee/medicines"><i class="fa fa-circle-o"></i> Medicines</a></li>
            <li id="item"><a href="<?php echo site_url();?>employee/items"><i class="fa fa-circle-o"></i> Items</a></li>
          </ul>
        </li>


       
        <li class="treeview" id="report_family">
          <a href="#">
            <i class="fa fa-file-o"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="med"><a href="<?php echo site_url();?>employee/sales"><i class="fa fa-circle-o"></i> Sales Report</a></li>
            <li id="item"><a href="<?php echo site_url();?>employee/inventory"><i class="fa fa-circle-o"></i> Inventory Report</a></li>
          </ul>
        </li>


        <?php }else if($employee_login->employee_type == "veterinarian") { ?>

        <li><a href="<?php echo site_url();?>employee/pets_diagnosis"> <i class="fa fa-firefox"></i> <span>Pets</span></a></li>

        <?php } ?>

        <li><a href="<?php echo site_url();?>employee/appointments"><i class="fa fa-calendar"></i> <span>Appointments</span></a></li>


        

       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>