<div class="card p-3">
    <div class="row mb-3">
        <div class="col">
            <a href="<?= MYURL;?>admRuangan/ruangan/booking_tambah/<?= $id; ?>" data-toggle='toogle' title='Tambah Data' class="btn btn-primary">Tambah Data</a>
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
                    <th>Jam</th>
                    <th>Selesai</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($ruangan as $row) : ?>
                    <?php if($row['tgl_booking'] == date("Y-m-d")) : ?>
                        <tr class='alert-success'>
                    <?php else : ?>
                        <tr>
                    <?php endif ; ?>
                        <td><?= $no++; ?> </td>
                        <td><?= $row['nama_user'] ?></td>
                        <td><?= $row['nama_satker'] ?></td>
                        <td><?= $this->Utility_model->formatTanggal( $row['tgl_booking'] ) ?></td>
                        <td><?= $lama = $row['lama_booking'] ?> hari</td> 
                        <td><?= $row['jam_booking'] ?></td>
                        <td>
                            <?php if($row['lama_booking'] > 1 ) : ?>
                                <?php 
                                    $lama -- ;
                                    $selesai = date("Y-m-d", strtotime("$lama day",  strtotime($row['tgl_booking']) ) ) ; 
                                    echo $this->Utility_model->formatTanggal($selesai) ;
                                ?>
                            <?php else : ?>
                                <?= $this->Utility_model->formatTanggal( $row['tgl_booking'] ) ?>
                            <?php endif ; ?>
                        </td>
                        <td><?= $row['keterangan']; ?></td>
                        <td>
                            <a href="<?= MYURL; ?>ruangan/ruangan/booking/<?= $row['id_ruangan']; ?>" data-toggle='tooltip' title='Booking Ruangan' class="badge badge-primary"><i class="fas fa-file-signature"></i></a>
                            <a href="<?= MYURL; ?>ruangan/ruangan/ubah/<?= $row['id_ruangan']; ?>" data-toggle='tooltip' title='Ubah Ruangan' class="badge badge-success"><i class="fa fa-edit"></i></a>
                            <a href="<?= MYURL; ?>ruangan/ruangan/hapus/<?= $row['id_ruangan']; ?>" data-toggle='tooltip' title='Hapus Ruangan' class="badge badge-danger" onclick="return confirm('Hapus Data ?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>