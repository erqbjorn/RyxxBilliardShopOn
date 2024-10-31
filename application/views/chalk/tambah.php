<div class="container">
     <div class="row mt-5">
          <div class="col-md-5">
          <div class="card">
               <div class="card-header">
               Form Tambah Chalk
               </div>
               <div class="card-body">
                    <form action=""method="post">
               <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                    <small class="form-text text-danger" ><?= form_error('nama')?></small>
               </div>
               <div class="form-group">
                    <label for="poto">Foto</label>
                    <input type="file" class="form-control" id="poto" name="poto">
               </div>
               <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga">
                    <small class="form-text text-danger" ><?= form_error('harga')?></small>
               </div>
                    <button type="submit" name="tambah" class="btn btn-primary float-end">Tambah</button>
                    <a href="<?= base_url(); ?>chalk" class="btn btn-danger float-end">Kembali</a>
               </form>
          </div>
     </div>
</div>