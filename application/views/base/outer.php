<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('base/head'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">

<div class="wrapper" style="overflow-y: hidden;">

  <?php $this->load->view('base/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('base/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php $this->load->view('base/content.php', $body); ?>
    <?php
    //$this->load->view('testing', $body);
    ?>
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('base/footer.php'); ?>

  <!-- Control Sidebar -->
  <?php //$this->load->view('base/right_sidebar.php'); ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php $this->load->view('base/script.php'); ?>
</body>
</html>
