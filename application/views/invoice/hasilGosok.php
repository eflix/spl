<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        

        <form action="<?= base_url('invoice/hasilGosok'); ?>" method="post">
          <div class="row">
          <div class="col-sm-1">
          	
          	<div class="form-group">
                <label for="tanggal">Cabang</label>
            </div>
            <div class="form-group">
                <label for="type">Tanggal</label>
            </div>
		      </div>

		      <div class="col-sm-3">
		      	

		      	<div class="form-group">
                 <input type="text" class="form-control form-control-sm" id="laundry" name="laundry" list="listLaundry">
              <!-- </div> -->

              <datalist id="listLaundry">
                <?php foreach ($laundry as $ln) : ?>
                  <option value="<?= $ln['ld_id'] ?>"><?= $ln['ld_id'].' - '.$ln['ld_nama']; ?></option>
                <?php endforeach; ?>
              </datalist>
		      	</div>

		      	<div class="form-group">
                 <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal">
		      	</div>

		      	

		  	</div>

		  	<div class="col-sm-1">
	          	<div class="form-group">
	                <label for="tanggal">Nama</label>
	            </div>
	            <div class="form-group">
	                <label for="type">Hasil (Kg)</label>
	            </div>
        	</div>

        	<div class="col-sm-4">
        		<div class="form-group">
                 <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="masukan nama" list="listCust">

                 <datalist id="listCust">
                <?php foreach ($customer as $cust) : ?>
                  <option value="<?= $cust['cust_id'] ?>"><?= $cust['cust_id'].' - '.$cust['cust_nama']; ?></option>
                <?php endforeach; ?>
              </datalist>
		      	</div>

		      	<div class="form-group">
                 <input type="text" class="form-control form-control-sm" id="hasil" name="hasil" value="0">
		      	</div>
        	</div>

		  	<div class="col-sm-12">
		  		<button type="submit" class="btn btn-primary">Tambah</button>
        <a href="<?= base_url('kependudukan'); ?>" class="btn btn-danger">Kembali</a>
		  	</div>
		  	</div>
            </form>

    <div class="row mt-3">
						<div class="col-md-8">
							<form action="" method="post">
								<div class="input-group">

									<input type="text" class="form-control form-control-sm" id="sLocn" name="sLocn" list="listLocn" placeholder="pilih Cabang" value="<?php if(!empty($_POST['locn'])) {
										echo $_POST['locn'];
									} ?>">
									<input type="date" class="form-control form-control-sm" name="startDt" style="width:-10%" value="<?= date('Y-m-d') ?>">
									<input type="date" class="form-control form-control-sm" name="endDt" value="<?= date('Y-m-d') ?>">
									<input type="text" class="form-control form-control-sm" placeholder="Cari Pelanggan" name="keyword">

									<div class="input-group-append">
										<button type="submit" class="btn btn-primary">Cari</button>
									</div>
								</div>
							</form>
						</div>
					</div>
    

     
     <table class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th scope="col">Cabang</th>
				            <th scope="col">Tanggal</th>
				            <th scope="col">Nama</th>
				            <th scope="col">Jumlah</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $j = 1;
					          foreach ($hasilGosok as $hg) : ?>
					          <tr>
					            <td><?= $j ?></td>
					            <td><?= $hg['hg_ld_id']; ?></td>
					            <td><?= $hg['hg_tgl']; ?></td>
					            <td><?= $hg['hg_tg_id']; ?></td>
					            <td><?= $hg['hg_hasil']; ?></td>
					            <td><a class="btn btn-danger btn-sm" href="<?= base_url('surat/hapusPS/') . $hg['hg_id']; ?>">hapus</a>
					            </td>

					          </tr>
				        	<?php $j++; endforeach; ?>  
				          
				        </tbody>
				      </table>               

    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content