<div class="card p-3">
    <div class="row mb-3">
        <div class="col">
            <a href="<?= MYURL;?>admin/user/tambah" data-toggle='toogle' title='Tambah Data' class="btn btn-primary">Tambah Data</a>
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
                    <th>NIP / NIK</th>
                    <th>Nama User</th>
                    <th>Emial</th>
                    <th>Telp</th>
                    <th>Satker</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($user as $row) : ?>
                    <?php if($row['id_user'] != 1) : ?>
                        
                    
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nip'] ?></td>
                        <td><?= $row['nama_user'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['telp'] ?></td>
                        <td><?= $row['nama_satker'] ?></td>
                        <td>
                            <?php if($row['status'] == 1) : ?>
                                <i class="text-success"> aktif </i>
                            <?php elseif($row['status'] == 2) : ?>
                                <i class="text-danger"> keluar </i>
                            <?php elseif($row['status'] == 3) : ?>
                                <i class="text-danger"> pensiun </i>
                            <?php else : ?>
                                <i class="text-warning"> non aktif </i>
                            <?php endif ; ?>
                        </td>
                        <td>
                            <a href="<?= base_url(); ?>admin/user/ubah/<?= $row['id_user']; ?>" data-toggle='tooltip' title='Ubah Data' class="badge badge-success"><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url(); ?>admin/user/hapus/<?= $row['id_user']; ?>" data-toggle='tooltip' title='Hapus Data' class="badge badge-danger" onclick="return confirm('Yakin Hapus?');"><i class="fa fa-trash"></i></a>
                            <div class="dropdown">
                                <a class="badge badge-info dropdown-toggle" href="#" id="dropdownMenuButton<?= $row['id_user']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" title="ubah status user">
                                    <i class="fa fa-user"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $row['id_user']; ?>">
                                    <?php if($row['status'] == 1) : ?>
                                        <?php $aktif = [true, false, true, true] ?>
                                    <?php elseif($row['status'] == 2) : ?>
                                        <?php $aktif = [true, true, false, true] ?>
                                    <?php elseif($row['status'] == 3) : ?>
                                        <?php $aktif = [true, true, true, false] ?>
                                    <?php else : ?>
                                        <?php $aktif = [false, true, true, true] ?>
                                    <?php endif ; ?>

                                    <?php for($i = 0; $i < 4 ; $i++ ):?>
                                        <?php if($aktif[$i] == true) : ?>
                                            <?php if($i == 0) : ?>
                                                <a class="dropdown-item" href="<?= MYURL ?>admin/user/status/<?= $row['id_user'];?>/0" onclick="return confirm('Non Aktifkan User?')">non aktif</a>
                                            <?php elseif($i == 1) : ?>
                                                <a class="dropdown-item" href="<?= MYURL ?>admin/user/status/<?= $row['id_user'];?>/1" onclick="return confirm('Aktifkan User')">aktif</a>
                                            <?php elseif($i == 2) : ?>
                                                <a class="dropdown-item" href="<?= MYURL ?>admin/user/status/<?= $row['id_user'];?>/2" onclick="return confirm('User Sudah Keluar?')">keluar</a>
                                            <?php elseif($i == 3) : ?>
                                                <a class="dropdown-item" href="<?= MYURL ?>admin/user/status/<?= $row['id_user'];?>/3" onclick="return confirm('User Sudah Pensiun?')">pensiun</a>
                                            <?php endif ; ?>
                                        <?php endif ; ?>
                                    <?php endfor ; ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php endif ; ?>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>