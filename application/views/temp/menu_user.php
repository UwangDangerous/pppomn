    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </a>
    </li>
    
    <?php 
    
    ?>

    <?php if($this->session->userdata('idKey') == 1) : ?> <!-- akun admin -->
        <?php $hal = [true, true] ?> 
        <!-- administrator, ruangan umum -->
    <?php else : ?>

        <?php $this->db->select('id_halaman'); ?>
        <?php $level = $this->db->get('_halaman')->result_array() ;  ?>
        <?php foreach ($level as $lvl) : ?>
            <?php 
                $this->db->where('id_halaman', $lvl['id_halaman']) ;
                $this->db->where('id_user', $this->session->userdata('idKey')) ;
                $this->db->select('id_halaman') ;
                $akses = $this->db->get('_admin_halaman')->row_array(); 
            ?>

            <?php if($akses) : ?>

                <?php if($akses['id_halaman'] == 1) : ?>
                    <?php $hal = [true, false] ?>
                <?php else : ?>
                    <?php $hal = [false, true] ?>
                <?php endif ; ?>

            <?php endif ; ?>

        <?php endforeach ; ?>
        
    <?php endif ; ?>


        <?php if($hal[0] == true) : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Awal</h6>
                        <a class="collapse-item" href="<?= MYURL;?>admin/user">User</a>
                        <a class="collapse-item" href="<?= MYURL;?>admin/halaman">Halaman Kerja</a>
                    </div>
                </div>
            </li>
        <?php endif ; ?>

        <?php if($hal[1] == true) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= MYURL ;?>ruangan/ruangan">
                    <i class="fas fa-home"></i>
                    <span>Ruangan PPPOMN</span>
                </a>
            </li>
        <?php endif ; ?>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>