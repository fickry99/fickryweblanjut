<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3 class="text-center">INPUT BARANG MASUK</h3>
    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4 class="mb">Form pengisian input barang masuk</h4>
         <?php echo form_open ('mutasi/masuk_proses/'.$barang->id_barang, 'class="form-horizontal style-form"',array('method' => 'POST' )); ?>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $barang->nama_barang ?>" disabled class="form-control" placeholder="Nama Barang ">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Stok Sekarang</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $barang->stok ?>" disabled class="form-control" placeholder="Nama Barang ">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Stok Barang Masuk</label>
              <div class="col-sm-10">
                <input type="text" name="stok" class="form-control" placeholder="stok barang ">
                <small class="form-text text-danger"><?= form_error('stok'); ?></small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Tanggal Barang Masuk</label>
              <div class="col-md-3 col-xs-11">
                <input class="form-control form-control-inline input-medium default-date-picker" name="tanggal_masuk" size="16" type="date">
                <span class="help-block">Pilih Tanggal</span>
                <small class="form-text text-danger"><?= form_error('tanggal_masuk'); ?></small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan Masuk</label>
              <div class="col-sm-10">
                <input type="text" name="keterangan_masuk" class="form-control" placeholder="Isi keterangan ">
                <small class="form-text text-danger"><?= form_error('keterangan_masuk'); ?></small>
              </div>
            </div>
        </div>
      </div>
      <!-- col-lg-12-->
    </div>
    <!-- /row -->
  </section>
  <div class="mb text-center">
    <button class="btn btn-primary ">Input Barang</button>
  </div>
  <?php echo form_close() ?>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
