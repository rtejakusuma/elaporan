<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <!-- <li><a><i class="fa fa-home"></i> Buat Laporan <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php
          if ($data['user']['id_opd'] != 0) { // non-admin
            foreach ($data['sidebar'] as $type) {
              echo "<li><a href='" . base_url() . "opd/f/" . str_replace(' ', '', $type->nama_surat) . "'>" . $type->nama_surat . "</a></li>";
            }
          } else { }
          ?>
        </ul>
      </li> -->
      <li><a href="<?php echo base_url('opd/riwayatsurat') ?>"><i class="fa fa-edit"></i> Riwayat Surat </a>
      </li>
      <li><a><i class="fa fa-envelope-square"></i>Disposisi<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?= base_url('admin/show_disposisi') ?>"><i class="fa fa-plus"></i>Input</a>
          <li><a href="<?= base_url('admin/rekap_disposisi') ?>"><i class="fa fa-navicon"></i>Rekap Disposisi</a>
        </ul>
      </li>
      </li>
      <li><a href="<?php echo base_url('admin/urungdadi') ?>"><i class="fa fa-edit"></i> Riwayat Surat </a></li>
      <li><a href="<?php echo base_url('admin/f/registrationform') ?>"><i class="fa fa-edit"></i> Tambah User </a></li>
      <li><a href="<?php echo base_url('admin/f/resetpasswordform') ?>"><i class="fa fa-edit"></i> Reset Password </a></li>
      <li><a href="<?php echo base_url('admin/f/tipesuratopdform') ?>"><i class="fa fa-edit"></i> Atur Surat OPD </a></li>
      <!-- <li><a href="<?= base_url('admin/table') ?>"><i class="fa fa-edit"></i> contoh table </a></li> -->
    </ul>
  </div>


</div>