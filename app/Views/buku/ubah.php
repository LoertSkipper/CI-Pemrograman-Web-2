<?= $this->include('layout/header'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mt-2">Form Ubah Buku</h3>
            <form action="/buku/update/<?= $buku['id_buku'] ?>" method="post" class="mt-4" enctype="multipart/form-data" class="mt-4">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $buku['id_buku'] ?>">
                <input type="hidden" name="sampulLama" value="<?= $buku['sampul'] ?>">
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-4">
                        <input
                            type="text"
                            class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>"
                            id="judul"
                            name="judul"
                            value="<?= (old('judul')) ? old('judul') : $buku['judul'] ?>"
                            autofocus
                        >
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                    <div class="col-sm-4">
                        <input
                            type="text"
                            class="form-control"
                            id="pengarang"
                            name="pengarang"
                            value="<?= (old('pengarang')) ? old('pengarang') : $buku['pengarang'] ?>"
                        >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-4">
                        <input
                            type="text"
                            class="form-control"
                            id="penerbit"
                            name="penerbit"
                            value="<?= (old('penerbit')) ? old('penerbit') : $buku['penerbit'] ?>"
                        >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-4">
                        <input
                            type="text"
                            class="form-control"
                            id="tahun"
                            name="tahun"
                            value="<?= (old('tahun')) ? old('tahun') : $buku['tahun_terbit'] ?>"
                        >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $buku['sampul'] ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-4">
                        <input
                            type="file"
                            class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>"
                            id="sampul"
                            name="sampul"
                        >
                        <div class="invalid-feedback">
                            <?= $validation->getError('sampul') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->include('layout/footer'); ?>