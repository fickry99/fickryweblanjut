<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> tambah data</h3>
    <!-- /row -->
    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
          <div class=" form" class="cmxform form-horizontal style-form">
            <?php echo form_open ('dashboard/tambah_proses', array('method' => 'POST' )); ?>
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Name barang</label>
                <div class="col-lg-10">
                  <input class=" form-control" type="text" name="nama" />
                  <small class="form-text text-danger"><?php echo form_error('nama') ?></small>
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">tanggal </label>
                <div class="col-lg-10">
                  <input class="form-control " type="date"  name="tanggal" />
                </div>
              </div>
              <div class="form-group ">
                <label for="curl" class="control-label col-lg-2">jumlah</label>
                <div class="col-lg-10">
                  <input class="form-control " type="text" name="stok" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-theme"> SAVE</button>
                  <!-- <button class="btn btn-theme04" type="button">Cancel</button> -->
                </div>
              </div>
            <?php echo form_close() ?>
          </div>
        <!-- /form-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
    <!-- /row -->
    <!-- /row -->
  </section>
  <!-- /wrapper -->
</section>
