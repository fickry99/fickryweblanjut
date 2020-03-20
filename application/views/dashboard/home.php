
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>VISITS</h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
                <li><span>300</span></li>
                <li><span>200</span></li>
                <li><span>150</span></li>
                <li><span>100</span></li>
                <li><span>50</span></li>
                <li><span>0</span></li>
              </ul>
              <?php
              foreach ($data_barang as $key => $db) : ?>
              <div class="bar">
                <div class="title"><?php echo $db->nama_barang ?></div>
                <div class="value tooltips" data-original-title="<?php echo $db->stok ?>" data-toggle="tooltip" data-placement="top"><?php echo $db->stok ?></div>
              </div>
            <?php endforeach ?>

            </div>
            <!--custom chart end-->
