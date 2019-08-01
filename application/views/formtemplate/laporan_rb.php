 <!-- page content -->

 <div class="">
  <div class="page-title">
    <div class="title_left">
      <!-- <h3>Reset Password</h3> -->
    </div>

  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Laporan RB</h2>
       
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Laporan RB</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Jenis RB</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Program RB</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Kegiatan RB</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                        <input value="laporan_rb" type="hidden" name="nama_tabel">
                            <div class="form-group">
                            <label for="tgl" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="tgl" class="form-control col-md-7 col-xs-12" type="date" name="tgl" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="judul_rb" class="control-label col-md-3 col-sm-3 col-xs-12">Judul RB</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="judul_rb" class="form-control col-md-7 col-xs-12" type="text" name="judul_rb" required="required">
                            </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            </div>
                        </form>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                        <input value="jenis_rb" type="hidden" name="nama_tabel">
                            <div class="form-group">
                            <label for="rincian" class="control-label col-md-3 col-sm-3 col-xs-12">Rincian</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="rincian" class="form-control col-md-7 col-xs-12" type="text" name="rincian" required="required">
                            </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            </div>
                        </form>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                        <input value="program_rb" type="hidden" name="nama_tabel">
                            <div class="form-group">
                            <label for="nama_program_rb" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Program RB</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nama_program_rb" class="form-control col-md-7 col-xs-12" type="text" name="nama_program_rb" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="sasaran" class="control-label col-md-3 col-sm-3 col-xs-12">Sasaran</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="sasaran" class="form-control col-md-7 col-xs-12" type="text" name="sasaran" required="required">
                            </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            </div>
                        </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                        <input value="kegiatan_rb" type="hidden" name="nama_tabel">
                            <div class="form-group">
                            <label for="nama_kegiatan_rb" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kegiatan RB</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nama_kegiatan_rb" class="form-control col-md-7 col-xs-12" type="text" name="nama_kegiatan_rb" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="indikator_rb" class="control-label col-md-3 col-sm-3 col-xs-12">Indikator RB</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="indikator_rb" class="form-control col-md-7 col-xs-12" type="text" name="indikator_rb" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="target_output" class="control-label col-md-3 col-sm-3 col-xs-12">Target Output</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="target_output" class="form-control col-md-7 col-xs-12" type="text" name="target_output" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="realisasi_output" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Output</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="realisasi_output" class="form-control col-md-7 col-xs-12" type="text" name="realisasi_output" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="target_waktu" class="control-label col-md-3 col-sm-3 col-xs-12">Target Waktu</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="target_waktu" class="form-control col-md-7 col-xs-12" type="text" name="target_waktu" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="realisasi_waktu" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Waktu</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="realisasi_waktu" class="form-control col-md-7 col-xs-12" type="text" name="realisasi_waktu" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="target_anggaran" class="control-label col-md-3 col-sm-3 col-xs-12">Target Anggaran</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="target_anggaran" class="form-control col-md-7 col-xs-12" type="number" name="targer_anggaran" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="keluaran_realisasi_anggaran" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Realisasi Anggaran</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keluaran_realisasi_anggaran" class="form-control col-md-7 col-xs-12" type="number" name="keluaran_realisasi_anggaran" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="capaian" class="control-label col-md-3 col-sm-3 col-xs-12">Capaian</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="capaian" class="form-control col-md-7 col-xs-12" type="text" name="capaian" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="ket" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="ket" class="form-control col-md-7 col-xs-12" type="text" name="ket" required="required">
                            </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            </div>
                        </form>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>



  <!-- /page content -->