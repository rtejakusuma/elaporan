<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <li><a href="<?php echo base_url('admin/riwayat') ?>"><i class="fa fa-edit"></i> Riwayat laporan </a></li>
      <li><a href="<?php echo base_url('admin/f/registrationform') ?>"><i class="fa fa-edit"></i> Tambah User </a></li>
      <li><a href="<?php echo base_url('admin/f/resetpasswordform') ?>"><i class="fa fa-edit"></i> Reset Password </a></li>
      <li><a href="<?php echo base_url('admin/f/tipelaporanopdform') ?>"><i class="fa fa-edit"></i> Atur laporan OPD </a></li>
      <li><a><i class="fa fa-database"></i> Database <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?= base_url('database/opd') ?>">OPD</a></li>
          <li><a href="<?= base_url('database/user') ?>">User</a></li>
          <li><a href="<?= base_url('database/opdtipe') ?>">Tipe OPD</a></li>
        </ul>
      </li>
    </ul>
  </div>


</div>