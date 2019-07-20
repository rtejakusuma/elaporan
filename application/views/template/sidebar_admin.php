<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> Buat Laporan <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php
            if($this->session->tempdata('id_opd') != 0){ // non-admin
              foreach ($data['sidebar']->nama_surat as $type) {
                echo "<li><a href='" . base_url() . "opd/f/$type'>" . $type . "</a></li>";
              }
            } else {

            }
          ?>
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> Riwayat Laporan <span class="fa fa-chevron-down"></span></a>
      </li>
    </ul>
  </div>


</div>