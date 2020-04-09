<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Tabel Informasi Barang</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Bahan Baku</h4>
          <section id="unseen">
            <table class="table table-bordered table-striped table-condensed">
              <thead>
                <tr>
                  <th>no </th>
                  <th>Nama Barang</th>
                  <th class="numeric">tanggal update</th>
                  <th class="numeric">stok</th>
                  <th ><a href=<?php echo base_url('dashboard/tambah') ?> class="btn btn-primary" > Tambah </th>
                </tr>
              </thead>
              <?php
                $no = 1;
                foreach ($data_barang as $key => $ass) : ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $ass->nama_barang ?></td>
                  <td><?php echo $ass->tanggal_masuk ?></td>
                  <td><?php echo $ass->stok ?></td>
                  <td>
                     <a href="<?php echo base_url('dashboard/edit/'.$ass->id_barang) ?>" class="btn btn-success" > Update</a>

                     <a href="" class="btn btn-info">Info </a>

                     <a class="btn btn-warning" href="<?php echo base_url('dashboard/hapus/'.$ass->id_barang) ?>" >Hapus</a></td>
                </tr>
              <?php endforeach ?>
            </table>
          </section>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-lg-4 -->
    </div>
    <!-- /row -->
