<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3 class="text-center">INPUT MUTASI BARANG</h3>
    <!-- row -->
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center"><i class="fa fa-archive"></i> Nama Barang</th>
                <th class="text-center"><i class="fa fa-shopping-cart"></i> Stok</th>
                <th class="text-center"><i class="fa fa-bookmark"></i> Keterangan</th>
                <th class="text-center"><i class="fa fa-edit"></i> Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($data_barang as $db): ?>
                <tr>
                  <td class="text-center"><?php echo $db->nama_barang ?></td>
                  <td class="text-center"><?php echo $db->stok ?> Stok</td>
                  <td class="text-center"><?php echo $db->keterangan ?> </td>
                  <td class="text-center">
                    <a href="<?php echo base_url('Mutasi/input_masuk/'.$db->id_barang) ?>" class="btn btn-success btn-xs "><i class="fa fa-arrow-circle-down"></i> Masuk</a>
                    <a href="<?php echo base_url('Mutasi/input_keluar/'.$db->id_barang) ?>" class="btn btn-danger btn-xs "><i class="fa fa-arrow-circle-up"></i> Keluar</a>
                  </td class="text-center">
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-md-12 -->
    </div>
    <!-- /row -->
  </section>
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
