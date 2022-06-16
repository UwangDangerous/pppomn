<div class="card p-3">
    <form action="" method="post" >
        <label for="nama_ruangan">Ruangan</label> <i class="text-danger">*</i>
        <input type="text" name="nama_ruangan" id="nama_ruangan" class='form-control mb-3' value='<?= $ruangan['nama_ruangan'] ;?>' autofocus autocomplete="off">
        <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_ruangan'); ?></small>

        <label for="lokasi">Lokasi</label> <i class="text-danger">*</i>
        <input type="text" name="lokasi" id="lokasi" class='form-control mb-3' value='<?= $ruangan['lokasi'] ;?>' autofocus autocomplete="off">
        <small id="usernameHelp" class="form-text text-danger"><?= form_error('lokasi'); ?></small>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>