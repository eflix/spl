   <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title . ' ' ?></h1>
    <div class="col-sm-12 mb-4">
    	<a href="<?= base_url('inventory/editStock'); ?>" class="btn btn-success btn-sm">Edit Stock</a>
    </div>
    

    <table class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <!-- <th scope="col">#</th> -->
				            <th scope="col">Nama Barang</th>
				            <th scope="col">UOM</th>
				            <th scope="col">Stock Awal</th>
				            <th scope="col">Masuk</th>
				            <th scope="col">Keluar</th>
				            <th scope="col">Stock Akhir</th>
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
					            <td><?= $i['inv_tran_item_name']; ?></td>
					            <td><?= $i['inv_tran_item_uom']; ?></td>
					            <td><?= $i['sa']; ?></td>
					            <td><?= $i['qty_in']; ?></td>
					            <td><?= $i['qty_out']; ?></td>
					            <td><?= $i['sa']+$i['qty_in']-$i['qty_out']; ?></td>
					            <td><a class="btn btn-danger btn-sm" href="<?= base_url('surat/hapusPS/') . $i['inv_tran_item_name']; ?>">Detail</a>
					            </td>

					          </tr>
				        	<?php $j++; endforeach; ?>  
				          
				        </tbody>
				      </table> 

                   

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->