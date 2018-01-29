  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">


           <?php 

            foreach($current_customer_login as $customer_login){
               $first_name = $customer_login->first_name;
               $middle_name = $customer_login->middle_name;
               $last_name = $customer_login->last_name;
               $image = $customer_login->image;
            }
          ?>

           <?php if(empty($image)){ ?>
                    <img src="<?php echo site_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                     <?php }else{ ?>
                     <img src="<?php echo site_url()?>uploads/customer_image/<?php echo $image;?>" class="img-circle" alt="User Image">
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
        <li><a href="<?php echo site_url();?>customer/dashboard"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo site_url();?>customer/appointments"><i class="fa fa-calendar"></i> <span>Appointments</span></a></li>
        <li><a href="<?php echo site_url();?>customer/pets"><i class="fa fa-firefox"></i> <span>Pets</span></a></li>
       <!-- <li><a href="<?php echo site_url();?>admin/products"><i class="fa  fa-th-list"></i> <span>Products</span></a></li> -->
        
        <li class="treeview" id="history_family">
          <a href="#">
            <i class="fa fa-th-list"></i> <span>History</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="med"><a href="<?php echo site_url();?>customer/pet_checkup_history"><i class="fa fa-circle-o"></i> Pet Checkup History</a></li>
            <li id="item"><a href="<?php echo site_url();?>customer/purchase_history"><i class="fa fa-circle-o"></i> Purchase History</a></li>
          </ul>
        </li>
        

       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>