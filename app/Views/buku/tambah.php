<?= $this->include('layout/header'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mt-2">Form Tambah Buku</h3>
            <form action="/buku/simpan" method="post" enctype="multipart/form-data" class="mt-4">
                <?= csrf_field() ?>
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-4">
                        <input
                            type="text"
                            class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>"
                            id="judul"
                            name="judul"
                            value="<?= old('judul') ?>"
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
                            value="<?= old('pengarang') ?>"
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
                            value="<?= old('penerbit') ?>"
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
                            value="<?= old('tahun') ?>"
                        >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
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
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
