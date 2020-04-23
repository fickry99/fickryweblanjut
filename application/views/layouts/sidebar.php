<!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
  <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><img src="<?php echo base_url('assets/') ?>img/ui-sam.jpg" class="img-circle" width="80"></p>
      <h5 class="centered"><?php echo $this->session->username ?></h5>
      <li class="mt">
        <a href="<?php echo base_url('Dashboard') ?>">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="sub-menu">
        <a href="<?php echo base_url('Barang') ?>">
          <i class="fa fa-th"></i>
          <span>Data Barang</span>
        </a>
      </li>

      <li class="sub-menu">
        <a href="<?php echo base_url('Mutasi') ?>">
          <i class="fa fa-th"></i>
          <span>Data Mutasi Barang</span>
        </a>
      </li>

    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->
