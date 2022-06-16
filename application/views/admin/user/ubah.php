<div class="card p-3">
    <?php  if($this->session->flashdata('pesan_user')) : ?>
        <div class="alert alert-<?= $this->session->flashdata('warna_user') ;?> alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('pesan_user'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  endif ; ?>
    <div class="mb-3">
        <table cellpadding=3 cellspacing=3>
            <tr>
                <th>NIP / NIK</th>
                <td>: <?= $user['nip']; ?></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td>: <?= $user['nama_user']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td>: <?= $user['email']; ?></td>
            </tr>
            <tr>
                <th>Telp</th>
                <td>: <?= $user['telp']; ?></td>
            </tr>
            <tr>
                <th>Balai / Poksi / Bidang</th>
                <td>: <?= $user['nama_satker']; ?></td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <?php if($user['tipe'] == 1) : ?>
                        <img src="<?= $user['foto'];?>" alt="" width="150px">
                    <?php else : ?>
                        <?php if($user['foto'] != '') : ?>
                            <img src="<?= base_url(); ?>assets/upload/foto/<?= $user['foto'];?>" alt="" width="150px">
                        <?php else : ?>
                            <img src="<?= base_url(); ?>assets/img/foto-default.png" alt="" width="150px">
                        <?php endif ; ?>
                    <?php endif ; ?>
                </td>
            </tr>
        </table>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label for="nip">NIP / NIK</label> <i class="text-danger">*</i>
                <input type="text" name="nip" id="nip" class='form-control mb-3' value='<?= $user['nip'] ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nip'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="nama_user">Nama Lengkap</label> <i class="text-danger">*</i>
                <input type="text" name="nama_user" id="nama_user" class='form-control mb-3' value='<?= $user['nama_user'] ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_user'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="email">Email</label> <i class="text-danger">*</i>
                <input type="email" name="email" id="email" class='form-control mb-3' value='<?= $user['email'] ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="telp">Nomor Telepon</label> <i class="text-danger">*</i>
                <input type="text" name="telp" id="telp" class='form-control mb-3' value='<?= $user['telp'] ;?>' autofocus autocomplete="off">
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
                <input type="file" name="foto" id="foto" class='form-control mb-3' value='<?= $user['foto'] ;?>' autofocus autocomplete="off">
                <input type="hidden" value="<?= $user['tipe'] ;?>" name="tipe">
                <input type="hidden" value="<?= $user['foto'] ;?>" name="foto_lama">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>