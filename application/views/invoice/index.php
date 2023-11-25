<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title . ' (Input Penghasilan Loundry)'; ?></h1>

        

        <form action="<?= base_url('invoice'); ?>" method="post">
        	<div class="row">
        		<div class="col-sm-1">
        			<div class="form-group">
						<!-- <?php var_dump($laundry); ?> -->
		                <label for="tanggal">Cabang</label>
		            </div>
	        	</div>
	        	<div class="col-sm-4">
	        		<div class="form-group">
						<select class="form-control" name="locn" id="locn">
							<option value=""></option>
							<?php foreach ($laundry as $ln) : ?>
								<option value="<?= $ln['ld_id'] ?>"><?=$ln['ld_nama']; ?></option>
							<?php endforeach; ?>
						</select>
		      		</div>
				</div>
	        </div>

          <div class="row">
			<div class="col-sm-1">
				
				<div class="form-group">
					<label for="tanggal">Tanggal</label>
				</div>
				<div class="form-group">
					<label for="type">Type</label>
				</div>
				</div>

				<div class="col-sm-2">
					<div class="form-group">
					<input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" value="<?= $startDt; ?>">
					</div>

					<div class="form-group">
					<select class="form-control" id="type" name="type">
						<option>TUNAI</option>
						<option>HUTANG</option>
					</select>
					</div>

					

				</div>

				<div class="col-sm-1">
					<div class="form-group">
						<label for="tanggal">Nama</label>
					</div>
					<div class="form-group">
						<label for="type">Alamat</label>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
					<select class="form-control" name="nama" id="nama">
								<option value=""></option>
								<?php foreach ($customer as $cust) : ?>
											<option value="<?= $cust['cust_id'] ?>"><?= $cust['cust_nama']; ?></option>
											<?php endforeach; ?>
							</select>
					</div>

					<div class="form-group">
					<input type="text" class="form-control form-control-sm" id="alamat" name="alamat" placeholder="masukan alamat">
					</div>
				</div>

				<div class="col-sm-1">
					<div class="form-group">
						<label for="jumlah">Jumlah</label>
					</div>
					<div class="form-group">
						<label for="type">Notes</label>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="form-group">
					<input type="text" class="form-control form-control-sm" id="jml" name="jml" value="0">
					</div>

					<div class="form-group">
					<textarea class="form-control" id="notes" name="notes"></textarea>
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

								<div class="input-group">

									

									
									
									

									
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
				            <th scope="col">Type</th>
				            <th scope="col">Nama</th>
				            <th scope="col">Alamat</th>
				            <th scope="col">Jumlah</th>
				            <th scope="col">Bayar</th>
				            <th>Keterangan</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $j = 1;
					          foreach ($invoice as $i) : ?>
					          <tr>
					            <td><?= $j ?></td>
					            <td><?= $i['fin_inv_locn']; ?></td>
					            <td><?= $i['fin_inv_dt']; ?></td>
					            <td><?= $i['fin_inv_type']; ?></td>
					            <td><?= $i['fin_inv_cust_id']; ?></td>
					            <td><?= $i['fin_inv_city']; ?></td>
					            <td><?= $i['fin_inv_total_amt']; ?></td>
					            <td><?= $i['fin_inv_paid_amt']; ?></td>
					            <td><?= $i['fin_inv_notes']; ?></td>
					            <td><a class="btn btn-danger btn-sm" href="<?= base_url('surat/hapusPS/') . $i['fin_inv_no']; ?>">hapus</a>
					            </td>

					          </tr>
				        	<?php $j++; endforeach; ?>  
				          
				        </tbody>
				      </table>               

    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<script>
	//  $('#locn').select2();
</script>