<div class="card p-3 mb-3">
    <h2>AKTIFITAS</h2> <br>
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered text-center" id="tabel2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama User</th>
                    <th>keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ; ?>
                <?php foreach ($log as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $this->Utility_model->formatTanggal( $row['tgl_log'] ); ?></td>
                        <td><?= $row['nama_user'] ; ?></td>
                        <td><?= $row['keterangan_log'] ; ?></td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card p-3">
    <h2>LOGIN</h2> <br>
    <div class="table-responsive"> 
        <table class="table table-striped table-bordered text-center" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama User</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ; ?>
                <?php foreach ($login as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $this->Utility_model->formatTanggal( $row['tgl_login'] ); ?></td>
                        <td><?= $row['nama_user'] ; ?></td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>