<!-- <!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center>
		<h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1>
		<h3>Edit Data</h3>
	</center>
	<?php foreach($user as $u){ ?>
	<form action="<?php echo base_url(). 'crud/update'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $u->id ?>">
					<input type="text" name="nama" value="<?php echo $u->nama ?>">
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $u->alamat ?>"></td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td><input type="text" name="pekerjaan" value="<?php echo $u->pekerjaan ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php } ?>
</body>
</html> -->

<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Update data</h3>
    <!-- /row -->
    <!-- FORM VALIDATION -->
    <div class="row mt">
      <div class="col-lg-12">
          <div class=" form" class="cmxform form-horizontal style-form">

          	<?php echo form_open ('dashboard/edit_proses', array('method' => 'POST' )); ?>
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">Name barang</label>
                <div class="col-lg-10">
                  <input class=" form-control" type="hidden" name="id_barang" value="<?php echo $barang->id_barang ?>" />
                  <input class=" form-control" type="text" name="nama_barang" value="<?php echo $barang->nama_barang ?>" disabled/>
                </div>
              </div>
              <div class="form-group ">
                <label for="cemail" class="control-label col-lg-2">tanggal </label>
                <div class="col-lg-10">
                  <input class="form-control " type="text" value="<?php echo date('Y-m-d') ?>" disabled />
                </div>
              </div>
              <div class="form-group ">
                <label for="curl" class="control-label col-lg-2">jumlah</label>
                <div class="col-lg-10">
                  <input class="form-control " type="text" name="stok" value="<?php echo $barang->stok ?>" />
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
