<div class="card p-3">
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
                        <td>
                            <?php if($this->Ruangan_model->getDataRuanganForStatus($row['id_ruangan']) > 0) : ?>
                                <i class="text-warning">Sedang Digunakan</i>
                            <?php else : ?>
                                <i class="text-success">Tersedia</i>
                            <?php endif ; ?>
                        </td>
                        <td>
                            <a href="<?= MYURL; ?>uruangan/booking/<?= $row['id_ruangan']; ?>" data-toggle='tooltip' title='Booking Ruangan' class="badge badge-primary"><i class="fas fa-file-signature"></i></a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>