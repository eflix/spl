   <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title . ' ' ?></h1>
        
    <form action="<?= base_url('inventory/editStock'); ?>" method="post">
        	<div class="row">
        		<div class="col-sm-1">
        			<div class="form-group">
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
                 <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" value="<?= date('Y-m-d'); ?>">
		      	</div>

		      	<div class="form-group">
                 <select class="form-control" id="type" name="type">
                 	<option>PEMBELIAN</option>
                 	<option>PEMAKAIAN</option>
                 </select>
		      	</div>

		  	</div>

		  	<div class="col-sm-1">
	          	<div class="form-group">
	                <label for="tanggal">Nama Barang</label>
	            </div>
	            <div class="form-group">
	                <label for="type">Qty / UOM</label>
	            </div>
        	</div>

        	<div class="col-sm-4">
        		<div class="form-group">
					<select class="form-control" name="namaBrg" id="namaBrg">
						<option value=""></option>
						<?php foreach ($items as $i) : ?>
							<option value="<?= $i['item_id'] ?>"><?=$i['item_nama']; ?></option>
						<?php endforeach; ?>
					</select>
                 <!-- <input type="text" class="form-control form-control-sm" id="namaBrg" name="namaBrg" placeholder="nama barang" list="listItems">

                 <datalist id="listItems">
						                <?php foreach ($items as $i) : ?>
						                  <option value="<?= $i['item_id'] ?>"><?= $i['item_id'] . '-' . $i['item_nama']; ?></option>
						                <?php endforeach; ?>
						              </datalist> -->
		      	</div>

		      	<div class="form-group form-inline">
                 <input type="text" class="form-control form-control-sm" id="qty" name="qty" value="0">
                 <input type="text" class="form-control form-control-sm" id="uom" name="uom" placeholder="satuan">
		      	</div>
        	</div>

        	<div class="col-sm-1">
	          	<div class="form-group">
	                <label for="jumlah">Harga</label>
	            </div>
	            <div class="form-group">
	                <label for="type">Notes</label>
	            </div>
        	</div>

        	<div class="col-sm-3">
        		<div class="form-group">
                 <input type="text" class="form-control form-control-sm" id="harga" name="harga" value="0">
		      	</div>

		      	<div class="form-group">
                 <textarea class="form-control" id="notes" name="notes"></textarea>
		      	</div>
        	</div>

		  	<div class="col-sm-12">
		  		<button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="<?= base_url('inventory'); ?>" class="btn btn-danger btn-sm">Kembali</a>
        
		  	</div>
		  	</div>
            </form>

    <table class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th scope="col">Cabang</th>
				            <th scope="col">Tanggal</th>
				            <th scope="col">Nama Barang</th>
				            <th scope="col">UOM</th>
				            <th scope="col">Jumlah</th>
				            <th scope="col">Harga</th>
				            <th scope="col">Keterangan</th>
				            <!-- <th scope="col">Stock Akhir</th> -->
				            <!-- <th scope="col">Jumlah</th>
				            <th scope="col">Bayar</th>
				            <th>Keterangan</th> -->
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $j = 1;
					          foreach ($inventory as $i) : ?>
					          <tr>
					          	<td><?= $j; ?></td>
					          	<td><?= $i['inv_tran_locn']; ?></td>
					          	<td><?= $i['inv_tran_dt']; ?></td>
					            <td><?= $i['inv_tran_item_name']; ?></td>
					            <td><?= $i['inv_tran_item_uom']; ?></td>
					            <td><?= $i['inv_tran_item_qty']; ?></td>
					            <td><?= $i['inv_tran_item_price']; ?></td>
					            <td><?= $i['inv_tran_notes']; ?></td>
					            <td><a class="btn btn-danger btn-sm" href="<?= base_url('surat/hapusPS/') . $i['inv_tran_no']; ?>">Hapus</a>
					            </td>

					          </tr>
				        	<?php $j++; endforeach; ?>  
				          
				        </tbody>
				      </table>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->