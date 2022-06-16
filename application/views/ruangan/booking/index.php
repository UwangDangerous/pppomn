<div class="card p-3">
    <div class="row mb-3">
        <div class="col">
            <a href="<?= MYURL;?>ruangan/ruangan/tambah" data-toggle='toogle' title='Tambah Data' class="btn btn-primary">Tambah Data</a>
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
        <table class="table table-sm table-bordered table-striped text-center" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Ruangan</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($ruangan as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_ruangan'] ?></td>
                        <td><?= $row['lokasi'] ?></td>
                        <td></td>
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