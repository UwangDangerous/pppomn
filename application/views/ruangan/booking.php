<div class="card p-3">
    <div class="row mb-3">
        <div class="col">
            <a href="<?= MYURL;?>ruangan/booking_tambah/<?= $id; ?>" data-toggle='toogle' title='Tambah Data' class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
    <?php  if($this->session->flashdata('pesan')) : ?>
        <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  endif ; ?>
    
    <div class="table-responsive">
        <table class="table table-sm table-bordered text-center" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Peminjam</th>
                    <th>Poksi / Balai / TU</th>
                    <th>Tanggal</th>
                    <th>Lama</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($ruangan as $row) : ?>
                    <?php $tanggal = $this->Utility_model->hitungTanggalRapat($row['tgl_booking'], $row['lama_booking'], $row['jam_booking'], $row['selesai_booking'] ) ; ?>
                    <tr class='alert-<?= $tanggal['alert'];?>'>
                        <td><?= $no++; ?> </td>
                        <td><?= $row['nama_user'] ?></td>
                        <td><?= $row['nama_satker'] ?></td>
                        <td><?= $tanggal['mulai'].' - '.$tanggal['selesai'] ?></td>
                        <td><?= $lama = $row['lama_booking'] ?> hari</td> 
                        <td><?= $row['jam_booking'] ?></td>
                        <td><?= $row['selesai_booking']; ?></td>
                        <td><?= $row['keterangan']; ?></td>
                        <td>
                            <?php if($row['id_user'] == $this->session->userdata('idKey')) : ?>
                                <a href="<?= MYURL; ?>ruangan/hapus_booking/<?= $row['id_booking']; ?>/<?= $row['id_ruangan']; ?>" data-toggle='tooltip' title='Hapus Data Booking' class="badge badge-danger" onclick="return confirm('Hapus Data ?')"><i class="fa fa-trash"></i></a>
                            <?php endif ; ?>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
        
        <br>

        <div>
            <span class="alert-warning"> * Sedang Digunakan Pada Jam Tertentu</span> <br>
            <span class="alert-danger">* Sedang Digunakan</span> 
        </div>

    </div>
</div>