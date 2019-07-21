<!-- page content -->

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Berita Acara</h3>
    </div>

  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Form Design <small>different form elements</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url() . "submitform" ?>' method="post">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_surat">Nama Surat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="no_surat" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hari">Hari <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="hari" name="hari" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label for="tgl" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="tgl" class="form-control col-md-7 col-xs-12" type="date" name="tgl" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="jam" class="control-label col-md-3 col-sm-3 col-xs-12">Jam</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="jam" class="form-control col-md-7 col-xs-12" type="time" name="jam" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="tempat" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="tempat" class="form-control col-md-7 col-xs-12" type="text" name="tempat" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="paket_kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Paket Kerja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="paket_kerja" class="form-control col-md-7 col-xs-12" type="date" name="paket_kerja" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="sumber_dana" class="control-label col-md-3 col-sm-3 col-xs-12">Sumber Dana</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="sumber_dana" class="form-control col-md-7 col-xs-12" type="text" name="sumber_dana" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="pagu" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="pagu" class="form-control col-md-7 col-xs-12" type="number" name="pagu" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="thn_anggaran" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Anggaran</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="thn_anggaran" class="form-control col-md-7 col-xs-12" type="number" name="thn_anggaran" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="skpd" class="control-label col-md-3 col-sm-3 col-xs-12">SKPD</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="skpd" class="form-control col-md-7 col-xs-12" type="number" name="skpd" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan_pa_atas" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Atas</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="jabatan_pa_atas" class="form-control col-md-7 col-xs-12" type="text" name="jabatan_pa_atas" required="required">
              </div>
            </div>

            <div class="form-group">
              <label for="nama_pa" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nama_pa" class="form-control col-md-7 col-xs-12" type="int" name="nama_pa" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan_pa_bawah" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Bawah</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="jabatan_pa_bawah" class="form-control col-md-7 col-xs-12" type="text" name="jabatan_pa_bawah" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="nip_pa" class="control-label col-md-3 col-sm-3 col-xs-12">NIP</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nip_pa" class="form-control col-md-7 col-xs-12" type="text" name="nip_pa" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan_pokja_atas" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Pokja Atas</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="jabatan_pokja_atas" class="form-control col-md-7 col-xs-12" type="text" name="jabatan_pokja_atas" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="nama_pokja" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pokja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nama_pokja" class="form-control col-md-7 col-xs-12" type="text" name="nama_pokja" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan_pokja_bawah" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Pokja Bawah</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="jabatan_pokja_bawah" class="form-control col-md-7 col-xs-12" type="text" name="jabatan_pokja_bawah" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="nip_pokja" class="control-label col-md-3 col-sm-3 col-xs-12">NIP Pokja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nip_pokja" class="form-control col-md-7 col-xs-12" type="text" name="nip_pokja" required="required">
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="button">Cancel</button>
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- /page content -->