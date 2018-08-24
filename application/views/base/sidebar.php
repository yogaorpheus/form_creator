  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <!-- <div align="middle">
          <a href="<?php //echo base_url('home'); ?>">
            <img src="<?php //echo base_url('assets/adminlte'); ?>/dist/img/LOGO_PJB_White.png" style="height: 50%; width: 50%;">
          </a>
        </div> -->
        <!-- <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div> -->
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header"><strong>MENU</strong></li>
        
        <li> <!-- warna bg -->
          <a href="<?php echo base_url('mainpage/index'); ?>">
            <i class="fa fa-dashboard"></i>
            <span>Buat Form</span>
          </a>
        </li>
        <li> <!-- warna bg -->
          <a href="<?php echo base_url('pengaturan/buka_setting_input_type'); ?>">
            <i class="fa fa-dashboard"></i>
            <span>Pengaturan Input</span>
          </a>
        </li>
        <li> <!-- warna bg -->
          <a href="<?php echo base_url('pengaturan/set_attribute'); ?>">
            <i class="fa fa-dashboard"></i>
            <span>Pengaturan Attribute</span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>