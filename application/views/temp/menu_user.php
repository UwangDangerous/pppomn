    <?php if($this->session->userdata('idKey') == 1) : ?>
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
                    <a class="collapse-item" href="">Akses Level</a>
                    <a class="collapse-item" href="">Level Pengguna </a>
                </div>
            </div>
        </li>
    <?php else : ?>

        <?php $this->db->select('id_level'); ?>
        <?php $level = $this->db->get('_level')->result_array() ;  ?>
        <?php foreach ($level as $lvl) : ?>
            <?php 
                $this->db->where('id_level', $lvl['id_level']) ;
                $this->db->where('id_user', $this->session->userdata('idKey')) ;
                $this->db->select('id_level') ;
                $akses = $this->db->get('_level_use')->row_array(); 
            ?>

            <?php if($akses) : ?>

            <?php endif ; ?>
        <?php endforeach ; ?>
        
    <?php endif ; ?>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>