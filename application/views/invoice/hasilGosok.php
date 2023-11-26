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
				  <select class="form-control" name="laundry" id="laundry">
							<option value=""></option>
							<?php foreach ($laundry as $ln) : ?>
								<option value="<?= $ln['ld_id'] ?>"><?=$ln['ld_nama']; ?></option>
							<?php endforeach; ?>
						</select>
                 <!-- <input type="text" class="form-control form-control-sm" id="laundry" name="laundry" list="listLaundry"> -->
              <!-- </div> -->

              <!-- <datalist id="listLaundry">
                <?php foreach ($laundry as $ln) : ?>
                  <option value="<?= $ln['ld_id'] ?>"><?= $ln['ld_id'].' - '.$ln['ld_nama']; ?></option>
                <?php endforeach; ?>
              </datalist> -->
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
				<select class="form-control" name="nama" id="nama">
								<option value=""></option>
								<?php foreach ($tukang_gosok as $cust) : ?>
											<option value="<?= $cust['tg_ld_id'] ?>"><?= $cust['tg_nama']; ?></option>
											<?php endforeach; ?>
							</select>
		      	</div>

		      	<div class="form-group">
                 <input type="text" class="form-control form-control-sm" id="hasil" name="hasil" value="0">
		      	</div>
        	</div>

		  	<div class="col-sm-12">
		  		<button type="submit" class="btn btn-primary">Tambah</button>
        <!-- <a href="<?= base_url('kependudukan'); ?>" class="btn btn-danger">Kembali</a> -->
		  	</div>
		  	</div>
            </form>

    <div class="row mt-3">
						<div class="col-md-12">
							<form action="" method="post">
							<div class="row">
									<div class="col-md-3">
										<select class="form-control" name="sLocn" id="sLocn">
											<option value="">All</option>
											<?php foreach ($laundry as $ln) : ?>
												<option value="<?= $ln['ld_id'] ?>"><?=$ln['ld_nama']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-md-2">
										<input type="date" class="form-control form-control-sm" name="startDt" style="width:-10%" value="<?= $startDt; ?>">
									</div>
									<div class="col-md-2">
										<input type="date" class="form-control form-control-sm" name="endDt" value="<?= $endDt; ?>">
									</div>
									<div class="col-md-2">
										<input type="text" class="form-control form-control-sm" placeholder="Cari Pelanggan" name="keyword">
									</div>
									<div class="col-md-1">
										<div class="input-group-append">
											<button type="submit" class="btn btn-primary">Cari</button>
										</div>
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
				            <th scope="col">Jumlah (KG)</th>
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
					            <td><a class="btn btn-danger btn-sm" href="<?= base_url('invoice/hapusHG/') . $hg['hg_id']; ?>">hapus</a>
					            </td>

					          </tr>
				        	<?php $j++; endforeach; ?>  
				          
				        </tbody>
				      </table>               

    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content