<div class="card p-3">
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <label for="nip">NIP / NIK</label> <i class="text-danger">*</i>
                <input type="text" name="nip" id="nip" class='form-control mb-3' value='<?= set_value('nip') ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nip'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="nama_user">Nama Lengkap</label> <i class="text-danger">*</i>
                <input type="text" name="nama_user" id="nama_user" class='form-control mb-3' value='<?= set_value('nama_user') ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_user'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="email">Email</label> <i class="text-danger">*</i>
                <input type="email" name="email" id="email" class='form-control mb-3' value='<?= set_value('email') ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="telp">Nomor Telepon</label> <i class="text-danger">*</i>
                <input type="text" name="telp" id="telp" class='form-control mb-3' value='<?= set_value('telp') ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('telp'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="id_satker">Satker</label> <i class="text-danger">*</i>
                <select name="id_satker" id="id_satker" class="form-control">
                    <option value="">--Pilih--</option>
                    <?php foreach ($satker as $s) : ?>
                        <option value="<?= $s['id_satker'] ;?>"><?= $s['nama_satker']; ?></option>
                    <?php endforeach ; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="foto">Foto</label> <i class="text-danger">*</i>
                <input type="file" name="foto" id="foto" class='form-control mb-3' value='<?= set_value('foto') ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('foto'); ?></small>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>