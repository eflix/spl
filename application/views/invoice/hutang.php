<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title . ' (Input Pembayaran Hutang)'; ?></h1>


    		<div class="row mt-3">
						<div class="col-md-12">
							<form action="<?= base_url() ?>/invoice/hutang" method="post">

								<div class="row">
									<div class="col-md-2">
										<input type="date" class="form-control" name="startDt" style="width:-10%" value="<?= $startDt ?>">
									</div>
									<div class="col-md-2">
										<input type="date" class="form-control" name="endDt" value="<?= $endDt ?>">
									</div>
									<div class="col-md-3">
										<select class="form-control" name="sLocn" id="sLocn">
											<option value="">All</option>
											<?php foreach ($laundry as $ln) : ?>
												<option value="<?= $ln['ld_id'] ?>"><?=$ln['ld_nama']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-md-2">
										<input type="text" class="form-control" placeholder="Cari Pelanggan" name="keyword">
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

     
     				<table class="table table-hover table-responsive mt-3" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th scope="col">Tanggal</th>
				            <th scope="col">Type</th>
				            <th scope="col">Nama</th>
				            <th scope="col">Alamat</th>
				            <th scope="col">Jumlah</th>
				            <th scope="col">Dibayar</th>
				            <th scope="col">Keterangan</th>
				            <th>Bayar</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $j = 1;
					          foreach ($invoice as $i) : ?>
					          <tr>
					            <td><?= $j ?></td>
					            <td><?= $i['fin_inv_dt']; ?></td>
					            <td><?= $i['fin_inv_type']; ?></td>
					            <td><?= $i['cust_nama']; ?></td>
					            <td><?= $i['fin_inv_city']; ?></td>
					            <td><?= $i['fin_inv_total_amt']; ?></td>
					            <td><?= $i['fin_inv_paid_amt']; ?></td>
					            <td><?= $i['fin_inv_notes']; ?></td>
					            <form method="post" action="<?= base_url('invoice/bayarHutang') ?>">
					            	<input type="hidden" name="invNo" value="<?= $i['fin_inv_no']; ?>">
					            	<td>
										<div class="form-group">
											<input type="text" class="form-control form-control-sm" id="bayar" name="bayar" value="<?= $i['fin_inv_total_amt']-$i['fin_inv_paid_amt']; ?>">
										</div>
									</td>
					            	<td><button class="btn btn-warning btn-sm">Bayar</button></td>
					            </form>
					            

					          </tr>
				        	<?php $j++; endforeach; ?>  
				          
				        </tbody>
				      </table>               

    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->