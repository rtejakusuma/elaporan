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
          <h2>Pemantauan Tindak Lanjut</h2>
       
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
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pemantauan Tindak Lanjut</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Temuan</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Hasil Temuan</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url('admin/submit'); ?>' method="post">
                            
                            <div class="form-group">
                            <label for="judul_laporan" class="control-label col-md-3 col-sm-3 col-xs-12">Judul Laporan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="judul_laporan" class="form-control col-md-7 col-xs-12" type="text" name="judul_laporan" required="required">
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
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url('admin/submit'); ?>' method="post">
                            <div class="form-group">
                            <label for="nama_temuan" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Temuan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nama_temuan" class="form-control col-md-7 col-xs-12" type="text" name="nama_temuan" required="required">
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
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url('admin/submit'); ?>' method="post">
                            <div class="form-group">
                            <label for="rekomendasi" class="control-label col-md-3 col-sm-3 col-xs-12">rekomendasi</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="rekomendasi" class="form-control col-md-7 col-xs-12" type="text" name="rekomendasi" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="status_rekomendasi" class="control-label col-md-3 col-sm-3 col-xs-12">Status Rekomendasi</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="status_rekomendasi" class="form-control col-md-7 col-xs-12" type="text" name="status_rekomendasi" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="tindak_lanjut" class="control-label col-md-3 col-sm-3 col-xs-12">Tindak Lanjut</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="tindak_lanjut" class="form-control col-md-7 col-xs-12" type="text" name="tindak_lanjut" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="status_tindak_lanjut" class="control-label col-md-3 col-sm-3 col-xs-12">Status Tindak Lanjut</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="status_tindak_lanjut" class="form-control col-md-7 col-xs-12" type="text" name="status_tindak_lanjut" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="catatan_bpk" class="control-label col-md-3 col-sm-3 col-xs-12">Catatan BPK</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="catatan_bpk" class="form-control col-md-7 col-xs-12" type="text" name="catatan_bpk" required="required">
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