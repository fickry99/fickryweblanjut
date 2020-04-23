<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3 class="text-center">Data barang</h3>
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
                <th class="text-center"><i class="fa fa-info-circle"></i> Status</th>
                <th class="text-center"><i class="fa fa-edit"></i> Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($data_barang as $db): ?>
                <tr>
                  <td class="text-center"><?php echo $db->nama_barang ?></td>
                  <td class="text-center"><?php echo $db->stok ?> Stok</td>
                  <td class="text-center"><?php echo $db->keterangan ?> </td>
                  <?php if ($db->stok > 0): ?>
                    <td class="text-center"><span class="label label-success label-mini "><?php echo $db->status ?></span></td>
                  <?php else: ?>
                    <td class="text-center"><span class="label label-danger label-mini "><?php echo $db->status ?></span></td>
                  <?php endif; ?>

                  <td class="text-center">
                    <a href="<?php echo base_url('Mutasi/info_mutasi/'.$db->id_barang) ?>" class="btn btn-info btn-xs "><i class="fa fa-info-circle"></i></a>
                    <a href="<?php echo base_url('Barang/edit_barang/'.$db->id_barang) ?>" class="btn btn-primary btn-xs "><i class="fa fa-pencil"></i></a>
                    <a href="<?php echo base_url('Barang/hapus_barang/'.$db->id_barang) ?>" class="btn btn-danger btn-xs "><i class="fa fa-trash-o "></i></a>
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
  <div class="row mb text-center">
    <a class="btn btn-primary" href="<?php echo base_url('Barang/tambah_barang') ?>">Tambah Barang</a>
  </div>
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
