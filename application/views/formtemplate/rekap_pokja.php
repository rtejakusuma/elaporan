<!-- page content -->

<!-- <div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Rekap Pokja</h3>
    </div>

  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Form Design <small>different form elements</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url() . "submitform" ?>' method="post">
            <div class="form-group">
              <label for="nama" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nama" class="form-control col-md-7 col-xs-12" type="text" name="nama" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="pagu" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="pagu" class="form-control col-md-7 col-xs-12" type="int" name="pagu" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan_bawah" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Bawah</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="jabatan_bawah" class="form-control col-md-7 col-xs-12" type="text" name="jabatan_bawah" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="ket" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="ket" class="form-control col-md-7 col-xs-12" type="text" name="ket" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="paket_kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Paket Kerja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="paket_kerja" class="form-control col-md-7 col-xs-12" type="text" name="paket_kerja" required="required">
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
  </div> -->



  <!-- /page content -->

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
          <h2>Rekap Pokja</h2>
       
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
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Rekap Pokja</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Paket Kerja</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url('admin/submit'); ?>' method="post">
                            <div class="form-group">
                            <label for="nama" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nama" class="form-control col-md-7 col-xs-12" type="text" name="nama" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="jabatan_bawah" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Bawah</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="jabatan_bawah" class="form-control col-md-7 col-xs-12" type="text" name="jabatan_bawah" required="required">
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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url('admin/submit'); ?>' method="post">
                            <div class="form-group">
                            <label for="nama_paket_kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Paket Kerja</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nama_paket_kerja" class="form-control col-md-7 col-xs-12" type="text" name="nama_paket_kerja" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="pagu" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="pagu" class="form-control col-md-7 col-xs-12" type="number" name="pagu" required="required">
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