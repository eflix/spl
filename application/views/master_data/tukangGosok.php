   <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= 'Master Data '.$title ?></h1>

    <form action="<?= base_url('masterdata/tukangGosok'); ?>" method="post">
          <div class="row">
          <div class="col-sm-1">
            <div class="form-group">
                <label for="laundry">Cabang</label>
              </div>

              <div class="form-group">
                <label for="nik">Nama</label>
              </div>

              <div class="form-group">
                <label for="keterangan">No Telp</label>
              </div>

              
      </div>
      <div class="col-sm-5">
              <div class="form-group">
              <input type="text" class="form-control form-control-sm" id="laundry" name="laundry" list="listLaundry">
              </div>

              <datalist id="listLaundry">
                <?php foreach ($laundry as $ln) : ?>
                  <option value="<?= $ln['ld_id'] ?>"><?= $ln['ld_id'].' - '.$ln['ld_nama']; ?></option>
                <?php endforeach; ?>
              </datalist>

              <div class="form-group">
              <input type="text" class="form-control form-control-sm" id="nama" name="nama">
              </div>

              <div class="form-group">
              <input type="text" class="form-control form-control-sm" id="noTelp" name="noTelp">
              </div>
      </div>

      <div class="col-sm-1">
              <div class="form-group">
                <label for="nik">Harga/Kg</label>
              </div>

              <div class="form-group">
                <label for="idSurat">Alamat</label>
              </div>
      </div>
      <div class="col-sm-5">
              <div class="form-group">
              <input type="text" class="form-control form-control-sm" id="hrgPerKg" name="hrgPerKg" value="0">
              </div>

              <div class="form-group">
                <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukan Alamat"></textarea>
              </div>
      </div>

  </div>
    <div class="row">
      <div class="col-sm">
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
      </div>
    </div>
        
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
					          foreach ($tukangGosok as $tg) : ?>
					          <tr>
					            <td><?= $j ?></td>
					            <td><?= $tg['tg_nama']; ?></td>
					            <td><?= $tg['tg_no_telp']; ?></td>
					            <td><?= $tg['tg_alamat']; ?></td>
					            <td><a class="btn btn-danger btn-sm" href="<?= base_url('masterdata/hapusCustomer/') . $tg['tg_id']; ?>">hapus</a>
					            </td>

					          </tr>
				        	<?php $j++; endforeach; ?>  
				          
				        </tbody>
				      </table>
                   

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->