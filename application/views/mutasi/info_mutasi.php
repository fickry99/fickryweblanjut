<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->





<section id="main-content">
  <section class="wrapper">
    <h3 style="color: #000000">HISTORY MUTASI BARANG : <?php echo $barang->nama_barang ?></h3>
    <!-- row -->
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center">Tanggal</th>
                <th class="text-center"><a class="btn btn-success btn-xs "><i class="fa fa-arrow-circle-down"></i> Masuk</a></th>
                <th class="text-center"><a class="btn btn-danger btn-xs "><i class="fa fa-arrow-circle-up"></i> Keluar</a></th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Mutasi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($masuk as $masuk): ?>
                <tr>
                  <td class="text-center"><?php echo date('d F Y', strtotime($masuk->tanggal_masuk)); ?></td>
                  <td class="text-center"><?php echo $masuk->stok ?></td>
                  <td></td>
                  <td class="text-center"><?php echo $masuk->keterangan_masuk ?></td>
                  <td class="text-center"><?php echo $masuk->mutasi_masuk ?></td>
                </tr>
              <?php endforeach; ?>
              <?php foreach ($keluar as $keluar): ?>
                <tr>
                  <td class="text-center"><?php echo date('d F Y', strtotime($keluar->tanggal_keluar)); ?></td>
                  <td></td>
                  <td class="text-center"><?php echo $keluar->stok ?></td>
                  <td class="text-center"><?php echo $keluar->keterangan_keluar ?></td>
                  <td class="text-center"><?php echo $keluar->mutasi_keluar ?></td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-md-12 -->
    </div>
    <h3 style="color: #000000">Stok Master : <?php echo $barang->stok ?> Stok</h3>
  </section>
</section>
