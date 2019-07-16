<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> Buat Laporan <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php
          require_once(APPPATH . "libraries/reporttypelist.php");
          $opd = $this->session->tempdata('opd');
          foreach ($reporttype[$opd] as $type) {
            echo "<li><a href='" . base_url() . "admin/f/$type'>" . $type . "</a></li>";
          }
          ?>
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> Riwayat Laporan <span class="fa fa-chevron-down"></span></a>
      </li>
    </ul>
  </div>


</div>