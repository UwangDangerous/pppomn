<div class="card p-3">
    <form action="" method="post" >
        <div class="row">
            <div class="col-md-4">
                <label for="tgl_booking">Tanggal Booking</label> <i class="text-danger">*</i>
                <input type="date" name="tgl_booking" id="tgl_booking" class='form-control mb-3' value='<?= set_value('tgl_booking') ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('tgl_booking'); ?></small>
            </div>
            <div class="col-md-3">
                <label for="jam_booking">Mulai</label> <i class="text-danger">*</i>
                <input type="time" name="jam_booking" id="jam_booking" class='form-control mb-3' value='<?= set_value('jam_booking') ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('jam_booking'); ?></small>
            </div>
            <div class="col-md-3">
                <label for="selesai_booking">Selesai</label> <i class="text-danger">*</i>
                <input type="time" name="selesai_booking" id="selesai_booking" class='form-control mb-3' value='<?= set_value('selesai_booking') ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('selesai_booking'); ?></small>
            </div>
            <div class="col-md-2">
                <label for="lama_booking">Lama Penggunaan</label> <i class="text-danger">*</i>
                <input type="number" name="lama_booking" id="lama_booking" class='form-control mb-3' value='1' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('lama_booking'); ?></small>
            </div>
            <div class="col-md-12">
                <label for="keterangan">Keterangan</label> <i class="text-danger">*</i>
                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"><?= set_value('keterangan') ;?></textarea>
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('keterangan'); ?></small>
            </div>
            <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </form>
</div>