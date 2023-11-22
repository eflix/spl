   <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <form action="<?= base_url('laporan'); ?>" method="post">
          <div class="row">
            
            <div class="col-sm-2">
                <div class="form-group">
                  <input type="checkbox" name="cb1" id="cb1" value="cb1">
                  <label for="cb1">Laporan Hutang</label>

                </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group form-inline">
                <label for="cb1">Laundry</label>
                 <input type="text" class="form-control form-control-sm" id="laundry1" name="laundry1" list="listLaundry">

              <datalist id="listLaundry">
                <?php foreach ($laundry as $ln) : ?>
                  <option value="<?= $ln['ld_id'] ?>"><?= $ln['ld_id'].' - '.$ln['ld_nama']; ?></option>
                <?php endforeach; ?>
              </datalist>
            </div>
            </div>
            <div class="col-sm-5">
                    <div class="form-group form-inline">
                      <label for="cb1">Dari</label>
                    <input type="date" class="form-control form-control-sm" name="startDt1" style="width:-10%">
                    <label for="cb1">Ke</label>
                        <input type="date" class="form-control form-control-sm" name="endDt1">
                    </div>
            </div>
          </div>

          <div class="row">
            
            <div class="col-sm-2">
                <div class="form-group">
                  <input type="checkbox" name="cb2" id="cb2" value="cb2">
                  <label for="cb2">Laporan Hasil</label>
                </div>
            </div>

            <div class="col-sm-5">
                    <div class="form-group form-inline">
                      <label for="dari">Dari</label>
                    <input type="date" class="form-control form-control-sm" name="startDt2" style="width:-10%" value="<?= date('Y-m-d') ?>">
                    <label for="ke">Ke</label>
                        <input type="date" class="form-control form-control-sm" name="endDt2" value="<?= date('Y-m-d') ?>">
                    </div>
            </div>

            

            <div class="col-sm-5">
              <div class="form-group form-inline">
                <label>By</label>
                 <select class="form-control" id="cbBy2" name="cbBy2">
                  <option>laundry</option>
                  <option>tanggal</option>
                 </select>
            </div>
            </div>

            <div class="col-sm-2">
            </div>

            <div class="col-sm-5">
              <div class="form-group form-inline">
                <label for="cb1">Laundry</label>
                 <input type="text" class="form-control form-control-sm" id="laundry2" name="laundry2" list="listLaundry">

              <datalist id="listLaundry">
                <?php foreach ($laundry as $ln) : ?>
                  <option value="<?= $ln['ld_id'] ?>"><?= $ln['ld_id'].' - '.$ln['ld_nama']; ?></option>
                <?php endforeach; ?>
              </datalist>
            </div>
            </div>
            
          </div>

          <div class="row">
            
            <div class="col-sm-2">
                <div class="form-group">
                  <input type="checkbox" name="cb3" id="cb3" value="cb3">
                  <label for="cb3">Laporan Hsl Gosok</label>
                </div>
            </div>
            <div class="col-sm-5">
                    <div class="form-group form-inline">
                      <label for="dari3">Dari</label>
                    <input type="date" class="form-control form-control-sm" name="startDt3" style="width:-10%" value="<?= date('Y-m-d') ?>">
                    <label for="ke3">Ke</label>
                        <input type="date" class="form-control form-control-sm" name="endDt3" value="<?= date('Y-m-d') ?>">
                    </div>
            </div>
            
            <div class="col-sm-3">
              <div class="form-group">
                <label for="cb1">Laundry</label>
                 <input type="text" class="form-control form-control-sm" id="laundry3" name="laundry3" list="listLaundry">

              <datalist id="listLaundry">
                <?php foreach ($laundry as $ln) : ?>
                  <option value="<?= $ln['ld_id'] ?>"><?= $ln['ld_id'].' - '.$ln['ld_nama']; ?></option>
                <?php endforeach; ?>
              </datalist>
            </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary" formtarget="">Preview</button>
            </form>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->