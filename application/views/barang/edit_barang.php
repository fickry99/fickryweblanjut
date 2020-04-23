<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3 class="text-center">Tambah Barang</h3>
    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4 class="mb">Form pengisian tambah barang</h4>
         <?php echo form_open ('barang/edit_proses/'.$barang->id_barang, 'class="form-horizontal style-form"',array('method' => 'POST' )); ?>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
              <div class="col-sm-10">
                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?php echo $barang->nama_barang ?>">
                <small class="form-text text-danger"><?= form_error('nama_barang'); ?></small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Stok Barang</label>
              <div class="col-sm-10">
                <input type="text" name="stok" class="form-control" placeholder="stok barang" value="<?php echo $barang->stok ?>">
                <small class="form-text text-danger"><?= form_error('stok'); ?></small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input type="text" name="keterangan" class="form-control" placeholder="Isi keterangan" value="<?php echo $barang->keterangan ?>">
                <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
              </div>
            </div>
        </div>
      </div>
      <!-- col-lg-12-->
    </div>
    <!-- /row -->
  </section>
  <div class="mb text-center">
    <button class="btn btn-primary ">Edit Barang</button>
  </div>
  <?php echo form_close() ?>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
