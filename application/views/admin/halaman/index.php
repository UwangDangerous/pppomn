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
                    <th>Halaman</th>
                    <th>Penanggung Jawab / Admin Halaman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($halaman as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_halaman'] ?></td>
                        <td>
                            <?php $admin = $this->Halaman_model->getDataAdminHalaman($row['id_halaman']) ; ?>
                            <?php if($admin) : ?>
                                
                                    <?php foreach ($admin as $adm) : ?>
                                        <?php if($adm['id_user'] != 1) : ?>
                                            <li class=" d-flex justify-content-between mb-1">
                                                <?= $adm['nama_user']; ?>
                                                <a href="<?= MYURL;?>admin/halaman/hapus/<?= $adm['id_adm_hal'];?>" class="badge badge-danger" onclick="return confirm('hapus <?= $adm['nama_user']; ?> dari daftar admin')"> <i class="fa fa-trash"></i> </a>
                                            </li>
                                        <?php endif ; ?>
                                    <?php endforeach ; ?>

                            <?php else : ?>
                                <i class="text-danger">kosong</i>
                            <?php endif ; ?>
                        </td>
                        <td>
                            <a href="<?= MYURL; ?>admin/halaman/tambah/<?= $row['id_halaman']; ?>" data-toggle='tooltip' title='Tambah Admin' class="badge badge-primary"><i class="fa fa-pen"></i></a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>