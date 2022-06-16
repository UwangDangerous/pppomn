<div class="card p-3">
    <?php  if($this->session->flashdata('pesan_user')) : ?>
        <div class="alert alert-<?= $this->session->flashdata('warna_user') ;?> alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('pesan_user'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  endif ; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label for="nip">NIP / NIK</label> <i class="text-danger">*</i>
                <input type="text" name="nip" id="nip" class='form-control mb-3' value='<?= set_value('nip') ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nip'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="nama_user">Nama Lengkap</label> <i class="text-danger">*</i>
                <input type="text" name="nama_user" id="nama_user" class='form-control mb-3' value='<?= set_value('nama_user') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_user'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="email">Email</label> <i class="text-danger">*</i>
                <input type="email" name="email" id="email" class='form-control mb-3' value='<?= set_value('email') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="telp">Nomor Telepon</label> <i class="text-danger">*</i>
                <input type="text" name="telp" id="telp" class='form-control mb-3' value='<?= set_value('telp') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('telp'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="id_satker">Balai / Poksi / Bidang</label>
                <select name="id_satker" id="id_satker" class="form-control">
                    <option value="">--Pilih--</option>
                    <?php foreach ($satker as $s) : ?>
                        <option value="<?= $s['id_satker'] ;?>"><?= $s['nama_satker']; ?></option>
                    <?php endforeach ; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class='form-control mb-3' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('foto'); ?></small>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>