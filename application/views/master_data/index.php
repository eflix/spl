   <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= 'Master Data '.$title ?></h1>

    <form action="<?= base_url('masterdata'); ?>" method="post">
          <div class="row">
          <div class="col-sm-1">
              <div class="form-group">
                <label for="nik">Nama</label>
              </div>

              <div class="form-group">
                <label for="keterangan">No Telp</label>
              </div>

              <div class="form-group">
                <label for="idSurat">Alamat</label>
              </div>
      </div>
      <div class="col-sm-6">
              <div class="form-group">
              <input type="text" class="form-control form-control-sm" id="nama" name="nama">
              </div>

              <div class="form-group">
              <input type="text" class="form-control form-control-sm" id="noTelp" name="noTelp">
              </div>

              <div class="form-group">
                <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="masukan Alamat"></textarea>
              </div>
      </div>
  </div>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </form>


            <table class="table table-hover table-responsive" style="font-size: 12px;">
				        <thead>
				          <tr>
				            <th scope="col">#</th>
				            <th scope="col">Nama</th>
				            <th scope="col">No Telp</th>
				            <th scope="col">Alamat</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
					          $j = 1;
					          foreach ($laundry as $l) : ?>
					          <tr>
					            <td><?= $j ?></td>
					            <td><?= $l['ld_nama']; ?></td>
					            <td><?= $l['ld_no_telp']; ?></td>
					            <td><?= $l['ld_alamat']; ?></td>
					            <td><a class="btn btn-danger btn-sm" href="<?= base_url('masterdata/hapusLaundry/') . $l['ld_id']; ?>">hapus</a>
					            </td>

					          </tr>
				        	<?php $j++; endforeach; ?>  
				          
				        </tbody>
				      </table>
                   

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->