<div class="card p-3">
    <?php  if($this->session->flashdata('pesan_user')) : ?>
        <div class="alert alert-<?= $this->session->flashdata('warna_user') ;?> alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('pesan_user'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  endif ; ?>
    <h4>Halaman <?= $halaman['nama_halaman']; ?> </h4><br>
    <form action="" method="post">
                <label for="admin">Pilih Admin</label> <i class="text-danger">*</i>
                <select name="admin" id="admin" class="form-control">
                    
                    <?php foreach ($user as $u) : ?>
                        <?php if($u['id_user'] != 1) : ?>
                            <?php if(set_value('admin') == $u['id_user']) : ?>
                                <option selected value="<?= $u['id_user'] ; ?>|<?= $u['nama_user'] ; ?>"> <?= $u['nama_user']; ?> </option>
                            <?php else : ?>
                                <option value="<?= $u['id_user'] ; ?>|<?= $u['nama_user'] ; ?>"> <?= $u['nama_user']; ?> </option>
                            <?php endif ; ?>
                        <?php endif ; ?>
                    <?php endforeach ; ?>

                </select>
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('admin'); ?></small>

                <input type="hidden" name="nama_halaman" value="<?= $halaman['nama_halaman'];?>">
        <br>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $("#admin").select2({
            theme: 'bootstrap4',
            placeholder: "--Pilih--"
        });
    });
</script>