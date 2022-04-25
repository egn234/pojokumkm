<div class="modal-header">
    <h5 class="modal-title" id="myModalLabel">Edit Kategori</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="konfirEdit" action="<?=base_url()?>/pengelola/kategori/edit/<?=$a->idkategori?>" method="post">
      <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="category_name" value="<?=$a->category_name?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Deskripsi Singkat</label>
        <input type="text" name="category_description" value="<?=$a->category_description?>" class="form-control" required>
      </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
    <button type="submit" form="konfirEdit" class="btn btn-primary">Simpan</button>
</div>